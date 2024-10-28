<?php
$host = 'localhost';
$dbname = 'site_papillons';
$username = 'root';
$password = 'G1i9e6t3';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données<br>";

    // Tester l'accès à la table avis
    $stmt = $pdo->query("SELECT 1 FROM avis LIMIT 1");
    if ($stmt) {
        echo "Accès à la table 'avis' réussi.";
    } else {
        echo "Impossible d'accéder à la table 'avis'.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>



<!--?php
$config = include('../config/config.php');

try {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
    $pdo = new PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>  -->


<!--?php
require_once __DIR__ . '/../db_connect.php';

echo "Connexion réussie !";
?>

<?php
$config = include('C:/xampp/config/config.php');

$host = $config['db']['host'];
$dbname = $config['db']['dbname'];
$username = $config['db']['user'];
$password = $config['db']['pass'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
