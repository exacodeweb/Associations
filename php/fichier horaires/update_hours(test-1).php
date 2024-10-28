<!--?php
session_start();
include './csrf_token.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ./admin_login(test-1).php");
    exit;
}

include './db_connect.php';

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
-->
<!--<form method="post" action="update_hours.php">-->
<!--<form method="post" action="./php/update_hours(test-1).php">
    <input type="hidden" name="csrf_token" value="   --> <!--?php echo $_SESSION['csrf_token']; ?>">
    <label for="jour">Jour :</label>
    <input type="text" id="jour" name="jour" required>
    <label for="ouverture">Ouverture :</label>
    <input type="time" id="ouverture" name="ouverture">
    <label for="fermeture">Fermeture :</label>
    <input type="time" id="fermeture" name="fermeture">
    <input type="submit" value="Mettre à jour">
</form>-->

<?php
session_start();
include '../admin/db_connect.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

// Si le formulaire est soumis, mettez à jour les horaires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    foreach ($jours as $jour) {
        $ouverture_matin = $_POST[strtolower($jour) . '_ouverture_matin'] ?? '00:00:00';
        $fermeture_matin = $_POST[strtolower($jour) . '_fermeture_matin'] ?? '00:00:00';
        $ouverture_apresmidi = $_POST[strtolower($jour) . '_ouverture_apresmidi'] ?? '00:00:00';
        $fermeture_apresmidi = $_POST[strtolower($jour) . '_fermeture_apresmidi'] ?? '00:00:00';

        $sql = "UPDATE horaires SET 
                    ouverture_matin = '$ouverture_matin', 
                    fermeture_matin = '$fermeture_matin', 
                    ouverture_apresmidi = '$ouverture_apresmidi', 
                    fermeture_apresmidi = '$fermeture_apresmidi' 
                WHERE jour = '$jour'";
        $conn->query($sql);
    }
    header('Location: admin_dashboard.php');
    exit();
}

// Récupérez les horaires actuels
$sql = "SELECT * FROM horaires";
$result = $conn->query($sql);
$horaires = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $horaires[$row['jour']] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Horaires</title>
</head>
<body>
    <h1>Gérer les Horaires</h1>
    <form method="POST">
        <?php foreach ($horaires as $jour => $horaire): ?>
            <h2><?php echo $jour; ?></h2>
            <label>Ouverture Matin: <input type="time" name="<?php echo strtolower($jour); ?>_ouverture_matin" value="<?php echo $horaire['ouverture_matin']; ?>"></label>
            <label>Fermeture Matin: <input type="time" name="<?php echo strtolower($jour); ?>_fermeture_matin" value="<?php echo $horaire['fermeture_matin']; ?>"></label>
            <label>Ouverture Après-midi: <input type="time" name="<?php echo strtolower($jour); ?>_ouverture_apresmidi" value="<?php echo $horaire['ouverture_apresmidi']; ?>"></label>
            <label>Fermeture Après-midi: <input type="time" name="<?php echo strtolower($jour); ?>_fermeture_apresmidi" value="<?php echo $horaire['fermeture_apresmidi']; ?>"></label>
            <br>
        <?php endforeach; ?>
        <button type="submit">Mettre à jour les horaires</button>
    </form>
</body>
</html>
