<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];

    $formatted_date = date('d-m-yy', strtotime($event_date));

    $servername = "localhost";
    $username = "root";
    $password = "G1i9e6t3";
    $dbname = "site_papillons";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO inscriptions (name, email, title, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $event_title, $formatted_date);

    if ($stmt->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!----------------------------------------------------------------------------------------------------------------------
Commentaires:

Ce fichier utilise JavaScript pour pré-remplir les champs avec les données de l'événement sélectionné.
Les données sont envoyées via un formulaire POST à un script PHP pour traitement.
4. Fichier submit_inscription.php
Ce fichier traite l'inscription en enregistrant les données dans une base de données.


  Commentaires:

Le script traite les données envoyées par le formulaire et les enregistre dans la base de données.
La date de l'événement est formatée pour correspondre au format attendu par la base de données (YYYY-MM-DD).
Les informations de connexion à la base de données (serveur, utilisateur, mot de passe, nom de la base) doivent être correctes.
Le script utilise une requête préparée pour éviter les injections SQL.
----------------------------------------------------------------------------------------------------------------------->

<!--
4. Fichier submit_inscription.php
Ce fichier traite l'inscription en enregistrant les données dans une base de données.

Commentaires:

Le script traite les données envoyées par le formulaire et les enregistre dans la base de données.
La date de l'événement est formatée pour correspondre au format attendu par la base de données (YYYY-MM-DD).
Les informations de connexion à la base de données (serveur, utilisateur, 
mot de passe, nom de la base) doivent être correctes.
Le script utilise une requête préparée pour éviter les injections SQL.
-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];

    // Format de la date
    $formatted_date = date('d-m-yy', strtotime($event_date));

    // Informations de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "G1i9e6t3";
    $dbname = "site_papillons";

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Préparer et lier
    $stmt = $conn->prepare("INSERT INTO inscriptions (name, email, title, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $event_title, $formatted_date);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>




