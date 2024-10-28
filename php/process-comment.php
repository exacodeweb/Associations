<!--
Traitement côté serveur : Vous aurez un script côté serveur (par exemple, 
  en PHP, Node.js, Python, etc.) qui recevra les données du formulaire, 
  les validera et les traitera. Ce script enverra peut-être un e-mail à 
  l'administrateur du site avec les détails du message, ou enregistrera le message 
  dans une base de données. Voici un exemple de traitement côté serveur avec PHP :
-->

<!--------------------------------------------------------------------------------------------------------------------->
<!-- Formulaire de commentaire -->
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    // Validation des données (par exemple, vérification de la longueur du commentaire, etc.)

    // Sauvegarde du commentaire dans la base de données ou autre traitement

    // Réponse JSON
    header('Content-Type: application/json');
    echo json_encode(array("message" => "Commentaire soumis avec succès."));
}
?>
