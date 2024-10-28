
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!--
6. check_login.php
Script commun pour vérifier si l'utilisateur est connecté. 
Ce script doit être inclus en haut des pages qui nécessitent une authentification.
-->
