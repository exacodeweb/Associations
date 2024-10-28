<?php
session_start();

// Inclure la configuration de la base de données
require_once '../config/config_avis_beta.php';

// Vérifier la connexion à la base de données
//$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);
$conn = new mysqli($config['db']['host'], $config['db']['root'], $config['db']['G1i9e6t3'], $config['db']['site_papillons']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les avis non approuvés
$sql = "SELECT id, nom, email, message, note FROM avisusers WHERE is_approved = 0";
$result = $conn->query($sql);

// Générer un token CSRF si ce n'est pas déjà fait
if (empty($_SESSION['csrf_token_moderation'])) {
    $_SESSION['csrf_token_moderation'] = bin2hex(random_bytes(32));
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modération des Avis</title>
    <style>
        /* Styles CSS pour améliorer l'affichage */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .comment p {
            margin: 5px 0;
        }
        .comment form {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Modération des Avis</h1>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="comment">
                <p><strong>Nom:</strong> <?php echo htmlspecialchars($row['nom']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                <p><strong>Message:</strong> <?php echo htmlspecialchars($row['message']); ?></p>
                <p><strong>Note:</strong> <?php echo htmlspecialchars($row['note']); ?></p>
                <form method="POST" action="approve_comment_beta.php">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token_moderation']); ?>">
                    <input type="submit" name="approve" value="Approuver">
                    <input type="submit" name="reject" value="Rejeter">
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Aucun avis en attente de modération.</p>
    <?php endif; ?>

    <?php
    // Fermer la connexion
    $conn->close();
    ?>
</body>
</html>



















<!--?php
session_start();
if (empty($_SESSION['csrf_token_avis_beta'])) {
    $_SESSION['csrf_token_avis_beta'] = bin2hex(random_bytes(32));
}
?>

<!-?php
session_start();
require_once '../config/config_avis.php';

$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        $commentId = (int) $_POST['comment_id'];
        $action = $_POST['action'];

        if ($action === 'approve') {
            $sql = "UPDATE avisusers SET is_approved = 1 WHERE id = $commentId";
        } elseif ($action === 'delete') {
            $sql = "DELETE FROM avisusers WHERE id = $commentId";
        }

        if ($conn->query($sql) === TRUE) {
            $message = "Action exécutée avec succès.";
        } else {
            $message = "Erreur : " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "Token CSRF invalide.";
    }
}

$sql = "SELECT id, nom, message, note, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') as date FROM avisusers WHERE is_approved = 0 ORDER BY created_at DESC";
$result = $conn->query($sql);

$commentaires = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commentaires[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modérer les commentaires</title>
</head>
<body>
    <h1>Modération des commentaires</h1>
    <!?php if (isset($message)): ?>
        <p><!?php echo htmlspecialchars($message); ?></p>
    <!?php endif; ?>
    <!?php foreach ($commentaires as $commentaire): ?>
        <div>
            <p><!?php echo htmlspecialchars($commentaire['message']); ?></p>
            <span>Par <!?php echo htmlspecialchars($commentaire['nom']); ?> le <!?php echo htmlspecialchars($commentaire['date']); ?></span>
            <span>Note : <!?php echo htmlspecialchars($commentaire['note']); ?></span>
            <form method="post" action="">
                <input type="hidden" name="comment_id" value="<!?php echo htmlspecialchars($commentaire['id']); ?>">
                <input type="hidden" name="csrf_token_avis_beta" value="<!?php echo htmlspecialchars($_SESSION['csrf_token_avis_beta']); ?>">
                <button type="submit" name="action" value="approve">Approuver</button>
                <button type="submit" name="action" value="delete">Rejeter</button>
            </form>
        </div>
    <!?php endforeach; ?>
</body>
</html>  -->


<!--?php
session_start();
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        $conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $commentId = (int) $_POST['comment_id'];
        $action = $_POST['action'];

        if ($action === 'approve') {
            $sql = "UPDATE avisusers SET is_approved = 1 WHERE id = $commentId";
        } elseif ($action === 'delete') {
            $sql = "DELETE FROM avisusers WHERE id = $commentId";
        } else {
            echo "Action non reconnue.";
            $conn->close();
            exit;
        }

        if ($conn->query($sql) === TRUE) {
            echo "Action exécutée avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Token CSRF invalide.";
    }
}
?>   -->
<!--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modérer les commentaires</title>
</head>
<body>
    <h1>Modération des commentaires</h1>
    <form method="post" action="">     -->
        <!--<label for="comment_id">ID du commentaire:</label>-->
        <!--<input type="number" id="comment_id" name="comment_id" required>-->
<!--        
        <label for="action">Action:</label>
        <select id="action" name="action" required>
            <option value="approve">Approuver</option>
            <option value="delete">Supprimer</option>
        </select>
        
        <input type="hidden" name="csrf_token_avis_beta" value="<?php echo htmlspecialchars($_SESSION['csrf_token_avis_beta']); ?>">
        
        <button type="submit">Soumettre</button>
    </form>
</body>
</html> -->


<!--// moderate_comments.php-->
<!--?php
session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'username', 'password', 'database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les avis non approuvés
$result = $conn->query("SELECT * FROM avisusers WHERE is_approved = 0");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>Nom:</strong> " . $row['nom'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
        echo "<p><strong>Note:</strong> " . $row['note'] . "</p>";
        echo "<form method='POST' action='approve_comment.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='approve' value='Approuver'>";
        echo "<input type='submit' name='reject' value='Rejeter'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "Aucun avis en attente de modération.";
}

// Fermer la connexion
$conn->close();
?>  -->



<!--?php
session_start();
require_once '../config/config_avis.php';

$config = include('../config/config_avis.php');

$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $commentId = (int) $_POST['comment_id'];
        $action = $_POST['action'];

        if ($action === 'approve') {
            $sql = "UPDATE avisusers SET is_approved = 1 WHERE id = $commentId";
        } elseif ($action === 'delete') {
            $sql = "DELETE FROM avisusers WHERE id = $commentId";
        } else {
            echo "Action non reconnue.";
            $conn->close();
            exit;
        }

        if ($conn->query($sql) === TRUE) {
            echo "Action exécutée avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Token CSRF invalide.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modérer les commentaires</title>
</head>
<body>
    <h1>Modération des commentaires</h1>
    <form method="post" action="">
        <label for="comment_id">ID du commentaire:</label>
        <input type="number" id="comment_id" name="comment_id" required>
        
        <label for="action">Action:</label>
        <select id="action" name="action" required>
            <option value="approve">Approuver</option>
            <option value="delete">Supprimer</option>
        </select>
        
        <input type="hidden" name="csrf_token_avis_beta" value="<!-?php echo htmlspecialchars($_SESSION['csrf_token_avis_beta']); ?>">
        
        <button type="submit">Soumettre</button>
    </form>
</body>
</html>  -->




<!--?php // issue du fichier Blog
//--------------------------------------------------------------------- moderate_comments 
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

//$username = $_SESSION['username'];
//error_log("Débogage : Session active pour l'utilisateur $username.");
//--------------------------------------------------------------------

$servername = "localhost";
$username = "root"; /* username */
$password = "G1i9e6t3"; /* password */
$dbname = "site_papillons"; /* votre_base_de_donnees */


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
        $stmt = $conn->prepare("DELETE FROM avisuserss WHERE id = ?");
    }

    if ($stmt) {
        $stmt->bind_param("i", $comment_id);
        if ($stmt->execute()) {
            echo "Action effectuée avec succès.";
        } else {
            echo "Erreur : " . $stmt->error;
        }
        $stmt->close();
    }
}

$sql = "SELECT id, commenter_name, comment_text, comment_date FROM comments WHERE is_approved = 0 ORDER BY comment_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form method='post' action='moderate_comments_beta.php'>";// Test: ./moderate_comments.php
    while($row = $result->fetch_assoc()) {
        echo "<div class='com'>";
        echo "<p>" . htmlspecialchars($row['comment_text']) . "</p>";
        echo "<span>Par " . htmlspecialchars($row['commenter_name']) . " le " . date('d/m/Y', strtotime($row['comment_date'])) . "</span><br>";
        echo "<button type='submit' name='action' value='approve'>Approuver</button>";
        echo "<button type='submit' name='action' value='reject'>Rejeter</button>";
        echo "<input type='hidden' name='comment_id' value='" . $row['id'] . "'>";
        echo "</div>";
    }
    echo "</form>";
} else {
    echo "Aucun commentaire en attente.";
}

