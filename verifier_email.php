<?php
session_start();

$host = "localhost";
$dbname = "tchahafankouah25_zentime";
$username = "tchahafankouah25_ecrire";
$password = "Abitibitch22";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$email = $_POST['email'];

// Vérifier si l'email existe dans la base de données
$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE mail = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    // L'email existe, générer un code de vérification
    $code = rand(100000, 999999);
    $_SESSION['code_2fa'] = $code;
    $_SESSION['user_email'] = $email; // stocker l'email dans la session

    // Envoi du mail
    $subject = "Code de vérification";
    $message = "Bonjour {$user['nom_utilisateur']},\n\nVoici votre code de vérification : $code\n\nCégepAT";
    $headers = 'From: tchahafankouah25@techinfo420.ca ' . "\r\n" .
               'Reply-To: tchahafankouah25@techinfo420.ca' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($email, $subject, $message, $headers)) {
        // Rediriger vers la page de saisie du code
        header("Location: verification_code.php");
        exit();
    } else {
        echo "Une erreur est survenue lors de l'envoi du mail.";
    }
} else {
    echo "L'email n'existe pas. Veuillez vérifier votre email.";
}
?>
