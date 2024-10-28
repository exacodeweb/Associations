
<?php
include 'check_login.php';
include 'check_admin.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Déconnexion</a>
    <!-- Contenu du tableau de bord pour les administrateurs -->
</body>
</html>

<!--
4. admin_dashboard.php
Tableau de bord de l'administrateur (protégé par une vérification de session et de rôle) :
-->
