<!--// approve_comment.php-->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];

    if (isset($_POST['approve'])) {
        // Approuver l'avis
        $stmt = $conn->prepare("UPDATE avis SET is_approved = 1 WHERE id = ?");
        $stmt->bind_param("i", $id);
    } else if (isset($_POST['reject'])) {
        // Rejeter l'avis
        $stmt = $conn->prepare("DELETE FROM avis WHERE id = ?");
        $stmt->bind_param("i", $id);
    }

    if ($stmt->execute()) {
        echo "Action réussie.";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>