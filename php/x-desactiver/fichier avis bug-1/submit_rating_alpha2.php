<?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier le token CSRF
    if (!isset($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token");
    }

    // Récupérer et valider les données du formulaire
    $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    $note = filter_var($_POST['note'], FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 5]
    ]);

    if ($nom && $email && $message && $note !== false) {
        // Configuration de la connexion à la base de données
        $host = 'localhost'; // Adresse du serveur MySQL
        $dbname = 'site_papillons'; // Nom de la base de données
        $user = 'root'; // Utilisateur MySQL
        $password = 'G1i9e6t3'; // Mot de passe MySQL
        $charset = 'utf8mb4'; // Jeu de caractères que la connexion doit utiliser

        // Création de la chaîne de connexion DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        try {
            // Création d'une nouvelle instance PDO
            $pdo = new PDO($dsn, $user, $password);

            // Configuration des options PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Préparation de la requête d'insertion
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
    } else {
        echo "Données du formulaire invalides.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>







<!--?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier le token CSRF
    if (!isset($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token");
    }

    // Récupérer et valider les données du formulaire
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 5]
    ]);

    if ($nom && $email && $message && $note !== false) {
        // Configuration de la connexion à la base de données
        $host = 'localhost'; // Adresse du serveur MySQL
        $dbname = 'site_papillons'; // Nom de la base de données
        $user = 'root'; // Utilisateur MySQL
        $password = 'G1i9e6t3'; // Mot de passe MySQL
        $charset = 'utf8mb4'; // Jeu de caractères que la connexion doit utiliser

        // Création de la chaîne de connexion DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        try {
            // Création d'une nouvelle instance PDO
            $pdo = new PDO($dsn, $user, $password);

            // Configuration des options PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Préparation de la requête d'insertion
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
    } else {
        echo "Données du formulaire invalides.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?> -->