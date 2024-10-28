
<!--------------------------------------------------------------------------------------------------------------------->
<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "G1i9e6t3";
$dbname = "site_papillons";// db_ailes_enchantee

// TEST 21/06/2024
    // Inclure le fichier de configuration
    //$config = include('/path/to/secure/config.php');
    // Inclure le fichier de configuration
    //$config = include('C:\xampp\config\config.php');
    // Récupérer les paramètres de connexion
    //$host = $config['db']['host'];
    //$dbname = $config['db']['dbname'];
    //$username = $config['db']['user'];
    //$password = $config['db']['pass'];

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$event_title = $_POST['event_title'];
$event_date = $_POST['event_date'];

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO inscriptions (name, email, event_title, event_date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $event_title, $event_date);

// Exécuter la requête
if ($stmt->execute()) {
    // Redirection vers une page de remerciement après une inscription réussie
    header('Location: ../pages/thank_you_inscription.html');
    exit();
} else {
    echo "Erreur: " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>
