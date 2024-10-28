<?php
session_start();
$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = "root"; // Remplacez par votre nom d'utilisateur
    $admin_password = "G1i9e6t3"; // Remplacez par votre mot de passe

    // Utilisez htmlspecialchars pour empêcher les injections XSS
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Vérifiez les informations d'identification
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;

        header("Location: "); // Utilisez un chemin relatif correct
        //moderate_comments.php

        exit();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Garage Vincent Parrot vous propose des services auto pour votre véhicule">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/64e89a7edd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <style>
        /* Styles personnalisés pour la page de connexion */
        h1, h2 {
            text-align: center;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f8f9f8;
        }
        .content {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background: #fbfbf9;
            border-radius: 5px;
            box-shadow: 0 0 40px rgba(128, 128, 128, 0.2);
        }
        .form-control {
            width: 100%;
            margin-bottom: 20px;
        }
        .button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: mediumorchid;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
        }
        .button:hover {
            background: rgb(211, 85, 163);
        }
        .breadcrumb-item {
            margin-bottom: 20px;
        }
        @media screen and (max-width: 576px) {
            .content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div class="breadcrumb-item">
    <a href="../pages/sommaire-index.html" class="link-item">Sommaire</a> >
    <a href="../index.html" class="link-item">Accueil</a> > Admin
</div>

<div class="content">
    <h1 class="title-admin">Ailes Enchantées</h1>
    <h2>Connexion Administrateur</h2>
    <form method="post" action="./admin_login.php"><!--modifier--><!--admin_login-test.php-->
        <div class="form-control">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-control">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input class="button" type="submit" value="Se connecter">
        <?php if ($login_error): ?>
            <p style="color: red;"><?php echo $login_error; ?></p>
        <?php endif; ?>
    </form>
</div>

</body>
</html>