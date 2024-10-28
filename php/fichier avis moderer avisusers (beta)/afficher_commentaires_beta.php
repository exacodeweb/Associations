<?php
header('Content-Type: application/json');

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "G1i9e6t3";
$dbname = "site_papillons";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sélectionner les commentaires approuvés
//$sql = "SELECT commenter_name, comment_text, comment_date FROM comments WHERE is_approved = 1 ORDER BY comment_date DESC";
$sql = "SELECT nom, email, message, note, is_approved FROM comments WHERE is_approved = 1 ORDER BY comment_date DESC";

$result = $conn->query($sql);

$commentaires = [];

//if ($result->num_rows > 0) {
    //while ($row = $result->fetch_assoc()) {
        //$commentaires[] = [
            //'name' => htmlspecialchars($row['commenter_name']),
            //'text' => htmlspecialchars($row['comment_text']),
            //'date' => date('d/m/Y', strtotime($row['comment_date']))
        //];
    //}
//}

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      echo "<div class='com'>";
      echo "<p>" . htmlspecialchars($row['message']) . "</p>";
      echo "<span>Par " . htmlspecialchars($row['nom']) . " le " . date('d/m/Y', strtotime($row['created_at'])) . "</span>";
      echo "<span>Note : " . htmlspecialchars($row['note']) . "</span>";
      echo "</div>";
  }
}


// Fermer la connexion à la base de données
$conn->close();