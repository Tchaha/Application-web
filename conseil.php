<?php
// Tableau des conseils santé avec leurs titres, descriptions et liens YouTube
$conseils = [
    [
        'titre' => 'Mangez plus de fruits et légumes',
        'description' => 'Ils sont riches en fibres, vitamines et antioxydants pour renforcer votre système immunitaire.',
        'video' => 'https://www.youtube.com/shorts/SOmkqGQRcGo?feature=share'
    ],
    [
        'titre' => 'Buvez suffisamment d\'eau',
        'description' => 'Rester hydraté est vital pour le fonctionnement optimal de votre corps et cerveau.',
        'video' => 'https://www.youtube.com/shorts/QoHzSoxN7dU?feature=share'
    ],
    [
        'titre' => 'Faites de l\'exercice régulièrement',
        'description' => '30 minutes par jour suffisent pour améliorer votre santé physique et mentale.',
        'video' => 'https://www.youtube.com/watch?v=FzKj1lgC_Jk'
    ],
    [
        'titre' => 'Dormez suffisamment',
        'description' => 'Un bon sommeil aide à la récupération, la mémoire et le bien-être général.',
        'video' => 'https://www.youtube.com/watch?v=jD4k1jV9Z7Q'
    ],
    [
        'titre' => 'Réduisez votre consommation de sucre',
        'description' => 'Le sucre en excès peut causer du diabète, de l’obésité et des maladies cardiaques.',
        'video' => 'https://www.youtube.com/watch?v=nYdW1t0Q0u4'
    ],
    [
        'titre' => 'Prenez des pauses loin des écrans',
        'description' => 'Reposez vos yeux et réduisez le stress numérique avec des pauses régulières.',
        'video' => 'https://www.youtube.com/watch?v=tog2PqF_M2s'
    ],
    [
        'titre' => 'Pratiquez la respiration consciente',
        'description' => 'La respiration profonde peut réduire l\'anxiété et améliorer la concentration.',
        'video' => 'https://www.youtube.com/watch?v=ZToicYcHIOU'
    ],
    [
        'titre' => 'Faites des étirements',
        'description' => 'Étirez-vous chaque jour pour garder votre corps souple et éviter les douleurs.',
        'video' => 'https://www.youtube.com/watch?v=y8w89gZgVJk'
    ],
    [
        'titre' => 'Évitez les aliments ultra-transformés',
        'description' => 'Ils sont souvent riches en gras, sel, sucre et additifs nocifs.',
        'video' => 'https://www.youtube.com/watch?v=VuYpHTJtXvI'
    ],
    [
        'titre' => 'Limitez votre consommation d\'alcool',
        'description' => 'L\'alcool en excès est lié à plusieurs maladies, dont les troubles du foie.',
        'video' => 'https://www.youtube.com/watch?v=aaZ_y4WqRtY'
    ]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10 Conseils Santé</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4fdf4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color:rgb(0, 0, 0);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            font-size: 18px;
            margin: 0 0 10px;
            color: #2c3e50;
        }

        .card p {
            font-size: 14px;
            color: #555;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            color:rgb(0, 0, 0);
            text-decoration: none;
            font-weight: bold;
        }

        .card a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color:rgb(0, 0, 0);
            color: white;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <header>
        <h1><i class="fas fa-heartbeat"></i> 10 Conseils Santé Essentiels</h1>
        <p>Pour une vie équilibrée et pleine d’énergie</p>
    </header>

    <div class="container">
        <?php foreach ($conseils as $conseil): ?>
        <div class="card">
            <h2><?php echo $conseil['titre']; ?></h2>
            <p><?php echo $conseil['description']; ?></p>
            <a href="<?php echo $conseil['video']; ?>" target="_blank">Voir la vidéo</a>
        </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; 2025 Santé & Bien-être - Tous droits réservés</p>
    </footer>

</body>
</html>
