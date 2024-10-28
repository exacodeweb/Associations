

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Génération du token CSRF si nécessaire
if (empty($_SESSION['csrf_token_contact'])) {
    $_SESSION['csrf_token_contact'] = bin2hex(random_bytes(32));
}


echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>
