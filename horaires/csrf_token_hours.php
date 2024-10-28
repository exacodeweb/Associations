<?php
session_start();
if (empty($_SESSION['csrf_token_hours'])) {
    $_SESSION['csrf_token_hours'] = bin2hex(random_bytes(32));
} 
?>