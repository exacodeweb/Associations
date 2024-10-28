<?php
session_start();
//include './db_connect_horaires.php';
include './db_connect_horaires.php';

// Récupération des horaires
$sql = "SELECT * FROM horaires";
$stmt = $pdo->query($sql);
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convertir les données en JSON
header('Content-Type: application/json');
echo json_encode($horaires);
exit();
?> 

  

<!--?php
include 'db_connect.php';
$sql = "SELECT * FROM horaires";
$result = $pdo->query($sql);
$horaires = [];
if ($result->rowCount() > 0) {
    $horaires = $result->fetchAll(PDO::FETCH_ASSOC);
}
$pdo = null;
?>-->
 