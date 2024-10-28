<?php
session_start();
include '../admin/csrf_token_hours.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/admin_login(test-1).php");
    exit;
}

include '../admin/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Erreur CSRF");
    }

    $jour = $_POST['jour'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];

    if ($ouverture == 'Fermé' || $fermeture == 'Fermé') {
        $ouverture = '00:00:00';
        $fermeture = '00:00:00';
    }

    $sql = "UPDATE horaires SET ouverture='$ouverture', fermeture='$fermeture' WHERE jour='$jour'";

    if ($conn->query($sql) === TRUE) {
        echo "Horaires mis à jour avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!--<form method="post" action="update_hours.php"> 
<form method="post" action="./update_hours(test-1).php">--> 
<form method="post" action="../admin/update_horaires(test-1).php">
    <input type="hidden" name="csrf_token" value="    <?php echo $_SESSION['csrf_token']; ?>">
    <label for="jour">Jour :</label>
    <input type="text" id="jour" name="jour" required>
    <label for="ouverture">Ouverture :</label>
    <input type="time" id="ouverture" name="ouverture">
    <label for="fermeture">Fermeture :</label>
    <input type="time" id="fermeture" name="fermeture">
    <input type="submit" value="Mettre à jour">
</form>  

<!--------------------------------------------------------------------------------------------------------------------->

<?php
include('csrf_token.php'); // Vérifiez que le chemin est correct

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : invalid CSRF token.");
    }

    // Récupérer les données du formulaire
    $jour = filter_input(INPUT_POST, 'jour', FILTER_SANITIZE_STRING);
    $ouverture = filter_input(INPUT_POST, 'ouverture', FILTER_SANITIZE_STRING);
    $fermeture = filter_input(INPUT_POST, 'fermeture', FILTER_SANITIZE_STRING);

    // Inclure le fichier de configuration
    $config = include('C:\\xampp\\config\\config.php'); // ou 'C:\\xampp\\config\\config.php' pour Windows
    ///opt/lampp/config/config.php
    // Récupérer les paramètres de connexion
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (!empty($jour) && !empty($ouverture) && !empty($fermeture)) {
            $stmt = $pdo->prepare("UPDATE hours SET ouverture = :ouverture, fermeture = :fermeture WHERE jour = :jour");
            $stmt->bindParam(':jour', $jour);
            $stmt->bindParam(':ouverture', $ouverture);
            $stmt->bindParam(':fermeture', $fermeture);

            if ($stmt->execute()) {
                echo "Horaires mis à jour avec succès";
            } else {
                echo "Une erreur est survenue lors de la mise à jour des horaires.";
            }
        } else {
            echo "Tous les champs sont requis.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    die("Méthode de requête non supportée.");
}
?>

