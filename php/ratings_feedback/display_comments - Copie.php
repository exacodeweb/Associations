




<!--?php
// Inclure le fichier de configuration
$config = include('../../../config/config.php');

// Configuration de la connexion à la base de données
$host = $config['db']['host'];
$dbname = $config['db']['dbname'];
$user = $config['db']['user'];
$password = $config['db']['pass'];
$charset = $config['db']['charset'];

// Création de la chaîne de connexion DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    // Création d'une nouvelle instance PDO
    $pdo = new PDO($dsn, $user, $password);

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Préparation de la requête de sélection
    $sql = "SELECT nom, message, note, created_at, profile_pic FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);

    // Exécution de la requête
    $stmt->execute();

    // Récupération des résultats
    $avis = $stmt->fetchAll();

} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis Utilisateurs</title>
    <style>
        .avis {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
            padding: 10px;
            border: 1px solid grey;
            border-radius: 5px;
            width: 50%;
            background-color: #f8f9f8;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-?php foreach ($avis as $commentaire) : ?>
        <div class="avis"> -->
            <!--<img class="profile-pic" src="../ratings_feedback/profile_pics/<!-?php echo htmlspecialchars($commentaire['profile_pic']); ?>" alt="Profile Picture">-->
            <!--<img class="profile-pic" src="../ratings_feedback/profile_pics/<!-?php echo htmlspecialchars($commentaire['profile_pic']); ?>" alt="Profile Picture">
            <p><strong><!-?php echo htmlspecialchars($commentaire['nom']); ?></strong></p>
            <p><!-?php echo htmlspecialchars($commentaire['message']); ?></p>
            <p>Note: <!-?php echo htmlspecialchars($commentaire['note']); ?> étoiles</p>
            <p><!-?php echo htmlspecialchars($commentaire['created_at']); ?></p>
        </div>
    <!-?php endforeach; ?>
</body>
</html>

    -->

<?php

// Inclure le fichier de configuration
$config = include('../../../Mon_projet/config/config.php');
//$config = include('../../config/config.php')

// Configuration de la connexion à la base de données
$host = $config['db']['host'];
$dbname = $config['db']['dbname'];
$user = $config['db']['user'];
$password = $config['db']['pass'];
$charset = $config['db']['charset'];

// Création de la chaîne de connexion DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    // Création d'une nouvelle instance PDO
    $pdo = new PDO($dsn, $user, $password);

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Préparation de la requête de sélection
    $sql = "SELECT nom, message, note, created_at, profile_pic FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);

    // Exécution de la requête
    $stmt->execute();

    // Récupération des résultats
    $avis = $stmt->fetchAll();

} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message
    echo "Erreur de connexion : " . $e->getMessage();
}

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis Utilisateurs</title>
    <style>
        .avis {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
            padding: 10px;
            border: 1px solid grey;
            border-radius: 5px;
            width: 50%;
            background-color: #f8f9f8;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>
</head>
<body> 
    <?php foreach ($avis as $commentaire) : ?>
        <div class="avis"> 
           <!--<img class="profile-pic" src="../../images3/profile_pics/<!-?php echo htmlspecialchars($commentaire['profile_pic']); ?>" alt="Profile Picture">-->
            <img class="profile-pic" src="../../php/ratings_feedback/profile_pics/<?php echo htmlspecialchars($commentaire['profile_pic']); ?>" alt="Profile Picture">
            <p><strong><?php echo htmlspecialchars($commentaire['nom']); ?></strong></p>
            <p><?php echo htmlspecialchars($commentaire['message']); ?></p>
            <p>Note: <?php echo htmlspecialchars($commentaire['note']); ?> étoiles</p>
            <p><?php echo htmlspecialchars($commentaire['created_at']); ?></p>
        </div>
    <?php endforeach; ?>

</body>
</html>
