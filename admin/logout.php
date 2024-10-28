<?php
session_start(); // Démarre la session
session_destroy(); // Détruit toutes les données associées à la session
header('Location: index.php'); // Redirige vers la page de connexion
exit(); // Termine l'exécution du script
?>

<!-- 8. Déconnexion Administrateur  --><!--  pour gérer la déconnexion : -->
<!-- php/logout.php: Gère la déconnexion de l'utilisateur. -->
<!--?php
session_start();
session_unset();
session_destroy();
//header('Location: ./login.php');//../php/login.php
header('Location: ./admin_login.php');
//header('Location: ../index.html');
exit;
?>
-->


<!--?php
session_start();
session_unset();
session_destroy();
header('Location: admin_login.php');
exit();
?>