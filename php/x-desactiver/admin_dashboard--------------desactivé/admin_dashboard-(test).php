<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <h1>Bienvenue, Admin</h1>
   <a href="moderate_comments.php">Gérer les Avis</a><br>
     <!--<a href="../php/moderate_comments(test-1).php">Gérer les Avis</a><br>-->
    <a href="update_hours.php">Mettre à Jour les Horaires</a><br>
    <!--<a href="../admin/update_hours(test-1).php">Mettre à Jour les Horaires</a><br>-->
    <a href="logout.php">Se Déconnecter</a>
</body>
</html>