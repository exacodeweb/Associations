<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

$config = include('../config/config_avis.php');/*config/config.php*/

// Connexion à la base de données
$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = intval($_POST['comment_id']);
    $action = $_POST['action'];

    $stmt = null;
    if ($action == 'approve') {
        $stmt = $conn->prepare("UPDATE avisusers SET is_approved = 1 WHERE id = ?");
    } elseif ($action == 'reject') {
        $stmt = $conn->prepare("DELETE FROM avisusers WHERE id = ?");
    }

    if ($stmt) {
        $stmt->bind_param("i", $comment_id);
        if ($stmt->execute()) {
            echo "Action effectuée avec succès.";
        } else {
            echo "Erreur : " . $stmt->error;
        }
        $stmt->close();
    }
}

$sql = "SELECT id, nom, message, created_at FROM avisusers WHERE is_approved = 0 ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form method='post' action='moderate_comments_beta.php'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='com'>";
        echo "<p>" . htmlspecialchars($row['message']) . "</p>";
        echo "<span>Par " . htmlspecialchars($row['nom']) . " le " . date('d/m/Y', strtotime($row['created_at'])) . "</span><br>";
        echo "<button type='submit' name='action' value='approve'>Approuver</button>";
        echo "<button type='submit' name='action' value='reject'>Rejeter</button>";
        echo "<input type='hidden' name='comment_id' value='" . $row['id'] . "'>";
        echo "</div>";
    }
    echo "</form>";
} else {
    echo "Aucun commentaire en attente.";
}

$conn->close();
?>
