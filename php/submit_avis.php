<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez le token CSRF
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : invalid CSRF token.");
    }

    // Configuration de la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';//nom_de_votre_base_de_donnees
    $username = 'root';//nom_utilisateur
    $password = 'G1i9e6t3';//votre_mot_de_passe

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    // Capture des données du formulaire
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

    if (!empty($nom) && !empty($email) && !empty($message) && !empty($note)) {//
        $stmt = $pdo->prepare("INSERT INTO user_feedback (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
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
}
?>






<!--?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez le token CSRF
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : invalid CSRF token.");
    }

    // Configuration de la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';//nom_de_votre_base_de_donnees
    $username = 'root';//nom_utilisateur
    $password = 'G1i9e6t3';//votre_mot_de_passe

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    // Capture des données du formulaire
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

    if (!empty($nom) && !empty($email) && !empty($message) && !empty($note)) {//user_feedback
        $stmt = $pdo->prepare("INSERT INTO userratings (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
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
}
?>
-->




<!--?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
   echo "Session démarrée avec succès.<br>";
}else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
  }

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        //die("Erreur : invalid CSRF token.");
    }

    // Configurer la connexion à la base de données

    // Inclure le fichier de configuration
    //$config = include('/path/to/secure/config.php');
    // Inclure le fichier de configuration
    $config = include('C:\xampp\config\config.php');

    // Récupérer les paramètres de connexion
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO userratings (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            if ($stmt->execute()) {
              header('Location: ../pages/thank_you_avis.html');
              exit();
            }/**/

            if ($stmt->execute()) {
                echo 'success';
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
?> -->
