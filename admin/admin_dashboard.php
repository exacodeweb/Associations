<?php
session_start();

if (!isset($_SESSION['username'])) {
    error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
    header('Location: index.php');
    exit();
}

error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);

$username = $_SESSION['username'];

// Inclure le fichier de connexion à la base de données ! c'est db-connect.php pas db_connect.php
// Connexion à la base de données
include('db-connect.php');

// Récupération des statistiques
$sql_users = "SELECT COUNT(*) AS total_users FROM user_feedback";//users // Assurez-vous que le nom de la table est correct
$sql_comments = "SELECT COUNT(*) AS total_comments FROM comments";
$sql_events = "SELECT COUNT(*) AS total_events FROM inscriptions";//events
$sql_contacts = "SELECT COUNT(*) AS total_contacts FROM contacts";

$result_users = $pdo->query($sql_users)->fetch(PDO::FETCH_ASSOC);
$result_comments = $pdo->query($sql_comments)->fetch(PDO::FETCH_ASSOC);
$result_events = $pdo->query($sql_events)->fetch(PDO::FETCH_ASSOC);
$result_contacts = $pdo->query($sql_contacts)->fetch(PDO::FETCH_ASSOC);

$total_users = $result_users['total_users'];
$total_comments = $result_comments['total_comments'];
$total_events = $result_events['total_events'];
$total_contacts = $result_contacts['total_contacts'];


//-- courbe Nr des visiteurs --//
  // Récupération des visiteurs par jour
  //$sql_visitors = "SELECT DATE(visit_date) as visit_date, COUNT(*) as visitor_count FROM visitors GROUP BY DATE(visit_date) ORDER BY visit_date";
  //$result_visitors = $pdo->query($sql_visitors)->fetchAll(PDO::FETCH_ASSOC);

  //$dates = [];
  //$visitor_counts = [];
  //foreach ($result_visitors as $row) {
      //$dates[] = $row['visit_date'];
      //$visitor_counts[] = $row['visitor_count'];
  //}
  //------------------------------//

// Récupération des commentaires par type
//$sql_comments_type = "SELECT type, COUNT(*) as count FROM comments GROUP BY type";
//$result_comments_type = $pdo->query($sql_comments_type)->fetchAll(PDO::FETCH_ASSOC);

//$comment_types = [];
//$comment_counts = [];
//foreach ($result_comments_type as $row) {
    //$comment_types[] = $row['type'];
    //$comment_counts[] = $row['count'];
//}
//--------------------------------//

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        header {
            margin-bottom: 80px;
        }
        .title {
            font-size: xx-large;
            color: #d94350;
        }
        h1 {
            text-align: center;
        }/*
        section {
            display: flex;
            flex: 250px;
            flex-direction: row;
            justify-content: space-around;
            width: 100%;
        }
        .box-1, .box-2, .box-3 {
            display: flex;
            flex-direction: column;
            height: 90px;
            width: 250px;
            padding: 5px;
        }
        .box-1 {
            background-color: greenyellow;
        }
        .box-2 {
            background-color: coral;
        }
        .box-3 {
            background-color: #D0D3D4;
        }
        .statistics {
            margin-top: 20px;
            text-align: center;
        }*/
    </style>



