<!--?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
//config.php
require_once '../../../config-a/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jour = $_POST['jour'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];

    $conn = get_db_connection();
    $stmt = $conn->prepare('UPDATE horaires SET ouverture = :ouverture, fermeture = :fermeture WHERE jour = :jour');
    $stmt->execute(['ouverture' => $ouverture, 'fermeture' => $fermeture, 'jour' => $jour]);
}

$conn = get_db_connection();
$stmt = $conn->query('SELECT * FROM horaires');
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Admin</title>
</head>
<body>
    <h2>Tableau de Bord Admin</h2>
    <form method="post">
        <label for="jour">Jour :</label>
        <select id="jour" name="jour">
            <option value="lundi">Lundi</option>
            <option value="mardi">Mardi</option>
            <option value="mercredi">Mercredi</option>
            <option value="jeudi">Jeudi</option>
            <option value="vendredi">Vendredi</option>
            <option value="samedi">Samedi</option>
            <option value="dimanche">Dimanche</option>
        </select>
        <br>
        <label for="ouverture">Ouverture :</label>
        <input type="time" id="ouverture" name="ouverture" required>
        <br>
        <label for="fermeture">Fermeture :</label>
        <input type="time" id="fermeture" name="fermeture" required>
        <br>
        <input type="submit" value="Mettre à jour">
    </form>

    <h3>Horaires Actuels</h3>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture</th>
            <th>Fermeture</th>
        </tr>  -->
        <!--?php foreach ($horaires as $horaire): ?>
            <tr> -->  <!--
                <td> --> <!--?php echo htmlspecialchars($horaire['jour']); ?></td>  --> <!--
                <td> --> <!--?php echo htmlspecialchars($horaire['ouverture']); ?></td> 
                <td> --> <!--?php echo htmlspecialchars($horaire['fermeture']); ?></td>
            </tr>  -->
        <!--?php endforeach; ?>
    </table>
</body>
</html> -->

<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: login.php');
    exit;
}

require_once '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jour = $_POST['jour'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare('UPDATE horaires SET ouverture = :ouverture, fermeture = :fermeture WHERE jour = :jour');
        $stmt->execute(['ouverture' => $ouverture, 'fermeture' => $fermeture, 'jour' => $jour]);
        $success_message = "Horaires mis à jour avec succès.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Récupérer les horaires actuels
try {
    $conn = get_db_connection();
    $stmt = $conn->prepare('SELECT * FROM horaires');
    $stmt->execute();
    $horaires = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Dashboard Admin</h2>

    <h3>Gérer les horaires</h3>
    <?php if (!empty($success_message)): ?>
        <p style="color:green;"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <form method="post" action="admin_dashboard.php">
        <label for="jour">Jour :</label>
        <select id="jour" name="jour">
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
            <option value="Samedi">Samedi</option>
            <option value="Dimanche">Dimanche</option>
        </select>
        <br>
        <label for="ouverture">Ouverture :</label>
        <input type="time" id="ouverture" name="ouverture" required>
        <br>
        <label for="fermeture">Fermeture :</label>
        <input type="time" id="fermeture" name="fermeture" required>
        <br>
        <input type="submit" value="Mettre à jour">
    </form>

    <h3>Horaires actuels</h3>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture</th>
            <th>Fermeture</th>
        </tr>
        <?php foreach ($horaires as $horaire): ?>
            <tr>
                <td><?php echo $horaire['jour']; ?></td>
                <td><?php echo $horaire['ouverture']; ?></td>
                <td><?php echo $horaire['fermeture']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


<!-------------------------------------------------------------------------------------------------------------------->
<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: login.php');
    exit;
}

require_once 'config.php';

// Ici, vous pouvez ajouter du code pour gérer différentes fonctionnalités administratives
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Dashboard Admin</h2>
    <nav>
        <ul>
            <li><a href="manage_admins.php">Gérer les administrateurs</a></li>
            <li><a href="manage_horaires.php">Gérer les horaires</a></li>
            <!-- Ajoutez d'autres liens pour les fonctionnalités -->
            <li><a href="logout.php">Se déconnecter</a></li>
        </ul>
    </nav>
</body>
</html>
