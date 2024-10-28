

<!--------------------------------------------------------------------------------------------------------------------->
<!--Ce fichier gère la logique de connexion.
3. Fichier login.php
Ce fichier gère la connexion de l'administrateur.
-->
<!--?php

session_start();
$config = include('../config/config.php');//../config.php//./php/config.php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $config['username'] && password_verify($password, $config['password'])) {
        $_SESSION['username'] = $username;
        header('Location: ./php/admin_dashboard.php');//correction
        exit();
    } else {
        $error = 'Nom d’utilisateur ou mot de passe incorrect.';
    }
}
?>  -->
<!--------------------------------------------------------------------------------------------------------------------->
<!--?php --------------------------------------------25/06/2024

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require_once './db_connected.php';//../php/db_connect.php//../php/db_connected.php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT password FROM admin WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
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
    <link rel="stylesheet" href="../admin-3/login_style.css">
</head>
<body>    -->
<!--------------------------------------------------------------------------------------------------------------------->


    <!--<div class="login-container">
      <section class="content">
        <h2>Connexion Administrateur</h2>  -->
        <!--?php if (isset($error)): ?>
            <div class="error"> --> <!--?php echo $error; ?></div> -->
        <!--?php endif; ?>
        <form method="post" action="login.php">  --> <!--correction-->  <!--
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
      </section>
    </div>-->
<!--------------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------------------------25/06/2024
<div class="login-container">
        <h2>Connexion Administrateur</h2>                     -->
        <!--?php if (isset($error)): ?>
            <div class="error"> -->  <!--?php echo $error; ?></div> -->
        <!--?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>


</body>
</html>  -->
<!--------------------------------------------------------------------------------------------------------------------->

<!--
// test: http://localhost/Mon_projet/php/login.php
//root
//G1i9e6t3
//$2y$10$Kw3U0mst4EF/48OgHbGZYOxwkJcwS9WL97pMDWi6j1K/YTKfQl6ES
//MotDePasseAdmin2024!
//A9d@7Kb#zX3!qLm
-->


<!--------------------------------------------------------------------------------------------------------------------->

<?php
session_start();
require './db_connected.php'; // Inclure le fichier de connexion à la base de données

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour récupérer les informations de l'utilisateur
    $stmt = $pdo->prepare('SELECT * FROM admin WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    if ($user && password_verify($password, $user['password'])) {
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
    <link rel="stylesheet" href="../admin-0/login_style.css"><!--../admin-3/login_style.css-->
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
