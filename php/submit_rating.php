<?php
// Inclure le fichier de configuration
$config = include('../config/config.php');

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    // Configuration de la connexion à la base de données
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $user = $config['db']['user'];
    $password = $config['db']['pass'];
    $charset = $config['db']['charset'];

    // Création de la chaîne de connexion DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    try {
        // Création d'une nouvelle instance PDO
        $pdo = new PDO($dsn, $user, $password);

        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Préparation de la requête d'insertion  //UserRatings
        $sql = "INSERT INTO user_ratings (nom, email, message, note) VALUES (:nom, :email, :message, :note)";
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de remerciement
            header('Location: ../pages/thank_you_avis.html');
            exit();

        } else {
            echo "Erreur lors de l'insertion des données.";
        }
        
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher un message
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>

















<!--?php
session_start();

// Afficher les erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['csrf_token_avis']) && isset($_SESSION['csrf_token_avis']) && hash_equals($_SESSION['csrf_token_avis'], $_POST['csrf_token_avis'])) {
        // Validation et nettoyage des données
        $nom = trim($_POST['nom']);
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $message = trim($_POST['message']);
        $note = filter_var($_POST['note'], FILTER_VALIDATE_INT, [
            'options' => [
                'min_range' => 1,
                'max_range' => 5
            ]
        ]);

        if (!empty($nom) && $email && !empty($message) && $note !== false) {
            include(__DIR__ . '/db_connect.php');

            try {
                $sql = "INSERT INTO userratings (nom, email, message, note, created_at) VALUES (:nom, :email, :message, :note, NOW())";
                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':message', $message, PDO::PARAM_STR);
                $stmt->bindParam(':note', $note, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    header('Location: ../pages/thank_you_avis.html');
                    exit();
                } else {
                    echo "Erreur lors de l'insertion des données.";
                }
            } catch (PDOException $e) {
                echo "Erreur de requête : " . $e->getMessage();
            }
        } else {
            echo "Les données du formulaire sont invalides.";
        }
    } else {
        echo "Le token CSRF est invalide.";
    }
} else {
    echo "Requête invalide.";
}
?>
      -->











<!--?php
session_name('session_avis');
session_start();

// Afficher les erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['csrf_token_avis']) && isset($_SESSION['csrf_token_avis']) && hash_equals($_SESSION['csrf_token_avis'], $_POST['csrf_token_avis'])) {
        // Validation et nettoyage des données
        $nom = trim($_POST['nom']);
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $message = trim($_POST['message']);
        $note = filter_var($_POST['note'], FILTER_VALIDATE_INT, [
            'options' => [
                'min_range' => 1,
                'max_range' => 5
            ]
        ]);

        // Vérification des données
        if (!empty($nom) && $email && !empty($message) && $note !== false) {
            // Inclure le fichier de connexion à la base de données
            include(__DIR__ . '/db_connect-test.php');

            try {
                // Préparation de la requête d'insertion
                $sql = "INSERT INTO userratings (nom, email, message, note, created_at) VALUES (:nom, :email, :message, :note, NOW())";
                $stmt = $pdo->prepare($sql);

                // Liaison des paramètres
                $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':message', $message, PDO::PARAM_STR);
                $stmt->bindParam(':note', $note, PDO::PARAM_INT);

                // Exécution de la requête
                if ($stmt->execute()) {
                    // Redirection vers la page de remerciement
                    header('Location: ../pages/thank_you_avis.html');
                    exit();
                } else {
                    echo "Erreur lors de l'insertion des données.";
                }
            } catch (PDOException $e) {
                // En cas d'erreur de requête, afficher un message
                echo "Erreur de requête : " . $e->getMessage();
            }
        } else {
            echo "Les données du formulaire sont invalides.";
        }
    } else {
        echo "Le token CSRF est invalide.";
    }
} else {
    echo "Requête invalide.";
}
?>

      -->










<!--?php
// Inclure le fichier de configuration
$config = include('../config/config.php');

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    // Configuration de la connexion à la base de données
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];//dbname
    $user = $config['db']['user'];//user
    $password = $config['db']['pass'];//pass
    $charset = $config['db']['charset'];

    // Création de la chaîne de connexion DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    try {
        // Création d'une nouvelle instance PDO
        $pdo = new PDO($dsn, $user, $password);

        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO UserRatings (nom, email, message, note) VALUES (:nom, :email, :message, :note)";
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de remerciement
            header('Location: ../pages/thank_you_avis.html');
            exit();
        } else {
            echo "Erreur lors de l'insertion des données.";
        }
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher un message
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>
-->