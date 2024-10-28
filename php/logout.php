<!-- 8. Déconnexion Administrateur  --><!--  pour gérer la déconnexion : -->
<!-- php/logout.php: Gère la déconnexion de l'utilisateur. -->
<?php
session_start();
session_unset();
session_destroy();
//header('Location: ./login.php');//../php/login.php
header('Location: ./admin_login.php');
//header('Location: ../index.html');
exit;
?>



<!--?php
session_start();
session_unset();
session_destroy();
header('Location: admin_login.php');
exit();
?>