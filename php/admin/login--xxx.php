<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'db_connect.php'; 

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: admin_dashboard.php');
            exit();
        } else {
            $error = 'Nom d’utilisateur ou mot de passe incorrect.';
        }
    } else {
        $error = 'Nom d’utilisateur ou mot de passe incorrect.';
    }
}
?>



<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once './db_connect.php'; 

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: ./admin_dashboard.php');
            exit();
        } else {
            $error = 'Nom d’utilisateur ou mot de passe incorrect.';
        }
    } else {
        $error = 'Nom d’utilisateur ou mot de passe incorrect.';
    }
}
?>-->



