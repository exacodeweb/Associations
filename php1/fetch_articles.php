<?php
include 'db_connect.php';

$sql = "SELECT titre, contenu, image, date_publication FROM articles ORDER BY date_publication DESC";
$result = $conn->query($sql);

$articles = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
}

$conn->close();
?>
<!-- fetch_articles.php : Fichier pour la récupération des articles de blog depuis la base de données (si applicable). -->