<!-- 1 ------------------------------------------------------------------------------------------------->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event_title = $_POST['title'];/*'event_title'*/
    $event_date = $_POST['date'];/*'event_date'*/

    // Formatage de la date au format YYYY-MM-DD    /*ajouter le 28/05/2024*
    $formatted_date = date('y-m-d', strtotime($event_date));/*$date*//*Y-m-d'*/

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
    $stmt = $conn->prepare("INSERT INTO inscriptions (name, email, title, date) VALUES (?, ?, ?, ?)");
    // $stmt = $conn->prepare("INSERT INTO inscriptions (name, event_title, event_date, email) VALUES (?, ?, ?, ?)");
    // $stmt->bind_param("ssss", $name, $email, $event_title, $event_date);
    // $stmt->bind_param("ssss", $event_title, $event_date, $name, $email);
    $stmt->bind_param("ssss", $name, $email, $event_title, $formatted_date);

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
<!-- 2 ------------------------------------------------------------------------------------------------------------------->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {/*ajouter le 28/05/2024*/
  $name = $_POST['name'];
  $email = $_POST['email'];
  $event_title = $_POST['title'];/*'event_title'*/
  $event_date = $_POST['date'];/*'event_date'*/

// Formatage de la date au format YYYY-MM-DD    /*ajouter le 28/05/2024*/
$formatted_date = date('y-m-d', strtotime($event_date));/*$date*//*Y-m-d'*/

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
/*if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['event_title']) && isset($_POST['event_date'])) {*/
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

}
?>
<!-- 3 ---------------------------------------------------------------------------------------------->
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

<!-- 5 ---------------------------------------------------------------->

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

<!------------------------------------------------------------------------------------------------------->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['event_title']; // Modification du nom de la variable
    $date = $_POST['event_date']; // Modification du nom de la variable

        // Formatage de la date au format YYYY-MM-DD
        $formatted_date = date('Y-m-d', strtotime($date));

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
    $stmt = $conn->prepare("INSERT INTO inscriptions (name, email, title, date) VALUES (?, ?, ?, ?)"); // Modification de la requête
    $stmt->bind_param("ssss", $name, $email, $title, $date);

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
