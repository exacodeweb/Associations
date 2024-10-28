<?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Génération du token CSRF si nécessaire
if (empty($_SESSION['csrf_token_avi'])) {
    $_SESSION['csrf_token_avi'] = bin2hex(random_bytes(32));
}
?> 

<!--?php
session_name('avis_session'); // Utilisation d'un nom de session distinct
session_start(); // Démarrage de la session
if (empty($_SESSION['csrf_token_avi'])) {
    $_SESSION['csrf_token_avi'] = bin2hex(random_bytes(32)); // Génération du token CSRF
}
?>  -->



<!--?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();

if (empty($_SESSION['csrf_token_avi'])) {
    $_SESSION['csrf_token_avi'] = bin2hex(random_bytes(32));
}
}
?> -->



<!--?php
session_start();
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?> -->





<!--
session_start();
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?>
-->


