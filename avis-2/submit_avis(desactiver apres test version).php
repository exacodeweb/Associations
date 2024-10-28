<?php

include 'session_init.php';

//session_start();

// Vérifiez si le token CSRF existe et générez-le si nécessaire
//if (empty($_SESSION['csrf_token'])) {
  //$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
//}

//if (session_status() == PHP_SESSION_ACTIVE) {
    //echo "Session démarrée avec succès.<br>";
//} else {
    //echo "Erreur : La session n'a pas pu être démarrée.<br>";
//}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //debog
  error_log("Débogage : Requête POST détectée.");

    // Vérifiez le token CSRF
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : invalid CSRF token.");
    }
    // Inclure le fichier de configuration
    $config = include('C:/xampp/config/config.php');
    //$config = include('../config/config_avis.php');

    // Récupérer les paramètres de connexion
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //debog
        error_log("Débogage : Connexion à la base de données réussie.");

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
          //debog//
          error_log("Débogage : Données du formulaire valides.");

        // Vérifier les données reçues
        if (empty($nom) || empty($email) || empty($message)) {
          die("Erreur : tous les champs requis ne sont pas remplis.");
        }

        // Afficher les données pour le débogage
        echo "Nom: $nom<br>";
        echo "Email: $email<br>";
        echo "Message: $message<br>";
        echo "Note: $note<br>";

            // Insérer les données dans la base de données
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            if ($stmt->execute()) {
              //debog//
              error_log("Débogage : Insertion dans la base de données réussie.");

                echo 'success';
                // Optionnel : rediriger vers une page de remerciement
                // header('Location: ../pages/thank_you_avis.html');
                // exit();
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
