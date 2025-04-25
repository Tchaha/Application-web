<?php
session_start();

if (isset($_POST['code']) && $_POST['code'] == $_SESSION['code_2fa']) {
    // Marquer l'utilisateur comme connecté
    $_SESSION['connecté'] = true;

    // Charger les infos utilisateur depuis l'email enregistré en session
    $email = $_SESSION['user_email'];

    // Connexion à la base de données
    $conn = new mysqli("localhost", "tchahafankouah25_ecrire", "Abitibitch22", "tchahafankouah25_zentime");
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['user'] = $user; // ✅ Enregistre l'utilisateur dans la session
        header("Location: user.php");
        exit();
    } else {
        echo "Utilisateur introuvable.";
    }
} else {
    echo "Le code que vous avez saisi est incorrect.";
}
