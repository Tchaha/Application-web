<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $dateISO = $_POST['date'];
    $nomUtilisateur = isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur'] : 'Utilisateur';

    // Définir la locale en français pour afficher le jour/mois en français
    setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
    date_default_timezone_set('America/Toronto'); // Pour s'assurer que le serveur est bien aligné

    // Convertir la date ISO UTC vers fuseau horaire local
    $dateUTC = new DateTime($dateISO, new DateTimeZone('UTC'));
    $dateUTC->setTimezone(new DateTimeZone('America/Toronto')); // Québec

    // Format en français avec strftime
    $timestamp = $dateUTC->getTimestamp();
    $dateStr = strftime('%A %d %B %Y à %H:%M', $timestamp);

    // Email HTML stylisé en rouge
    $subject = "Confirmation de rendez-vous - ZenTime";
    $body = "
    <html>
    <head>
        <style>
            .message {
                color: red;
                font-family: Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <p class='message'>Bonjour $nomUtilisateur,</p>
        <p class='message'>Vous avez confirmé un rendez-vous le $dateStr.</p>
        <p class='message'>Merci de faire confiance à ZenTime.</p>
        <p class='message'>L'équipe ZenTime.</p>
    </body>
    </html>";

    $headers = 'From: tchahafankouah25@techinfo420.ca' . "\r\n" .
               'Reply-To: tchahafankouah25@techinfo420.ca' . "\r\n" .
               'X-Mailer: PHP/' . phpversion() . "\r\n" .
               'Content-type: text/html; charset=UTF-8';

    if (mail($email, $subject, $body, $headers)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
