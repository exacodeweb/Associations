<?php
session_start();
if (empty($_SESSION['csrf_token(test-1)'])) {
    $_SESSION['csrf_token(test-1)'] = bin2hex(random_bytes(32));
}
?>