<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        /*header {
            background-color: #d94350;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 40px;
        }*/
        .title {
            font-size: xx-large;
            margin: 0;
        }
        main {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        section {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .box-1, .box-2, .box-3 {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            margin: 0 10px;
            border-radius: 5px;
            text-align: center;
        }
        .statistics {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .statistics h2 {
            margin-top: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin: 10px 0;
        }
        a.nav-link {
            text-decoration: none;
            color: #d94350;
            font-weight: bold;
        }
    </style>

</head>
<body>
    <header>
        <div class="title">Ailes-enchantées</div>
        <h1>Bienvenue Administrateur<!--<br> ailes-enchantées-->
    </header>
    <main>
        <section>
            <div class="box-1">
                <ul>
                    <li><a class="nav-link" href="../blog/moderate_comments.php">Modérer les avis blog</a></li>
                    <li><a class="nav-link" href="../ratings_feedback/moderate_comments.php">Modérer les avis utilisateur</a></li>
                    <li><a class="nav-link" href="../ratings_feedback/check_images.php">Vérifier les images de profil</a></li>
                </ul>
            </div>
            <div class="box-2">
                <ul>
                    <li><a class="nav-link" href="../horaires/update_hours.php">Gérer les horaires</a></li>
                </ul>
            </div>
            <div class="box-3">
                <ul>
                    <li><a class="nav-link" href="#">Créer un Évènement</a></li>
                    <li><a class="nav-link" href="#">Modifier un Évènement</a></li>
                    <li><a class="nav-link" href="#">Supprimer un Évènement</a></li>
                </ul>
            </div>
        </section>

      <!-- Tableaux -->
        <section>
            <div class="statistics">
                <h2>Statistiques du site</h2>
                <p>Nombre total d'avis utilisateurs <?php echo $total_users; ?></p><!-- Nombre total d'utilisateurs : -->
                <p>Nombre total commentaires <?php echo $total_comments; ?></p><!-- Nombre total de commentaires : -->
                <p>Nombre total d'inscriptions <?php echo $total_events; ?></p><!-- Nombre total d'événements : -->
                <p>Nombre total de contacts <?php echo $total_contacts; ?></p>
              </div>
        </section>

<!-- Tableaux courbe analyse--> 
 <!--
<section>
            <div class="chart-container">
                <canvas id="visitorChart"></canvas>
            </div>
        </section>
    </main>
    <script>
        var ctx = document.getElementById('visitorChart').getContext('2d');
        var visitorChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <!-?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Nombre de visiteurs',
                    data: <!-?php echo json_encode($visitor_counts); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nombre de visiteurs'
                        }
                    }
                }
            }
        });
    </script>
                -->
<!--/////////////////////////////////////-->
<!--Ajouter le code HTML pour le diagramme circulaire : -->
<!--
<section>
    <div class="chart-container">
        <canvas id="commentsChart"></canvas>
    </div>
</section>

