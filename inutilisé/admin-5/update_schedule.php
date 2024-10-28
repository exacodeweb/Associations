
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

<!--
Étape 3 : Mise à jour des horaires avec AJAX
3.1 update_schedule.php
Ce fichier gère les requêtes AJAX pour la mise à jour des horaires.
-->
