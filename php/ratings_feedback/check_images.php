<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

$config = include('../../../Mon_projet/config/config.php');

// Votre code existant pour l'interface d'administration

// Ajouter le script de vérification
function checkProfilePics($config) {
    $imageDir = '../ratings_feedback/profile_pics/';
    $servername = $config['db']['host'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];
    $dbname = $config['db']['dbname'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, profile_pic FROM avisusers";
    $result = $conn->query($sql);

    $missingFiles = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $imagePath = $imageDir . $row['profile_pic'];
            if (!file_exists($imagePath)) {
                $missingFiles[] = $row['profile_pic'];
            }
        }
    }

    $conn->close();

    if (!empty($missingFiles)) {
        return "Les fichiers suivants sont manquants : " . implode(', ', $missingFiles);
    } else {
        return "Toutes les images sont présentes.";
    }
}

$message = checkProfilePics($config);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Vos styles et scripts -->

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h2 {
            text-align: center;
        }
        p {
            text-align: center;
            margin-top: 10px;
        }

        /*Bouton retour admin*/
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
    <!-- Votre interface d'administration -->
    <h2>Vérification des images de profil</h2>
    <p><?php echo $message; ?></p>

    <div class="btn-card"><!--./pages/inscription-(desactiver).html-->
      <a href="../admin_dashboard.php"
        class="link-btn text-white my-2 my-sm-0" title="cliquer Laisser un avis">Retour Page administrateur
      </a>
    </div>

</body>
</html>