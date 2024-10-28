
<!--------------------------------------------------------------------------------------------------------------------->
<!--?php
session_start();
require_once '../../../config-a/config.php';  // Assurez-vous que le chemin est correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare('SELECT * FROM admins WHERE username = :username'); // Assurez-vous que la table et les colonnes existent
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form method="post" action="">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>  -->
    <!--?php if (!empty($error_message)): ?>
        <p style="color:red;"> --><!--?php echo $error_message; ?></p>  -->
    <!--?php endif; ?>
</body>
</html>-->

<!--------------------------------------------------------------------------------------------------------------------->

<!--?php
session_start();
require_once '../../config-a/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare('SELECT * FROM admins WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form method="post" action="./login.php"> -->  <!--./login.php-->  <!--
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>  -->
    <!-- ?php if (!empty($error_message)): ?>  --> <!--
        <p style="color:red;"> --> <!--?php echo $error_message; ?></p> -->
    <!--?php endif; ?>
</body>
</html>-->

<!--------------------------------------------------------------------------------------------------------------------->

<!-- fichier connexion administrateur -->
<!--?php
session_start();
require_once '../../../config-a/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare('SELECT * FROM admins WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>

    <h2>Login Admin</h2>
    <form method="post" action="./login.php">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form> -->
    <!--?php if (!empty($error_message)): ?>
        <p style="color:red;"> --> <!--?php echo $error_message; ?></p> -->
    <!--?php endif; ?>

</body>
</html>  -->

<!--?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare('SELECT * FROM admins WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>-->

<!--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form method="post" action="login.php">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>  -->
    <!--?php if (!empty($error_message)): ?>
        <p style="color:red;"> --> <!--?php echo $error_message; ?></p>  -->
    <!--?php endif; ?>
</body>
</html>  -->



<!--------------------------------------------------------------------------------------------------------------------->
<?php
session_start();
require_once '../../../config-a/config.php';//config.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare('SELECT * FROM admins WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form method="post" action="./login.php">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>
    <?php if (!empty($error_message)): ?>
        <p style="color:red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>
