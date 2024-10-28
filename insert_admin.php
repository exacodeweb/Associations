<?php
// Inclure le fichier de configuration
$config = include('C:/xampp/config/config.php');


try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO(
        "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset={$config['db']['charset']}",
        $config['db']['user'],
        $config['db']['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Hachage du mot de passe
    $hashedPassword = password_hash('password123', PASSWORD_DEFAULT); // Utilisation de PASSWORD_DEFAULT pour le hachage

    // Préparation de la requête SQL
    $stmt = $pdo->prepare('INSERT INTO admins (username, password) VALUES (:username, :password)');

    // Définition des paramètres de la requête
    $username = 'AilesSolidaire';
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);

    // Exécution de la requête
    $stmt->execute();

    echo "Utilisateur inséré avec succès.";
} catch (PDOException $e) {
    // Gestion des erreurs de connexion ou d'exécution de la requête
    die("Erreur : " . $e->getMessage());
}
?>

<!--
AilesSolidaire "username"
password123 "mot de passe"

inserer l'administrateur dans la tables admins
http://localhost/Mon_projet/insert_admin.php.
-->


<!--?php
$config = include('C:/xampp/config/config.php');

try {
    $pdo = new PDO(
        "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset={$config['db']['charset']}",
        $config['db']['user'],
        $config['db']['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Hachage du mot de passe
    $hashedPassword = password_hash('password123', PASSWORD_BCRYPT);
    $stmt = $pdo->prepare('INSERT INTO admins (username, password) VALUES (:username, :password)');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);

    // Insérer l'utilisateur admin
    $username = 'AilesSolidaire';
    $stmt->execute();

    echo "Utilisateur inséré avec succès.";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>-->