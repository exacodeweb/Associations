<?php
// Démarrer la session
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['./csrf_token_avi-x1']) || $_POST['./csrf_token_avi-x1'] !== $_SESSION['./csrf_token_avi-x1']) {
    //if (!isset($_POST['csrf_token_contact']) || $_POST['csrf_token_contact'] !== $_SESSION['csrf_token_contact']) {
      die("Erreur : invalid CSRF token.");
    }

    //-------------------------------------------------- ajouter

    //$config = include('C:/xampp/htdocs/Mon_projet/config/config_avis.php'); // Chemin correct vers le fichier de configuration
    //$config = include('C:/xampp/config/config.php');
    //$config = include(__DIR__ . '/../config/config.php');
    //$config = include(__DIR__ . '/../../../../xampp/config/config.php');
    
    // Inclure le fichier de configuration
    //$config = include(__DIR__ . '/../config/config_avis.php');
    $config = include('../config/config_avis.php');


    if (!$config) {
        die("Erreur : fichier de configuration introuvable.");
    }

    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];

    //--------------------------------------------------

    //require_once './config_avis.php';//./config_avis.php

    $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 5)));

    if (!$nom || !$email || !$message || !$note) {
        die("Veuillez remplir tous les champs correctement.");
    }

    $sql = "INSERT INTO userratings (nom, email, message, note) VALUES (?, ?, ?, ?)";
    //$sql = "INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $email, $message, $note]);

    //ajouter
    if ($stmt->execute()) {
      header('Location: ../pages/thank_you_avi.html');//../pages/thank_you_avis.html
      exit();
    }

    if ($stmt) {
        echo "success";
    } else {
        echo "Erreur lors de l'insertion de l'avis.";
    }
} else {
    header("Location: ../pages/avis.html");//../avis.html
}
?>















<!-- php/db_connect.php: Établit la connexion à la base de données. -->
<!--?php
$config = include(__DIR__ . '/../config/config.php');
//$config = include(__DIR__ . '/../../../C:/xampp/config/config.php');
//$config = include(__DIR__ . '/../../../config/config.php');

try {
    //echo "Point de débogage A: Tentative de connexion à la base de données.<br>";
    $pdo = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Point de débogage B: Connexion à la base de données réussie.<br>";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
