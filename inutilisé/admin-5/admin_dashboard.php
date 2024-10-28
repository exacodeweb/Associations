<!--------------------------------------------------------------------------------------------------------------------->
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

<!--
Étape 2 : Création des pages de connexion et de gestion
2.2 admin_dashboard.php
Page du tableau de bord de l'administrateur pour gérer les horaires.
-->

