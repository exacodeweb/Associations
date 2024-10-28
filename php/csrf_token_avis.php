<?php
session_name('session_userrating_avis');
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
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?> -->

<!--?php
  session_start();
  if (empty($_SESSION['csrf_token_avis'])) {
      $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?> -->
