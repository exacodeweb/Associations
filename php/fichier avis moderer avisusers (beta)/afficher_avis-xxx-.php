<!-- COLLECTER LES AVIS ET LES AFFICHER -->

<?php
// Configurer la connexion à la base de données
$host = 'localhost';
$dbname = 'site_papillons';/*votre_base_de_donnees*/
$username = 'root';/*votre_nom_utilisateur*/
$password = 'G1i9e6t3';/*votre_mot_de_passe*/

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les avis de la base de données
    $stmt = $pdo->query("SELECT nom, message, note, created_at FROM avis ORDER BY created_at DESC");
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis des Utilisateurs</title>
    <link rel="stylesheet" href="../style/contact_style.css">
</head>
<body>
    <h2>Avis des Utilisateurs</h2>
    <div id="avis-list">
        <?php if ($avis): ?>
            <?php foreach ($avis as $avi): ?>
                <div class="avi">
                    <h3><?php echo htmlspecialchars($avi['nom']); ?></h3>
                    <p><?php echo htmlspecialchars($avi['message']); ?></p>
                    <p>Note: <?php echo str_repeat('★', $avi['note']) . str_repeat('☆', 5 - $avi['note']); ?></p>
                    <p>Date: <?php echo htmlspecialchars($avi['created_at']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun avis pour le moment.</p>
        <?php endif; ?>
    </div>
</body>
</html> 