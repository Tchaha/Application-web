<?php
session_start();

if (isset($_POST['code']) && $_POST['code'] == $_SESSION['code_2fa']) {
  
    $_SESSION['connecté'] = true;


    $email = $_SESSION['user_email'];

   
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
        $_SESSION['user'] = $user; 
        header("Location: user.php");
        exit();
    } else {
        echo "Utilisateur introuvable.";
    }
} else {
    echo "Le code que vous avez saisi est incorrect.";
}
