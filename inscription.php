<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="conteneur-formulaire">
        <form action="traitement_inscription.php" method="post" class="form">
            <h2 class="titre">Inscription</h2>

            <label for="utilisateur" class="label">Nom d'utilisateur</label>
            <input type="text" name="utilisateur" id="utilisateur" class="champ" required>

            <label for="motdepasse" class="label">Mot de passe</label>
            <input type="password" id="motdepasse" name="motdepasse" class="champ" required>

            <label for="mail" class="label">Adresse mail</label>
            <input type="email" id="mail" name="mail" class="champ" required>
            
            <button type="submit" class="btn">S'inscrire</button>
        </form>
    </div>
</body>
</html>
