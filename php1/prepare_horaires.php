<?php
include 'get_horaires.php';

function formatHoraire($horaire) {
    return ($horaire === '00:00:00') ? 'Fermé' : date("H:i", strtotime($horaire));
}

foreach ($horaires as &$horaire) {
    $horaire['Ouverture_Matin'] = formatHoraire($horaire['Ouverture_Matin']);
    $horaire['Fermeture_Matin'] = formatHoraire($horaire['Fermeture_Matin']);
    $horaire['Ouverture_Apres_Midi'] = formatHoraire($horaire['Ouverture_Apres_Midi']);
    $horaire['Fermeture_Soir'] = formatHoraire($horaire['Fermeture_Soir']);
}
?>
<!-- prepare_horaires.php : Fichier pour la préparation des données des horaires (par exemple, formatage). -->