<?php
header('Content-Type: application/json');
//require_once '../config/config_avis_beta.php';
require_once '../../../Mon_projet/config/config.php';

$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, message, note, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') as date FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

$commentaires = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commentaires[] = $row;
    }
}

echo json_encode($commentaires);

$conn->close();
?>

<!--?php
header('Content-Type: application/json');
require_once '../config/config.php';

$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, message, note, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') as date FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

$commentaires = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commentaires[] = $row;
    }
}

echo json_encode($commentaires);

$conn->close();
?>  -->




<!--?php
header('Content-Type: application/json');
$config = include('../config/config_avis.php');//../config/config.php

$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, message, note, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') as date FROM avis WHERE is_approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

$commentaires = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commentaires[] = $row;
    }
}

echo json_encode($commentaires);

$conn->close();
?> -->