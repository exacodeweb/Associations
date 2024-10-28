
<!-- 7. Gestion des Horaires -->
<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: ./login.php');//..php/login.php
    exit;
}

require_once '../../../config-a/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_hours = $_POST['hours'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare('UPDATE horaires SET heures_ouverture = :hours');
        $stmt->execute(['hours' => $new_hours]);
        $success_message = "Horaires mis à jour avec succès.";
    } catch (PDOException $e) {
        $error_message = "Erreur : " . $e->getMessage();
    }
}

try {
    $conn = get_db_connection();
    $stmt = $conn->prepare('SELECT heures_ouverture FROM horaires');
    $stmt->execute();
    $current_hours = $stmt->fetchColumn();
} catch (PDOException $e) {
    $error_message = "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les horaires</title>
</head>
<body>
    <h2>Gérer les horaires</h2>

    <?php if (!empty($success_message)): ?>
        <p style="color:green;"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (!empty($error_message)): ?>
        <p style="color:red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="post" action="./manage_horaires.php"><!--manage_horaire.php-->
        <label for="hours">Nouveaux horaires :</label>
        <input type="text" id="hours" name="hours" value="<?php echo htmlspecialchars($current_hours); ?>" required>
        <br>
        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
