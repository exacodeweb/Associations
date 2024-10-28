<?php
session_start();
if (empty($_SESSION['csrf_token_contact'])) {
    $_SESSION['csrf_token_contact'] = bin2hex(random_bytes(32));
}
?>