<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start();
session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : invalid CSRF token.");
    }

    echo 'Chemin absolu du fichier config_avis.php : ' . realpath('../config/config_avis.php') . '<br>';

    require_once '../config/config_avis.php';

    $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

    echo "Nom: $nom, Email: $email, Message: $message, Note: $note<br>";

    if (!empty($nom) && !empty($email) && !empty($message)) {
        if (isset($pdo)) {
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            echo "Préparation de la requête d'insertion.<br>";
            $result = $stmt->execute();
            echo "Requête d'insertion exécutée.<br>";

            if ($result) {
                echo 'Insertion réussie<br>';
                header('Location: ../pages/thank_you_avis.html');
                exit();
            } else {
                echo "Une erreur est survenue lors de l'enregistrement de vos données.<br>";
                var_dump($stmt->errorInfo());
            }
        } else {
            echo "Erreur : Connexion à la base de données non établie.<br>";
        }
    } else {
        echo "Tous les champs sont requis.<br>";
    }
} else {
    die("Méthode de requête non supportée.<br>");
}

ob_end_flush();
?>










<!--?php
// submit_avis.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : invalid CSRF token.");
    }

    echo 'Chemin absolu du fichier config_avis.php : ' . realpath('../config/config_avis.php') . '<br>';

    require_once '../config/config_avis.php';

    $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

    echo "Nom: $nom, Email: $email, Message: $message, Note: $note<br>";

    if (!empty($nom) && !empty($email) && !empty($message)) {
        if (isset($pdo)) {
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            echo "Préparation de la requête d'insertion.<br>";
            $result = $stmt->execute();
            echo "Requête d'insertion exécutée.<br>";

            if ($result) {
                echo 'Insertion réussie<br>';
                header('Location: ../pages/thank_you_avis.html');
                exit();
            } else {
                echo "Une erreur est survenue lors de l'enregistrement de vos données.<br>";
                var_dump($stmt->errorInfo());
            }
        } else {
            echo "Erreur : Connexion à la base de données non établie.<br>";
        }
    } else {
        echo "Tous les champs sont requis.<br>";
    }
} else {
    die("Méthode de requête non supportée.<br>");
}
?>  -->





<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Démarrage de la session

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
    exit(); // Arrêter l'exécution si la session n'est pas démarrée
}

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : invalid CSRF token.");
    }

    // Ajouter cette ligne pour vérifier le chemin absolu du fichier de configuration
    echo 'Chemin absolu du fichier config_avis.php : ' . realpath('../config/config_avis.php') . '<br>';

    // Inclusion du fichier de configuration de la base de données
    require_once '../config/config_avis.php';

    // Récupérer et filtrer les données du formulaire
    $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

    // Afficher les valeurs des variables pour débogage
    echo "Nom: $nom, Email: $email, Message: $message, Note: $note<br>";

    // Insérer les données dans la base de données
    if (!empty($nom) && !empty($email) && !empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':note', $note);

        // Ajout de messages de débogage avant et après l'exécution de la requête
        echo "Préparation de la requête d'insertion.<br>";
        $result = $stmt->execute();
        echo "Requête d'insertion exécutée.<br>";

        if ($stmt->execute()) {

          echo 'Insertion réussie<br>';//

            header('Location: ../pages/thank_you_avis.html');
            exit();
        } else {
            echo "Une erreur est survenue lors de l'enregistrement de vos données.";
            var_dump($stmt->errorInfo()); // Afficher les informations d'erreur SQL
        }
    } else {
        echo "Tous les champs sont requis.";
    }
} else {
    die("Méthode de requête non supportée.");
}
?> -->




<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : invalid CSRF token.");
    }

    echo 'Chemin absolu du fichier config_avis.php : ' . realpath('../config/config_avis.php') . '<br>';

    require_once '../config/config_avis.php';

    $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

    echo "Nom: $nom, Email: $email, Message: $message, Note: $note<br>";

    if (!empty($nom) && !empty($email) && !empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':note', $note);

        echo "Préparation de la requête d'insertion.<br>";
        $result = $stmt->execute();
        echo "Requête d'insertion exécutée.<br>";

        if ($result) {
            echo 'Insertion réussie<br>';
            header('Location: ../pages/thank_you_avis.html');
            exit();
        } else {
            echo "Une erreur est survenue lors de l'enregistrement de vos données.<br>";
            var_dump($stmt->errorInfo());
        }
    } else {
        echo "Tous les champs sont requis.<br>";
    }
} else {
    die("Méthode de requête non supportée.<br>");
}
?> -->