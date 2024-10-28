<!--?php

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
$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$sql_comments = "SELECT COUNT(*) AS total_comments FROM comments";
$sql_events = "SELECT COUNT(*) AS total_events FROM events";

$result_users = $conn->query($sql_users);
$result_comments = $conn->query($sql_comments);
$result_events = $conn->query($sql_events);

$total_users = $result_users->fetch_assoc()['total_users'];
$total_comments = $result_comments->fetch_assoc()['total_comments'];
$total_events = $result_events->fetch_assoc()['total_events'];

$conn->close();
?> -->



<!--?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>  -->

<!--<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Administrateur</title>  -->
<!-- Ajoutez vos styles et scripts ici --> <!--
</head>
<body>
    <h1>Bienvenue, <!-?php echo $_SESSION['username']; ?>!</h1>
    <p>Ceci est le tableau de bord de l'administrateur.</p>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>-->


<!-- Test -->
<!-- php/admin_dashboard.php: Affiche le tableau de bord de l'administrateur après une connexion réussie.-->
<?php























session_start();

if (!isset($_SESSION['username'])) {
  error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
  //header('Location: ./login.php');//Ref: ./admin_login.php
  header('Location: index.php');
  exit();
}

error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);


// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['username'])) {
  header('Location: ./login.php');
  exit();
}

$username = $_SESSION['username'];


?>

<!-------------------------------------------------- statistique ajouter-->
<?php
//session_start();

if (!isset($_SESSION['username'])) {
  error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
  header('Location: index.php');
  exit();
}

error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);

$username = $_SESSION['username'];

// Inclure le fichier de connexion à la base de données ! c'est db-connect.php pas db_connect.php
include('db-connect.php');

// Récupération des statistiques
$sql_users = "SELECT COUNT(*) AS total_users FROM user_feedback"; //users // Assurez-vous que le nom de la table est correct
$sql_comments = "SELECT COUNT(*) AS total_comments FROM comments";
$sql_events = "SELECT COUNT(*) AS total_events FROM inscriptions"; //events

$sql_contacts = "SELECT COUNT(*) AS total_contacts FROM contacts";

$result_users = $pdo->query($sql_users)->fetch(PDO::FETCH_ASSOC);
$result_comments = $pdo->query($sql_comments)->fetch(PDO::FETCH_ASSOC);
$result_events = $pdo->query($sql_events)->fetch(PDO::FETCH_ASSOC);

$result_contacts = $pdo->query($sql_contacts)->fetch(PDO::FETCH_ASSOC);

$total_users = $result_users['total_users'];
$total_comments = $result_comments['total_comments'];
$total_events = $result_events['total_events'];
$total_contacts = $result_contacts['total_contacts'];

//-- courbe Nr des visiteurs

// Récupération des visiteurs par jour
$sql_visitors = "SELECT DATE(visit_date) as visit_date, COUNT(*) as visitor_count FROM visitors GROUP BY DATE(visit_date) ORDER BY visit_date";
//$result_visitors = $pdo->query($sql_visitors)->fetchAll(PDO::FETCH_ASSOC);


//$dates = [];
//$visitor_counts = [];
//foreach ($result_visitors as $row) {
//$dates[] = $row['visit_date'];
//$visitor_counts[] = $row['visitor_count'];

//}
//} else {
// Gestion de l'erreur si $result_visitors n'est pas un tableau
//echo "Erreur : Impossible de récupérer les données des visiteurs.";
//}

?>

<!---------------------------------------------------->

<!-------------------------------------------------- statistique ajouter-->
<!--?php
if (!isset($_SESSION['username'])) {
    error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
    header('Location: index.php');
    exit();
}
error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);
$username = $_SESSION['username'];
// Inclure le fichier de connexion à la base de données
include('db-connect.php');
// Récupération des statistiques
$sql_users = "SELECT COUNT(*) AS total_users FROM user_feedback"; // Assurez-vous que le nom de la table est correct
$sql_comments = "SELECT COUNT(*) AS total_comments FROM comments";
$sql_events = "SELECT COUNT(*) AS total_events FROM inscriptions"; // Assurez-vous que le nom de la table est correct
$result_users = $pdo->query($sql_users)->fetch(PDO::FETCH_ASSOC);
$result_comments = $pdo->query($sql_comments)->fetch(PDO::FETCH_ASSOC);
$result_events = $pdo->query($sql_events)->fetch(PDO::FETCH_ASSOC);
$total_users = $result_users['total_users'];
$total_comments = $result_comments['total_comments'];
$total_events = $result_events['total_events'];

// Récupération des visiteurs par jour
$sql_visitors = "SELECT DATE(visit_date) as visit_date, COUNT(*) as visitor_count FROM visitors GROUP BY DATE(visit_date) ORDER BY visit_date";
$result_visitors = $pdo->query($sql_visitors)->fetchAll(PDO::FETCH_ASSOC);

