<!--?php
require_once '../config/config_avis.php';

$config = include('../config/config_avis.php');

$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des commentaires approuvés
$sql = "SELECT nom, message, note FROM avisusers WHERE is_approved = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<h4>" . htmlspecialchars($row['nom']) . "</h4>";
        echo "<p>" . htmlspecialchars($row['message']) . "</p>";
        echo "<p>Note: " . htmlspecialchars($row['note']) . " étoiles</p>";
        echo "</div>";
    }
} else {
    echo "Aucun commentaire disponible.";
}

// Fermeture de la connexion
$conn->close();
?>  -->











<?php
session_start();
require_once '../config/config_avis-xxxxxx-desactiver.php';

$config = include('../config/config_avis-xxxxx-desactiver.php');

$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, message, note, created_at FROM avisusers WHERE is_approved = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<h3>" . htmlspecialchars($row['nom']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['message']) . "</p>";
        echo "<p>Note : " . htmlspecialchars($row['note']) . "/5</p>";
        echo "<p>Date : " . htmlspecialchars($row['created_at']) . "</p>";
        echo "</div>";
    }
} else {
    echo "Aucun commentaire à afficher.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commentaires approuvés</title>
</head>
<body>
    <h1>Commentaires approuvés</h1>
    <div id="comments">
        <!-- Les commentaires seront affichés ici -->
    </div>
</body>
</html>

<!--------------------------------------------------------------------------------------------------------- Vrsion-1 -->
<!--?php
$config = include('../config/config_avis.php');//../config/config.php

$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, message, note, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') as date FROM avis WHERE is_approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='commentaire'><p>" . htmlspecialchars($row['message']) . "</p><span>Par " . htmlspecialchars($row['nom']) . " le " . $row['date'] . "</span><span>Note : " . htmlspecialchars($row['note']) . "</span></div>";
    }
} else {
    echo "Aucun commentaire pour le moment.";
}

$conn->close();
?> -->