<!--?php
function get_db_connection() {
    $host = 'localhost'; // ou l'adresse de votre serveur de base de données
    $db = 'site_papillons'; // nom de la base de données
    $user = 'root'; // nom d'utilisateur de la base de données
    $pass = 'G1i9e6t3'; // mot de passe de la base de données
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?> <link href="../../config/">  -->
<!--------------------------------------------------------------------------------------------------------------------->
<!-- php/db_connect.php: Établit la connexion à la base de données. --> 
<?php
//$config = include(__DIR__ . '/../config/config_hours.php');
$config = include('../../config/config_hours.php');
try {
    echo "Point de débogage A: Tentative de connexion à la base de données.<br>";
    $pdo = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Point de débogage B: Connexion à la base de données réussie: <span>Vous êtes maintenant connectée aux <!--Gestionnaire des Horaires--> données du tableau de bord.</span><br>";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>

<!-- php/config.php: Contient les paramètres de connexion à la base de données. -->
<!--?php
return [
    'db_host' => 'localhost',
    'db_name' => 'site_papillons',
    'db_user' => 'root',
    'db_pass' => 'G1i9e6t3',
];
?> -->

<!--
CREATE TABLE IF NOT EXISTS horaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jour VARCHAR(50) NOT NULL,
    ouverture_matin TIME DEFAULT '00:00:00',
    fermeture_matin TIME DEFAULT '00:00:00',
    ouverture_apresmidi TIME DEFAULT '00:00:00',
    fermeture_apresmidi TIME DEFAULT '00:00:00'
);

-->
