<?php
session_start();

// Vérifier si l'utilisateur a reçu un code
if (!isset($_SESSION['code_2fa'])) {
    header("Location: user.php"); // Si aucun code n'est disponible, rediriger vers la page de connexion
    exit();
}
?>
<form action="verifier_code.php" method="post">
    <label for="code">Entrez le code que vous avez reçu par email :</label>
    <input type="text" id="code" name="code" required>
    <button type="submit">Vérifier</button>
</form>
