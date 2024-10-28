<?php
include 'db_connect.php';

$sql = "SELECT Jour, Ouverture_Matin, Fermeture_Matin, Ouverture_Apres_Midi, Fermeture_Soir FROM horaires";
$result = $conn->query($sql);

$horaires = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $horaires[] = $row;
    }
}

$conn->close();
?>
<!-- get_horaires.php : Fichier pour la récupération des horaires depuis la base de données. -->