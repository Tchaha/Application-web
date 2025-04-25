<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="conteneur-formulaire">
    <form action="authentification.php" method="post" class="form">
        <h2 class="titre">Connexion</h2>

        <label for="utilisateur" class="label">Nom d'utilisateur</label>
        <input type="text" id="utilisateur" name="utilisateur" class="champ" required>

        <label for="motdepasse" class="label">Mot de passe</label>
        <input type="password" id="motdepasse" name="motdepasse" class="champ" required>

        <button type="submit" class="btn">Se connecter</button>

        <?php if (isset($_GET['erreur'])): ?>
            <p style="color: red;">Nom d'utilisateur ou mot de passe incorrect.</p>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
