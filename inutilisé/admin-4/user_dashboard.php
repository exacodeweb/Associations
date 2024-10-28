
<?php
include 'check_login.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Utilisateur</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Déconnexion</a>
    <!-- Contenu du tableau de bord pour les utilisateurs -->
</body>
</html>

<!--
5. user_dashboard.php
Tableau de bord de l'utilisateur (protégé par une vérification de session) :
-->
