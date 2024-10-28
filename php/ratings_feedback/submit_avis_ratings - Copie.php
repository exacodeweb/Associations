
<!--------------------------------------------------------------------------------------------------------------------->
<?php
// Inclure le fichier de configuration
//$config = include('../../../Mon_projet/config/config.php');
$config = include('../../../Mon_projet/config/config.php');

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    // Configuration de la connexion à la base de données
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $user = $config['db']['user'];
    $password = $config['db']['pass'];
    $charset = $config['db']['charset'];

    // Création de la chaîne de connexion DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    // Initialiser le nom du fichier par défaut
    $profile_pic = "default.jpg";

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $file_extension = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);

        // Vérifier l'extension du fichier
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            $new_filename = uniqid() . "." . $file_extension;
            //$upload_dir = 'uploads/profile_pics/';
            $upload_dir = '../../../Mon_projet/php/ratings-feedback/profile_pics/';
            $upload_path = $upload_dir . $new_filename;

            // Créer le répertoire de téléchargement s'il n'existe pas
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Déplacer le fichier téléchargé vers le répertoire de destination
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_path)) {
                $profile_pic = $new_filename;
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit();
            }
        } else {
            echo "Extension de fichier non autorisée.";
            exit();
        }
    }

    try {
        // Création d'une nouvelle instance PDO
        $pdo = new PDO($dsn, $user, $password);

        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO avisusers (nom, email, message, note, profile_pic) VALUES (:nom, :email, :message, :note, :profile_pic)";
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_INT);
        $stmt->bindParam(':profile_pic', $profile_pic, PDO::PARAM_STR);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de remerciement
            //header('Location: ../../pages/thank_you_avis.html');
            //header('Location: ../ratings_feedback/thank_you_avis.html');
            //header('Location: ../../pages/thank_you_avis.html');
            //header('Location: ../../php/ratings_feedback/thank_you_avis.html');
            header('Location: ./thank_you_avis.html');
            exit();
        } else {
            echo "Erreur lors de l'insertion des données.";
        }

    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher un message
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?> 

<!--------------------------------------------------------------------------------------------------------------------->

<!--?php
// Inclure le fichier de configuration
$config = include('../../../config/config.php');

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    // Chemin du dossier de stockage des images de profil
    $target_dir = "../ratings-feedback/profile_pics/";
    $profile_pic = basename($_FILES["profile_pic"]["name"]);
    $target_file = $target_dir . $profile_pic;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifier si le fichier est une image réelle ou une fausse image
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }

    // Vérifier si le fichier existe déjà
    if (file_exists($target_file)) {
        echo "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifier la taille du fichier
    if ($_FILES["profile_pic"]["size"] > 500000) {
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }

    // Autoriser certains formats de fichier
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifier si $uploadOk est mis à 0 par une erreur
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    // Si tout est correct, essayer de télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            echo "Le fichier ". htmlspecialchars($profile_pic). " a été téléchargé.";

            // Configuration de la connexion à la base de données
            $host = $config['db']['host'];
            $dbname = $config['db']['dbname'];
            $user = $config['db']['user'];
            $password = $config['db']['pass'];
            $charset = $config['db']['charset'];

            // Création de la chaîne de connexion DSN (Data Source Name)
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

            try {
                // Création d'une nouvelle instance PDO
                $pdo = new PDO($dsn, $user, $password);

                // Configuration des options PDO
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                // Préparation de la requête d'insertion //avisusers  //user_feedback  user_feedback_moderate
                $sql = "INSERT INTO avisusers (nom, email, message, note, profile_pic) VALUES (:nom, :email, :message, :note, :profile_pic)";
                $stmt = $pdo->prepare($sql);

                // Liaison des paramètres
                $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':message', $message, PDO::PARAM_STR);
                $stmt->bindParam(':note', $note, PDO::PARAM_INT);
                $stmt->bindParam(':profile_pic', $profile_pic, PDO::PARAM_STR);

                // Exécution de la requête
                if ($stmt->execute()) {
                    // Redirection vers la page de remerciement
                    header('Location: ../../pages/thank_you_avis.html');
                    exit();
                } else {
                    echo "Erreur lors de l'insertion des données.";
                }

            } catch (PDOException $e) {
                // En cas d'erreur de connexion, afficher un message
                echo "Erreur de connexion : " . $e->getMessage();
            }

        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}
?>