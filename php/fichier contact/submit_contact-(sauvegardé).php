
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php

session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_contact']) || $_POST['csrf_token_contact'] !== $_SESSION['csrf_token_contact']) {
        die("Erreur : invalid CSRF token.");
    }

    // Configurer la connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';
    $username = 'root';
    $password = 'G1i9e6t3';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
            $stmt->bindParam(':name', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            if ($stmt->execute()) {
                header('Location: ../pages/thank_you_contact.html');
                exit();
            } else {
                echo "Une erreur est survenue lors de l'enregistrement de vos données.";
            }
        } else {
            echo "Tous les champs sont requis.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    die("Méthode de requête non supportée.");
}


print_r($_POST);
print_r($_SESSION);

?>