<?php
include 'db_connect.php'; // Assurez-vous que ce fichier se connecte à la base de données `site_papillons`

// Requête pour récupérer les horaires depuis la table `horaires`
$sql = "SELECT * FROM horaires";
$stmt = $pdo->query($sql);
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Horaires d'Ouverture</title>
    <link rel="stylesheet" href="../styles/style.css"><!-- path/to/your/styles.css --> <!-- Mettez à jour le chemin vers votre fichier CSS -->
</head>
<body>
    <h4 class="sub-title-h4">Horaires d'Ouverture</h4>
    <table border="1">
        <tr>
            <th class="hre">Jour</th>
            <th class="hre">Ouverture<br> Matin</th>
            <th class="hre">Fermeture<br> Matin</th>
            <th class="hre">Ouverture<br> Après-midi</th>
            <th class="hre">Fermeture<br> Après-midi</th>
        </tr>
        <?php if (!empty($horaires)): ?>
            <?php foreach ($horaires as $horaire): ?>
                <tr>
                    <td><?php echo htmlspecialchars($horaire['jour']); ?></td>
                    <!--<td class="cel">--><!--?php echo $horaire['ferme'] ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
                    <td class="cel">--><!--?php echo $horaire['ferme'] ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
                    <td class="cel">--><!--?php echo $horaire['ferme'] ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
                    <td class="cel">--><!--?php echo $horaire['ferme'] ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td> 
                    -->
                
                    <td class="cel"><?php echo ($horaire['ferme']) ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
                    <td class="cel"><?php echo ($horaire['ferme']) ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
                    <td class="cel"><?php echo ($horaire['ferme']) ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
                    <td class="cel"><?php echo ($horaire['ferme']) ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
                                    
                
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