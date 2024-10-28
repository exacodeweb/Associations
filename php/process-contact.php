<!--
Traitement côté serveur : Vous aurez un script côté serveur (par exemple, 
  en PHP, Node.js, Python, etc.) qui recevra les données du formulaire, 
  les validera et les traitera. Ce script enverra peut-être un e-mail à 
  l'administrateur du site avec les détails du message, ou enregistrera le message 
  dans une base de données. Voici un exemple de traitement côté serveur avec PHP :
-->

<!-- Formulaire de contact -->
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validation des données (par exemple, vérification de l'e-mail, du format du message, etc.)

    // Envoyer l'e-mail à l'administrateur du site
    $to = "votre@email.com";
    $subject = "Nouveau message de la page 'Nous contacter'";
    $body = "Nom: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        header('Content-Type: application/json');
        echo json_encode(array("message" => "Message envoyé avec succès."));
    } else {
        header('Content-Type: application/json', true, 500);
        echo json_encode(array("message" => "Erreur lors de l'envoi du message."));
    }
}
?>

<!--------------------------------------------------------------------------------------------------------------------->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validation des données (par exemple, vérification de l'e-mail, du format du message, etc.)

    // Envoyer l'e-mail à l'administrateur du site
    $to = "votre@email.com";
    $subject = "Nouveau message de la page 'Nous contacter'";
    $body = "Nom: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo json_encode(array("message" => "Message envoyé avec succès."));
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Erreur lors de l'envoi du message."));
    }
}
?>

<!--------------------------------------------------------------------------------------------------------------------->
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "site_papillons";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message envoyé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
