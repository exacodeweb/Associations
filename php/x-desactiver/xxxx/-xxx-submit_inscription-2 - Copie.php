

<!------------------------------------------------------------------------------------------------------->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    //$eventTitle = $_POST['event_title'];
    //$eventDate = $_POST['event_date'];

    $eventTitle = $_POST['title'];
    $eventDate = $_POST['date'];

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
        die("Échec de la connexion" . $conn->connect_error);//Connection failed: 
    }

    // Insérer les données dans la table
    //$sql = "INSERT INTO inscriptions (event_title, event_date, name, email) VALUES (?, ?, ?, ?)";
    $sql = "INSERT INTO inscriptions (title, date, name, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    //$stmt->bind_param("ssss", $eventTitle, $eventDate, $name, $email);
    $stmt->bind_param("ssss", $Title, $Date, $name, $email);

    if ($stmt->execute()) {
        echo "Inscription réussie !<br>";
        echo "Nom : " . htmlspecialchars($name) . "<br>";
        echo "Email : " . htmlspecialchars($email) . "<br>";
        //echo "Titre de l'événement : " . htmlspecialchars($eventTitle) . "<br>";
        echo "Titre de l'événement : " . htmlspecialchars($eventTitle) . "<br>";
        //echo "Date de l'événement : " . htmlspecialchars($eventDate) . "<br>";
        echo "Date de l'événement : " . htmlspecialchars($eventDate) . "<br>";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!------------------------------------------------------------------>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $title = isset($_POST['title']) ? trim($_POST['title']) : null;
    $date = isset($_POST['date']) ? trim($_POST['date']) : null;

    if ($name && $email && $title && $date) {
        // Connexion à la base de données
        $mysqli = new mysqli("localhost", "root", "", "site_papillons");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Préparation de la requête
        $stmt = $mysqli->prepare("INSERT INTO inscriptions (name, email, title, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $title, $date);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Inscription réussie !<br>";
            echo "Nom : " . htmlspecialchars($name) . "<br>";
            echo "Email : " . htmlspecialchars($email) . "<br>";
            echo "Titre de l'événement : " . htmlspecialchars($title) . "<br>";
            echo "Date de l'événement : " . htmlspecialchars($date) . "<br>";
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
<!------------------------------------------------------------------>

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