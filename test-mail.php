<?php
if (mail('tchahaf.junior@gmail.com', 'Test mail', 'Ce message est un test.')) {
    echo 'Mail envoyé avec succès.';
} else {
    echo 'Échec de l’envoi du mail.';
}
?>
