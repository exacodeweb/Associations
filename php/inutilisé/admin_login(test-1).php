<?php
session_start();
include './csrf_token(test-1).php';
$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!hash_equals($_SESSION['csrf_token(test-1)'], $_POST['csrf_token(test-1)'])) {
        die("Erreur CSRF");
    }

    $admin_username = "root"; // à remplacer par votre nom d'utilisateur
    $admin_password = "G1i9e6t3"; // à remplacer par votre mot de passe

    if ($_POST['username'] == $admin_username && $_POST['password'] == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        //header("Location: ./admin_dashboard(test-1).php");
        header("Location: ./php/admin_dashboard.php");
        exit;
    } else {
        $login_error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <!--<form method="post" action="admin_login.php">-->
    <form method="post" action="../php/admin_login(test-1).php"> 
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Se connecter">
        <p style="color: red;"><?php echo $login_error; ?></p>
    </form>
</body>
</html>