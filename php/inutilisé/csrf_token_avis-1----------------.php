<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}

header('Content-Type: application/json');
echo json_encode(['csrf_token_avis' => $_SESSION['csrf_token_avis']]);


// Debugging: Afficher les tokens générés
echo "CSRF Token Avis: " . $_SESSION['csrf_token_avis'] . "<br>";
echo "CSRF Token Commentaires: " . $_SESSION['csrf_token_commentaires'];

?>

<!-- ! important ?php
// Générer un token unique pour la fonctionnalité "avis"
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}

// Générer un token unique pour une autre fonctionnalité, par exemple "commentaires"
if (empty($_SESSION['csrf_token_commentaires'])) {
    $_SESSION['csrf_token_commentaires'] = bin2hex(random_bytes(32));
}
?>
-->

<!--?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}

// Debugging: Afficher le token généré
echo "CSRF Token: " . $_SESSION['csrf_token_avis'];
?>



-->


<!-- pour protéger contre les attaques Cross-Site Request Forgery. -->



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






