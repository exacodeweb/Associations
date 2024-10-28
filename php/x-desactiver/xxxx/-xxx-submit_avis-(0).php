





<?php

//<?php
//if (session_status() == PHP_SESSION_NONE) {
    //session_start();
//}
//echo "Token CSRF en session: " . $_SESSION['csrf_token'] . "<br>";
//echo "Données POST reçues: ";
//print_r($_POST);
//echo "<br>";


//if (session_status() == PHP_SESSION_NONE) {
  //session_start();
//}

//echo "Token CSRF en session: " . $_SESSION['csrf_token'] . "<br>";
//echo "Token CSRF reçu: " . $_POST['csrf_token'] . "<br>";



/////////////////////////////////////////////////////////////////////////////////////////////

//session_start();

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : invalid CSRF token.");
    }

    // Configurer la connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons'; // votre_base_de_donnees
    $username = 'root'; // votre_nom_utilisateur
    $password = 'G1i9e6t3'; // votre_mot_de_passe

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message) VALUES (:nom, :email, :message)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            if ($stmt->execute()) {
                // Rediriger vers une page de remerciement
                header('Location: ../pages/thank_you.html');
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
?>

<!-------------------------------------------------------------------------------------------------->

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

echo "Token CSRF en session: " . $_SESSION['csrf_token'] . "<br>";
echo "Token CSRF reçu: " . $_POST['csrf_token'] . "<br>";

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
    $dsn = 'mysql:host=localhost;dbname=entomologie_db';
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
        header("Location: ../pages/thank_you.html");
        exit;

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    die("Erreur : méthode de requête non valide.");
}
?>

<!----------------------------------------------------------------------------------------------------------------->$_COOKIE

<?php
session_start();

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : invalid CSRF token.");
    }

    // Configurer la connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';/*votre_base_de_donnees*/
    $username = 'root';/*votre_nom_utilisateur*/
    $password = '';/*votre_mot_de_passe*/

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message) VALUES (:nom, :email, :message)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            if ($stmt->execute()) {
                header('Location: ../pages/thank_you.html');
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
?>

