
<!--------------------------------------------------------------------------------------------------------------------->
<!-- Ce fichier est la page d'accueil de l'administrateur après la connexion réussie. -->
<!-- 5. Tableau de Bord Administratif -->  <!-- admin $2y$10$Kw3U0mst4EF/48OgHbGZYOxwkJcwS9WL97pMDWi6j1K/YTKfQl6ES -->
<!--4. Fichier admin_dashboard.php
Ce fichier permet à l'administrateur de gérer les horaires. la se sont les services-->
<!--------------------------------------------------------------------------------------------------------------------->

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Chemin correct
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <!--<link rel="stylesheet" href="../style/admin_style.css">-->
    <link rel="stylesheet" href="../admin-3/admin-test_style.css">
</head>
<body>

    <header>
        <h1>Bienvenue, <?php echo htmlspecialchars($username); ?></h1>
    </header>

    <nav>
        <ul>
            <li><a href="create_event.php">Créer un Évènement</a></li>
            <li><a href="edit_event.php">Modifier un Évènement</a></li>
            <li><a href="delete_event.php">Supprimer un Évènement</a></li>
            <li><a href="logout.php">Déconnexion</a></li>

            <!-- ajout test -->
            <li><a href="manage_admins.php">Gérer les administrateurs</a></li>
            <li><a href="manage_horaires.php">Gérer les horaires</a></li>
            <!-- Ajoutez d'autres liens pour les fonctionnalités 
            <li><a href="logout.php">Se déconnecter</a></li>-->
        </ul>
    </nav>

    <main>
        <!-- Contenu administratif -->
    </main>



<!--------------------------------------------------------------------------------------------------------------------->

<?php
session_start();
include '../admin/csrf_token_hours.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/admin_login(test-1).php");
    exit;
}

include './db_connect.php';/*../php/db_connect.php*/

$sql = "SELECT * FROM horaires";
$result = $conn->query($sql);
?>

<!--------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------->

<h1>Tableau de Bord Administrateur</h1>
    <h2>Gestion des Horaires</h2>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture</th>
            <th>Fermeture</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["jour"]. "</td><td>" . $row["ouverture"]. "</td><td>" . $row["fermeture"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Aucun horaire trouvé</td></tr>";
        }
        ?>
    </table>

    <h2>Mettre à Jour les Horaires</h2>
    <!--<form method="post" action="update_hours.php">
    <form method="post" action="./update_hours(test-1).php">
    <form method="post" action="../php/horaires/update_hours(test-1).php">-->
    <form method="post" action="../admin/update_horaires(test-1).php">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label for="jour">Jour :</label>
        <input type="text" id="jour" name="jour" required>
        <label for="ouverture">Ouverture :</label>
        <input type="time" id="ouverture" name="ouverture">
        <label for="fermeture">Fermeture :</label>
        <input type="time" id="fermeture" name="fermeture">
        <input type="submit" value="Mettre à jour">
    </form>


    <!--<form action="update_hours(test-1).php" method="post">
    <form action="./update_hours(test-1).php" method="POST">
    <form action="../php/horaires/update_hours(test-1).php">-->
    <form action="../admin/update_horaires(test-1).php">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    Jour : <input type="text" name="jour"><br>
    Ouverture : <input type="time" name="ouverture"><br>
    Fermeture : <input type="time" name="fermeture"><br>
    <input type="submit" value="Mettre à jour">
    </form>

<!--------------------------------------------------------------------------------------------------------------------->

</body>
</html>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../admin-3/admin-test_style.css">
</head>
<body>
    <header>
        <h1>Bienvenue, <?php echo htmlspecialchars($username); ?></h1>
    </header>
    <nav>
        <ul>
            <li><a href="create_event.php">Créer un Évènement</a></li>
            <li><a href="edit_event.php">Modifier un Évènement</a></li>
            <li><a href="delete_event.php">Supprimer un Évènement</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>
    <main>
        <!-- Contenu administratif -->
    </main>
</body>
</html>


