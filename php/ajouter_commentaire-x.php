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

// Sécuriser et insérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $conn->real_escape_string($_POST['nom']);
    $commentaire = $conn->real_escape_string($_POST['commentaire']);
    
    $sql = "INSERT INTO comments (commenter_name, comment_text, is_approved) VALUES ('$nom', '$commentaire', 0)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Commentaire ajouté avec succès. Il sera visible après approbation.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
