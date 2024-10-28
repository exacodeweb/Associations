<?php
include './db_connect.php';

$sql = "INSERT INTO horaires (jour, ouverture_matin, fermeture_matin, ouverture_apresmidi, fermeture_apresmidi) VALUES
('Lundi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
('Mardi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
('Mercredi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
('Jeudi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
('Vendredi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
('Samedi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
('Dimanche', '08:00:00', '12:00:00', '14:00:00', '18:00:00')";

if ($conn->query($sql) === TRUE) {
    echo "Horaires insérés avec succès";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!--
1.	Ouvrez votre navigateur et accédez à http://localhost/EcfGarageParrot-V.03.github.io/horaires/initialize_horaires.php.
2.	Vous devriez voir un message indiquant que les horaires ont été insérés avec succès.
-->


<!--?php
include 'db_connect.php';

$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
$ouverture_defaut = '09:00:00';
$fermeture_defaut = '17:00:00';

foreach ($jours as $jour) {
    $sql = "INSERT INTO horaires (jour, ouverture, fermeture) VALUES ('$jour', '$ouverture_defaut', '$fermeture_defaut')";
    if ($conn->query($sql) === TRUE) {
        echo "Horaires pour $jour insérés avec succès<br>";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

$conn->close();
?> -->

<!------------------------------------------------------>
<!-- Fichier pour inserer les horaires dans la tables -->
<!------------------------------------------------------>
<!-- pour cela il faut faire: http://localhost/EcfGarageParrot-V.03.github.io/initialize_horaires.php-->

<!--?php
include 'db_connect.php';

$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
$ouverture_defaut = '09:00:00';
$fermeture_defaut = '17:00:00';

foreach ($jours as $jour) {
    $sql = "INSERT INTO horaires (jour, ouverture, fermeture) VALUES ('$jour', '$ouverture_defaut', '$fermeture_defaut')";
    if ($conn->query($sql) === TRUE) {
        echo "Horaires pour $jour insérés avec succès<br>";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

$conn->close();
?>
