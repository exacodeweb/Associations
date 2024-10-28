<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (empty($_SESSION['csrf_token_moderation'])) {
    $_SESSION['csrf_token_moderation'] = bin2hex(random_bytes(32));
}

$config = include('../config/config_avis_beta.php');
if (!$config) {
    die("Erreur de chargement du fichier de configuration.");
}

$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (hash_equals($_SESSION['csrf_token_moderation'], $_POST['csrf_token_moderation'])) {//csrf_token_avis_beta
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $note = intval($_POST['note']);

        $stmt = $conn->prepare("INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES (?, ?, ?, ?, 0)");
        if (!$stmt) {
            die("Erreur de préparation : " . $conn->error);
        }

        $stmt->bind_param("sssi", $nom, $email, $message, $note);
        if (!$stmt->execute()) {
            die("Erreur d'exécution : " . $stmt->error);
        }

        $_SESSION['message'] = "Commentaire ajouté avec succès. Il sera visible après approbation.";
        //header("Location: ../pages/thank_you_avis.php");
        exit();
    } else {
        echo "Invalid CSRF token.";
    }
} else {
    echo "Mauvaise méthode de requête.";
}
?>















<!--?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    die("Erreur : La session n'a pas pu être démarrée.<br>");
}

// Générer un token CSRF si ce n'est pas déjà fait
if (empty($_SESSION['csrf_token_avis_beta'])) {
    $_SESSION['csrf_token_avis_beta'] = bin2hex(random_bytes(32));
}

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis_beta']) || $_POST['csrf_token_avis_beta'] !== $_SESSION['csrf_token_avis_beta']) {
        die("Erreur : token CSRF invalide.");
    }

    // Configurer la connexion à la base de données
    $config = include(__DIR__ . '/../config/config_avis.php');
    if (!$config) {
        die("Erreur de chargement du fichier de configuration.");
    }

    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];
    $charset = $config['db']['charset'];

    try {
        // Création de la chaîne de connexion DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        // Création d'une nouvelle instance PDO
        $pdo = new PDO($dsn, $username, $password);
        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

        // Vérifier que les données sont valides
        if ($nom && $email && $message && $note !== false) {
            // Préparation de la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES (:nom, :email, :message, :note, 0)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            // Exécution de la requête
            if ($stmt->execute()) {
                $_SESSION['message'] = "Commentaire ajouté avec succès. Il sera visible après approbation.";
                header('Location: ../pages/thank_you_avis.html');
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

-->




<!--?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Générer un token CSRF si ce n'est pas déjà fait
if (empty($_SESSION['csrf_token_avis_beta'])) {
    $_SESSION['csrf_token_avis_beta'] = bin2hex(random_bytes(32));
}

// Inclure le fichier de configuration
$config = include('../config/config_avis.php'); // Assurez-vous que le chemin est correct
if (!$config) {
    die("Erreur de chargement du fichier de configuration.");
}

// Vérifier si le fichier de configuration a correctement chargé les informations de connexion
if (!isset($config) || !is_array($config)) {
    die("Erreur de configuration : le fichier config.php n'est pas correctement configuré.");
}

// Créer une connexion à la base de données
$conn = new mysqli(
    $config['db']['host'],
    $config['db']['user'],
    $config['db']['pass'],
    $config['db']['dbname']
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $note = intval($_POST['note']);

        $stmt = $conn->prepare("INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES (?, ?, ?, ?, 0)");
        if (!$stmt) {
            die("Erreur de préparation : " . $conn->error);
        }

        $stmt->bind_param("sssi", $nom, $email, $message, $note);
        if (!$stmt->execute()) {
            die("Erreur d'exécution : " . $stmt->error);
        }

        $_SESSION['message'] = "Commentaire ajouté avec succès. Il sera visible après approbation.";
        header("Location: ../pages/thank_you_avis.php");
        exit();
    } else {
        echo "Invalid CSRF token.";
    }
} else {
    echo "Mauvaise méthode de requête.";
}
?>








<!-?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Générer un token CSRF si ce n'est pas déjà fait
if (empty($_SESSION['csrf_token_avis_beta'])) {
    $_SESSION['csrf_token_avis_beta'] = bin2hex(random_bytes(32));
}

// Inclure le fichier de configuration
$config = include('../config/config_avis.php'); // Assurez-vous que le chemin est correct

// Vérifier si le fichier de configuration a correctement chargé les informations de connexion
if (!isset($config) || !is_array($config)) {
    die("Erreur de configuration : le fichier config.php n'est pas correctement configuré.");
}

// Créer une connexion à la base de données
$conn = new mysqli(
    $config['db']['host'],
    $config['db']['user'],
    $config['db']['pass'],
    $config['db']['dbname']
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $note = intval($_POST['note']);

        $stmt = $conn->prepare("INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES (?, ?, ?, ?, 0)");
        $stmt = $conn->prepare("INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES (nom, email, message, note, is_approved, 0)");
        $stmt->bind_param("sssi", $nom, $email, $message, $note);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Commentaire ajouté avec succès. Il sera visible après approbation.";
            //header("Location: ../pages/thank_you_avis.html");
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid CSRF token.";
    }
}
?>











<!-?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        //die("Erreur : token CSRF invalide.");
    }

    // Configurer la connexion à la base de données
    //$config = include('../config/config_contact.php');
    $config = include(__DIR__ . '/../config/config_avis.php');
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];
    $charset = $config['db']['charset'];

    try {
        // Création de la chaîne de connexion DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        // Création d'une nouvelle instance PDO
        $pdo = new PDO($dsn, $username, $password);
        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $message = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Vérifier que les données sont valides
        if ($nom && $email && $message) {
            // Préparation de la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO avisusers (name, email, message) VALUES (:name, :email, :message, :note)");
            $stmt->bindParam(':name', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            // Exécution de la requête
            if ($stmt->execute()) {
                $_SESSION['message'] = "Commentaire ajouté avec succès. Il sera visible après approbation.";
                //header('Location: ../pages/thank_you_contact.html');
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
-->


<!-- fichier php/ajouter_commentaire_beta.php -->
<!--?php
session_start();
if (empty($_SESSION['csrf_token_avis_beta'])) {
    $_SESSION['csrf_token_avis_beta'] = bin2hex(random_bytes(32));
}

// Inclure le fichier de configuration
require_once '../config/config_avis.php'; // Assurez-vous que le chemin est correct

// Vérifier si le fichier de configuration a correctement chargé les informations de connexion
if (!isset($config) || !is_array($config)) {
    die("Erreur de configuration : le fichier config.php n'est pas correctement configuré.");
}

$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!-?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        include('../config/config_avis.php');
        
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $note = intval($_POST['note']);

        $conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES (?, ?, ?, ?, 0)");
        $stmt->bind_param("sssi", $nom, $email, $message, $note);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Commentaire ajouté avec succès. Il sera visible après approbation.";
            header("Location: ../pages/thank_you_avis.php");
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid CSRF token.";
    }
}
?> -->






<!--?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        include('../config/config.php');
        
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $note = intval($_POST['note']);

        $conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO avisusers (nom, email, message, note) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nom, $email, $message, $note);

        if ($stmt->execute()) {
            header("Location: ../pages/thank_you_avis.html");
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid CSRF token.";
    }
}
?> -->


