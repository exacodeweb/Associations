
<?php
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
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
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!--?php?>--><!--
include 'path/to/../php/session_init.php';
  if (!isset($_SESSION['csrf_token'])) {
    $SESSION['csrf-token'] = bin2hex(random_bytes(32));
  }-->



<!--?php?>--><!--
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";

    // Générer un jeton CSRF si ce n'est pas déjà fait
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}
-->