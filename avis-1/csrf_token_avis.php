<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?>


<?php
  session_start();
  if (empty($_SESSION['csrf_token_avis'])) {
      $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?>

<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Génération du token CSRF s'il n'existe pas déjà
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?> -->



