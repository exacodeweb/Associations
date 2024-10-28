<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jour = $_POST['jour'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];

    $sql = "UPDATE horaires SET ouverture='$ouverture', fermeture='$fermeture' WHERE jour='$jour'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Horaires mis à jour avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<form method="post" action="update_hours.php">
    <label for="jour">Jour :</label>
    <input type="text" id="jour" name="jour" required>
    <label for="ouverture">Ouverture :</label>
    <input type="time" id="ouverture" name="ouverture" required>
    <label for="fermeture">Fermeture :</label>
    <input type="time" id="fermeture" name="fermeture" required>
    <input type="submit" value="Mettre à jour">
</form>