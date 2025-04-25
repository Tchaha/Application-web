<?php
session_start();

// Vérifie si l'utilisateur est bien connecté et que la double authentification est complétée
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}

// Renouvelle l'ID de session pour la sécurité
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zentime</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="menu_bar">
        <h1 class="logo">Zen<span>Time</span>  Bonjour <?php echo htmlspecialchars($_SESSION['user']['nom_utilisateur']); ?> !</h1>
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

    <div class="video">
        <video id="background-video" autoplay loop muted>
            <source src="back2.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="video-content">
            <h2 class="logo">Bienvenue sur Zen<span>Time</span></h2>
            <p>Votre plateforme de bien-être et de santé.</p>
        </div>
    </div>

    <section class="services">
        <h2>Nos Services Médicaux</h2>
        <div class="services-container" id="services-container">

            <div class="service">
                <i class="fas fa-calendar-check"></i>
                <h3>Prendre rendez-vous</h3>
                <p>Réservez une consultation.</p>
                <a href="rendez-vous.php" class="btn">Réserver maintenant</a>
            </div>

            <div class="service">
                <i class="fas fa-user-md"></i>
                <h3>Mes rendez-vous</h3>
                <p>Consulter vos rendez-vous.</p>
                <a href="mes_rendezvous.php" class="btn">liste rendez-vous</a>
            </div>

            <div class="service">
                <i class="fas fa-notes-medical"></i>
                <h3>Conseils en santé</h3>
                <p>Hygiène de vie.</p>
                <a href="conseil.php" class="btn">Voir les conseils</a>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 ZenTime. Tous droits réservés.</p>
        <p>Contactez-nous : +1 819-290-38-46</p>
        <nav>
            <ul>
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#a-propos">À propos</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </footer>

    <script src="dom.js" type="module"></script>
</body>
</html>
