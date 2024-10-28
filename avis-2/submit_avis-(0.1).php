<?php
// Démarrer la session pour utiliser les variables de session
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
  echo "Session démarrée avec succès.<br>";
} else {
  echo "Erreur : La session n'a pas pu être démarrée.<br>";
}


// Affichage du token CSRF pour le débogage
echo "Token CSRF envoyé : " . $_POST['csrf_token'] . "<br>";
echo "Token CSRF en session : " . $_SESSION['csrf_token'] . "<br>";


// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
      die("Erreur : invalid CSRF token.");
  }


//if (empty($_SESSION['csrf_token'])) {
  //$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

  //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo "Token CSRF envoyé : " . $_POST['csrf_token'] . "<br>";
    //echo "Token CSRF en session : " . $_SESSION['csrf_token'] . "<br>";
    //if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        //die("Erreur : invalid CSRF token.");
    //}

// Vérifier si la méthode de la requête est POST
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Afficher les tokens pour le débogage
  //echo "Token CSRF envoyé : " . $_POST['csrf_token'] . "<br>";
  //echo "Token CSRF en session : " . $_SESSION['csrf_token'] . "<br>";

  // Vérifier l'authenticité du token CSRF
  //if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
      //die("Erreur : invalid CSRF token."); // Arrêter l'exécution si le token CSRF est invalide
  //}
//}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Vérifier si la méthode de la requête est POST
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier l'authenticité du token CSRF
    //if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        //die("Erreur : invalid CSRF token."); // Arrêter l'exécution si le token CSRF est invalide
    //}

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
                    header('Location: ../pages/thank_you.html');
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