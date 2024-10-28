<!-- 6 -------------------------------------------------------------------------------------------------->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $title = isset($_POST['title']) ? trim($_POST['event_title']) : null;
    $date = isset($_POST['date']) ? trim($_POST['event_date']) : null;

    if ($name && $email && $title && $date) {
        // Connexion à la base de données
        $mysqli = new mysqli("localhost", "root", "", "site_papillons");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Préparation de la requête
        $stmt = $mysqli->prepare("INSERT INTO inscriptions (name, email, event_title, event_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $title, $date);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Inscription réussie !<br>";
            echo "Nom : " . htmlspecialchars($name) . "<br>";
            echo "Email : " . htmlspecialchars($email) . "<br>";
            echo "Titre de l'événement : " . htmlspecialchars($event_title) . "<br>";
            echo "Date de l'événement : " . htmlspecialchars($event_date) . "<br>";
        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Fermeture de la connexion
        $stmt->close();
        $mysqli->close();
    } else {
        echo "Erreur : Toutes les valeurs ne sont pas définies.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>