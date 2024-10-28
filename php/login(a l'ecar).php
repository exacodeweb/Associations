<!--?php
session_start();
require './db_connected.php'; // Inclure le fichier de connexion à la base de données  db_connected.php

//require_once __DIR__ . './db_connect.php';//'/../db_connect.php'

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour récupérer les informations de l'utilisateur
    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header('Location: ./admin_dashboard.php');//
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
    <link rel="stylesheet" href="../admin-0/login_style.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion Administrateur</h2> -->
        <!--?php if (isset($error)): ?>  
            <div class="error"> --> <!--?php echo $error; ?></div>  -->
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
</html> -->





<!--?php
session_start();
require_once './db_connected.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
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
    <link rel="stylesheet" href="../admin-0/login_style.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion Administrateur</h2> -->
        <!--?php if (isset($error)): ?>
            <div class="error">  --> <!--?php echo $error; ?></div>  -->
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
</html> -->

<!-- DEBOGAGE -->



<!--------------------------------------------------------------------------------------------------------------------->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

//require_once __DIR__ . '/../php/db_connect.php';
require_once './db_connected.php'; // Assurez-vous que le chemin est correct

echo "Point de débogage 1: Connexion à la base de données réussie.<br>";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "Point de débogage 2: Données reçues - Username: $username, Password: $password<br>";

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Point de débogage 3: Requête exécutée.<br>";

    if ($user) {
        echo "Point de débogage 4: Utilisateur trouvé.<br>";
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo "Point de débogage 5: Connexion réussie.<br>";
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Point de débogage 6: Mot de passe incorrect.<br>";
        }
    } else {
        echo "Point de débogage 7: Utilisateur non trouvé.<br>";
    }

    $error = 'Nom d’utilisateur ou mot de passe incorrect.';
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

