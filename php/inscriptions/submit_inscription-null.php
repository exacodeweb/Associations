<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscriptions</h1>
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "calendar";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupération des données d'inscription
    $sql = "SELECT event_title, date, name, email FROM inscriptions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Événement</th><th>Date</th><th>Nom</th><th>Email</th></tr>";
        while($row = $result->fetch_assoc()) {
            // Formatage de la date pour l'affichage
            $formatted_date = date('d-m-y', strtotime($row['date']));
            echo "<tr><td>" . $row['event_title'] . "</td><td>" . $formatted_date . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 résultats";
    }

    $conn->close();
    ?>
</body>
</html>