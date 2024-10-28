<?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
  echo "Session démarrée avec succès.<br>";
} else {
  echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Vérification du token CSRF
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérifier si le token CSRF est valide
    if (!isset($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : Token CSRF invalide.");
    }

    // Vérifier et récupérer les données du formulaire
    $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';
    $username = 'root';
    $password = 'G1i9e6t3';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note, created_at) VALUES (:nom, :email, :message, :note, NOW())");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':note', $note);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection après insertion réussie
            header('Location: ../pages/thank_you_avis.html');
            exit();
        } else {
            die("Erreur : Échec de l'enregistrement des données.");
        }
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
} else {
    die("Méthode de requête non autorisée.");
}
?>