$dates = [];
$visitor_counts = [];
if (is_array($result_visitors)) {
    foreach ($result_visitors as $row) {
        $dates[] = $row['visit_date'];
        $visitor_counts[] = $row['visitor_count'];
    }
} else {
    // Gestion de l'erreur si $result_visitors n'est pas un tableau
    echo "Erreur : Impossible de récupérer les données des visiteurs.";
}
?>  -->
<!--------------------------------------------------->

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Tableau de Bord Administrateur</title>
  <link rel="stylesheet" href="../admin-0/admin-test_style.css">


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- ajouer -->

</head>

<body>
  <header>
    <div class="title">Ailes-enchantées</div>
    <!--<h1>Bienvenue, Administrateur <br> ailes-enchantées --><!--?php echo htmlspecialchars($username); ?>--></h1>
    <h1>Bienvenue Administrateur<!-- Panneau de Controle --><!--  --><!--<br> ailes-enchantées--> <!--?php echo htmlspecialchars($username); ?>--></h1>
    <!--<h1>Bienvenue, --> <!--?php echo $_SESSION['username']; ?></h1> -->
    <!-- Centre de Commande --> <!-- Gestion centralisée --> <!-- Panneau de Controle -->
  </header>
  <!--<nav>
        <ul>
            <li><a class="nav-link" href="../moderate_comments.php">moderer les avis blog</a></li>
            <li><a class="nav-link" href="../php/admin_login.php">Gerer les avis</a></li>
            <li><a href="create_event.php">Créer un Évènement</a></li>
            <li><a href="edit_event.php">Modifier un Évènement</a></li>
            <li><a href="delete_event.php">Supprimer un Évènement</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>-->
  <main>
    <!-- Contenu administratif -->
    <section>
      <div class="box-1">
        <ul>
          <li><a class="nav-link" href="../blog/moderate_comments.php">moderer les avis blog</a></li> <!--box-1-->
          <!--<li><a class="nav-link" href="../php/admin_login.php">Gerer les avis </a></li>--> <!--box-1-->

          <!--<li><a class="nav-link" href="../php/moderate_comments_beta.php">moderer les avis </a></li>-->
          <!--<li><a class="nav-link" href="./moderate_comment_beta.php">moderer les avis </a></li>-->
          <!--<li><a class="nav-link" href="../php/moderate_comments-1.php">moderer les avis utilisateur</a></li>-->
          <li><a class="nav-link" href="../ratings_feedback/moderate_comments.php">moderer les avis utilisateur</a></li>
          <!-- Lien vers le script de vérification des images -->
          <li><a href="../ratings_feedback/check_images.php">Vérifier les images de profil</a></li> <!-- target="_blank" -->
        </ul>
      </div>

      <div class="box-2">
        <ul> <!-- je vient de modifier ../php/update_hours-(sauvegardé).php en  -->
          <!--<li><a class="nav-link" href="../php/update_hours.php">Gerer les horaires </a></li> --> <!--box-1-->
          <li><a class="nav-link" href="../horaires/update_hours-2.php">Gerer les horaires </a></li>
          <!--<li><a class="nav-link" href="../php/admin_login.php">Gerer les avis </a></li>-box-2-->
        </ul>
      </div>

      <div class="box-3">
        <ul>
          <!--box-3-->
          <li><a href="#">Créer un Évènement</a></li><!-- create_event.php -->
          <li><a href="#">Modifier un Évènement</a></li><!-- edit_event.php -->
          <li><a href="#">Supprimer un Évènement</a></li><!-- delete_event.php -->
        </ul>
      </div>

      <div class="box-4">
        <ul>
          <!--box-3-->
          <li><a href="../php/manage_admins.php">Gérer les administrateurs</a></li><!-- create_event.php -->
          <li><a href="../php/create_admin.php">ajouter un administrateur</a></li><!-- edit_event.php -->
          <li><a href="#">Supprimer un Évènement</a></li><!-- delete_event.php -->
        </ul>
      </div>


    </section>

    <!--<section> --> <!-- ajouter --> <!--
            <div class="statistics">
                <h2>Résumé des Activités</h2> --> <!-- Statistiques du site --> <!--
                <p>Nombre total d'utilisateurs : <!?php echo $total_users; ?></p>
                <p>Nombre total de commentaires : <!?php echo $total_comments; ?></p>
                <p>Nombre total d'événements : <!?php echo $total_events; ?></p>             
            </div>
      </section>-->

    <!--
        Rapports du Site
        Analyse des Visites
        Données de Performance
        Aperçu des Utilisateurs
        Indicateurs Clés du Site
        Résumé des Activités
        Tableau de Bord des Données
        Rapports d'Utilisation
        Vue d'Ensemble du Site
        Suivi des Visites
      -->

    <section> <!-- ajouter -->
      <div class="statistics">
        <h2>Résumé des Activités</h2><!-- Statistiques du site -->
        <table>
          <thead>
            <tr>
              <th>Statistique</th>
              <th>Valeur</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nombre total d'utilisateurs</td>
              <td><?php echo $total_users; ?></td>
            </tr>
            <tr>
              <td>Nombre total de commentaires</td>
              <td><?php echo $total_comments; ?></td>
            </tr>
            <tr>
              <td>Nombre total d'inscriptions</td><!-- événements -->
              <td><?php echo $total_events; ?></td>
            </tr>

            <tr>
              <td>Nombre total de contacts</td><!-- événements -->
              <td><?php echo $total_contacts; ?></td>
            </tr>
          </tbody>
        </table>
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

    .box-1 {
      display: flex;
      flex-direction: column;
      height: 90px;
      width: 250px;
      background-color: greenyellow;
      padding: 5px;
    }

    .box-2 {
      height: 90px;
      width: 250px;
      background-color: coral;
      padding: 5px;
    }

    .box-3 {
      height: 90px;
      width: 250px;
      background-color: #D0D3D4;
      /*deeppink*/
      padding: 5px;
    }

    /*-----------------------------*/

    .statistics {
      width: 100%;
      margin: 20px auto;
      text-align: center;
    }

    .statistics table {
      width: 50%;
      margin: 0 auto;
      border-collapse: collapse;
    }

    .statistics th,
    .statistics td {
      border: 1px solid #ddd !important;
      border: 1px solid blue !important;
      padding: 8px;
    }

    .statistics th {
      background-color: #f2f2f2;
      color: black;
    }

    .statistics tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .statistics tr:hover {
      background-color: #ddd;
      cursor: pointer;
    }
  </style>
  <!--<li>-->
  <a href="logout.php">Déconnexion</a>
  <!--</li>-->
