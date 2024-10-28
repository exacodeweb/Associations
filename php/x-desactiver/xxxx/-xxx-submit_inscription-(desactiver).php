
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
    $stmt = $conn->prepare("INSERT INTO inscriptions (name, email, event_title, event_date) VALUES (?, ?, ?, ?)");
    // $stmt = $conn->prepare("INSERT INTO inscriptions (name, event_title, event_date, email) VALUES (?, ?, ?, ?)");
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
<!--------------------------------------------------------------------------------------------------------------------->

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
<!------------------------------------------------------------------------------------------------>
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

<!------------------------------------------------------------------------------------------------------->

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
