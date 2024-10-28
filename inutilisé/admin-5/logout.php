
<?php
session_start();
session_destroy();
header('Location: login.php');
exit();
?>

<!--

Pour créer un espace administrateur où l'administrateur peut se connecter et gérer différentes choses comme les horaires, nous allons utiliser PHP pour la gestion des sessions et des connexions, ainsi que JavaScript (AJAX) pour permettre la mise à jour des horaires sans recharger la page.

Étape 1 : Configuration de base
1.1 config.php
Ce fichier contiendra les informations de connexion pour l'administrateur.

php
Copier le code
<?php
return [
    'username' => 'admin', // Remplacez par votre nom d'utilisateur
    'password' => password_hash('adminpassword', PASSWORD_DEFAULT) // Remplacez par votre mot de passe
];
?>
Étape 2 : Création des pages de connexion et de gestion
2.1 login.php
Page de connexion pour l'administrateur.

php
Copier le code
<?php
session_start();
$config = include('config.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $config['username'] && password_verify($password, $config['password'])) {
        $_SESSION['admin'] = true;
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
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="style/login_style.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion Admin</h2>
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
2.2 admin_dashboard.php
Page du tableau de bord de l'administrateur pour gérer les horaires.

php
Copier le code
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

$days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="style/admin_style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.update-schedule').click(function() {
                var day = $(this).data('day');
                var morning = $('#morning_' + day).val();
                var afternoon = $('#afternoon_' + day).val();
                $.ajax({
                    url: 'update_schedule.php',
                    type: 'POST',
                    data: {
                        day: day,
                        morning: morning,
                        afternoon: afternoon
                    },
                    success: function(response) {
                        alert(response);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Tableau de Bord Administrateur</h1>
    <a href="logout.php">Déconnexion</a>

    <h2>Gérer les horaires</h2>
    <div class="schedule-container">
        <?php foreach ($days as $day): ?>
            <div class="day-schedule">
                <h3><?php echo ucfirst($day); ?></h3>
                <label for="morning_<?php echo $day; ?>">Matin :</label>
                <input type="text" id="morning_<?php echo $day; ?>" name="morning_<?php echo $day; ?>">
                <label for="afternoon_<?php echo $day; ?>">Après-midi :</label>
                <input type="text" id="afternoon_<?php echo $day; ?>" name="afternoon_<?php echo $day; ?>">
                <button class="update-schedule" data-day="<?php echo $day; ?>">Mettre à jour</button>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
Étape 3 : Mise à jour des horaires avec AJAX
3.1 update_schedule.php
Ce fichier gère les requêtes AJAX pour la mise à jour des horaires.

php
Copier le code
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo 'Accès refusé.';
    exit();
}

if (isset($_POST['day']) && isset($_POST['morning']) && isset($_POST['afternoon'])) {
    $day = $_POST['day'];
    $morning = $_POST['morning'];
    $afternoon = $_POST['afternoon'];

    $schedules = [];
    if (file_exists('schedules.json')) {
        $schedules = json_decode(file_get_contents('schedules.json'), true);
    }

    $schedules[$day] = [
        'morning' => $morning,
        'afternoon' => $afternoon
    ];

    file_put_contents('schedules.json', json_encode($schedules));
    echo 'Horaires mis à jour pour ' . ucfirst($day) . '.';
} else {
    echo 'Données manquantes.';
}
?>
Étape 4 : Déconnexion
4.1 logout.php
Script de déconnexion pour l'administrateur.
-->
