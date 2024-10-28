<?php
// Configurations de la base de données
$host = 'localhost';
$dbname = 'site_papillons';/*votre_base_de_donnees*/
$username = 'root';/*votre_nom_utilisateur*/
$password = 'G1i9e6t3';/*votre_mot_de_passe*/

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer et filtrer les données du formulaire
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Vérifier que les champs ne sont pas vides
        if (!empty($name) && !empty($email) && !empty($message)) {
            // Préparer la requête SQL avec des instructions préparées
            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
            // Lier les paramètres
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            // Exécuter la requête
            if ($stmt->execute()) {
                // Rediriger vers une page de confirmation
                header('Location: ../pages/thank_you.html');
                exit();
            } else {
                echo "Une erreur est survenue lors de l'enregistrement de vos données.";
            }
        } else {
            echo "Tous les champs sont requis.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

<!--------------------------------------------------------------------------------------------------------------------->

<?php
session_start();

// Configurations de la base de données
$host = 'localhost';
$dbname = 'site_papillons';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier le token CSRF
        if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Erreur : invalid CSRF token.");
        }

        // Récupérer et filtrer les données du formulaire
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Vérifier que les champs ne sont pas vides
        if (!empty($name) && !empty($email) && !empty($message)) {
            // Préparer la requête SQL avec des instructions préparées
            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
            // Lier les paramètres
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            // Exécuter la requête
            if ($stmt->execute()) {
                // Rediriger vers une page de confirmation
                header('Location: /Mon_projet/pages/thank-you.html');//../pages/thank_you.html/
                exit();
            } else {
                echo "Une erreur est survenue lors de l'enregistrement de vos données.";
            }
        } else {
            echo "Tous les champs sont requis.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

