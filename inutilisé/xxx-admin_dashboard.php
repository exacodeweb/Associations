<!-- Test -->
<!-- php/admin_dashboard.php: Affiche le tableau de bord de l'administrateur après une connexion réussie.-->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    error_log("Débogage : Redirection vers login.php car la session n'est pas active.");
    header('Location: ./login.php');//Ref: ./admin_login.php
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
</head>
<body>
    <header>
        <h1>Bienvenue,<?php echo htmlspecialchars($username); ?></h1>
        <!--<h1>Bienvenue, --> <!--?php echo $_SESSION['username']; ?></h1> -->
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
    <main>
        <!-- Contenu administratif -->
      <section>
        <div class="box-1">
          <ul>
          <li><a class="nav-link" href="../php/moderate_comments.php">moderer les avis blog</a></li><!--box-1-->
          <li><a class="nav-link" href="../php/admin_login.php">Gerer les avis </a></li><!--box-1-->

          <!--<li><a class="nav-link" href="../php/moderate_comments_beta.php">moderer les avis </a></li>-->
          <li><a class="nav-link" href="./moderate_comment_beta.php">moderer les avis </a></li>
          </ul>
        </div>

        <div class="box-2">
        <ul> <!-- je vient de modifier ../php/update_hours-(sauvegardé).php en  -->
          <li><a class="nav-link" href="../php/update_hours.php">Gerer les horaires </a></li><!--box-1-->
          <!--<li><a class="nav-link" href="../php/admin_login.php">Gerer les avis </a></li>-box-2-->
          </ul>
        </div>
        <div class="box-3">box-3</div> 



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

<!--------------------------------------------------------------------------------------------------------------------->

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ./php/login.php');
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
        <h1>Bienvenue, <?php echo htmlspecialchars($username); ?></h1>
    </header>
    <nav>
        <ul>
            <li><a class="nav-link" href="../php/moderate_comments_beta.php">Modérer les avis blog</a></li>
            <li><a class="nav-link" href="../php/admin_login.php">Gérer les avis</a></li>
            <li><a href="create_event.php">Créer un Évènement</a></li>
            <li><a href="edit_event.php">Modifier un Évènement</a></li>
            <li><a href="delete_event.php">Supprimer un Évènement</a></li>
            <li><a href="./php/logout.php">Déconnexion</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <div class="box-1">
                <ul>
                    <li><a class="nav-link" href="./php/moderate_comments.php">Modérer les avis blog</a></li>
                    <!--<li><a class="nav-link" href="../php/admin_login.php">Gérer les avis</a></li>-->
                    <li><a class="nav-link" href="./moderate_comment_beta.php">Modérer les avis</a></li>

                    <li><a class="nav-link" href="./php/moderate_comment_beta.php">Modérer les avis</a></li>
                  
                  </ul>
            </div>
            <div class="box-2">
                <ul>
                    <li><a class="nav-link" href="./php/update_hours.php">Gérer les horaires</a></li>
                </ul>
            </div>
            <div class="box-3">
                <!--Box 3-->
                <ul>
                  <li><a href="create_event.php">Créer un Évènement</a></li>
                  <li><a href="edit_event.php">Modifier un Évènement</a></li>
                  <li><a href="delete_event.php">Supprimer un Évènement</a></li>
                </ul>
            </div>
        </section>
    </main>
    <style>
        h1 {
            text-align: center;
        }
        section {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            width: 100%;
        }
        .box-1, .box-2, .box-3 {
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
            background-color: deeppink;
        }
    </style>
</body>
</html>

