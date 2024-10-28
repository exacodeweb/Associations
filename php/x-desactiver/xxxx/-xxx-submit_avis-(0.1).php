
<?php
// Démarrer la session pour utiliser les variables de session
session_start();

// Vérifier si la méthode de la requête est POST // Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier l'authenticité du token CSRF
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) { 
        die("Erreur : invalid CSRF token.");// Arrêter l'exécution si le token CSRF est invalide
      }
    }

    // Configurer la connexion à la base de données
    // Configuration des paramètres de connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';/*votre_base_de_donnees*/
    $username = 'root';/*votre_nom_utilisateur*/
    $password = 'G1i9e6t3';/*votre_mot_de_passe*/

    try {
        // Établir la connexion avec la base de données en utilisant PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        // Récupérer et filtrer les données du formulaire pour éviter les injections SQL
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message) VALUES (:nom, :email, :message)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            if ($stmt->execute()) {
                header('Location: ../pages/thank_you.html');
                exit();
            } else {
                echo "Une erreur est survenue lors de l'enregistrement de vos données.";
            }
        } else {
            echo "Tous les champs sont requis.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    die("Méthode de requête non supportée.");
}
?>
<!--// Affichage des données pour le débogage-->
<!--
Explications
Démarrage de la session :

php
Copy code
session_start();
Utilisé pour gérer les sessions PHP, essentiel pour les tokens CSRF.

Vérification de la méthode de requête :

php
Copy code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
Assure que le script ne traite que les requêtes POST, typiques des soumissions de formulaires.

Vérification du token CSRF :

php
Copy code
if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Erreur : invalid CSRF token.");
}
Protége contre les attaques CSRF en vérifiant que le token envoyé avec le formulaire correspond à celui stocké en session.

Configuration de la connexion à la base de données :

php
Copy code
$host = 'localhost';
$dbname = 'site_papillons';
$username = 'root';
$password = '';
Définit les paramètres de connexion.

Établissement de la connexion PDO :

php
Copy code
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
Crée une connexion PDO avec gestion des erreurs.

Récupération et filtrage des données :

php
Copy code
$nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT);
Récupère et filtre les entrées du formulaire pour éviter les injections SQL et autres types de données non valides.

Affichage pour débogage :

php
Copy code
echo "Nom: " . $nom . "<br>";
echo "Email: " . $email . "<br>";
echo "Message: " . $message . "<br>";
echo "Note: " . $note . "<br>";
Affiche les valeurs récupérées pour vérifier qu'elles sont correctes.

Préparation et exécution de la requête d'insertion :

php
Copy code
$stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':message', $message);
$stmt->bindParam(':note', $note, PDO::PARAM_INT);
Prépare la requête SQL pour insérer les données dans la base de données.

Gestion des erreurs SQL :

php
Copy code
try {
    if ($stmt->execute()) {
        header('Location: ../thank_you.html');
        exit();
    } else {
        echo "Une erreur est survenue lors de l'enregistrement de vos données.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}
Tente d'exécuter la requête et gère les erreurs potentielles.

Redirection après succès :

php
Copy code
header('Location: ../thank_you.html');
exit();
Redirige l'utilisateur vers une page de remerciement si l'insertion est réussie.

Page de Remerciement
Voici le code HTML pour la page de remerciement thank_you.html :

html
Copy code
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Merci</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Merci pour votre message !</h1>
        <p>Nous avons bien reçu votre message et vous répondrons dans les plus brefs délais.</p>
        <a href="index.html" class="btn btn-primary mt-3">Retour à l'accueil</a>
    </div>
</body>
</html>

Conclusion
En suivant ces étapes et en utilisant ces exemples de code, 
vous devriez être en mesure de créer un formulaire fonctionnel qui 
enregistre les données dans votre base de données. 
N'hésitez pas à ajuster les champs et les validations selon vos besoins spécifiques.
-->
<?php
// Démarrer la session pour utiliser les variables de session
session_start();

// Vérifier si la méthode de la requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier l'authenticité du token CSRF
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : invalid CSRF token."); // Arrêter l'exécution si le token CSRF est invalide
    }

    // Configuration des paramètres de connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';
    $username = 'root';
    $password = '';

    try {
        // Établir la connexion avec la base de données en utilisant PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire pour éviter les injections SQL
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT);

        // Affichage des données pour le débogage
        echo "Nom: " . $nom . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Message: " . $message . "<br>";
        echo "Note: " . $note . "<br>";

        // Vérifier que les champs obligatoires ne sont pas vides
        if (!empty($nom) && !empty($email) && !empty($message)) {
            // Préparer la requête SQL pour insérer les données dans la base
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note, PDO::PARAM_INT);

            try {
                // Exécuter la requête préparée
                if ($stmt->execute()) {
                    // Rediriger vers la page de remerciement en cas de succès
                    header('Location: ../thank_you.html');
                    exit();
                } else {
                    echo "Une erreur est survenue lors de l'enregistrement de vos données.";
                }
            } catch (PDOException $e) {
                echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
            }
        } else {
            echo "Tous les champs sont requis.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    die("Méthode de requête non supportée."); // Arrêter l'exécution si la requête n'est pas POST
}
?>