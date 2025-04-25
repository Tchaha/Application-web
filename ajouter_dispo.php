<?php
$host = "localhost";
$user = "tchahafankouah25_ecrire";
$pass = "Abitibitch22";
$dbname = "tchahafankouah25_zentime";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {
    $stmt = $conn->prepare("INSERT INTO disponibilites (titre, debut, fin) VALUES (?, ?, ?)");

    foreach ($data as $dispo) {
        $titre = $dispo['title'];
        $debut = date('Y-m-d H:i:s', strtotime($dispo['start']));
        $fin = date('Y-m-d H:i:s', strtotime($dispo['end']));
        $stmt->bind_param("sss", $titre, $debut, $fin);
        $stmt->execute();
    }

    $stmt->close();
    echo "Disponibilités enregistrées.";
} else {
    echo "Aucune donnée reçue.";
}

$conn->close();
?>
