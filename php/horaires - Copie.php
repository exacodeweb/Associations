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



  @media screen and (max-width: 376px) {
     table, td, th  {
    width: 80% !important;
  } 
  }
  @media screen and (max-width: 576px) {
     table {
    width: 90% !important;
  } 
  }

  table {
    width: 50% !important;
    

  } 

  td, th {
    width: auto !important;

  }

.content {
    display: flex;
    flex-direction: column;
    width: 100%;
    margin: 20px 0;
    justify-content: center;
    align-items: center;
}
.main {
    flex-direction: column;
    width: 100%;
    background: #fbfbf9;
    align-items: center;
    border-radius: 5px;
    box-shadow: 0 0 40px rgba(128, 128, 128, 0.2);
    display: flex;
    justify-content: center;
    align-content: center;

} 




</style>

</head>
<body>
 

<div class="content">
        <!--MAIN-->
        <div class="main">

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

        </div>
      </div>

</body>
</html>
