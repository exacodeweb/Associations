<!--?php
session_start();
require_once '../config/config_avis.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token_avis_beta']) || !hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        die("Token CSRF invalide.");
    }

    $config = include('../config/config_avis.php');

    $servername = $config['db']['host'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];
    $dbname = $config['db']['dbname'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Protection contre les injections SQL
    $nom = $conn->real_escape_string($_POST['nom']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);
    $note = (int) $_POST['note'];

    // Insertion du commentaire dans la base de données
    $sql = "INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES ('$nom', '$email', '$message', '$note', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "Commentaire ajouté avec succès. Il sera visible après approbation.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}
?>  -->



<?php 
session_start();
require_once '../config/config_avis_beta.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token_moderation']) || !hash_equals($_SESSION['csrf_token_moderation'], $_POST['csrf_token'])) {//csrf_token_avis_beta
        die("Token CSRF invalide.");
    }

    $config = include('../config/config_avis_beta.php');

    $servername = $config['db']['host'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];
    $dbname = $config['db']['dbname'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Protection contre les injections SQL
    $nom = $conn->real_escape_string($_POST['nom']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);
    $note = (int) $_POST['note'];
    $created_at = date('Y-m-d H:i:s');

    // Insertion du commentaire dans la base de données
    $sql = "INSERT INTO avisusers (nom, email, message, note, created_at, is_approved) VALUES ('$nom', '$email', '$message', '$note', '$created_at', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "Commentaire ajouté avec succès. Il sera visible après approbation.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}
?>

<!--
CREATE TABLE avisusers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    note INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    is_approved TINYINT(1) DEFAULT 0
);
-->

<!-------------------------------------------------------------------------------------------------------- Vession-1 -->
<!--?php
session_start();
require_once '../config/config_avis.php';//../config/config.php

    $config = include('../config/config_avis.php');//../config/config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        //$config = include('../config/config_avis.php');//../config/config.php

    if (!isset($_POST['csrf_token_avis_beta']) || !hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
      die("Token CSRF invalide.");
        

        $servername = $config['db']['host'];
        $username = $config['db']['user'];
        $password = $config['db']['pass'];
        $dbname = $config['db']['dbname'];

        // Connexion à la base de données
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Protection contre les injections SQL
        $nom = $conn->real_escape_string($_POST['nom']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);
        $note = (int) $_POST['note'];

        // Insertion du commentaire dans la base de données
        $sql = "INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES ('$nom', '$email', '$message', '$note', 0)";

        if ($conn->query($sql) === TRUE) {
            echo "Commentaire ajouté avec succès. Il sera visible après approbation.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        // Fermeture de la connexion
        $conn->close();
    } else {
        echo "Token CSRF invalide.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>  -->

<!-------------------------------------------------------------------------------------------------------- Version-2 -->

<!--?php
session_start();
require_once '../config/config.php';

$config = include('../config/config.php');

$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        die("Token CSRF invalide.");
    }

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insertion du commentaire dans la base de données
    $sql = "INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES ('$nom', '$email', '$message', '$note', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "Votre avis a été soumis avec succès. Il sera visible après approbation.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>  --> 
<!-------------------------------------------------------------------------------------------------------- Version-3 -->

<!--?php
session_start();
require_once '../config/config_avis.php';

$config = include('../config/config_avis.php');

$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!hash_equals($_SESSION['csrf_token_avis'], $_POST['csrf_token_avis'])) {
        die("Token CSRF invalide.");
    }

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insertion du commentaire dans la base de données
    $sql = "INSERT INTO avisusers (nom, email, message, note, is_approved) VALUES ('$nom', '$email', '$message', '$note', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "Votre avis a été soumis avec succès. Il sera visible après approbation.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?> -->


