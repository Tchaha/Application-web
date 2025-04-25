<?php
$host = "localhost";
$user = "tchahafankouah25_ecrire";
$pass = "Abitibitch22";
$dbname = "tchahafankouah25_zentime";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$sql = "SELECT titre, debut, fin FROM disponibilites";
$result = $conn->query($sql);

$disponibilites = [];

while ($row = $result->fetch_assoc()) {
    $disponibilites[] = [
        'title' => $row['titre'],
        'start' => $row['debut'],
        'end'   => $row['fin']
    ];
}

header('Content-Type: application/json');
echo json_encode($disponibilites);

$conn->close();
?>
