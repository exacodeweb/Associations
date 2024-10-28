<?php
session_start();

// Inclure la configuration de la base de données
require_once '../config/config_avis_beta.php';

// Vérifier la connexion à la base de données
$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier le token CSRF
    if (!empty($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token_moderation'], $_POST['csrf_token_moderation'])) {
        $id = intval($_POST['id']);
        if (isset($_POST['approve'])) {
            // Approuver le commentaire
            $stmt = $conn->prepare("UPDATE avisusers SET is_approved = 1 WHERE id = ?");
        } elseif (isset($_POST['reject'])) {
            // Supprimer le commentaire
            $stmt = $conn->prepare("DELETE FROM avisusers WHERE id = ?");
        }

        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $_SESSION['message'] = "L'action a été réalisée avec succès.";
            } else {
                $_SESSION['message'] = "Erreur lors de l'exécution de l'action.";
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = "Erreur de préparation de la requête.";
        }
    } else {
        $_SESSION['message'] = "Invalid CSRF token.";
    }
} else {
    $_SESSION['message'] = "Mauvaise méthode de requête.";
}

// Rediriger vers la page de modération
header("Location: moderation_page.php");
exit();
?>










<!--// approve_comment.php-->
<!--?php
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
        $stmt = $conn->prepare("UPDATE avisusers SET is_approved = 1 WHERE id = ?");
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