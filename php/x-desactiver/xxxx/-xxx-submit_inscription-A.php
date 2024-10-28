<!-- 1 ------------------------------------------------------------------------------------------------->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];

    // Informations de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "G1i9e6t3"; // Remplacez par le mot de passe si votre utilisateur root en a un
    $dbname = "site_papillons";

    // Crée la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifie la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prépare et lie
    //$stmt = $conn->prepare("INSERT INTO submit_inscriptions (name, email, event_title, event_date) VALUES (?, ?, ?, ?)");
    // $stmt = $conn->prepare("INSERT INTO inscriptions (name, event_title, event_date, email) VALUES (?, ?, ?, ?)");
    $stmt = $conn->prepare("INSERT INTO inscriptions (name, email, title, date) VALUES (?, ?, ?, ?)");


    $stmt->bind_param("ssss", $name, $email, $event_title, $event_date);
    // $stmt->bind_param("ssss", $event_title, $event_date, $name, $email);

    // Exécute la requête
    if ($stmt->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Ferme la connexion
    $stmt->close();
    $conn->close();
}
?>