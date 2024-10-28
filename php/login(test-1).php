<!-- DEBOGAGE -->
<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>-->


<!--------------------------------------------------------------------------------------------------------------------->
<!-- 4. Page de Connexion Administrateur -->
<?php
session_start();

// verifier que les données sont envoyer au formulaire
//<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//session_start();
//var_dump($_POST);


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
            header('Location: ./admin_dashboard.php');//../php/admin_dashboard.php
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
    <form method="post" action="./login(test-1).php"><!-- login.php ./login.php -->
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

<!--------------------------------------------------------------------------------------------------------------------->

<?php
session_start();
$users = [
    'admin' => 'admin',  // Remplacez par votre méthode d'authentification sécurisée
];

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (array_key_exists($username, $users) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header('Location: ./admin_dashboard.php');
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
        <form method="post" action="login-test-1=.php">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
