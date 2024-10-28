
<?php
if ($_SESSION['role'] !== 'admin') {
    header('Location: user_dashboard.php');
    exit();
}
?>

<!--
8. check_admin.php
Script pour vérifier si l'utilisateur est un administrateur. 
Ce script doit être inclus après check_login.php sur les pages qui 
nécessitent des privilèges d'administrateur.
-->
