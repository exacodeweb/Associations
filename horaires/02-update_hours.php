<?php
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['username'])) {
    header('Location: admin_login-horaires.php');
    exit();
}

include './db_connect_horaires.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
    
    $sql = "UPDATE horaires SET 
                ouverture_matin = :ouverture_matin,
                fermeture_matin = :fermeture_matin,
                ouverture_apresmidi = :ouverture_apresmidi,
                fermeture_apresmidi = :fermeture_apresmidi
            WHERE jour = :jour";
    
    $stmt = $pdo->prepare($sql);

    foreach ($jours as $jour) {
        $ouverture_matin = $_POST[$jour . '_ouverture_matin'] ?? '00:00:00';
        $fermeture_matin = $_POST[$jour . '_fermeture_matin'] ?? '00:00:00';
        $ouverture_apresmidi = $_POST[$jour . '_ouverture_apresmidi'] ?? '00:00:00';
        $fermeture_apresmidi = $_POST[$jour . '_fermeture_apresmidi'] ?? '00:00:00';

        $stmt->execute([
            ':ouverture_matin' => $ouverture_matin,
            ':fermeture_matin' => $fermeture_matin,
            ':ouverture_apresmidi' => $ouverture_apresmidi,
            ':fermeture_apresmidi' => $fermeture_apresmidi,
            ':jour' => ucfirst($jour)
        ]);
    }

    // Rediriger après mise à jour
    header('Location: ../admin/admin_dashboard.php');
    exit();
}

// Récupération des horaires
$sql = "SELECT * FROM horaires";
$stmt = $pdo->query($sql);
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Horaires</title>
    <link rel="stylesheet" href="./admin-horaires_style.css">
</head>
<body>
    <header>
        <h1>Gestion des Horaires</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../../php/admin/admin_dashboard.php">Retour au Tableau de Bord</a></li>
        </ul>
    </nav>
    <main>
        <h2>Gérer les Horaires</h2>
        <form method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Ouverture Matin</th>
                        <th>Fermeture Matin</th>
                        <th>Ouverture Après-midi</th>
                        <th>Fermeture Après-midi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
                    foreach ($jours as $jour) {
                        $ouverture_matin = '';
                        $fermeture_matin = '';
                        $ouverture_apresmidi = '';
                        $fermeture_apresmidi = '';
                        foreach ($horaires as $horaire) {
                            if (strtolower($horaire['jour']) == $jour) {
                                $ouverture_matin = $horaire['ouverture_matin'];
                                $fermeture_matin = $horaire['fermeture_matin'];
                                $ouverture_apresmidi = $horaire['ouverture_apresmidi'];
                                $fermeture_apresmidi = $horaire['fermeture_apresmidi'];
                                break;
                            }
                        }
                        echo "<tr>
                                <td>" . ucfirst($jour) . "</td>
                                <td><input type='time' name='$jour" . "_ouverture_matin' value='$ouverture_matin'></td>
                                <td><input type='time' name='$jour" . "_fermeture_matin' value='$fermeture_matin'></td>
                                <td><input type='time' name='$jour" . "_ouverture_apresmidi' value='$ouverture_apresmidi'></td>
                                <td><input type='time' name='$jour" . "_fermeture_apresmidi' value='$fermeture_apresmidi'></td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button class="button_submit" type="submit">Mettre à jour les horaires</button>
        </form>
    </main>
    <style>
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</body>
</html>
