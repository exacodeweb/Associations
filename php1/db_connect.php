<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musee_papillons";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!-- db_connect.php : Fichier de connexion à la base de données. -->