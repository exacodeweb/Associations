<?php
//$config = include(__DIR__ . '/../config/config.php');
$config = include('../../../config/config.php');

try {
    //echo "Point de débogage A: Tentative de connexion à la base de données.<br>";//affichage dans admin_dashboard
    $pdo = new PDO("mysql:host={$config['db']['host']};dbname={$config['db']['dbname']}", $config['db']['user'], $config['db']['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Point de débogage B: Connexion à la base de données réussie: <span>Vous êtes maintenant connecté aux données du tableau de bord.</span><br>";//affichage dans admin_dashboard
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>