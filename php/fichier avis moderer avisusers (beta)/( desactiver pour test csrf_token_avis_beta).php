<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['csrf_token_avis_beta'])) {
    $_SESSION['csrf_token_avis_beta'] = bin2hex(random_bytes(32));
}
?>