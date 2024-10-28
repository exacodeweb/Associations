<?php
include 'db_connect_horaires.php';//modifier db_connect pour test 28/06/2024

// Récupérer les horaires
$sql = "SELECT jour, ouverture, fermeture FROM horaires";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Jour: " . $row["jour"]. " - Ouverture: " . $row["ouverture"]. " - Fermeture: " . $row["fermeture"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>