$conn->close();
?>
-->

<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->



<!--?php
session_start();
require_once '../config/config_avis.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token_avis_beta']) || !hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        die("Token CSRF invalide.");
    }

    $config = include('../config/config_avis.php');

    $servername = $config['db']['host'];
    $username = $config['db']['user'];
    $password = $config['db']['pass'];
    $dbname = $config['db']['dbname'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = (int) $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $sql = "UPDATE avisusers SET is_approved = 1 WHERE id = $id";
    } elseif ($action == 'delete') {
        $sql = "DELETE FROM avisusers WHERE id = $id";
    } else {
        die("Action invalide.");
    }

    if ($conn->query($sql) === TRUE) {
        echo "Action effectuée avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}
?>  -->




















<!-------------------------------------------------------------------------------------------------------- Version-1 -->

<!--?php
session_start();
require_once '../config/config_avis.php';//../config/config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (hash_equals($_SESSION['csrf_token_avis_beta'], $_POST['csrf_token_avis_beta'])) {
        $config = include('../config/config_avis.php');//../config/config.php

        $servername = $config['db']['host'];
        $username = $config['db']['user'];
        $password = $config['db']['pass'];
        $dbname = $config['db']['dbname'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Protection contre les injections SQL
        $commentId = $conn->real_escape_string($_POST['id']);
        $action = $conn->real_escape_string($_POST['action']);

        if ($action === 'approve') {
            $sql = "UPDATE avisusers SET is_approved = 1 WHERE id = $commentId";
        } elseif ($action === 'reject') {
            $sql = "DELETE FROM avis WHERE id = $commentId";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Commentaire modéré avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Token CSRF invalide.";
    }
}
?>  -->

<!-------------------------------------------------------------------------------------------------------- Version-2 -->

<!--?php
session_start();
require_once '../config/config_avis.php';

$config = include('../config/config_avis.php');

$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentId = (int) $_POST['comment_id'];
    $action = $_POST['action'];

    if ($action === 'approve') {
        $sql = "UPDATE avisusers SET is_approved = 1 WHERE id = $commentId";
    } elseif ($action === 'delete') {
        $sql = "DELETE FROM avisusers WHERE id = $commentId";
    } else {
        echo "Action non reconnue.";
        $conn->close();
        exit;
    }

    if ($conn->query($sql) === TRUE) {
        echo "Action exécutée avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modérer les commentaires</title>
</head>
<body>
    <h1>Modération des commentaires</h1>
    <form method="post" action="">
        <label for="comment_id">ID du commentaire:</label>
        <input type="number" id="comment_id" name="comment_id" required>
        <label for="action">Action:</label>
        <select id="action" name="action" required>
            <option value="approve">Approuver</option>
            <option value="delete">Supprimer</option>
        </select>
        <button type="submit">Soumettre</button>
    </form>
</body>
</html> -->