<script>
    var ctxComments = document.getElementById('commentsChart').getContext('2d');
    var commentsChart = new Chart(ctxComments, {
        type: 'pie',
        data: {
            labels: <!?php echo json_encode($comment_types); ?>,
            datasets: [{
                label: 'Commentaires par type',
                data: <!?php echo json_encode($comment_counts); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>  -->
<!--/////////////////////////////////////////-->












<!--Ajouter DataTables :
Ajoutez les liens vers les fichiers CSS et JS de DataTables dans votre fichier HTML (admin_dashboard.php).

html
Copier le code-->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">-->
<!--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>-->
<!--Créer un tableau HTML pour les utilisateurs :-->
<!--
<section>
    <div class="table-container">
        <table id="usersTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                </tr>
            </thead>
            <tbody>
                <!-?php
                $sql_users_details = "SELECT id, name, email, registration_date FROM users";
                $result_users_details = $pdo->query($sql_users_details)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result_users_details as $user) {
                    echo "<tr>
                            <td>{$user['id']}</td>
                            <td>{$user['name']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['registration_date']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>  -->
<!-- Initialiser DataTables avec JavaScript : --> <!--
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable();
    });
</script>
  -->

<!-- TABLAUX COLONNE Dans admin_dashboard.php --> <!--
<script src="../js/chart.min.js"></script>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> -->


<!-- tableaux dynamiques --> <!--
<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.js"></script>  -->
<!--//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css-->
<!--//cdn.datatables.net/2.1.3/js/dataTables.min.js-->  <!--

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>                                -->
        <!-- Autres lignes de données -->   <!--
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>  -->



  <!-- systeme de notification -->  <!--
  <script>
    function notifyAdmin(message) {
        var notification = document.createElement('div');
        notification.className = 'notification';
        notification.innerText = message;
        document.body.appendChild(notification);
        setTimeout(function() {
            notification.remove();
        }, 5000);
    }
    
    // Exemple d'utilisation
    notifyAdmin('Nouveau commentaire ajouté.');
</script>
<style>
    .notification {
        position: fixed;
        bottom: 10px;
        right: 10px;
        background-color: #444;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }
</style>  -->


  <!-- fonctionnalités de recherche et de filtrage pour faciliter la gestion des utilisateurs, 
   des commentaires et des événements. 
  -->     <!--
  <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Rechercher...">
<table id="userTable">  -->
    <!-- Contenu du tableau -->  <!--
</table>  -->
    <!--
<script>
    function filterTable() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("userTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                } 
            }
        }
    }
</script>  -->

    
 <!-- Formulaire d'ajout/modification : -->
<!-- Dans admin_dashboard.php -->       <!--
<form id="userForm" action="admin_dashboard.php" method="post">
    <input type="text" name="username" placeholder="Nom d'utilisateur">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <button type="submit">Ajouter/Modifier</button>
</form>   -->

<!-- Gestion côté serveur : -->  <!--
<script>
php
Copier le code
// admin_dashboard.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Connexion à la base de données
    include 'db_connect.php';

    // Ajouter ou modifier l'utilisateur
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')
            ON DUPLICATE KEY UPDATE email='$email', password='$password'";
    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur ajouté/modifié avec succès";
    } else {
        echo "Erreur : " . $conn->error;
    }

    $conn->close();
}
</script>
 -->


 <!-- fonctionnalités de recherche et de filtrage avec DataTables. --> <!--
 <table id="userTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom d'utilisateur</th>
            <th>Email</th>
            <th>Date de création</th>
        </tr>
    </thead>
    <tbody>
        <!-?php
        // Récupération des utilisateurs
        $sql_users = "SELECT id, username, email, created_at FROM user_feedback"; // Assurez-vous que le nom de la table est correct
        $result_users = $pdo->query($sql_users);

        while ($user = $result_users->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['username']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>{$user['created_at']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table> -->

<!--<script>
$(document).ready( function () {
    $('#userTable').DataTable({
        "searching": true, // Active la recherche
        "paging": true,    // Active la pagination
        "info": true       // Affiche des informations sur le tableau 
    });
});
</script> -->

    <!--<nav>-->
        <ul>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    <!--</nav>-->

    </main>

</body>
</html>












<!--?php
session_start();

if (!isset($_SESSION['username'])) {
    error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
    header('Location: index.php');
    exit();
}

error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);

$username = $_SESSION['username'];

// Connexion à la base de données
$servername = "localhost";
$username_db = "root"; // Remplacez par votre nom d'utilisateur de la base de données
$password_db = "G1i9e6t3"; // Remplacez par votre mot de passe de la base de données
$dbname = "site_papillons"; // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des statistiques
$sql_users = "SELECT COUNT(*) AS total_users FROM user_feedback"; // Assurez-vous que le nom de la table est correct
$sql_comments = "SELECT COUNT(*) AS total_comments FROM comments";
$sql_events = "SELECT COUNT(*) AS total_events FROM events";

$result_users = $conn->query($sql_users);
$result_comments = $conn->query($sql_comments);
$result_events = $conn->query($sql_events);

$total_users = $result_users->fetch_assoc()['total_users'];
$total_comments = $result_comments->fetch_assoc()['total_comments'];
$total_events = $result_events->fetch_assoc()['total_events'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
</head>
<body>
    <header>
        <div class="title">Ailes-enchantées</div>
        <h1>Bienvenue Administrateur  -->  <!--<br> ailes-enchantées--> <!--?php echo htmlspecialchars($username); ?></h1>
    </header>
    <main>
        <section>
            <div class="box-1">
                <ul>
                    <li><a class="nav-link" href="../blog/moderate_comments.php">Modérer les avis blog</a></li>
                    <li><a class="nav-link" href="../ratings_feedback/moderate_comments.php">Modérer les avis utilisateur</a></li>
                    <li><a href="../ratings_feedback/check_images.php">Vérifier les images de profil</a></li>
                </ul>
            </div>
            <div class="box-2">
                <ul>
                    <li><a class="nav-link" href="../horaires/update_hours.php">Gérer les horaires</a></li>
                </ul>
            </div>
            <div class="box-3">
                <ul>
                    <li><a href="#">Créer un Évènement</a></li>
                    <li><a href="#">Modifier un Évènement</a></li>
                    <li><a href="#">Supprimer un Évènement</a></li>
                </ul>
            </div>
        </section>
        <section>
            <div class="statistics">
                <h2>Statistiques du site</h2>
                <p>Nombre total d'utilisateurs : <!?php echo $total_users; ?></p>
                <p>Nombre total de commentaires : <!?php echo $total_comments; ?></p>
                <p>Nombre total d'événements : <!?php echo $total_events; ?></p>
            </div>
        </section>
    </main>

    <style>
        header {
            margin-bottom: 80px;
        }
        .title {
            font-size: xx-large;
            color: #d94350;
        }
        h1 {
            text-align: center;
        }
        section {
            display: flex;
            flex: 250px;
            flex-direction: row;
            justify-content: space-around;
            width: 100%;
        }
        .box-1, .box-2, .box-3 {
            display: flex;
            flex-direction: column;
            height: 90px;
            width: 250px;
            padding: 5px;
        }
        .box-1 {
            background-color: greenyellow;
        }
        .box-2 {
            background-color: coral;
        }
        .box-3 {
            background-color: #D0D3D4;
        }
        .statistics {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</body>
</html>  -->
























<!-- celui vien d'etre desactivé -->
<!--?php
//session_start();

//if (!isset($_SESSION['username'])) {
    //error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
    //header('Location: index.php');
    //exit();
//}

error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);

$username = $_SESSION['username'];

// Inclure le fichier de connexion à la base de données
include('db-connect.php');

// Récupération des statistiques
$sql_users = "SELECT COUNT(*) AS total_users FROM user_feedback";
$sql_comments = "SELECT COUNT(*) AS total_comments FROM comments";
$sql_events = "SELECT COUNT(*) AS total_events FROM inscriptions";

$result_users = $pdo->query($sql_users)->fetch(PDO::FETCH_ASSOC);
$result_comments = $pdo->query($sql_comments)->fetch(PDO::FETCH_ASSOC);
$result_events = $pdo->query($sql_events)->fetch(PDO::FETCH_ASSOC);

$total_users = $result_users['total_users'];
$total_comments = $result_comments['total_comments'];
$total_events = $result_events['total_events'];

// Récupération des visiteurs par jour
$sql_visitors = "SELECT DATE(visit_date) as visit_date, COUNT(*) as visitor_count FROM visitors GROUP BY DATE(visit_date) ORDER BY visit_date";
//$result_visitors = $pdo->query($sql_visitors)->fetchAll(PDO::FETCH_ASSOC);

$dates = [];
$visitor_counts = [];
foreach ($result_visitors as $row) {
    $dates[] = $row['visit_date'];
    $visitor_counts[] = $row['visitor_count'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .title {
            font-size: xx-large;
            margin: 0;
        }
        main {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        section {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .box-1, .box-2, .box-3 {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            margin: 0 10px;
            border-radius: 5px;
            text-align: center;
        }
        .statistics {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .statistics h2 {
            margin-top: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin: 10px 0;
        }
        a.nav-link {
            text-decoration: none;
            color: #d94350;
            font-weight: bold;
        }
        .chart-container {
            position: relative;
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    <header>
        <div class="title">Ailes-enchantées</div>
        <h1>Bienvenue Administrateur <!-?php echo htmlspecialchars($username); ?></h1>
    </header>
    <main>
        <section>
            <div class="box-1">
                <ul>
                    <li><a class="nav-link" href="../blog/moderate_comments.php">Modérer les avis blog</a></li>
                    <li><a class="nav-link" href="../ratings_feedback/moderate_comments.php">Modérer les avis utilisateur</a></li>
                    <li><a class="nav-link" href="../ratings_feedback/check_images.php">Vérifier les images de profil</a></li>
                </ul>
            </div>
            <div class="box-2">
                <ul>
                    <li><a class="nav-link" href="../horaires/update_hours.php">Gérer les horaires</a></li>
                </ul>
            </div>
            <div class="box-3">
                <ul>
                    <li><a class="nav-link" href="#">Créer un Évènement</a></li>
                    <li><a class="nav-link" href="#">Modifier un Évènement</a></li>
                    <li><a class="nav-link" href="#">Supprimer un Évènement</a></li>
                </ul>
            </div>
        </section>
        <section>
            <div class="statistics">
                <h2>Statistiques du site</h2>
                <p>Nombre total d'utilisateurs : <!-?php echo $total_users; ?></p>
                <p>Nombre total de commentaires : <!-?php echo $total_comments; ?></p>
                <p>Nombre total d'événements : <!-?php echo $total_events; ?></p>
            </div>
        </section>
        <section>
            <div class="chart-container">
                <canvas id="visitorChart"></canvas>
            </div>
        </section>
    </main>
    <script>
        var ctx = document.getElementById('visitorChart').getContext('2d');
        var visitorChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <!-?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Nombre de visiteurs',
                    data: <!-?php echo json_encode($visitor_counts); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nombre de visiteurs'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>





















