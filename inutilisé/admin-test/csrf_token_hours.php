<!--?php
session_start();
if (empty($_SESSION['./csrf_token_hours'])) {
    $_SESSION['./csrf_token_hours'] = bin2hex(random_bytes(32));
} 
?>-->

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['../admin/csrf_token_hours'])) {
    $_SESSION['../admin/csrf_token_hours'] = bin2hex(random_bytes(32));
}
?>
