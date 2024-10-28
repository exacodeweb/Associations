
<!-- 6. Gestion des Administrateurs -->
<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: ./login.php');//../php/login.php
    exit;
}

require_once '../../../config-a/config.php';

// Gestion des modifications de l'administrateur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['new_username']) && isset($_POST['new_password'])) {
        $new_username = $_POST['new_username'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare('INSERT INTO admins (username, password) VALUES (:username, :password)');
            $stmt->execute(['username' => $new_username, 'password' => $new_password]);
            $success_message = "Nouvel administrateur ajouté avec succès.";
        } catch (PDOException $e) {
            $error_message = "Erreur : " . $e->getMessage();
        }
    }

    if (isset($_POST['change_username']) && isset($_POST['change_password'])) {
        $change_username = $_POST['change_username'];
        $change_password = password_hash($_POST['change_password'], PASSWORD_DEFAULT);

        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare('UPDATE admins SET password = :password WHERE username = :username');
            $stmt->execute(['username' => $change_username, 'password' => $change_password]);
            $success_message = "Mot de passe modifié avec succès.";
        } catch (PDOException $e) {
            $error_message = "Erreur : " . $e->getMessage();
        }
    }

    if (isset($_POST['delete_username'])) {
        $delete_username = $_POST['delete_username'];

        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare('DELETE FROM admins WHERE username = :username');
            $stmt->execute(['username' => $delete_username]);
            $success_message = "Administrateur supprimé avec succès.";
        } catch (PDOException $e) {
            $error_message = "Erreur : " . $e->getMessage();
        }
    }
}

// Récupérer la liste des administrateurs
try {
    $conn = get_db_connection();
    $stmt = $conn->prepare('SELECT username FROM admins');
    $stmt->execute();
    $admins = $stmt->fetchAll();
} catch (PDOException $e) {
    $error_message = "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les administrateurs</title>
</head>
<body>
    <h2>Gérer les administrateurs</h2>

    <?php if (!empty($success_message)): ?>
        <p style="color:green;"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (!empty($error_message)): ?>
        <p style="color:red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <h3>Ajouter un nouvel administrateur</h3>
    <form method="post" action="./manage_admins.php">
        <label for="new_username">Nom d'utilisateur :</label>
        <input type="text" id="new_username" name="new_username" required>
        <br>
        <label for="new_password">Mot de passe :</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <input type="submit" value="Ajouter">
    </form>

    <h3>Modifier le mot de passe</h3>
    <form method="post" action="./manage_admins.php">
        <label for="change_username">Nom d'utilisateur :</label>
        <input type="text" id="change_username" name="change_username" required>
        <br>
        <label for="change_password">Nouveau mot de passe :</label>
        <input type="password" id="change_password" name="change_password" required>
        <br>
        <input type="submit" value="Modifier">
    </form>

    <h3>Supprimer un administrateur</h3>
    <form method="post" action="./manage_admins.php">
        <label for="delete_username">Nom d'utilisateur :</label>
        <input type="text" id="delete_username" name="delete_username" required>
        <br>
        <input type="submit" value="Supprimer">
    </form>

    <h3>Liste des administrateurs</h3>
    <ul>
        <?php foreach ($admins as $admin): ?>
            <li><?php echo $admin['username']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>