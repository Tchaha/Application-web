<?php
// Connexion à la base MySQL
$host = "localhost";
$dbname = "tchahafankouah25_zentime";
$username = "tchahafankouah25_ecrire";
$password = "Abitibitch22";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_POST['utilisateur'], $_POST['motdepasse'], $_POST['mail'])) {
    $utilisateur = htmlspecialchars(trim($_POST['utilisateur']));
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
    $mail = htmlspecialchars(trim($_POST['mail']));

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        die("Adresse email invalide.");
    }

    // Vérifie si le nom d'utilisateur est déjà pris
    $check = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ?");
    $check->execute([$utilisateur]);

    if ($check->rowCount() > 0) {
        echo "Ce nom d'utilisateur est déjà utilisé. <a href='inscription.php'>Réessayer</a>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom_utilisateur, motdepasse, mail) VALUES (?, ?, ?)");
        $stmt->execute([$utilisateur, $motdepasse, $mail]);
        header("Location: connexion.php");
        exit;
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
?>
