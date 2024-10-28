<?php
session_start();
include '../admin/csrf_token_hours.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/admin_login(test-1).php");
    exit;
}

include 'db_connect.php';

$sql = "SELECT * FROM horaires";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <h1>Tableau de Bord Administrateur</h1>
    <h2>Gestion des Horaires</h2>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture</th>
            <th>Fermeture</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["jour"]. "</td><td>" . $row["ouverture"]. "</td><td>" . $row["fermeture"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Aucun horaire trouvé</td></tr>";
        }
        ?>
    </table>

    <h2>Mettre à Jour les Horaires</h2>
    <!--<form method="post" action="update_hours.php">
    <form method="post" action="./update_hours(test-1).php">
    <form method="post" action="../php/horaires/update_hours(test-1).php">-->
    <form method="post" action="../admin/update_horaires(test-1).php">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label for="jour">Jour :</label>
        <input type="text" id="jour" name="jour" required>
        <label for="ouverture">Ouverture :</label>
        <input type="time" id="ouverture" name="ouverture">
        <label for="fermeture">Fermeture :</label>
        <input type="time" id="fermeture" name="fermeture">
        <input type="submit" value="Mettre à jour">
    </form>


    <!--<form action="update_hours(test-1).php" method="post">
    <form action="./update_hours(test-1).php" method="POST">
    <form action="../php/horaires/update_hours(test-1).php">-->
    <form action="../admin/update_horaires(test-1).php">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    Jour : <input type="text" name="jour"><br>
    Ouverture : <input type="time" name="ouverture"><br>
    Fermeture : <input type="time" name="fermeture"><br>
    <input type="submit" value="Mettre à jour">
    </form>


</body>
</html>

<?php
$conn->close();
?>