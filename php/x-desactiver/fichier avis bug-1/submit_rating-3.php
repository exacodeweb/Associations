<?php
// Inclure le fichier de configuration
//$config = include(__DIR__ . '/../config/config.php');
$config = include('../config/config.php');

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

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

        // Préparation de la requête d'insertion  UserRatings
        $sql = "INSERT INTO UserRatings (nom, email, message, note) VALUES (:nom, :email, :message, :note)";
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de remerciement
            header('Location: ../pages/thank_you_avis.html');
            exit();
        } else {
            echo "Erreur lors de l'insertion des données.";
        }
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher un message
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>