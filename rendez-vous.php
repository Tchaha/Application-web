<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réserver un rendez-vous – ZenTime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />

    <!-- FontAwesome + Ton CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    
    <style>
        .confirmation-message {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0,0,0,0.6);
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 20px;
        }

        .confirmation-box {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            text-align: center;
        }

        .confirmation-box button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirmation-box button.cancel {
            background-color: #f44336;
            margin-left: 10px;
        }
    </style>
</head>
<body>

<!-- Menu -->
<div class="menu_bar">
    <h1 class="logo">Zen<span>Time</span> - Bonjour <?php echo htmlspecialchars($_SESSION['utilisateur']); ?> !</h1>
    <ul>
        <li class="dropdown">
            <a href="#">Contactez-nous <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-content">
                <li><a href="tel:+18192903846"><i class="fa fa-phone"></i> +1 819-290-38-46</a></li>
                <li><a href="mailto:contact@zentime.com"><i class="fa fa-envelope"></i> contact@zentime.com</a></li>
            </ul>
        </li>
        <li>
            <form action="deconnexion.php" method="post" style="display: inline;">
                <button type="submit" class="logout-btn">
                    Se déconnecter <i class="fa-regular fa-circle-user"></i>
                </button>
            </form>
        </li>
    </ul>
</div>

<!-- Contenu principal -->
<div class="contenu">
    <h2 style="text-align: center;">Réservez votre créneau</h2>
    <p style="text-align: center;">Choisissez une disponibilité dans le calendrier ci-dessous.</p>

    <div id="calendar" style="max-width: 900px; margin: 0 auto; padding: 20px;"></div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 ZenTime. Tous droits réservés.</p>
    <p>Contactez-nous : +1 819-290-38-46</p>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#a-propos">À propos</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</footer>

<!-- Boîte de confirmation -->
<div id="confirmationMessage" class="confirmation-message">
    <div class="confirmation-box">
        <h3>Êtes-vous sûr de vouloir réserver ce créneau ?</h3>
        <button id="confirmBtn">Oui, réserver maintenant</button>
        <button class="cancel" onclick="fermerConfirmation()">Annuler</button>
    </div>
</div>

<!-- Scripts FullCalendar -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    let selectedDate = null;

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        locale: 'fr',
        nowIndicator: true,
        allDaySlot: false,
        slotMinTime: '08:00:00',
        slotMaxTime: '20:00:00',
        selectable: false,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridDay,timeGridWeek,dayGridMonth'
        },
        events: 'get_disponibilites.php',
        eventClick: function(info) {
            selectedDate = info.event.start.toISOString();
            document.getElementById('confirmationMessage').style.display = 'flex';
        }
    });

    document.getElementById('confirmBtn').onclick = function () {
        if (!selectedDate) return;
        
        // Email de la session
        const email = "<?php echo $_SESSION['mail_utilisateur'] ?? '2318277@cegepat.qc.ca'; ?>";
        
        fetch('envoyer_email.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `email=${email}&date=${selectedDate}`
        })
        .then(response => response.json())
        .then(data => {
        const date = new Date(selectedDate);
        const options = {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
            hour: '2-digit', minute: '2-digit', hour12: false
        };
        const dateStr = date.toLocaleString('fr-FR', options);

        if (data.success) {
            alert("Vous avez pris rendez-vous pour le " + dateStr + ".\nUn courriel de confirmation vous a été envoyé.");
        } else {
            alert("Erreur lors de l'envoi de l'email.");
        }
        document.getElementById('confirmationMessage').style.display = 'none';
    });

    };

    calendar.render();
});

function fermerConfirmation() {
    document.getElementById('confirmationMessage').style.display = 'none';
}
</script>

</body>
</html>
