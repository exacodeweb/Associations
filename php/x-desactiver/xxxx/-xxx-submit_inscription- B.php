<!-- 2 ------------------------------------------------------------------------------------------------------------------->
<?php
$servername = "localhost";
$username = "root";
$password = "G1i9e6t3";
$dbname = "site_papillons";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si les données POST existent
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['event_title']) && isset($_POST['event_date'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];

    // Afficher les valeurs pour le débogage
    echo "Nom : $name <br>";
    echo "Email : $email <br>";
    echo "Titre de l'événement : $event_title <br>";
    echo "Date de l'événement : $event_date <br>";

    // Préparer la requête SQL
    $stmt = $conn->prepare("INSERT INTO inscriptions (name, email, event_title, event_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $event_title, $event_date);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Fermer la déclaration et la connexion
    $stmt->close();
} else {
    echo "Veuillez remplir tous les champs.";
}

$conn->close();
?>