<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ./admin_login(test-1).php");
    exit;
}

$servername = "localhost";
$username = "root"; /* username */
$password = "G1i9e6t3"; /* password */
$dbname = "site_papillons"; /* votre_base_de_donnees */

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = intval($_POST['comment_id']);
    $action = $_POST['action'];

    $stmt = null;
    if ($action == 'approve') {
        $stmt = $conn->prepare("UPDATE comments SET is_approved = 1 WHERE id = ?");
    } elseif ($action == 'reject') {
        $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
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

$sql = "SELECT id, commenter_name, comment_text, comment_date FROM comments WHERE is_approved = 0 ORDER BY comment_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form method='post' action='moderate_comments.php'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='com'>";
        echo "<p>" . htmlspecialchars($row['comment_text']) . "</p>";
        echo "<span>Par " . htmlspecialchars($row['commenter_name']) . " le " . date('d/m/Y', strtotime($row['comment_date'])) . "</span><br>";
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