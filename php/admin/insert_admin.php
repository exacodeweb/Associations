<?php
//require_once '../../../config/config.php'; // Assurez-vous que le chemin est correct
require_once '../../config/config.php';

function add_admin($username, $password) {
    try {
        // Connexion à la base de données
        $conn = get_db_connection();

        // Vérification basique des entrées
        if (empty($username) || empty($password)) {
            throw new Exception("Le nom d'utilisateur et le mot de passe ne doivent pas être vides.");
        }

        // Préparation de la requête
        $stmt = $conn->prepare('INSERT INTO admins (username, password) VALUES (:username, :password)');

        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Exécution de la requête avec les paramètres
        $stmt->execute(['username' => $username, 'password' => $hashed_password]);

        echo "Administrateur ajouté avec succès.";
        
    } catch (PDOException $e) {
        // Gestion des erreurs de base de données
        echo "Erreur lors de l'ajout de l'administrateur : " . $e->getMessage();
    } catch (Exception $e) {
        // Gestion des erreurs générales
        echo "Erreur : " . $e->getMessage();
    }
}

// Exemple d'appel de la fonction pour ajouter un administrateur
add_admin('AilesSolidaire', 'password123');
?>