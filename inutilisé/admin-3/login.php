
<?php
session_start();

$users = json_decode(file_get_contents('users.json'), true);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (array_key_exists($username, $users) && password_verify($password, $users[$username])) {
        $_SESSION['username'] = $username;
        header('Location: admin_dashboard.php');
        exit();
    } else {
        $error = 'Nom d’utilisateur ou mot de passe incorrect.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrateur</title>
    <link rel="stylesheet" href="../style/login_style.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion Administrateur</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>

<!--
2. login.php
Page de connexion pour les administrateurs :
-->
