<!--// moderate_comments.php-->
<?php
session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'username', 'password', 'database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les avis non approuvés
$result = $conn->query("SELECT * FROM avis WHERE is_approved = 0");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>Nom:</strong> " . $row['nom'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
        echo "<p><strong>Note:</strong> " . $row['note'] . "</p>";
        echo "<form method='POST' action='approve_comment.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='approve' value='Approuver'>";
        echo "<input type='submit' name='reject' value='Rejeter'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "Aucun avis en attente de modération.";
}

// Fermer la connexion
$conn->close();
?>