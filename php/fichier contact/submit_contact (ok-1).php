


<!--------------------------------------------------------------------------------------------------------------------->

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification du token CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : invalid CSRF token.");
    }

    // Validation et assainissement des données du formulaire
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if (!$name || !$email || !$message) {
        die("Erreur : données de formulaire invalides.");
    }

    // Connexion à la base de données
    $dsn = 'mysql:host=localhost;dbname=site_papillons';/*entomologie_db*/
    $username = 'root'; // Remplacez par vos identifiants de connexion à la base de données
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        // Préparation de la requête d'insertion avec des requêtes préparées pour prévenir les injections SQL
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        // Redirection après l'insertion réussie
        header("Location: thank_you_contact.html");/*thank_you.html*/
        exit;

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    die("Erreur : méthode de requête non valide.");
}
?>