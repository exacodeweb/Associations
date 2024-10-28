<!--
3. Création d'une page pour afficher les horaires
Créez un fichier horaires.php pour afficher les horaires.
-->


<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<?php
include 'db_connect_horaires.php';//modifier db_connect pour test 28/06/2024

$sql = "SELECT * FROM horaires";
$result = $pdo->query($sql);

$horaires = [];
if ($result->rowCount() > 0) {
    $horaires = $result->fetchAll(PDO::FETCH_ASSOC);
}

$pdo = null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Horaires</title>
    <link rel="stylesheet" href="../styles/styles.css">

<style>
  th {
    background-color: #F2F2F2;
  }
  .cel {
    text-align: center;
  }
</style>

</head>
<body>



    <h1>Horaires d'Ouverture</h1>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture Matin</th>
            <th>Fermeture Matin</th>
            <th>Ouverture Après-midi</th>
            <th>Fermeture Après-midi</th>
        </tr>
        <?php if (!empty($horaires)): ?>
            <?php foreach ($horaires as $horaire): ?>
                <tr>
                    <td><?php echo htmlspecialchars($horaire['jour']); ?></td>
                    <td class="cel"><?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
                    <td class="cel"><?php echo ($horaire['fermeture_matin'] == '00:00:00' && $horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
                    <td class="cel"><?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
                    <td class="cel"><?php echo ($horaire['fermeture_apresmidi'] == '00:00:00' && $horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun horaire trouvé</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>

<!--------------------------------------------------------------------------------------------------------------------->
<style>
  @media screen  and (max-width: 576px) {/*and (min-width: 320px)*/
    /*20/06/2024 .aside {
      padding: 0px;
      margin-top: 10px;
    }*/

    table, tr, td {
      display: flex;
      flex-direction: column;
      height: auto;
    }
  }
</style>
