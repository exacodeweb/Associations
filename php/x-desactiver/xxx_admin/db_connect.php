<!-- php/db_connect.php: Établit la connexion à la base de données. -->
<?php
$config = include(__DIR__ . '/../config/config.php');

try {
    //echo "Point de débogage A: Tentative de connexion à la base de données.<br>";
    $pdo = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Point de débogage B: Connexion à la base de données réussie.<br>";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>