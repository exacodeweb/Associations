<?php
// ! fichier de Test car celui fonctionnelle tester est nommée "moderate_comments-0.php"
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../admin/admin_login.php');
    exit();
}

// Chargement de la configuration
$config = include('../config/config.php');
//$config = include('../../../config/config.php');

// Connexion à la base de données
$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = intval($_POST['comment_id']);
    $action = $_POST['action'];

    $stmt = null;
    if ($action == 'approve') {
        $stmt = $conn->prepare("UPDATE avisusers SET is_approved = 1 WHERE id = ?");
    } elseif ($action == 'reject') {
        $stmt = $conn->prepare("DELETE FROM avisusers WHERE id = ?");
    }

    if ($stmt) {
        $stmt->bind_param("i", $comment_id);
        if ($stmt->execute()) {
            $message = "<p class='success'>Action effectuée avec succès.</p>";
        } else {
            $message = "<p class='error'>Erreur : " . htmlspecialchars($stmt->error) . "</p>";
        }
        $stmt->close();
    }
}

// Récupération des commentaires non approuvés
$sql = "SELECT id, nom, message, created_at FROM avisusers WHERE is_approved = 0 ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modération des Commentaires</title>
    <!--<link rel="stylesheet" href="styles.css">--> <!-- Assurez-vous que le chemin est correct -->
    <link rel="stylesheet" href="../styles/style.css">
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
    width: 80%;/*80%*/
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Style pour les commentaires */
.comment {
    border: 1px solid #ddd;
    padding: 15px;/*15px*/
    margin-bottom: 10px;
    border-radius: 8px;
    background-color: #fafafa;


    display: flex;
    flex-direction: column;
    justify-content: center;
}

.comment p {
    margin: 0;
    font-size: 16px;
    color: #333;
}

.comment span {
    display: block;
    margin-top: 5px;
    font-size: 14px;
    color: #666;
}

/* Style pour les boutons */
.comment button {
    padding: 8px 12px;
    margin: 5px;
    border: none;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
}

.comment button[name="action"][value="approve"] {
    background-color: #4CAF50;
}

.comment button[name="action"][value="reject"] {
    background-color: #f44336;
}

/* Style pour les messages de succès et d'erreur */
p.success {
    color: #4CAF50;
}

p.error {
    color: #f44336;
}

/*
.comment {
  display: flex;
  width: 50%;
}*/

form {
  width: 100%;
}

        /*Bouton retour admin*/
        .btn-card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        align-content: center;
        height: auto;
        width: 100% !important;
        margin-bottom: 10px;
        padding: 20px;
      }

      .link-btn {
        /**/display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 30px;
        width: 250px; /*150px*//*160px*/
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
        <?php if (isset($message)) echo $message; ?>

        <?php if ($result->num_rows > 0): ?>
            <!--<form method="post" action="moderate_comments.php">-->
            <!--<form method="post" action="../blog/moderate_comments.php">-->
            <form method="post" action="moderate_comments.php">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="comment">
                        <p><?php echo htmlspecialchars($row['message']); ?></p>
                        <span>Par <?php echo htmlspecialchars($row['nom']); ?> le <?php echo date('d/m/Y H:s', strtotime($row['created_at'])); ?></span><br>
                        <button type="submit" name="action" value="approve">Approuver</button>
                        <button type="submit" name="action" value="reject">Rejeter</button>
                        <input type="hidden" name="comment_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    </div>
                <?php endwhile; ?>
            </form>
        <?php else: ?>
            <p>Aucun commentaire en attente.</p>
        <?php endif; ?>


    <div class="btn-card"><!--./pages/inscription-(desactiver).html-->
      <a href="../admin/admin_dashboard.php"
        class="link-btn text-white my-2 my-sm-0" title="cliquer Laisser un avis">Retour Page administrateur
      </a>
    </div>

    <a class="btn-card" href="../admin/admin_dashboard2.php">
      <button>Retour Page administrateur</button>
    </a>


    </div>

    <!--

    -->


</body>
</html>

<?php
$conn->close();
?>