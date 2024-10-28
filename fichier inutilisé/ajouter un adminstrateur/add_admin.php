<!--
2. Ajouter un administrateur
Ajoutez un administrateur à la table avec un nom d'utilisateur et un mot de passe sécurisé. 
Voici un exemple de script PHP pour ajouter un administrateur :
-->

<?php
require_once '../../../config/config.php'; // Assurez-vous que le chemin est correct

function add_admin($username, $password) {
    $conn = get_db_connection();
    $stmt = $conn->prepare('INSERT INTO admins (username, password) VALUES (:username, :password)');
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute(['username' => $username, 'password' => $hashed_password]);
}

// Remplacez 'admin' et 'password123' par les informations de votre administrateur
add_admin('admin', 'password123');
echo "Administrateur ajouté avec succès.";
?>
<!--
Enregistrez ce script dans un fichier, par exemple add_admin.php, et exécutez-le via 
votre navigateur (http://localhost/Mon_projet/php/add_admin.php) pour ajouter un administrateur.
-->
