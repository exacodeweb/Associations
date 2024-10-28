<?php
session_start();
require_once('../config/config-4.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token']) {
        die('Erreur de validation du token CSRF.');
    }

    // Continuer avec le traitement du formulaire si le jeton est valide
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    $stmt = $conn->prepare("INSERT INTO avisusers (nom, email, message, note) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('sssi', $nom, $email, $message, $note);

    if ($stmt->execute()) {
        header('Location: ../pages/thank_you_avis-4.html');
        exit();
    } else {
        echo "Erreur lors de la soumission de l'avis : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!--5. pages/thank_you_avis-4.html - Page de Confirmation
html
Copier le code-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Merci pour votre avis</title>
    <link rel="stylesheet" href="../style/avis_style.css">
</head>
<body>
    <div class="section-form">
        <div class="article">
            <h2 class="title">Merci pour votre avis</h2>
            <div class="pt text-center">
                <p>
                    Votre avis a été soumis avec succès. Merci pour votre contribution!
                </p>
            </div>
        </div>
    </div>
</body>
</html>

<!--?php
// Inclure le fichier de configuration
//$config = include('../config/config-4.php');

// Démarrer la session pour utiliser le token CSRF
session_start();

require_once('../config/config-4.php');

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier le token CSRF
    if (!isset($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token']) {
        die('Erreur de validation du token CSRF.');
    }

    // Assainir les données du formulaire pour éviter les injections XSS
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $note = (int) $_POST['note'];

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

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO userratings (nom, email, message, note) VALUES (:nom, :email, :message, :note)";
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de remerciement
            header('Location: ../pages/thank_you_avis-4.html');
            exit();
        } else {
            echo "Erreur lors de l'insertion des données.";
        }
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher un message
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>  -->

<!--?php
// Inclure le fichier de configuration
$config = include('../config/config-4.php');

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

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO userratings (nom, email, message, note) VALUES (:nom, :email, :message, :note)";
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de remerciement
            header('Location: ../pages/thank_you_avis-4.html');
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