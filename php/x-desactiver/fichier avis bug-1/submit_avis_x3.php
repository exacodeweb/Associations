<?php
// Démarrer la session
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['csrf_token_avi']) || $_POST['csrf_token_avi'] !== $_SESSION['csrf_token_avi']) {
        die("Erreur : invalid CSRF token.");
    }

    //-------------------------------------------------- ajouter

    $config = include('C:/xampp/htdocs/Mon_projet/config/config_avis.php'); // Chemin correct vers le fichier de configuration

    if (!$config) {
        die("Erreur : fichier de configuration introuvable.");
    }

    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];

    //--------------------------------------------------

    //require_once './config_avis.php';//./config_avis.php

    $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 5)));

    if (!$nom || !$email || !$message || !$note) {
        die("Veuillez remplir tous les champs correctement.");
    }

    //$sql = "INSERT INTO avis (nom, email, message, note) VALUES (?, ?, ?, ?)";
    $sql = "INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $email, $message, $note]);

    //ajouter
    if ($stmt->execute()) {
      header('Location: ../pages/thank_you_avi.html');//../pages/thank_you_avis.html
      exit();
    }

    if ($stmt) {
        echo "success";
    } else {
        echo "Erreur lors de l'insertion de l'avis.";
    }
} else {
    header("Location: ../pages/avis.html");//../avis.html
}
?>
<!------------------------------------------------------>
<!--?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token_avis']) {
        //die("Erreur : invalid CSRF token.");
    }

    // Configurer la connexion à la base de données
    $host = 'localhost';
    $dbname = 'site_papillons';
    $username = 'root';
    $password = 'G1i9e6t3';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO avis (name, email, message, note) VALUES (:name, :email, :message, note:)");
            $stmt->bindParam(':name', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam('note', $note);

            if ($stmt->execute()) {
                header('Location: ../pages/thank_you_avis.html');
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
?>-->

<?php
session_start();

// Vérification du démarrage de la session 
if (session_status() == PHP_SESSION_ACTIVE) {
   echo "Session démarrée avec succès.<br>";
}else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
  }

// Vérifier le token CSRF
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //if (empty($_POST['csrf_token_avi']) || $_POST['csrf_token_avi'] !== $_SESSION['csrf_token_avi']) {
        //die("Erreur : invalid CSRF token.");
    //}


    //------------------------------------------------------ ajouter

    // Vérifier le token CSRF
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
          die("Erreur : invalid CSRF token.");
      }

      $config = include('C:/xampp/htdocs/Mon_projet/config/config_avis.php'); // Chemin correct vers le fichier de configuration

      if (!$config) {
          die("Erreur : fichier de configuration introuvable.");
      }

    //------------------------------------------------------


    // Configurer la connexion à la base de données
    //$host = 'localhost';
    //$dbname = 'site_papillons';
    //$username = 'root';
    //$password = 'G1i9e6t3';

    // Inclure le fichier de configuration
    //$config = include('/path/to/secure/config.php');
    // Inclure le fichier de configuration
                                                                  //$config = include('C:\xampp\config\config_avi.php'); 
    //$config = include('./avis/config_avis.php'); 

    // Récupérer les paramètres de connexion
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);

        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            if ($stmt->execute()) {
              header('Location: ../pages/thank_you_avi.html');//../pages/thank_you_avis.html
              exit();
            }/**/

            if ($stmt->execute()) {
                echo 'success';
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


<!------------------------------------------------------------------------------------------------------DERNIER ESSAI-->
<?php
session_name('avis_session'); // Utilisation d'un nom de session distinct
// Démarrer la session
session_start();
// Vérification du démarrage de la session 
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}
// Vérifier le token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : invalid CSRF token.");
    }

    $config = include('C:/xampp/htdocs/Mon_projet/config/config_avis.php'); // Chemin correct vers le fichier de configuration

    if (!$config) {
        die("Erreur : fichier de configuration introuvable.");
    }

    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Récupérer et filtrer les données du formulaire
        $nom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);
        // Insérer les données dans la base de données
        if (!empty($nom) && !empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO avis (nom, email, message, note) VALUES (:nom, :email, :message, :note)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':note', $note);

            // ajouter
            if ($stmt->execute()) {
              header('Location: ../pages/thank_you_avi.html');//../pages/thank_you_avis.html
              exit();
            }

            if ($stmt->execute()) {
                echo 'success';
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