<?php
session_name('config_avis_session'); // Utilisation d'un nom de session distinct
session_start(); // Démarrage de la session
if (empty($_SESSION['csrf_token_avi-x1'])) {
    $_SESSION['csrf_token_avi-x1'] = bin2hex(random_bytes(32)); // Génération du token CSRF
}
?>
