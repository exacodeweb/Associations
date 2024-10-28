<?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_contact']) || $_POST['csrf_token_contact'] !== $_SESSION['csrf_token_contact']) {
        //die("Erreur : token CSRF invalide.");
    }

    // Configurer la connexion à la base de données
    //$config = include('../config/config_contact.php');
    $config = include(__DIR__ . '/../config/config_contact.php');
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];
    $charset = $config['db']['charset'];

    try {
        // Création de la chaîne de connexion DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        // Création d'une nouvelle instance PDO
        $pdo = new PDO($dsn, $username, $password);
        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Vérifier que les données sont valides
        if ($nom && $email && $message) {
            // Préparation de la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
            $stmt->bindParam(':name', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            // Exécution de la requête
            if ($stmt->execute()) {
                header('Location: ../pages/thank_you_contact.html');
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