<?php
require_once '../../../config-a/config.php';
//config.php
$conn = get_db_connection();
$stmt = $conn->query('SELECT * FROM horaires');
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horaires du Musée</title>
</head>
<body>
    <h2>Horaires du Musée</h2>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture</th>
            <th>Fermeture</th>
        </tr>
        <?php foreach ($horaires as $horaire): ?>
            <tr>
                <td><?php echo htmlspecialchars($horaire['jour']); ?></td>
                <td><?php echo htmlspecialchars($horaire['ouverture']); ?></td>
                <td><?php echo htmlspecialchars($horaire['fermeture']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>