</body>

</html>


<!--------------------------------------------------------------------------------------------------------------------->
<!--?php
session_start();

if (!isset($_SESSION['username'])) {
    error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
    header('Location: ./index.php');//Ref: ./admin_login.php
    exit();
}

error_log("Débogage : Session active pour l'utilisateur " . $_SESSION['username']);





// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['username'])) {
    header('Location: ./index.php');
    exit();
}

$username = $_SESSION['username'];
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
        <h1>Bienvenue, Administrateur <br> ailes-enchantées   --> <!--?php echo htmlspecialchars($username); ?>--></h1>
<!--<h1>Bienvenue, --> <!--?php echo $_SESSION['username']; ?></h1> --> <!--
    </header>
    <nav>
        <ul>
            <li><a class="nav-link" href="../php/moderate_comments.php">moderer les avis blog</a></li>
            <li><a class="nav-link" href="../php/admin_login.php">Gerer les avis</a></li>
            <li><a href="create_event.php">Créer un Évènement</a></li>
            <li><a href="edit_event.php">Modifier un Évènement</a></li>
            <li><a href="delete_event.php">Supprimer un Évènement</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>
    <main>         -->
<!-- Contenu administratif --> <!--
      <section>
        <div class="box-1">
          <ul>
          <li><a class="nav-link" href="../php/moderate_comments.php">moderer les avis blog</a></li>    --> <!--box-1--> <!--
          <li><a class="nav-link" href="../php/admin_login.php">Gerer les avis </a></li>  --> <!--box-1-->

<!--<li><a class="nav-link" href="../php/moderate_comments_beta.php">moderer les avis </a></li>-->
<!--<li><a class="nav-link" href="./moderate_comment_beta.php">moderer les avis </a></li>-->
<!--<li><a class="nav-link" href="../php/moderate_comments-1.php">moderer les avis utilisateur</a></li>--> <!--
          <li><a class="nav-link" href="../php/ratings_feedback/moderate_comments.php">moderer les avis utilisateur</a></li>   -->
<!-- Lien vers le script de vérification des images --> <!--
          <li><a href="../php/ratings_feedback/check_images.php">Vérifier les images de profil</a></li> --> <!-- target="_blank" --> <!--   
        </ul>
        </div>

        <div class="box-2">
        <ul>  --> <!-- je vient de modifier ../php/update_hours-(sauvegardé).php en  --> <!--
          <li><a class="nav-link" href="../php/update_hours.php">Gerer les horaires </a></li>  --> <!--box-1-->
<!--<li><a class="nav-link" href="../php/admin_login.php">Gerer les avis </a></li>-box-2--> <!--
        </ul>
        </div>

        <div class="box-3">
          box-3
        </div>



      </section>
    </main>

  <style>
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
    .box-1 {
      display: flex;
      flex-direction: column;
      height: 90px;
      width: 250px;
      background-color: greenyellow;
      padding: 5px;
    }
    .box-2 {
      height: 90px;
      width: 250px;
      background-color: coral;
      padding: 5px;
    }
    .box-3 {
      height: 90px;
      width: 250px;
      background-color:deeppink;
      padding: 5px;
    }

  </style>

</body>
</html>

  -->