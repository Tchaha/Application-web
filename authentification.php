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

$utilisateur = $_POST['utilisateur'];
$motdepasse = $_POST['motdepasse'];

$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ?");
$stmt->bind_param("s", $utilisateur);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($motdepasse, $user['motdepasse'])) {
    // Identifiants valides, demander l'email
    $_SESSION['temp_user'] = $user;

    // Afficher le formulaire pour entrer l'email
    echo '<form action="verifier_email.php" method="post">
            <label for="email">Entrez votre email :</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Envoyer le code</button>
          </form>';
} else {
    header("Location: connexion.php?erreur=1");
    exit();
}
?>
