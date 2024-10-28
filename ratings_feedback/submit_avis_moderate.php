<?php
session_start();

// Vérifiez le jeton CSRF
if ($_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
    die("Erreur : Jeton CSRF invalide");
}

// Inclure le fichier de configuration pour la connexion à la base de données
//$config = include('../config/config_avis.php');
$config = include('../../../Mon_projet/config/config.php');

// Connexion à la base de données
$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparez et liez
$stmt = $conn->prepare("INSERT INTO avisusers (nom, email, message, note, created_at) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param("sssi", $nom, $email, $message, $note);

$nom = $_POST['nom'];
$email = $_POST['email'];
$message = $_POST['message'];
$note = intval($_POST['note']);

if ($stmt->execute()) {
    echo "Avis soumis avec succès. Il sera publié après approbation.";
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>