<!--?php
session_start();
require_once '../config/config_avis.php';/*../config/config.php*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        $config = include('../config/config_avis.php');//../config/config.php

        $servername = $config['db']['host'];
        $username = $config['db']['user'];
        $password = $config['db']['pass'];
        $dbname = $config['db']['dbname'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Sécuriser et insérer les données du formulaire
        $nom = $conn->real_escape_string($_POST['nom']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);
        $note = $conn->real_escape_string($_POST['note']);

        $sql = "INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES ('$nom', '$email', '$message', '$note', 0)";

        if ($conn->query($sql) === TRUE) {
            echo "Commentaire ajouté avec succès. Il sera visible après approbation.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Token CSRF invalide.";
    }
}
?> -->






<!--?php
// Connexion à la base de données (à adapter selon vos paramètres)
$servername = "localhost";
$username = "root";/*username*/
$password = "G1i9e6t3";/*password*/
$dbname = "site_papillons";/*votre_base_de_donnees*/

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sécuriser et insérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $conn->real_escape_string($_POST['nom']);
    $commentaire = $conn->real_escape_string($_POST['commentaire']);
    
    $sql = "INSERT INTO comments (commenter_name, comment_text, is_approved) VALUES ('$nom', '$commentaire', 0)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Commentaire ajouté avec succès. Il sera visible après approbation.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?> -->
