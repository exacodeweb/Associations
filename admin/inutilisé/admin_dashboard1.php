<?php
session_start();

if (!isset($_SESSION['username'])) {
    error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
    header('Location: index.php');
    exit();
}

error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);
$username = $_SESSION['username'];

// Connexion à la base de données
$servername = "localhost";
$username_db = "root"; // Remplacez par votre nom d'utilisateur de la base de données
$password_db = "G1i9e6t3"; // Remplacez par votre mot de passe de la base de données
$dbname = "site_papillons"; // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des statistiques
$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$sql_comments = "SELECT COUNT(*) AS total_comments FROM comments";
$sql_events = "SELECT COUNT(*) AS total_events FROM events";

$result_users = $conn->query($sql_users);
$result_comments = $conn->query($sql_comments);
$result_events = $conn->query($sql_events);

$total_users = $result_users->fetch_assoc()['total_users'];
$total_comments = $result_comments->fetch_assoc()['total_comments'];
$total_events = $result_events->fetch_assoc()['total_events'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
</head>
<body>
    <header>
        <div class="title">Ailes-enchantées</div>
        <h1>Bienvenue Administrateur<!--<br> ailes-enchantées--> <?php echo htmlspecialchars($username); ?></h1>
    </header>
    <main>
        <section>
            <div class="box-1">
                <ul>
                    <li><a class="nav-link" href="../blog/moderate_comments.php">Modérer les avis blog</a></li>
                    <li><a class="nav-link" href="../ratings_feedback/moderate_comments.php">Modérer les avis utilisateur</a></li>
                    <li><a href="../ratings_feedback/check_images.php">Vérifier les images de profil</a></li>
                </ul>
            </div>
            <div class="box-2">
                <ul>
                    <li><a class="nav-link" href="../horaires/update_hours.php">Gérer les horaires</a></li>
                </ul>
            </div>
            <div class="box-3">
                <ul>
                    <li><a href="#">Créer un Évènement</a></li>
                    <li><a href="#">Modifier un Évènement</a></li>
                    <li><a href="#">Supprimer un Évènement</a></li>
                </ul>
            </div>
        </section>
        <section>
            <div class="statistics">
                <h2>Statistiques du site</h2>
                <p>Nombre total d'utilisateurs : <?php echo $total_users; ?></p>
                <p>Nombre total de commentaires : <?php echo $total_comments; ?></p>
                <p>Nombre total d'événements : <?php echo $total_events; ?></p>
            </div>
        </section>
    </main>

    <style>
        header {
            margin-bottom: 80px;
        }
        .title {
            font-size: xx-large;
            color: #d94350;
        }
        h1 {
            text-align: center;
        }
        section {
            display: flex;
            flex: 250px;
            flex-direction: row;
            justify-content: space-around;
            width: 100%;
        }
        .box-1, .box-2, .box-3 {
            display: flex;
            flex-direction: column;
            height: 90px;
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
            background-color: #D0D3D4;
        }
        .statistics {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</body>
</html>