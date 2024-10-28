<?php
include '../admin/db_connect.php';

$sql = "SELECT * FROM horaires";
$result = $conn->query($sql);

$horaires = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ouverture = ($row["ouverture"] == "00:00:00" && $row["fermeture"] == "00:00:00") ? "Fermé" : $row["ouverture"];
        $fermeture = ($row["fermeture"] == "00:00:00" && $row["ouverture"] == "00:00:00") ? "Fermé" : $row["fermeture"];
        $horaires[] = [
            'jour' => $row["jour"],
            'ouverture' => $ouverture,
            'fermeture' => $fermeture
        ];
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($horaires);
?>