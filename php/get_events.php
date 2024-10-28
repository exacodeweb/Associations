<?php
$servername = "localhost"; // Adresse du serveur MySQL
$username = "username"; // Nom d'utilisateur pour la connexion
$password = "password"; // Mot de passe pour la connexion
$dbname = "database"; // Nom de la base de données

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier si la connexion a échoué
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour sélectionner les événements
$sql = "SELECT title, event_date FROM events";
$result = $conn->query($sql);

$events = array(); // Tableau pour stocker les événements
if ($result->num_rows > 0) {
    // Récupérer les lignes de résultat et les ajouter au tableau
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}
$conn->close(); // Fermer la connexion

// Définir le type de contenu de la réponse HTTP à JSON
header('Content-Type: application/json');
echo json_encode($events); // Envoyer les événements au format JSON
?>