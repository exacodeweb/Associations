<!--// submit_avis.php v-2-->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';
        $note = $_POST['note'] ?? 0;

        // Connexion à la base de données
        //$conn = new mysqli('localhost', 'username', 'password', 'database');
        $conn = new mysqli('localhost', 'admin', 'G1i9e6t3', 'site_papillons');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer et exécuter la requête d'insertion
        //$stmt = $conn->prepare("INSERT INTO avis (nom, email, message, note, is_approved) VALUES (?, ?, ?, ?, 0)");
        $sql = "INSERT INTO avis (nom, email, message, note, is_approved) VALUES (:nom, :email, :message, :note, is_approved, 0)";
        $stmt->bind_param("sssi", $nom, $email, $message, $note);

        if ($stmt->execute()) {
            echo "Avis soumis avec succès. Il sera examiné par un administrateur avant d'être affiché.";
        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    } else {
        die('Erreur : invalid CSRF token.');
    }
} else {
    die('Méthode non autorisée.');
}
?>




<!--// submit_avis.php v-1-->
<!--?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $note = $_POST['note'];

        // Connexion à la base de données
        //$conn = new mysqli('localhost', 'username', 'password', 'database');
        $conn = new mysqli('localhost', 'admin', 'G1i9e6t3', 'site_papillons');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer et exécuter la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO avis (nom, email, message, note, is_approved) VALUES (?, ?, ?, ?, 0)");
        $stmt->bind_param("sssi", $nom, $email, $message, $note);

        if ($stmt->execute()) {
            echo "Avis soumis avec succès. Il sera examiné par un administrateur avant d'être affiché.";
        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    } else {
        die('Erreur : invalid CSRF token.');
    }
} else {
    die('Méthode non autorisée.');
}
?> -->

<!--// submit_avis.php v-3-->
<?php
// Démarrer la session
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        die("Erreur : invalid CSRF token.");
    }

    require_once './config_avis.php';

    $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 5)));

    if (!$nom || !$email || !$message || !$note) {
        die("Veuillez remplir tous les champs correctement.");
    }

    //$sql = "INSERT INTO avis (nom, email, message, note) VALUES (?, ?, ?, ?)";
    $sql = "INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $email, $message, $note]);

    if ($stmt) {
        echo "success";
    } else {
        echo "Erreur lors de l'insertion de l'avis.";
    }
} else {
    header("Location: ../pages/avis.html");//../avis.html
}
?>