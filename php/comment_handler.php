<!--3. Script PHP pour gérer l'ajout de commentaires
Créez un fichier comment_handler.php qui va récupérer les données du formulaire, 
les valider et les insérer dans la base de données. Voici un exemple de script PHP :
php-->

<?php
// Connexion à la base de données (à adapter selon vos paramètres)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "votre_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$commenter_name = $_POST['commenter_name'];
$comment_text = $_POST['comment_text'];

// Préparer et exécuter la requête SQL pour insérer le commentaire
$sql = "INSERT INTO comments (commenter_name, comment_text) VALUES ('$commenter_name', '$comment_text')";

if ($conn->query($sql) === TRUE) {
    echo "Commentaire ajouté avec succès!";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>