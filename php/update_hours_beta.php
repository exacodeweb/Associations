<?php
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['username'])) {
    header('Location: admin_login-test.php');
    exit();
}

$username = $_SESSION['username'];

include '../php/db_connect_horaires.php'; // Modifier db_connect pour test

// Si le formulaire est soumis, mettez à jour les horaires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    foreach ($jours as $jour) {
        $ferme = isset($_POST[strtolower($jour) . '_ferme']) ? 1 : 0;
        $ouverture_matin = $_POST[strtolower($jour) . '_ouverture_matin'] ?? '00:00:00';
        $fermeture_matin = $_POST[strtolower($jour) . '_fermeture_matin'] ?? '00:00:00';
        $ouverture_apresmidi = $_POST[strtolower($jour) . '_ouverture_apresmidi'] ?? '00:00:00';
        $fermeture_apresmidi = $_POST[strtolower($jour) . '_fermeture_apresmidi'] ?? '00:00:00';

        $stmt = $pdo->prepare("UPDATE horaires SET 
            ouverture_matin = :ouverture_matin, 
            fermeture_matin = :fermeture_matin, 
            ouverture_apresmidi = :ouverture_apresmidi, 
            fermeture_apresmidi = :fermeture_apresmidi,
            ferme = :ferme 
            WHERE jour = :jour");

        $stmt->execute([
            ':ouverture_matin' => $ouverture_matin,
            ':fermeture_matin' => $fermeture_matin,
            ':ouverture_apresmidi' => $ouverture_apresmidi,
            ':fermeture_apresmidi' => $fermeture_apresmidi,
            ':ferme' => $ferme,
            ':jour' => $jour
        ]);
    }

    // Redirigez vers la page d'administration après la mise à jour
    header('Location: admin_dashboard-test.php');
    exit();
}

// Récupérez les horaires actuels
$sql = "SELECT * FROM horaires";
$stmt = $pdo->query($sql);
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Horaires</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
</head>
<body>
    <header>
        <h1>Gestion des Horaires</h1>
    </header>
    <nav>
        <ul>
            <li><a href="admin_dashboard-test.php">Retour au Tableau de Bord</a></li>
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
                        <th>Fermé</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                    /*foreach ($jours as $jour) {
                        $ouverture_matin = '';
                        $fermeture_matin = '';
                        $ouverture_apresmidi = '';
                        $fermeture_apresmidi = '';
                        $ferme = 0;
                        foreach ($horaires as $horaire) {
                            if ($horaire['jour'] == $jour) {
                                $ouverture_matin = $horaire['ouverture_matin'];
                                $fermeture_matin = $horaire['fermeture_matin'];
                                $ouverture_apresmidi = $horaire['ouverture_apresmidi'];
                                $fermeture_apresmidi = $horaire['fermeture_apresmidi'];
                                $ferme = $horaire['ferme'];
                                break;
                            }
                        }
                        echo "<tr>
                                <td>$jour</td>
                                <td><input type='time' name='".strtolower($jour)."_ouverture_matin' value='$ouverture_matin'></td>
                                <td><input type='time' name='".strtolower($jour)."_fermeture_matin' value='$fermeture_matin'></td>
                                <td><input type='time' name='".strtolower($jour)."_ouverture_apresmidi' value='$ouverture_apresmidi'></td>
                                <td><input type='time' name='".strtolower($jour)."_fermeture_apresmidi' value='$fermeture_apresmidi'></td>
                                <td><input type='checkbox' name='".strtolower($jour)."_ferme' ".($ferme ? 'checked' : '')."></td>
                              </tr>";
                    }*/

/**/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  foreach ($jours as $jour) {
      $ferme = isset($_POST[strtolower($jour) . '_ferme']) ? 1 : 0; // Vérifie si la case "Fermé" est cochée

      // Si fermé, mettez à jour avec '00:00:00', sinon utilisez les valeurs soumises
      $ouverture_matin = $ferme ? '00:00:00' : $_POST[strtolower($jour) . '_ouverture_matin'];
      $fermeture_matin = $ferme ? '00:00:00' : $_POST[strtolower($jour) . '_fermeture_matin'];
      $ouverture_apresmidi = $ferme ? '00:00:00' : $_POST[strtolower($jour) . '_ouverture_apresmidi'];
      $fermeture_apresmidi = $ferme ? '00:00:00' : $_POST[strtolower($jour) . '_fermeture_apresmidi'];

      // Enregistrez ces valeurs dans la base de données
      $stmt = $pdo->prepare("UPDATE horaires SET 
          ouverture_matin = :ouverture_matin, 
          fermeture_matin = :fermeture_matin, 
          ouverture_apresmidi = :ouverture_apresmidi, 
          fermeture_apresmidi = :fermeture_apresmidi 
          WHERE jour = :jour");

      $stmt->execute([
          ':ouverture_matin' => $ouverture_matin,
          ':fermeture_matin' => $fermeture_matin,
          ':ouverture_apresmidi' => $ouverture_apresmidi,
          ':fermeture_apresmidi' => $fermeture_apresmidi,
          ':jour' => $jour
      ]);
  }
}

/**/
?>
</tbody>
</table>
<button type="submit">Mettre à jour</button>
</form>
