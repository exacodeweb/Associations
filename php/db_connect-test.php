<?php
$config = include(__DIR__ . '/../config/config.php');

try {
    $pdo = new PDO("mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset=utf8", $config['db']['user'], $config['db']['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>




<!--?php
$config = include(__DIR__ . '/../config/config.php');

try {
    $pdo = new PDO("mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset={$config['db']['charset']}", $config['db']['user'], $config['db']['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>