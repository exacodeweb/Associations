<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['csrf_token_moderation'])) {
    $_SESSION['csrf_token_moderation'] = bin2hex(random_bytes(32));
}
?>