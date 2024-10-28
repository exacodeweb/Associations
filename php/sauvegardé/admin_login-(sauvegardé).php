<?php
session_start();
$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = "root"; // à remplacer par votre nom d'utilisateur //admin
    $admin_password = "G1i9e6t3"; // à remplacer par votre mot de passe //password

    if ($_POST['username'] == $admin_username && $_POST['password'] == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../php/moderate_comments.php");
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
</head>
<body>
    <h2>Connexion Administrateur</h2>
    <form method="post" action="admin_login.php">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Se connecter">
    </form>
    <p style="color: red;"><?php echo $login_error; ?></p>
</body>
</html>

<!------------------------------------------------------------------------------------------------->
<?php
session_start();
$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = "root"; // à remplacer par votre nom d'utilisateur //admin
    $admin_password = "G1i9e6t3"; // à remplacer par votre mot de passe //password

    if ($_POST['username'] == $admin_username && $_POST['password'] == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../php/moderate_comments.php");
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
</head>
<body>
    <h2>Connexion Administrateur</h2>
    <form method="post" action="admin_login.php">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Se connecter">
    </form>
    <p style="color: red;"><?php echo $login_error; ?></p>
</body>
</html>

<!---------------------------------------------------------------------------------------------------------------->

<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$login_error = '';


session_start();
$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = getenv('root'); // à remplacer par votre nom d'utilisateur //ADMIN_USERNAME
    $admin_password = getenv('G1i9e6t3'); // à remplacer par votre mot de passe //ADMIN_PASSWORD

    if ($_POST['username'] == $admin_username && password_verify($_POST['password'], $admin_password)) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../php/moderate_comments.php");
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
</head>
<body>
    <h2>Connexion Administrateur</h2>
    <form method="post" action="admin_login.php">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Se connecter">
    </form>
    <p style="color: red;"><?php echo $login_error; ?></p>
</body>
</html>
