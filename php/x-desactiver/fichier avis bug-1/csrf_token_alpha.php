<?php
session_name('session_form_user');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['csrf_token_alpha'])) {
    $_SESSION['csrf_token_alpha'] = bin2hex(random_bytes(32));
}
?>