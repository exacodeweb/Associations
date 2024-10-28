<?php
$config = include('../config/config.php');

// Connexion à la base de données
$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, message, note, created_at FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='com'>";
        echo "<p>" . htmlspecialchars($row['message']) . "</p>";
        echo "<span>Par " . htmlspecialchars($row['nom']) . " le " . date('d/m/Y', strtotime($row['created_at'])) . "</span>";
        echo "<span>Note : " . htmlspecialchars($row['note']) . "</span>";
        echo "</div>";
    }
} else {
    echo "Aucun commentaire.";
}

$conn->close();
?>