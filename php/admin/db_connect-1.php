<?php
//$config = include(__DIR__ . '/../config/config.php');
//$config = include('C:/xampp/config/config.php');
$config = include('../../config/config.php');

// Affiche le contenu de la configuration pour débogage
echo '<pre>';
print_r($config);
echo '</pre>';

try {
    $pdo = new PDO(
        "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset={$config['db']['charset']}",
        $config['db']['user'],
        $config['db']['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?> 

<!-- php/db_connect.php: Établit la connexion à la base de données. -->
<!--?php
$config = include('../../config/config.php');

//$config = include(__DIR__ . '/../config/config-2.php');
//$config = include(__DIR__ . '/../../../C:/xampp/config/config.php');
//$config = include(__DIR__ . '/../../../config/config.php');


try {
    //echo "Point de débogage A: Tentative de connexion à la base de données.<br>";
    $pdo = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Point de débogage B: Connexion à la base de données réussie.<br>";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
-->
<!--;charset={$config['db']['charset']}-->


<!-- php/db_connect.php: Établit la connexion à la base de données. -->
<!--?php
$config = include(__DIR__ . '/../config/config-2.php');
//$config = include(__DIR__ . '/../../../C:/xampp/config/config.php');
//$config = include(__DIR__ . '/../../../config/config.php');

try {
    //echo "Point de débogage A: Tentative de connexion à la base de données.<br>";
    $pdo = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Point de débogage B: Connexion à la base de données réussie.<br>";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
-->