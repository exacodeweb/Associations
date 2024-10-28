<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : invalid CSRF token.");
    }

    // Configurer la connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';
    $username = 'root';
    $password = 'G1i9e6t3';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message) && !empty($note)) {
            $stmt = $pdo->prepare("INSERT INTO userratings (nom, email, message, note, created_at, is_approved) VALUES (:nom, :email, :message, :note, NOW(), 0)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            if ($stmt->execute()) {
                header('Location: ../pages/thank_you_avis.html');
                exit();
            } else {
                echo "Une erreur est survenue lors de l'enregistrement de vos données.";
            }
        } else {
            echo "Tous les champs sont requis.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    die("Méthode de requête non supportée.");
}
?>



<!--?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';
    $username = 'root'; // Remplacez par votre nom d'utilisateur
    $password = ''; // Remplacez par votre mot de passe

    try {
        $pdo = new PDO("mysql:host=$host;dtbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer et exécuter la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':note', $note);

        if ($stmt->execute()) {
            echo "Votre avis a été soumis avec succès.";
        } else {
            echo "Erreur lors de la soumission de votre avis. Veuillez réessayer.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    echo "Méthode de requête non valide.";
}
?> -->







<!--?php
session_start();
require_once('../php/session_init_avis.php');
require_once('../php/csrf_token_avis.php');

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : invalid CSRF token.");
    }

    // Configurer la connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';
    $username = 'root';
    $password = 'G1i9e6t3';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message) && $note !== false && $note >= 1 && $note <= 5) {
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            if ($stmt->execute()) {

              header('Location: ../pages/thank_you_avis.html');
              exit();

               // echo "Avis soumis avec succès.";

            } else {
                echo "Une erreur est survenue lors de l'enregistrement de vos données.";
            }
        } else {
            echo "Tous les champs sont requis et la note doit être entre 1 et 5.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    die("Méthode de requête non supportée.");
}
?>

