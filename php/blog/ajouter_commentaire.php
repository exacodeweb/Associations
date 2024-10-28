<?php
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

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $conn->real_escape_string($_POST['nom']);
    $commentaire = $conn->real_escape_string($_POST['commentaire']);
    
    $sql = "INSERT INTO comments (commenter_name, comment_text, is_approved) VALUES ('$nom', '$commentaire', 0)";
    
    if ($conn->query($sql) === TRUE) {
        $message = "<p class='success'>Commentaire ajouté avec succès. Il sera visible après approbation.</p>";
    } else {
        $message = "<p class='error'>Erreur : " . htmlspecialchars($conn->error) . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Commentaire</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous que le chemin est correct -->

    <style>
      /* Style général pour le corps de la page */
      body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
          margin: 0;
          padding: 0;
      }

      /* Conteneur principal */
      .container {
          width: 80%;
          margin: 20px auto;
          padding: 20px;
          background-color: #fff;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          border-radius: 8px;
      }

      /* Style pour le formulaire */
      form {
          display: flex;
          flex-direction: column;
      }

      form label {
          margin-bottom: 5px;
          font-weight: bold;
      }

      form input[type="text"],
      form textarea {
          padding: 10px;
          margin-bottom: 10px;
          border: 1px solid #ddd;
          border-radius: 4px;
      }

      form button {
          padding: 10px 15px;
          border: none;
          border-radius: 4px;
          background-color: #4CAF50;
          color: #fff;
          cursor: pointer;
          font-size: 16px;
      }

      form button:hover {
          background-color: #45a049;
      }

      /* Style pour les messages de succès et d'erreur */
      p.success {
          color: #4CAF50;
      }

      p.error {
          color: #f44336;
      }

        /*Bouton retour blog*/
        .btn-card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: auto;
        width: 100%;
        margin-bottom: 10px;
        padding: 20px;
      }

      .link-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 30px;
        width: 200px; /*150px*//*160px*/
        border-radius: 50px;
        text-decoration: none !important;
        background-color:mediumorchid!important;/*#0145b5*/ 
        color: white;
      }

      .link-btn:hover {
        background-color:rgb(211, 85, 163)!important;/*green*/
      }

    </style>

  </head>
<body>
    <div class="container">
        <h1>Ajouter un Commentaire</h1>
        <?php if ($message) echo $message; ?>
        <!--<form method="post" action="submit_comment.php">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <label for="commentaire">Commentaire:</label>
            <textarea id="commentaire" name="commentaire" rows="4" required></textarea>
            <button type="submit">Soumettre</button>
        </form>-->
    </div> 

    <div class="btn-card"><!--./pages/inscription-(desactiver).html-->
      <a href="../pages/blog.html"
        class="link-btn text-white my-2 my-sm-0" title="cliquer Laisser un avis">Retour Blog
      </a>
    </div>

</body>
</html>