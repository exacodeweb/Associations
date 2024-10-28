

<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<?php
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['username'])) {
    header('Location: ./admin_login.php');//admin_login-test.php
    exit();
}


error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);
// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['username'])) {
    header('Location: ./admin_login.php');
    exit();
}
$username = $_SESSION['username'];
?>

<!--?php
$username = $_SESSION['username'];

// Inclure la connexion à la base de données
include 'db_connect_horaires.php';

// Inclure le script de mise à jour de la structure de la table
include 'update_table_structure.php';
?>-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur votre<br>Tableau de Bord Administrateur<!--,--> <!--?php echo htmlspecialchars($username); ?> --> </h1>
    </header>
    <nav>
        <ul>
            <li><a class="nav-link" href="../php/moderate_comments.php">Modérer les avis</a></li>
            <li><a class="nav-link" href="../php/admin_login-test.php">Gérer les avis</a></li><!-- > formulaire-1-->
            <li><a href="create_event.php">Créer un Évènement</a></li>
            <li><a href="edit_event.php">Modifier un Évènement</a></li>
            <li><a href="delete_event.php">Supprimer un Évènement</a></li>
            <li><a href="update_hours.php">Gérer les Horaires</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>
    <main>
        <!-- Contenu administratif -->
        <section>
            <div class="box-1">
                <ul><!--../php/moderate_comments.php--><!--../php/admin_login.php-->
                    <li><a class="nav-link" href="./moderate_comments.php">Modérer les avis</a></li>
                    <li><a class="nav-link" href="../php/admin_login.php">Gérer les avis</a></li><!-- > formulaire-2-->
                </ul>
            </div>

            <div class="box-2">
                <ul>
                    <li><a class="nav-link" href="update_hours.php">Gérer les Horaires</a></li>
                </ul>
            </div>
            <div class="box-3">
                <ul>
                    <li><a href="create_event.php">Créer un Évènement</a></li>
                    <li><a href="edit_event.php">Modifier un Évènement</a></li>
                    <li><a href="delete_event.php">Supprimer un Évènement</a></li>
                </ul>
            </div>
        </section>
    </main>

    <style>
        h1 {
            text-align: center;
        }
        section {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            width: 100%;
        }
        .box-1, .box-2, .box-3 {
            display: flex;
            flex-direction: column;
            width: 250px;
            padding: 5px;
        }
        .box-1 {
            background-color: greenyellow;
        }
        .box-2 {
            background-color: coral;
        }
        .box-3 {
            background-color: deeppink;
        }
    </style>
</body>
</html>

