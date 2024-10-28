
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!-- Ce fichier permet de mettre à jour les horaires dans la base de données -->
<?php
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['username'])) {
    header('Location: admin_login-horaires.php');//Location: admin_login-test.php
    exit();
}

$username = $_SESSION['username'];

include '../php/db_connect_horaires.php';//modifier db_connect pour test 28/06/2024

// Si le formulaire est soumis, mettez à jour les horaires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Affichage pour le débogage
    //echo "<pre>";
    //var_dump($_POST); // Vérifiez les données soumises par le formulaire
    //echo "</pre>";

    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    foreach ($jours as $jour) {
        $ouverture_matin = $_POST[strtolower($jour) . '_ouverture_matin'] ?? '00:00:00';
        $fermeture_matin = $_POST[strtolower($jour) . '_fermeture_matin'] ?? '00:00:00';
        $ouverture_apresmidi = $_POST[strtolower($jour) . '_ouverture_apresmidi'] ?? '00:00:00';
        $fermeture_apresmidi = $_POST[strtolower($jour) . '_fermeture_apresmidi'] ?? '00:00:00';

        //$sql = "UPDATE horaires SET 
                    //ouverture_matin = :ouverture_matin, 
                    //fermeture_matin = :fermeture_matin, 
                    //ouverture_apresmidi = :ouverture_apresmidi, 
                    //fermeture_apresmidi = :fermeture_apresmidi 
                //WHERE jour = :jour";

/*--------------------------------------------------------------------*/
        // Affichez la requête SQL pour le débogage
        //$sql = "UPDATE horaires SET 
                    //ouverture_matin = :ouverture_matin, 
                    //fermeture_matin = :fermeture_matin, 
                    //ouverture_apresmidi = :ouverture_apresmidi, 
                    //fermeture_apresmidi = :fermeture_apresmidi 
                //WHERE jour = :jour";
        //echo "Requête SQL : $sql<br>";
/*-------------------------------------------------------------------*/        

        // Préparez et exécutez la requête SQL
        //$stmt = $pdo->prepare($sql);
        //$stmt->execute([
            //':ouverture_matin' => $ouverture_matin,
            //':fermeture_matin' => $fermeture_matin,
            //':ouverture_apresmidi' => $ouverture_apresmidi,
            //':fermeture_apresmidi' => $fermeture_apresmidi,
            //':jour' => $jour
        //]);


/*-------------------------------------- Mise a jour 28/06/2024-------------------------------------*/

// Préparez et exécutez la requête SQL
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

/*-------------------------------------------------------------------------------------------------*/

        // Affichez le nombre de lignes affectées pour le débogage
        //$rowCount = $stmt->rowCount();
        //echo "Nombre de lignes affectées : $rowCount<br>";
    //}
    // Redirigez vers la page d'administration après la mise à jour
    //header('Location: admin_dashboard-horaires.php');//Location: admin_dashboard-test.php
    header('Location: admin_dashboard.php');
    exit();

    }

    //header('Location: admin_dashboard-test.php');
    //header('Location: horaires.php');
    //exit();
}

//Récupérez les horaires actuels
$sql = "SELECT * FROM horaires";
$stmt = $pdo->query($sql);
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Horaires</title>
    <!--<link rel="stylesheet" href="../admin-0/admin-horaires_style.css">--><!-- ../admin-0/admin-test_style.css -->
    <link rel="stylesheet" href="../styles/admin-horaires_style.css">
    <!--<style>
        body {
            font-family: Arial, sans-serif;
        }

        header h1 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
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

        .button_submit {
            margin-top: 20px;
            /* background: deepskyblue; */
            /* background-color: dodgerblue; */
            /* color: white; */
        }

        /* Media queries for responsive design */
        @media screen and (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            nav ul li {
                display: block;
                margin-bottom: 10px;
            }
        }

        @media screen and (max-width: 480px) {
            header h1 {
                font-size: 1.5em;
            }

            th, td {
                padding: 4px;
            }

            .button_submit {
                width: 100%;
                padding: 10px;
                font-size: 1em;
            }
        }
    </style>-->
