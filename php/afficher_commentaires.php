<?php
// Connexion à la base de données (à adapter selon vos paramètres)
$servername = "localhost";
$username = "root";/*username*/
$password = "G1i9e6t3";/*password*/
$dbname = "site_papillons";/*votre_base_de_donnees*/

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sélectionner les commentaires approuvés depuis la base de données
$sql = "SELECT commenter_name, comment_text, comment_date FROM comments WHERE is_approved = 1 ORDER BY comment_date DESC";
$result = $conn->query($sql);

// Afficher les commentaires
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='com'>";
        echo "<p>" . $row['comment_text'] . "</p>";
        echo "<span>Par " . $row['commenter_name'] . " le " . date('d/m/Y', strtotime($row['comment_date'])) . "</span>";
        echo "</div>";
    }
} else {
    echo "Aucun commentaire pour le moment.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
