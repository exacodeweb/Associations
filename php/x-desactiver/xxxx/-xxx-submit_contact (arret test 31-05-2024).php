<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation des données
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Connexion à la base de données
        $servername = "localhost"; // ou votre serveur MySQL
        $username = "root"; // votre nom d'utilisateur MySQL
        $password = "G1i9e6t3"; // votre mot de passe MySQL
        $dbname = "site_papillons"; // nom de votre base de données

        // Créer une connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

        // Préparer et lier
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger vers une page de succès
            header("Location: thank-you.html");
            exit;
        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>

<!--------------------------------------------------------------------------------------------------------------------->

<!-- FORMULAIRE SECURISE
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification du token CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token");
    }

    // Récupérer les données du formulaire et les nettoyer
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation des données
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Connexion à la base de données
        $servername = "localhost";
        $username = "votre_nom_utilisateur";
        $password = "votre_mot_de_passe";
        $dbname = "sit_papillons";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

        // Utiliser des requêtes préparées pour éviter les injections SQL
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);

            // Exécuter la requête
            if ($stmt->execute()) {
                // Rediriger vers une page de succès
                header("Location: thank-you.html");
                exit;
            } else {
                // En cas d'échec de l'exécution
                echo "Erreur : " . $stmt->error;
            }

            // Fermer la déclaration
            $stmt->close();
        } else {
            // En cas d'échec de la préparation de la déclaration
            echo "Erreur de préparation de la requête.";
        }

        // Fermer la connexion
        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>
----------------------------------------------------------------------------------------------------------------------->

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification du token CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token");
    }

    // Récupérer les données du formulaire et les nettoyer
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation des données
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";/*votre_nom_utilisateur*/
        $password = "G1i9e6t3";/*votre_mot_de_passe*/
        $dbname = "site_papillons";/**/

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

        // Utiliser des requêtes préparées pour éviter les injections SQL
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);

            // Exécuter la requête
            if ($stmt->execute()) {
                // Rediriger vers une page de succès
                header("Location: thank-you.html");
                exit;
            } else {
                // En cas d'échec de l'exécution
                echo "Erreur : " . $stmt->error;
            }

            // Fermer la déclaration
            $stmt->close();
        } else {
            // En cas d'échec de la préparation de la déclaration
            echo "Erreur de préparation de la requête.";
        }

        // Fermer la connexion
        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>
