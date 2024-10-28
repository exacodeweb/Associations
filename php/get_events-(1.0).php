<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, event_date FROM events";
$result = $conn->query($sql);

$events = array();
if ($result->num_rows > 0) {
    // Récupérer toutes les lignes de résultat dans un tableau associatif
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($events);
?>