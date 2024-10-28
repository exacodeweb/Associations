
<!--------------------------------------------------------------------------------------------------------------------->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "root";/*your_username*/
$password = "G1i9e6t3";/*your_password*/
$dbname = "site_papillons";

// Créer une connexion
/*$conn = new mysqli($servername, $username, $password, $dbname);*/
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message envoyé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!-- process-contact-1.php -->
<?php

// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "G1i9e6t3"; // Remplacez par votre mot de passe
$dbname = "site_papillons";

// Créez la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérez les données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Préparez et exécutez la requête SQL
$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Nouveau record créé avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermez la connexion
$conn->close();
?>



