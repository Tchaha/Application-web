<?php
session_start();

// Vérification que l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    echo "Utilisateur non connecté"; 
    header("Location: connexion.php");
    exit();
} else {
    echo "Utilisateur connecté: " . $_SESSION['utilisateur_id']; 
}


// Informations de connexion à la base de données
$host = "localhost";
$user = "tchahafankouah25_ecrire";
$pass = "Abitibitch22";
$dbname = "tchahafankouah25_zentime";

// Connexion à la base de données
$conn = new mysqli($host, $user, $pass, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$utilisateur_id = $_SESSION['utilisateur_id']; 
$nom = $conn->real_escape_string($_POST['nom']);
$prenom = $conn->real_escape_string($_POST['prenom']);
$age = (int)$_POST['age'];
$poids = (float)$_POST['poids'];
$sexe = $conn->real_escape_string($_POST['sexe']);
$telephone = $conn->real_escape_string($_POST['telephone']);
$email = $conn->real_escape_string($_POST['email']);
$adresse = $conn->real_escape_string($_POST['adresse']);
$date_rdv = $conn->real_escape_string($_POST['date']);

// Vérification si l'ID de l'utilisateur est valide
if (empty($utilisateur_id)) {
    die("Utilisateur non connecté.");
}

// Insertion dans la table des rendez-vous
$sql = "INSERT INTO rendezvous (utilisateur_id, nom, prenom, age, poids, sexe, telephone, email, adresse, date_rdv) 
        VALUES ('$utilisateur_id', '$nom', '$prenom', $age, $poids, '$sexe', '$telephone', '$email', '$adresse', '$date_rdv')";

// Exécution de la requête
if ($conn->query($sql) === TRUE) {
    // Rediriger l'utilisateur vers la page de ses rendez-vous
    header("Location: mes_rendezvous.php"); 
    exit();
} else {
    // En cas d'erreur
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
