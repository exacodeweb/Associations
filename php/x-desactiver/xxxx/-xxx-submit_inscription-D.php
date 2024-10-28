<!-- 4 ----------------------------------------------------------------------------------------------------->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $eventTitle = $_POST['event_title'];
    $eventDate = $_POST['event_date'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "G1i9e6t3";  // Utilisez votre mot de passe MySQL ici
    $dbname = "site_papillons";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insérer les données dans la table
    $sql = "INSERT INTO inscriptions (event_title, event_date, name, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $eventTitle, $eventDate, $name, $email);

    if ($stmt->execute()) {
        echo "Inscription réussie !<br>";
        echo "Nom : " . htmlspecialchars($name) . "<br>";
        echo "Email : " . htmlspecialchars($email) . "<br>";
        echo "Titre de l'événement : " . htmlspecialchars($eventTitle) . "<br>";
        echo "Date de l'événement : " . htmlspecialchars($eventDate) . "<br>";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>