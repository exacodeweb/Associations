<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Générer un token unique pour la fonctionnalité "avis"
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}

header('Content-Type: application/json');
echo json_encode(['csrf_token_avis' => $_SESSION['csrf_token_avis']]);

?>


<!------------------------------------------------------------------->
<!-- pour protéger contre les attaques Cross-Site Request Forgery. -->
<!------------------------------------------------------------------->

<!-- ! important ?php
// Générer un token unique pour la fonctionnalité "avis"
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}

// Générer un token unique pour une autre fonctionnalité, par exemple "commentaires"
if (empty($_SESSION['csrf_token_commentaires'])) {
    $_SESSION['csrf_token_commentaires'] = bin2hex(random_bytes(32));
}
?> -->

<!--
// Générer un token unique pour la fonctionnalité "contact"
if (empty($_SESSION['csrf_token_contact'])) {
  $_SESSION['csrf_token_contact'] = bin2hex(random_bytes(32));

-->

<!--?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}

header('Content-Type: application/json');
echo json_encode(['csrf_token_avis' => $_SESSION['csrf_token_avis']]);
-->



<!--?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Session déjà démarrée.<br>";
}

if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?>


-->
<!--?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Génération du token CSRF si nécessaire
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?> -->