<!--
<style>
        body {
            font-family: Arial, sans-serif;
        }

        header h1 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
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

        .button_submit {
            margin-top: 20px;
        }

        /* Media queries for responsive design */
        @media screen and (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tr {
                margin-bottom: 10px;
                border: 1px solid #ccc;
            }

            td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                text-align: right;
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }

            .button_submit {
                width: 100%;
                padding: 10px;
                font-size: 1em;
            }
        }

        @media screen and (max-width: 480px) {
            header h1 {
                font-size: 1.5em;
            }

            .button_submit {
                padding: 10px;
                font-size: 1em;
            }
        }
    </style>-->

<!--<style>
        body {
            font-family: Arial, sans-serif;
        }

        header h1 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        .table-container {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .table-container > div {
            display: table-row;
        }

        .table-container > div > div {
            display: table-cell;
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-header {
            background-color: #f2f2f2;
        }

        .button_submit {
            margin-top: 20px;
        }

        /* Media queries for responsive design */
        @media screen and (max-width: 768px) {
            .table-container {
                display: block;
            }

            .table-container > div {
                display: block;
                margin-bottom: 10px;
                border: 1px solid #ccc;
            }

            .table-container > div > div {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #eee;
            }

            .table-container > div > div:last-child {
                border-bottom: none;
            }

            .table-container > div > div:before {
                content: attr(data-label);
                font-weight: bold;
            }

            .button_submit {
                width: 100%;
                padding: 10px;
                font-size: 1em;
            }
        }

        @media screen and (max-width: 480px) {
            header h1 {
                font-size: 1.5em;
            }

            .button_submit {
                padding: 10px;
                font-size: 1em;
            }
        }
    </style>-->



</head>
<body>
    <header>
        <h1> Gestion des Horaires <!--Bienvenue--> <!--,--> <!--?php echo htmlspecialchars($username); ?>--> </h1>
    </header>
    <nav>
        <ul>
            <!--<li><a href="admin_dashboard-horaires.php">Retour au Tableau de Bord</a></li>--><!-- admin_dashboard-test.php -->
            <li><a href="admin_dashboard.php">Retour au Tableau de Bord</a></li>
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


                  <style>
                    .button_submit{
                      margin-top: 20px;
                      /*background: deepskyblue;
                      background-color: dodgerblue;
                      color: white;*/
                    }
                  </style>

                </thead>
                <tbody>
                    <?php
                    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                    foreach ($jours as $jour) {
                        $ouverture_matin = '';
                        $fermeture_matin = '';
                        $ouverture_apresmidi = '';
                        $fermeture_apresmidi = '';
                        foreach ($horaires as $horaire) {
                            if ($horaire['jour'] == $jour) {
                                $ouverture_matin = $horaire['ouverture_matin'];
                                $fermeture_matin = $horaire['fermeture_matin'];
                                $ouverture_apresmidi = $horaire['ouverture_apresmidi'];
                                $fermeture_apresmidi = $horaire['fermeture_apresmidi'];
                                break;
                            }
                        }
                        echo "<tr>
                                <td>$jour</td>
                                <td><input type='time' name='".strtolower($jour)."_ouverture_matin' value='$ouverture_matin'></td>
                                <td><input type='time' name='".strtolower($jour)."_fermeture_matin' value='$fermeture_matin'></td>
                                <td><input type='time' name='".strtolower($jour)."_ouverture_apresmidi' value='$ouverture_apresmidi'></td>
                                <td><input type='time' name='".strtolower($jour)."_fermeture_apresmidi' value='$fermeture_apresmidi'></td>
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

<!--------------------------------------------------------------------------------------------------------------------->
<!--?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: login.php');
    exit();
}

require_once 'db_connect_horaires.php';

$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jour = $_POST['jour'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare('UPDATE horaires SET ouverture = :ouverture, fermeture = :fermeture WHERE jour = :jour');
        $stmt->execute(['ouverture' => $ouverture, 'fermeture' => $fermeture, 'jour' => $jour]);
        $success_message = "Horaires mis à jour avec succès.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à jour les horaires</title>
</head>
<body>
    <h2>Mettre à jour les horaires</h2>   -->
    <!--?php if (!empty($success_message)): ?> 
        <p style="color:green;">  -->  <!--?php echo $success_message; ?></p>  -->
    <!--?php endif; ?>
    <form method="post" action="update_hours.php">
        <label for="jour">Jour :</label>
        <select id="jour" name="jour">
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
            <option value="Samedi">Samedi</option>
            <option value="Dimanche">Dimanche</option>
        </select>
        <br>
        <label for="ouverture">Ouverture :</label>
        <input type="time" id="ouverture" name="ouverture" required>
        <br>
        <label for="fermeture">Fermeture :</label>
        <input type="time" id="fermeture" name="fermeture" required>
        <br>
        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>

    -->
<!------------------------------------------------------------------------------------------------------------------->
<!--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Horaires</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header h1 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        .table-container {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .table-container > div {
            display: table-row;
        }

        .table-container > div > div {
            display: table-cell;
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-header {
            background-color: #f2f2f2;
        }

        .button_submit {
            margin-top: 20px;
        }

        /*Test*/
        /*.color >div {
            background-color: #F0F0F0!important;
        }*/


        /* Media queries for responsive design */
        @media screen and (max-width: 768px) {
            .table-container {
                display: block;
            }

            .table-container > div {
                display: block;
                margin-bottom: 10px;
                border: 1px solid #ccc;
            }

            .table-container > div > div {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #eee;
            }

            .table-container > div > div:last-child {
                border-bottom: none;
            }

            .table-container > div > div:before {
                content: attr(data-label);
                font-weight: bold;
            }

            .button_submit {
                width: 100%;
                padding: 10px;
                font-size: 1em;
            }

        }

        @media screen and (max-width: 480px) {
            header h1 {
                font-size: 1.5em;
            }

            .button_submit {
                padding: 10px;
                font-size: 1em;
            }


            .table-header {
                /*visibility: collapse;*/
                /*display: none;*/

                position: absolute;
                top: -9999px;
                left: -9999px;
            }            
        }
    </style>
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
            <div class="table-container">
                <div class="table-header">
                    <div>Jour</div>
                    <div>Ouverture Matin</div>
                    <div>Fermeture Matin</div>
                    <div>Ouverture Après-midi</div>
                    <div>Fermeture Après-midi</div>
                </div> 
                <!-?php
                $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                foreach ($jours as $jour) {
                    $ouverture_matin = '';
                    $fermeture_matin = '';
                    $ouverture_apresmidi = '';
                    $fermeture_apresmidi = '';
                    foreach ($horaires as $horaire) {
                        if ($horaire['jour'] == $jour) {
                            $ouverture_matin = $horaire['ouverture_matin'];
                            $fermeture_matin = $horaire['fermeture_matin'];
                            $ouverture_apresmidi = $horaire['ouverture_apresmidi'];
                            $fermeture_apresmidi = $horaire['fermeture_apresmidi'];
                            break;
                        }
                    }
                    echo "<div>
                            <div data-label='Jour'>$jour</div>
                            <div data-label='Ouverture Matin'><input type='time' name='".strtolower($jour)."_ouverture_matin' value='$ouverture_matin'></div>
                            <div data-label='Fermeture Matin'><input type='time' name='".strtolower($jour)."_fermeture_matin' value='$fermeture_matin'></div>
                            <div data-label='Ouverture Après-midi'><input type='time' name='".strtolower($jour)."_ouverture_apresmidi' value='$ouverture_apresmidi'></div>
                            <div data-label='Fermeture Après-midi'><input type='time' name='".strtolower($jour)."_fermeture_apresmidi' value='$fermeture_apresmidi'></div>
                          </div>";
                }
                ?>
            </div>
            <button class="button_submit" type="submit">Mettre à jour les horaires</button>
        </form>
    </main>
</body>
</html> -->

<!--------------------------------------------------------------------------------------------------------------------->
<!--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Horaires</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header h1 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        .table-container {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .table-container > div {
            display: table-row;
        }

        .table-container > div > div {
            display: table-cell;
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-header {
            background-color: #f2f2f2;
        }

        .button_submit {
            margin-top: 20px;
        }

        /* Media queries for responsive design */
        @media screen and (max-width: 768px) {
            .table-container {
                display: block;
            }

            .table-container > div {
                display: block;
                margin-bottom: 10px;
                border: 1px solid #ccc;
            }

            .table-container > div > div {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #eee;
            }

            .table-container > div > div:last-child {
                border-bottom: none;
            }

            .table-container > div > div:before {
                content: attr(data-label);
                font-weight: bold;
            }

            .button_submit {
                width: 100%;
                padding: 10px;
                font-size: 1em;
            }
        }

        @media screen and (max-width: 480px) {
            header h1 {
                font-size: 1.5em;
            }

            .button_submit {
                padding: 10px;
                font-size: 1em;
            }
        }
    </style>
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
            <div class="table-container">
                <div class="table-header">
                    <div>Jour</div>
                    <div>Ouverture Matin</div>
                    <div>Fermeture Matin</div>
                    <div>Ouverture Après-midi</div>
                    <div>Fermeture Après-midi</div>
                    <div>Fermé</div>
                </div>
                <!-?php
                $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                foreach ($jours as $jour) {
                    $ouverture_matin = '';
                    $fermeture_matin = '';
                    $ouverture_apresmidi = '';
                    $fermeture_apresmidi = '';
                    $ferme = false;
                    foreach ($horaires as $horaire) {
                        if ($horaire['jour'] == $jour) {
                            $ouverture_matin = $horaire['ouverture_matin'];
                            $fermeture_matin = $horaire['fermeture_matin'];
                            $ouverture_apresmidi = $horaire['ouverture_apresmidi'];
                            $fermeture_apresmidi = $horaire['fermeture_apresmidi'];
                            $ferme = ($ouverture_matin == '00:00:00' && $fermeture_matin == '00:00:00' && $ouverture_apresmidi == '00:00:00' && $fermeture_apresmidi == '00:00:00');
                            break;
                        }
                    }
                    echo "<div>
                            <div data-label='Jour'>$jour</div>";
                    if ($ferme) {
                        echo "<div colspan='4' data-label='Horaires'>Fermé</div>";
                        echo "<input type='hidden' name='".strtolower($jour)."_ferme' value='1'>";
                    } else {
                        echo "<div data-label='Ouverture Matin'><input type='time' name='".strtolower($jour)."_ouverture_matin' value='$ouverture_matin'></div>
                              <div data-label='Fermeture Matin'><input type='time' name='".strtolower($jour)."_fermeture_matin' value='$fermeture_matin'></div>
                              <div data-label='Ouverture Après-midi'><input type='time' name='".strtolower($jour)."_ouverture_apresmidi' value='$ouverture_apresmidi'></div>
                              <div data-label='Fermeture Après-midi'><input type='time' name='".strtolower($jour)."_fermeture_apresmidi' value='$fermeture_apresmidi'></div>";
                    }
                    echo "<div data-label='Fermé'><input type='checkbox' name='".strtolower($jour)."_ferme' ".($ferme ? 'checked' : '')."></div></div>";
                }
                ?>
            </div>
            <button class="button_submit" type="submit">Mettre à jour les horaires</button>
        </form>
    </main>
</body>
</html> -->
<!--------------------------------------------------------------------------------------------------------------------->


<!--En termes d'expérience administrateur, l'objectif est de rendre l'interface de gestion des horaires intuitive, efficace et sans ambiguïté. Les administrateurs doivent pouvoir effectuer les modifications nécessaires rapidement et avec confiance. Voici quelques points à considérer pour améliorer l'expérience administrateur dans cette situation spécifique :

Clarté
Utilisation de "Fermé" : Afficher "Fermé" dans les champs d'input plutôt que "00:00:00" permet aux administrateurs de comprendre immédiatement que le magasin est fermé à ces heures-là.
Validation Automatique : Ajoutez une validation qui empêche l'envoi de formulaires avec des heures non valides ou des champs vides, ce qui réduit les erreurs.
Efficacité
Checkbox pour les jours fermés : Une case à cocher pour marquer un jour comme fermé simplifie l'administration des horaires. Cocher cette case désactive automatiquement les champs d'input pour ce jour-là.
Pré-remplissage Intelligente : Les horaires couramment utilisés peuvent être pré-remplis, avec des options rapides pour copier les horaires d'un jour à un autre.
Consistance
Interface Cohérente : Utiliser une interface cohérente avec des éléments uniformes (comme les champs d'input et les checkboxes) aide les administrateurs à s'habituer rapidement à l'interface.
Feedback Visuel : Ajouter des retours visuels, comme des changements de couleur pour indiquer les champs désactivés, aide à comprendre l'état actuel de chaque jour.
Flexibilité
Champs Modifiables : Les administrateurs doivent pouvoir modifier facilement les heures d'ouverture et de fermeture sans avoir à réinitialiser tout le formulaire.
Options de Sauvegarde et Annulation : Fournir des boutons de sauvegarde et d'annulation permet aux administrateurs de revoir leurs modifications avant de les appliquer définitivement.
Accessibilité
Conception Réactive : Assurer que l'interface fonctionne bien sur tous les appareils, y compris les mobiles et les tablettes, afin que les administrateurs puissent effectuer des modifications même lorsqu'ils ne sont pas au bureau.
Mise à jour du code pour l'expérience administrateur
Voici un exemple de code mis à jour pour intégrer ces points :-->

<!--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Horaires</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header h1 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        .table-container {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .table-container > div {
            display: table-row;
        }

        .table-container > div > div {
            display: table-cell;
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-header {
            background-color: #f2f2f2;
        }

        .button_submit {
            margin-top: 20px;
        }

        /* Media queries for responsive design */
        @media screen and (max-width: 768px) {
            .table-container {
                display: block;
            }

            .table-container > div {
                display: block;
                margin-bottom: 10px;
                border: 1px solid #ccc;
            }

            .table-container > div > div {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #eee;
            }

            .table-container > div > div:last-child {
                border-bottom: none;
            }

            .table-container > div > div:before {
                content: attr(data-label);
                font-weight: bold;
            }

            .button_submit {
                width: 100%;
                padding: 10px;
                font-size: 1em;
            }
        }

        @media screen and (max-width: 480px) {
            header h1 {
                font-size: 1.5em;
            }

            .button_submit {
                padding: 10px;
                font-size: 1em;
            }
        }

        .horaire-ferme {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
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
            <div class="table-container">
                <div class="table-header">
                    <div>Jour</div>
                    <div>Ouverture Matin</div>
                    <div>Fermeture Matin</div>
                    <div>Ouverture Après-midi</div>
                    <div>Fermeture Après-midi</div>
                    <div>Fermé</div>
                </div>
                <!-?php
                $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                foreach ($jours as $jour) {
                    $ouverture_matin = '';
                    $fermeture_matin = '';
                    $ouverture_apresmidi = '';
                    $fermeture_apresmidi = '';
                    $ferme = false;
                    foreach ($horaires as $horaire) {
                        if ($horaire['jour'] == $jour) {
                            $ouverture_matin = $horaire['ouverture_matin'];
                            $fermeture_matin = $horaire['fermeture_matin'];
                            $ouverture_apresmidi = $horaire['ouverture_apresmidi'];
                            $fermeture_apresmidi = $horaire['fermeture_apresmidi'];
                            $ferme = ($ouverture_matin == '00:00:00' && $fermeture_matin == '00:00:00' && $ouverture_apresmidi == '00:00:00' && $fermeture_apresmidi == '00:00:00');
                            break;
                        }
                    }
                    echo "<div>
                            <div data-label='Jour'>$jour</div>
                            <div data-label='Ouverture Matin'><input type='time' class='horaire ".($ferme ? 'horaire-ferme' : '')."' name='".strtolower($jour)."_ouverture_matin' value='".($ferme ? 'Fermé' : $ouverture_matin)."'></div>
                            <div data-label='Fermeture Matin'><input type='time' class='horaire ".($ferme ? 'horaire-ferme' : '')."' name='".strtolower($jour)."_fermeture_matin' value='".($ferme ? 'Fermé' : $fermeture_matin)."'></div>
                            <div data-label='Ouverture Après-midi'><input type='time' class='horaire ".($ferme ? 'horaire-ferme' : '')."' name='".strtolower($jour)."_ouverture_apresmidi' value='".($ferme ? 'Fermé' : $ouverture_apresmidi)."'></div>
                            <div data-label='Fermeture Après-midi'><input type='time' class='horaire ".($ferme ? 'horaire-ferme' : '')."' name='".strtolower($jour)."_fermeture_apresmidi' value='".($ferme ? 'Fermé' : $fermeture_apresmidi)."'></div>
                            <div data-label='Fermé'><input type='checkbox' class='ferme-checkbox' data-jour='".strtolower($jour)."' ".($ferme ? 'checked' : '')."></div>
                          </div>";
                }
                ?>
            </div>
            <button class="button_submit" type="submit">Mettre à jour les horaires</button>
        </form>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateFields() {
                var checkboxes = document.querySelectorAll('.ferme-checkbox');
                checkboxes.forEach(function(checkbox) {
                    var jour = checkbox.dataset.jour;
                    var fields = document.querySelectorAll('input[name^=' + jour + ']');
                    fields.forEach(function(field) {
                        if (checkbox.checked) {
                            field.value = 'Fermé';
                            field.disabled = true;
                            field.classList.add('horaire-ferme');
                        } else {
                            if (field.value === 'Fermé') {
                                field.value = '';
                            }
                            field.disabled = false;
                            field.classList.remove('horaire-ferme');
                        }
                    });
                });
            }

            updateFields();

            document.querySelectorAll('.ferme-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', updateFields);
            });
        });
    </script>
</body>
</html>  -->

<!-------------------------------------------------------------------------------------------------------------------->

<!--?php
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['username'])) {
    header('Location: admin_login-test.php');
    exit();
}

$username = $_SESSION['username'];

include '../php/db_connect_horaires.php'; //modifier db_connect pour test 28/06/2024

// Si le formulaire est soumis, mettez à jour les horaires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    foreach ($jours as $jour) {
        $ferme = isset($_POST[strtolower($jour) . '_ferme']);
        $ouverture_matin = $ferme ? '00:00:00' : $_POST[strtolower($jour) . '_ouverture_matin'] ?? '00:00:00';
        $fermeture_matin = $ferme ? '00:00:00' : $_POST[strtolower($jour) . '_fermeture_matin'] ?? '00:00:00';
        $ouverture_apresmidi = $ferme ? '00:00:00' : $_POST[strtolower($jour) . '_ouverture_apresmidi'] ?? '00:00:00';
        $fermeture_apresmidi = $ferme ? '00:00:00' : $_POST[strtolower($jour) . '_fermeture_apresmidi'] ?? '00:00:00';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Horaires</title>
    <link rel="stylesheet" href="../admin-0/admin-test_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header h1 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        .table-container {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .table-container > div {
            display: table-row;
        }

        .table-container > div > div {
            display: table-cell;
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-header {
            background-color: #f2f2f2;
        }

        .button_submit {
            margin-top: 20px;
        }

        /* Media queries for responsive design */
        @media screen and (max-width: 768px) {
            .table-container {
                display: block;
            }

            .table-container > div {
                display: block;
                margin-bottom: 10px;
                border: 1px solid #ccc;
            }

            .table-container > div > div {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #eee;
            }

            .table-container > div > div:last-child {
                border-bottom: none;
            }

            .table-container > div > div:before {
                content: attr(data-label);
                font-weight: bold;
            }

            .button_submit {
                width: 100%;
                padding: 10px;
                font-size: 1em;
            }
        }

        @media screen and (max-width: 480px) {
            header h1 {
                font-size: 1.5em;
            }

            .button_submit {
                padding: 10px;
                font-size: 1em;
            }
        }

        .horaire-ferme {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
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
            <div class="table-container">
                <div class="table-header">
                    <div>Jour</div>
                    <div>Ouverture Matin</div>
                    <div>Fermeture Matin</div>
                    <div>Ouverture Après-midi</div>
                    <div>Fermeture Après-midi</div>
                    <div>Fermé</div>
                </div>
                <!-?php
                $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                foreach ($jours as $jour) {
                    $ouverture_matin = '';
                    $fermeture_matin = '';
                    $ouverture_apresmidi = '';
                    $fermeture_apresmidi = '';
                    $ferme = false;
                    foreach ($horaires as $horaire) {
                        if ($horaire['jour'] == $jour) {
                            $ouverture_matin = $horaire['ouverture_matin'];
                            $fermeture_matin = $horaire['fermeture_matin'];
                            $ouverture_apresmidi = $horaire['ouverture_apresmidi'];
                            $fermeture_apresmidi = $horaire['fermeture_apresmidi'];
                            $ferme = ($ouverture_matin == '00:00:00' && $fermeture_matin == '00:00:00' && $ouverture_apresmidi == '00:00:00' && $fermeture_apresmidi == '00:00:00');
                            break;
                        }
                    }
                    echo "<div>
                            <div data-label='Jour'>$jour</div>
                            <div data-label='Ouverture Matin'><input type='time' class='horaire ".($ferme ? 'horaire-ferme' : '')."' name='".strtolower($jour)."_ouverture_matin' value='".($ferme ? 'Fermé' : $ouverture_matin)."'></div>
                            <div data-label='Fermeture Matin'><input type='time' class='horaire ".($ferme ? 'horaire-ferme' : '')."' name='".strtolower($jour)."_fermeture_matin' value='".($ferme ? 'Fermé' : $fermeture_matin)."'></div>
                            <div data-label='Ouverture Après-midi'><input type='time' class='horaire ".($ferme ? 'horaire-ferme' : '')."' name='".strtolower($jour)."_ouverture_apresmidi' value='".($ferme ? 'Fermé' : $ouverture_apresmidi)."'></div>
                            <div data-label='Fermeture Après-midi'><input type='time' class='horaire ".($ferme ? 'horaire-ferme' : '')."' name='".strtolower($jour)."_fermeture_apresmidi' value='".($ferme ? 'Fermé' : $fermeture_apresmidi)."'></div>
                            <div data-label='Fermé'><input type='checkbox' class='ferme-checkbox' data-jour='".strtolower($jour)."' ".($ferme ? 'checked' : '')."></div>
                          </div>";
                }
                ?>
            </div>
            <button class="button_submit" type="submit">Mettre à jour les horaires</button>
        </form>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateFields() {
                var checkboxes = document.querySelectorAll('.ferme-checkbox');
                checkboxes.forEach(function(checkbox) {
                    var jour = checkbox.dataset.jour;
                    var fields = document.querySelectorAll('input[name^=' + jour + ']');
                    fields.forEach(function(field) {
                        if (checkbox.checked) {
                            field.value = 'Fermé';
                            field.disabled = true;
                            field.classList.add('horaire-ferme');
                        } else {
                            if (field.value === 'Fermé') {
                                field.value = '';
                            }
                            field.disabled = false;
                            field.classList.remove('horaire-ferme');
                        }
                    });
                });
            }

            updateFields();

            document.querySelectorAll('.ferme-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', updateFields);
            });
        });
    </script>
</body>
</html>  -->
