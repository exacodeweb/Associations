
<!--Traitement PHP (inscription.php) pour l'enregistrement dans une base de données :-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecte des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Connexion à la base de données
    $servername = "localhost";
    $username_db = "root";
    $password_db = "G1i9e6t3";
    /*$dbname = "nom_de_votre_base_de_donnees";*/
    $dbname = "db_ailes_enchantee";//site_papillons

    // Création de la connexion
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Préparation de la requête SQL
    $sql = "INSERT INTO inscriptions (name, username, email, message) VALUES ('$name', '$username', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}
?>
<!--

Explication des deux scénarios :
Enregistrement dans une base de données :

Nous nous connectons à une base de données MySQL en utilisant les paramètres de connexion ($servername, $username, $password, $dbname).
Nous utilisons mysqli pour créer une connexion et vérifier si la connexion est réussie.
Ensuite, nous préparons une requête SQL pour insérer les données ($nom et $email) dans une table utilisateurs.
Nous exécutons la requête avec $conn->query($sql) et affichons un message de succès ou d'erreur.
Enfin, nous fermons la connexion avec $conn->close().
Envoi par email :

Nous préparons les données pour l'email ($to, $subject, $message, $headers).
Nous utilisons la fonction mail() de PHP pour envoyer l'email.
Nous affichons un message pour indiquer si l'email a été envoyé avec succès ou non.
Ces deux exemples montrent comment vous pouvez traiter les données soumises via un formulaire HTML en PHP pour les enregistrer dans une base de données ou les envoyer par email.

-->



<!--Traitement PHP (inscription.php) pour l'envoi par email :-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];

    /*$to = "votre_adresse_email@example.com";*/
    $to = "narasseiprebroi-4867@yopmail.com";
    $subject = "Nouvelle inscription";
    $message = "Nom : $nom\nEmail : $email";
    $headers = "From: webmaster@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email envoyé avec succès à $to";
    } else {
        echo "L'envoi de l'email a échoué";
    }
}
?>







<!--Fichier : index.html
html
Copier le code-->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription Événements</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Inclure Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Bouton d'inscription -->
  <div class="float-left">
    <button class="btn-open btn-primary" data-bs-toggle="modal" data-bs-target="#joinModal">
      S'inscrire
    </button>
  </div>

  <!-- Fenêtre modale -->
  <div class="modal fade" id="joinModal" tabindex="-1" role="dialog" aria-labelledby="joinModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <div class="title-form">Formulaire d'inscription</div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-light">
          <form id="registrationForm" action="inscription.php" method="post">
            <label class="wording" for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>

            <label class="wording" for="username">Prénom</label>
            <input type="text" class="form-control" id="username" name="username" required>

            <label class="wording" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>

            <label class="wording" for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
          </form>
        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Fermer
          </button>
          <button type="submit" class="btn btn-primary" form="registrationForm">
            Valider
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Inclure Bootstrap et JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById("registrationForm").onsubmit = function(event) {
      // Code pour gérer l'envoi du formulaire ici
      alert("Inscription réussie !");
      $('#joinModal').modal('hide');
    }
  </script>
</body>
</html>