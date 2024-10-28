
<?php
session_start();
session_destroy();
header('Location: login.php');
exit();
?>

<!--
5. logout.php
Script de déconnexion :
-->
