<?php
$host = 'localhost';
$user = 'root';
$password = 'G1i9e6t3';
$database = 'site_papillons';

// Création de la connexion
$conn = new mysqli($host, $user, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>

<!--?php
$host = 'localhost';
$user = 'root';
$password = 'G1i9e6t3';
$database = 'site_papillons';

// Création de la connexion
$conn = new mysqli($host, $user, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>  -->


<!--?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');//username
define('DB_PASSWORD', 'G1i9e6t3');//password
define('DB_NAME', 'site_papillons');

// Connexion à la base de données
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
?>
-->



<!--?php
return [
    'db' => [
        'host' => 'localhost',
        'dbname' => 'site_papillons',
        'user' => 'root',
        'pass' => 'G1i9e6t3',
        'charset' => 'utf8mb4'
    ],
];
?>
-->