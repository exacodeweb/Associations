<?php
session_start();
include 'csrf_token.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ./admin_login(test-1).php");
    exit;
}

include 'db_connect.php';

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

<!--<form method="post" action="update_hours.php">-->
<form method="post" action="../php/update_hours(test-1).php">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <label for="jour">Jour :</label>
    <input type="text" id="jour" name="jour" required>
    <label for="ouverture">Ouverture :</label>
    <input type="time" id="ouverture" name="ouverture">
    <label for="fermeture">Fermeture :</label>
    <input type="time" id="fermeture" name="fermeture">
    <input type="submit" value="Mettre à jour">
</form>