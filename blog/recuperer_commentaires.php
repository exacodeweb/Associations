<?php
header('Content-Type: application/json');

// Connexion à la base de données (à adapter selon vos paramètres)
//$servername = "localhost";
//$username = "root";
//$password = "G1i9e6t3";
//$dbname = "site_papillons";

/*---------------------------------------*/

// ! fichier de Test car celui fonctionnelle tester est nommée "moderate_comments-0.php"
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

// Chargement de la configuration
//$config = include('../../../Mon_projet/config/config.php');
$config = include('../config/config.php');

// Connexion à la base de données
$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

/*---------------------------------------*/

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sélectionner les commentaires approuvés depuis la base de données
$sql = "SELECT commenter_name, comment_text, comment_date FROM comments WHERE is_approved = 1 ORDER BY comment_date DESC";
$result = $conn->query($sql);

$commentaires = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commentaires[] = [
            'name' => htmlspecialchars($row['commenter_name']),
            'text' => htmlspecialchars($row['comment_text']),
            'date' => date('d/m/Y', strtotime($row['comment_date']))
        ];
    }
}

// Fermer la connexion à la base de données
$conn->close();

echo json_encode($commentaires);
?>