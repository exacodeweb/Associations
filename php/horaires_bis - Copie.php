<!--?php
include 'db_connect.php';
$sql = "SELECT * FROM horaires";
$result = $pdo->query($sql);
$horaires = [];
if ($result->rowCount() > 0) {
    $horaires = $result->fetchAll(PDO::FETCH_ASSOC);
}
$pdo = null;
?>

<!-?php
include 'db_connect.php';
$sql = "SELECT * FROM horaires";
$result = $pdo->query($sql);
$horaires = [];
if ($result->rowCount() > 0) {
    $horaires = $result->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($horaires);
    echo '</pre>';
}
$pdo = null;
?>
-->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Entomologie">
    <title>ECF-musée des papillons-A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/64e89a7edd.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;700&family=Rajdhani:wght@400;700&display=swap">
    <link rel="stylesheet" href="../style/header_style.css">
    <link rel="stylesheet" href="../style/contenu_style.css">
    <link rel="stylesheet" href="../style/contenu_musée_style.css">
    <link rel="stylesheet" href="../style/footer_style.css">
    <style>
        th {
            background-color: #F2F2F2;
        }
        .cel {
            text-align: center;
        }
        @media (max-width: 576px) {
            .table-responsive {
                overflow-x: auto;
            }
            .table thead {
                display: none;
            }
            .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 15px;
            }
            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 45%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }
        tr, th, td {
            border: 1px solid black;
            padding: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <nav class="header">
        <div class="logo">Ailes-Enchantées</div>
        <div class="menu">
            <a href="../index.html" title="Accueil" class="link-nav m-2">Accueil</a>
            <a href="../pages/blog.html" title="Blog" class="link-nav m-2">Blog</a>
            <a href="../pages/Agenda.html" title="A propos" class="link-nav m-2">Évènements</a>
            <a href="../pages/qui_somme_nous.html" title="Qui somme nous" class="link-nav m-2">Qui sommes nous ?</a>
            <a href="https://www.facebook.com/forum.lepidoptera/" target="_blank" title="Forum" class="link-nav m-2">Forum</a>
            <a href="../pages/contact.html" title="Contact" class="link-nav m-2">Contact</a>
        </div>
    </nav>
    <!--FIL D'ARIANE-->
    <div class="breadcrumb-item">
        <a href="./Sommaire-index.html" class="link-rep">Sommaire</a> >
        <a href="../index.html" class="link-rep">Accueil</a> > musée des papillons
    </div>
    <!--CONTENUR-->
    <div class="content">
        <!--MAIN-->
        <div class="main">
            <div class="article">
                <h2 class="title">MUSEE DES PAPILLONS</h2>
                <h4 class="sub-title-h4">Les merveilles de la nature</h4>
                <p>
                    Découvrez la fascinante diversité des papillons du monde entier. Le Musée des Papillons vous propose une immersion dans l'univers coloré et délicat de ces insectes extraordinaires. Explorez notre collection et laissez-vous émerveiller par la beauté naturelle et la diversité des espèces.
                </p>
            </div>
            <div class="section1-img">
                <figure>
                    <img class="card1-img-top rounded-3" src="../images3/Capture_d’écran_2023-03-13_230805(httpswww.musee-du-papillon.fr).jpg" width="250" height="150" alt="image papillon">
                    <figcaption>
                        <a href="https://www.musee-du-papillon.fr/" target="_blank" class="title-fig">Musée du papillon Paris 20e</a>
                    </figcaption>
                </figure>
            </div>
            <h4>Expositions de papillons</h4>
            <div class="article">
                <div class="block-art1 w-100 d-flex justify-content-center lg-8 sm-6">
                    <p>
                        Nos expositions permanentes et temporaires présentent des papillons exotiques et locaux, chacun avec ses propres caractéristiques uniques. Apprenez-en plus sur leurs cycles de vie, leurs habitats et leurs rôles dans les écosystèmes. Des panneaux explicatifs et des guides sont disponibles pour enrichir votre visite.
                    </p>
                </div>
            </div>
            <div class="section2-img">
                <figure>
                    <img class="card2-img-top rounded-3" src="../images3/Capture_d’écran_2023-03-17_154301.jpg" width="200" height="330" alt="Boite entomologie">
                    <figcaption>Boîte entomologique</figcaption>
                </figure>
            </div>
            <div class="section1">
                <div class="text-width-img">
                    <div class="title1">Article: Araschnia levana</div>
                    <div class="article-1">
                        <img class="text-1" src="../images3/Brenthis_daphne_(Le-Nacré-de-la-ronce).jpg" alt="image papillon">
                        <p>
                            Araschnia levana, également connue sous le nom de Carte géographique, est un papillon fascinant à découvrir. Ce papillon se distingue par ses deux formes saisonnières distinctes et ses motifs de coloration complexes. Venez en apprendre davantage sur cet incroyable spécimen et sa place dans la nature.
                        </p>
                    </div>
                </div>
            </div>
            <div class="section2">
                <div class="text-width-img">
                    <div class="title2">Article: Brenthis daphne</div>
                    <div class="article2">
                        <img class="text-2" src="../images3/Araschnia_levana_(La-carte-géographique).jpg" alt="image papillon">
                        <p>
                            Brenthis daphne, le Nacré de la ronce, est un papillon remarquable par ses motifs nacrés sur les ailes. Il habite les zones boisées et les prairies humides. Découvrez ses habitudes alimentaires, ses méthodes de camouflage et comment il contribue à l'équilibre de son environnement.
                        </p>
                    </div>
                </div>
            </div>




<?php
include 'db_connect.php';
$sql = "SELECT * FROM horaires";
$result = $pdo->query($sql);
$horaires = [];
if ($result->rowCount() > 0) {
    $horaires = $result->fetchAll(PDO::FETCH_ASSOC);
}
$pdo = null;
?>

            <!----------------------------------------------- Mise a jour LE 28/06/2024 ------ V.1 ------------------------------------->
            <article>
            <h4 class="sub-title-h4">Horaires d'Ouverture V.1</h4>
                <table border="1">
                    <tr class="head">
                        <th class="hre">Jour</th>
                        <th class="hre">Ouverture<br> Matin</th>
                        <th class="hre">Fermeture<br> Matin</th>
                        <th class="hre">Ouverture<br> Après-midi</th>
                        <th class="hre">Fermeture<br> Après-midi</th>
                    </tr>
                    <?php if (!empty($horaires)): ?>
                        <?php foreach ($horaires as $horaire): ?>
                            <tr>
                              <div class="tr-cel">
                                <td class="day"><?php echo htmlspecialchars($horaire['jour']); ?></td>
                                <td class="cel"><?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
                                <td class="cel"><?php echo ($horaire['fermeture_matin'] == '00:00:00' && $horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
                                <td class="cel"><?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
                                <td class="cel"><?php echo ($horaire['fermeture_apresmidi'] == '00:00:00' && $horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
                              </div>
                              </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Aucun horaire trouvé</td>
                        </tr>
                    <?php endif; ?>
                </table>
    
            <!--<article>   V.2 -->  <!--
                <h4 class="sub-title-h4">Horaires d'Ouverture V.2</h4>
                <div class="table-responsive">
                    <table  border="1" class="table table-bordered">
                        <thead>
                            <tr class="head">
                                <th class="hre">Jour</th>
                                <th class="hre">Ouverture Matin</th>
                                <th class="hre">Fermeture Matin</th>
                                <th class="hre">Ouverture Après-Midi</th>
                                <th class="hre">Fermeture Soir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!?php foreach ($horaires as $horaire) : ?> -->
                                <!--<tr>
                                    <td data-label="Jour" class="cel"><!?= $horaire['Jour']; ?></td>
                                    <td data-label="Ouverture Matin" class="cel"><!?= ($horaire['Ouverture_Matin'] === '00:00:00') ? 'Fermé' : $horaire['Ouverture_Matin']; ?></td>
                                    <td data-label="Fermeture Matin" class="cel"><!?= ($horaire['Fermeture_Matin'] === '00:00:00') ? 'Fermé' : $horaire['Fermeture_Matin']; ?></td>
                                    <td data-label="Ouverture Après-Midi" class="cel"><!?= ($horaire['Ouverture_Apres_Midi'] === '00:00:00') ? 'Fermé' : $horaire['Ouverture_Apres_Midi']; ?></td>
                                    <td data-label="Fermeture Soir" class="cel"><!?= ($horaire['Fermeture_Soir'] === '00:00:00') ? 'Fermé' : $horaire['Fermeture_Soir']; ?></td>
                                </tr>-->   <!--

                                <tr>
                                  <div class="tr-cel">
                                    <td class="day"><!?php echo htmlspecialchars($horaire['jour']); ?></td>
                                    <td class="cel"><!?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
                                    <td class="cel"><!?php echo ($horaire['fermeture_matin'] == '00:00:00' && $horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
                                    <td class="cel"><!?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
                                    <td class="cel"><!?php echo ($horaire['fermeture_apresmidi'] == '00:00:00' && $horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
                                  </div>
                                </tr>

                            <!?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </article>-->


            <article> 
            <!-- Mise a jour LE 28/06/2024 -->  
            <h4 class="sub-title-h4">Horaires d'Ouverture V.3</h4>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="hre">Jour</th>
                    <th class="hre">Matin</th>
                    <th class="hre">Après-midi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($horaires)): ?>
                    <?php foreach ($horaires as $horaire): ?>
                      <tr>
                        <td class="jour"><?php echo htmlspecialchars($horaire['jour']); ?></td> <!--jour-->
                        <td class="cel">
                          <?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']) . ' - ' . htmlspecialchars($horaire['fermeture_matin']); ?>
                        </td>
                        <td class="cel">
                          <?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']) . ' - ' . htmlspecialchars($horaire['fermeture_apresmidi']); ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="3">Aucun horaire trouvé</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </article>




<article> 
  <!-- Mise a jour LE 28/06/2024 -->  
  <h4 class="sub-title-h4">Horaires d'Ouverture</h4>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="hre">Jour</th>
          <th class="hre">Ouverture Matin</th>
          <th class="hre">Fermeture Matin</th>
          <th class="hre">Ouverture Après-midi</th>
          <th class="hre">Fermeture Après-midi</th>
        </tr>
      </thead>
      <tbody>
        <!?php if (!empty($horaires)): ?>
          <!?php foreach ($horaires as $horaire): ?>
            <tr>
              <td class="jour" data-label="Jour"><!?php echo htmlspecialchars($horaire['jour']); ?></td>
              <td class="cel" data-label="Ouverture Matin"><!?php echo ($horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
              <td class="cel" data-label="Fermeture Matin"><!?php echo ($horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
              <td class="cel" data-label="Ouverture Après-midi"><!?php echo ($horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
              <td class="cel" data-label="Fermeture Après-midi"><!?php echo ($horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
            </tr>
          <!?php endforeach; ?>
        <!?php else: ?>
          <tr>
            <td colspan="5">Aucun horaire trouvé</td>
          </tr>
        <!?php endif; ?>
      </tbody>
    </table>
  </div>
</article>-->








            <div class="section">
              <article>
                <h4 class="sub-title-h4">Adresse du Musée</h4>
                <p>
                  123 Rue des Papillons<br>
                  75020 Paris<br>
                  France
                </p>
              </article>
            </div>

            <h4 class="sub-title-h4">Où nous trouver !</h4>
            <div class="map-responsive">
              <iframe class="map border border-primary"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44627.94716636293!2d0.11000759156281059!3d45.645867354882505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fe2d85032bc499%3A0x405d39260eec0f0!2sAngoul%C3%AAme!5e0!3m2!1sfr!2sfr!4v1678740766403!5m2!1sfr!2sfr"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>

            <div class="map">
              <a href="https://www.google.com/maps" target="_blank" class="link-rep">Réserver votre plan de la ville ici !</a>
            </div>

        </div>

    <!--ASIDE-->
    <aside class="aside">

      <div class="section-4">
        <img src="../images3/Capture_d’écran_2023-03-13_230400.jpg" class="img-aside" width="204" height="146"
          alt="boite papillons"><span class="img-4">Visite</span>
      </div>

      <div class="aside-nav">
        <h5>images</h5>
        <a href="https://www.photospapillons.com/papillons-de-france.php">Banques images</a>
        <a href="../pages/gallery-index.html">Galerie images</a>
      </div>

      <div class="aside-nav">
        <h5>Évènements</h5>
        <a href="../pages/calendar.html">Agenda</a>
        <a href="../pages/assos.html">assemblé</a>
      </div>

      <div class="aside-nav">
        <h5>Les sortie</h5>
        <a href="#">Musee</a>
        <a href="../pages/exposition.html">exposition</a>
      </div>

      <div class="aside-nav">
        <h5>site web</h5>
        <a href="https://biodiversite-foret.fr/2023/07/05/les-groupes-despeces-les-lepidopteres/"
          target="_blank">Actualité</a>
        <a href="../pages/recherche_wiki.html">recherche wikipedia</a>
      </div>

      <div class="aside-nav">
        <h5>identifier</h5>
        <a href="../pages/identification.html">quel est ce papillon</a>
        <a href="../pages/fiche-details.html">page lepidoptera</a>
      </div>
    </aside>

    </div>
    <footer class="blockfooter">
      <div class="block-ftr">
        <div class="contact">
            <a href="../pages/contact.html" title="Contact">Contact</a>
        </div>
        <p>Ⓒ Ailes Enchantées</p>
        <p>Mentions légales</p>
      </div>
    </footer>

</body>
</html>


<!--------------------------------------------------------------------------------->

<!--
3. Création d'une page pour afficher les horaires
Créez un fichier horaires.php pour afficher les horaires.
-->


<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--/*---------------------------- Mise a jour le 28/06/2024 ------------------------------*/-->

<!--?php
include 'db_connect.php';//modifier db_connect pour test 28/06/2024
$sql = "SELECT * FROM horaires";
$result = $pdo->query($sql);
$horaires = [];
if ($result->rowCount() > 0) {
    $horaires = $result->fetchAll(PDO::FETCH_ASSOC);
}
$pdo = null;
?>-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Horaires</title>
    <link rel="stylesheet" href="../styles/styles.css">

<style>
  th {
    background-color: #F2F2F2 !important;
  }
  .cel {
    text-align: center;
  }
</style>

</head>
<!--<body>
    <h1>Horaires d'Ouverture</h1>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture Matin</th>
            <th>Fermeture Matin</th>
            <th>Ouverture Après-midi</th>
            <th>Fermeture Après-midi</th>
        </tr>                                        --> 
        <!--?php if (!empty($horaires)): ?>  -->
            <!--?php foreach ($horaires as $horaire): ?>
                <tr>
                    <td>  -->  <!--?php echo htmlspecialchars($horaire['jour']); ?></td>
                    <td class="cel">  -->  <!--?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
                    <td class="cel">  --> <!--?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
                    <td class="cel"> --> <!--?php echo ($horaire['fermeture_apresmidi'] == '00:00:00' && $horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
                </tr>  -->
            <!--?php endforeach; ?>  -->
        <!--?php else: ?>
            <tr>
                <td colspan="5">Aucun horaire trouvé</td>
            </tr>  -->
        <!--?php endif; ?>
    </table>
</body>
</html>  -->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Entomologie">
  <!--<link rel="stylesheet" href="../css/style.css" type="text/css">  -->
  <title>ECF-musée des papillons-A</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!--kit icones-->
  <!--mon code (64e89a7edd) pour utilisé les icones free fontawesome-->
  <script src="https://kit.fontawesome.com/64e89a7edd.js" crossorigin="anonymous"></script>
  <!--style de police d'ecriture-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

  <link rel="stylesheet" href="../style/header_style.css">
  <link rel="stylesheet" href="../style/contenu_style.css">
  <link rel="stylesheet" href="../style/contenu_musée_style.css">
  <link rel="stylesheet" href="../style/footer_style.css">  

  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;700&family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">



  <!--STYLE-CSS-->
  <style>
    /*20/06/2024 body {
      background: lightgoldenrodyellow;
      background-position: 100% 100%;
      margin: 0px;
    }

    /*------------------------------------------------------------------------------------------------------HEADER--*/
    /*20/06/2024
    .header {
      display: flex;
      flex-wrap: wrap;
      flex: 1 1 160px;
      flex-direction: row;
      width: 100%;
      justify-content: space-between;
      align-items: center;
      background: mediumorchid;
    }

    /*---------------------------------------------------------------------------------------------------BLOCK-NAV--*/
    /*20/06/2024
    .logo {
      display: flex;
      color: white;
      margin-left: 10px;
      font-family: "Tangerine", serif;
      font-weight: 590;
      text-shadow: 4px 4px 4px blue;
      font-size: 55px;
    }

    /*--------------------------------------------------------------------------------------------------------------*/
    /*20/06/2024
    .menu {
      display: flex;
      flex-direction: row;
      height: 80px;
      align-items: center;
      color: white;
      margin-right: 25px;
      margin-left: 10px;
    }

    /*------------------------------------------------------------------------------------------------ARRIERE-PLAN--*/
    /*
      a:hover {
        text-decoration: none;
        color: deepskyblue;
      }
      */
    /*20/06/2024
    .link-nav {
      color: white;
    }

    .link-nav:hover {
      color: lightblue;
    }

    .text-primary {
      margin-bottom: 50px;
      font-size: 25px;
    }

    /*------------------------------------------------------------------------------------------------FIL D'ARIANE--*/
    /*20/06/2024
    .breadcrumb {
      width: 400px;
    }

    .breadcrumb-item {
      max-width: 100%;
      background: none;
      margin-left: 20px;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .link-rep {
      margin-right: 5px;
      margin-left: 5px;
    }

    /*-----------------------------------------------------------------------------------------------------CONTENT--*/
    /*20/06/2024
    .content {
      display: flex;
      flex-direction: row;
      /*column*/ /*
      justify-content: space-around;
      width: 100%;
      margin-top: 5px;
      margin-bottom: 5px;
    }

    /*--------------------------------------------------------------------------------------------------------MAIN--*/
    /*20/06/2024
    .main {
      float: left;
      flex-direction: column;
      width: 70%;
      /*70% du parent "content"*/ /*
      margin-left: 10px;
      background: #fbfbf9;
      align-items: center;
      border-radius: 5px;
      box-shadow: 0px 0px 40px rgba(128, 128, 128, 0.2);
    } */
    /*21/06/2024 
    .link {
      display: flex;
      flex-direction: row;
      text-align: center;
      justify-content: center;
      margin-top: 10px;

      font-size: 1.2em;
    }

    .link-page {
      padding: 20px;
      width: 100%;
      font-size: 18.72px;
      font-weight: 600;
      margin-bottom: 1px;
    }*/

    /*--------------------------------------------------------------------------------------------------------------*/
    /*21/06/2024 
    p {
      margin-left: 0px;
      color: black;
    }

    .title {
      display: flex;
      justify-content: center;
      text-align: center;
      margin-top: 12px;
      margin-bottom: 50px;
    }

    article {
      display: flex;
      flex-direction: column;
      padding: 10px;
      margin-bottom: 20px;
    }

    .article {
      display: flex;
      flex-direction: column;
      text-align: justify;
      padding: 10px;
      margin-bottom: 20px;
    }

    h1 {
      display: flex;
      justify-content: center;
      text-align: center;
    }

    h2 {
      margin-bottom: 0px;
      color: #0000ff;
      font-weight: 600;
      font-size: 1.5em;
    }

    h4 {
      text-align: center;
      color: #0000ff;
      font-weight: 600;
    }

    .title,
    strong {
      color: #0000ff;
    }*/

    /*-------------------------------------------------------------------------------------------------------------*/
    /*21/06/2024
    .section1-img {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: left;
      margin-bottom: 50px;
      width: 100%;
      padding: 5px;
    }

    .card1-img-top {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 100%;
      border: 1px solid blue;
      border-radius: 5px;
    }

    .title1 {
      text-align: left;
    }

    /*-------------------------------------------------------------------------------------IMAGE BOITE ENTOMOLOGIE--*/
    /*21/06/2024
    .section2-img {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: left;
      margin-bottom: 50px;
      width: 100%;
    }

    .card2-img-top {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 100%;
    }

    .title2 {
      text-align: right;
    }*/

    /*--------------------------------------------------------------------------------------------------------------*/
    /*21/06/2024
    .section3-img {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: left;
      margin-bottom: 50px;
      width: 90%;
    }

    .card3-img-top {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 90%;
    }*/

    /*--------------------------------------------------------*/
    /*21/06/2024
    .text-1 {
      width: 250px;
      height: 150px;
      float: left;
      margin-right: 15px;
      padding: 10px;
    }

    .text-2 {
      width: 250px;
      height: 150px;
      float: right;
      margin-left: 15px;
      padding: 10px;
    }

    .text-width-img {
      font-family: Arial, sans-serif;
      font-size: 1em;
      text-align: justify;
      padding: 10px;
    }*/

      .hre {
        /*font-size: 16px;*/
        text-align: center;
        width: 120px;
      }

      article {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
        width: 100%;
      }

    /*---------------------------------------------------------------------------------------------------COORDONNE--*/
    /*21/06/2024
    .section {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
      padding: 0px;
      text-align: left;
    }*/

    /*--------------------------------------------------------------------------------------------------GOOGLE MAP--*/
    /*
    .block-map {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-content: center;
      align-items: center;
      width: 100%;
      border: 2px solid white;
      margin-bottom: 50px;
    }

    .map {
      border: 1px solid blue;
      border-radius: 5px;
    }*/


    .map-responsive {
      position: relative;
      overflow: hidden;
      padding-bottom: 56.25%; /* 16:9 aspect ratio */
      height: 0;
      /*border: 1px solid red;*/
    }
    .map-responsive iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0;

    }

    @media (max-width: 576px) {
      .map-responsive {
        padding-bottom: 5%; /*75%*//* Adjust the aspect ratio for smaller screens if needed */
      }

      .map-responsive  {
        /*visibility: hidden;*/
        /*width: 100%;*/
        /*padding-bottom: 100%;*/
        height: 80%;
        width: 80%;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
    }

      /*map {

      }*/

    }

    /*-------------------------------------------------------------------------------------------- BOUTON RESERVER--*/
    /*21/06/2024
    .btn-card {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: auto;
      width: 100%;
      margin-bottom: 10px;
      padding: 20px;
    }

    .link-btn {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 30px;
      width: 160px;
      border-radius: 50px;
      text-decoration: none !important;
      /*background-color: #0145b5 !important;*//*
      background:mediumorchid;/*#0000ff*//*
      color: white;
    }

    .link-btn:hover {
      background:rgb(211, 85, 163)!important;/*green*//*
    }*/

    /*-------------------------------------------------------------------------------------------------------ASIDE--*/
    /*20/06/2024 */.aside {
      float: right;
      flex-direction: column;
      width: 26%;
      /*22% du parent "content"*/
      margin-right: 10px;
      padding: 4px;
      border-radius: 5px;
      height: 1030px;/*830px*/
      box-shadow: 0px 0px 40px rgba(128, 128, 128, 0.2);

      background: #fbfbf9;
    } 

    .aside-nav {
      display: flex;
      flex-direction: column;
      /*background: #fbfbf9;*/
      margin-bottom: 20px;
      height: 100px;
      padding: 4px;
      box-shadow: 0px 0px 40px rgba(128, 128, 128, 0.2);
    }

    .aside-link {
      display: flex;
      flex-direction: column;
      border: 2px solid green;
    }

    /*------------------------------------------------------------------------------------------BLOCK-IMAGE3 ASIDE--*/
    .section3-img {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: left;
      margin-top: 10px;
      width: 100%;
    }

    .card3-img-top {
      display: flex;
      flex-direction: column;
      width: 250px;
      align-items: center;
      justify-content: center;
      border: 1px solid blue;
      border-radius: 5px;
    }

    /*-------------------------------------------------------------------------------------------------IMAGE ASIDE--*/
    .section-4 {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: left;
      margin-bottom: 20px;
      padding: 0px;
      width: 100%;
      text-align: left;
      background: #fbfbf9;
    }

    .img-4 {
      text-align: left !important;
      width: 80%;
      font-size: 0.8em;
    }

    .img-aside {
      border-radius: 5px;
      height: auto;
      width: 80%;
      margin-top: 10px;
      object-fit: cover;

    }

    img {
      border: 1px solid blue;
    }

    /*------------------------------------------------------------------------------------------------------FOOTER--*/
    /*20/06/2024
    .blockfooter {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      background: #7dc95e;
      color: white;
      height: 150px;
      width: 100%;
    }

    .block {
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-direction: row;
      width: 50%;
      margin-left: 80px;
    }

    .footer {
      display: flex;
      flex-direction: column;
      text-align: center;
      justify-content: space-around;
      align-items: center;
      width: 100%;
    }

    .mention {
      display: flex;
      flex-direction: column;
      text-align: left;
      width: 200px;
      color: blue;
    }

    .contact {
      display: flex;
      flex-direction: row;
      text-align: left;
      width: 200px;
      color: blue;
    }

    a {
      display: flex;
      color: blue;
      text-decoration: none;
    }

    /*------------------------------------------------------MEDIA QUERY---------------------------------------------*/

    /*20/06/2024 @media screen and (max-width: 320px) and (min-width: 576px) {

      .menu,
      .breadcrumb-item,
      .link-nav,
      nav {
        font-size: 12px;
        display: flex;
        flex-direction: row;
        text-align: left;
        max-width: 100%;
      }
    }*/

    /*--------------------------------------------------------------------------------------------------NAVIGATION--*/
    /*20/06/2024 @media screen and (max-width: 576px) {

      .link,
      .link-int,
      span,
      menu {
        font-size: 12px;
        max-width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: left;
        align-content: center;
        align-items: center;
        text-align: left;
        height: 40px;
      }
    }*/

    /*--------------------------------------------------------------------------------------------------------MENU--*/
    /*20/06/2024 @media screen and (min-width: 320px) and (max-width: 768px) {
      .menu {
        display: flex;
        flex-direction: column;
        height: 40px;
        font-size: 12px;
        max-width: 100%;
        text-align: center;
        background-color: blueviolet;
        height: auto;
        margin-right: 15px;
        margin-left: 10px;
      }
    }*/

    /*-----------------------------------------------------------------------------------------------------CONTENT--*/
    /*20/06/2024 @media screen and (min-width: 320px) and (max-width: 576px) {
      .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        padding: 5px;
      }
    }*/

    @media screen  and (max-width: 576px) {/*and (min-width: 320px)*/

      .main,
      .aside {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: space-around;
        margin: 0px;
      }
    }

    /*------------------------------------------------------------------------------------------------------FOOTER--*/
    /*20/06/2024 @media screen and (min-width: 320px) and (max-width: 576px) {

      .block,
      .contact,
      .mention,
      .text-dark {
        display: flex;
        flex-direction: row;
        justify-content: center;
        text-align: center;
        width: 100%;
        margin: 0px;
      }
    }*/
      /*20/06/2024*/  @media screen and (max-width: 768x) { /*
      .aside {*/
        /*flex: 0 1 300px;
        margin: 10px;
        padding: 10px;
        background: #fbfbf9;
        border-radius: 5px;
        box-shadow: 0 0 40px rgba(128, 128, 128, 0.2);*//*
      }*/

      /*-----------------------------------------------------------------*//*
      .map, .z-index {
        display: flex;
        width: 200px !important;
      }
      /*-----------------------------------------------------------------*/
      }

    @media screen  and (max-width: 576px) {/*and (min-width: 320px)*/
      /*20/06/2024 .aside {
        padding: 0px;
        margin-top: 10px;
      }*/

      .section-4 {
        padding: 5px;

      }

      .img-4 {
        text-align: left !important;
        height: auto;
      }
    }



  </style>
</head>

<body>
  <!--HEADER-->
  <!--<container>-->

  <nav class="header">
    <div class="logo">Ailes-Enchantées</div><!--Entomologie-->

    <!--OPTION MENU BURGER-->
    <div class="menu">

      <a href="../index.html" title="Accueil" class="link-nav m-2">Accueil</a>

      <a href="../pages/blog.html" title="Blog" class="link-nav m-2">Blog</a><!--../pages/blog.html-->
      <a href="../pages/Agenda.html" title="A propos" class="link-nav m-2">Évènements</a>

      <a href="../pages/qui_somme_nous.html" title="Qui somme nous" class="link-nav m-2">Qui sommes nous ?</a>
      <a href="https://www.facebook.com/forum.lepidoptera/" target="_blank" title="Forum" class="link-nav m-2">Forum</a>
      <a href="../pages/contact.html" title="Contact" class="link-nav m-2">Contact</a>
    </div>
  </nav>

  <!--FIL D'ARIANE-->
  <div class="breadcrumb-item">
    <a href="./Sommaire-index.html" class="link-rep">Sommaire</a> >
    <a href="../index.html" class="link-rep">Acceuil</a> > musée des
    papillons
  </div>

  <!--CONTENER-->
  <div class="content">
    <!--MAIN-->

    <!----------------------------------------------------------------------------------------------------------------->

    <div class="main">
      <div class="article">
        <h2 class="title">MUSEE DES PAPILLONS</h2>
        <h4 class="sub-title-h4">Les merveilles de la nature</h4> 
        <p>
          Découvrez la fascinante diversité des papillons du monde entier. Le Musée des Papillons vous propose une immersion dans l'univers coloré et délicat de ces insectes extraordinaires. Explorez notre collection et laissez-vous émerveiller par la beauté naturelle et la diversité des espèces.
        </p>
      </div>

      <div class="section1-img">
        <figure>
          <img class="card1-img-top rounded-3"
            src="../images3/Capture_d’écran_2023-03-13_230805(httpswww.musee-du-papillon.fr).jpg" width="250"
            height="150" alt="image papillon">
          <figcaption>
            <a href="https://www.musee-du-papillon.fr/" target="_blank" class="title-fig">Musée du papillon Paris 20e</a>
          </figcaption>
        </figure>
      </div>

      <h4>Expositions de papillons</h4>
      <div class="article">
        <div class="block-art1 w-100 d-flex justify-content-center lg-8 sm-6">
          <p>
            Nos expositions permanentes et temporaires présentent des papillons exotiques et locaux, chacun avec ses propres caractéristiques uniques. Apprenez-en plus sur leurs cycles de vie, leurs habitats et leurs rôles dans les écosystèmes. Des panneaux explicatifs et des guides sont disponibles pour enrichir votre visite.
          </p>
        </div>
      </div>

      <div class="section2-img">
        <figure>
          <img class="card2-img-top rounded-3" src="../images3/Capture_d’écran_2023-03-17_154301.jpg" width="200"
            height="330" alt="Boite entomologie">
          <figcaption>Boîte entomologique</figcaption>
        </figure>
      </div>

      <div class="section1">
        <div class="text-width-img">
          <div class="title1">Article: Araschnia levana</div>
          <div class="article-1">
            <img class="text-1" src="../images3/Brenthis_daphne_(Le-Nacré-de-la-ronce).jpg" alt="image papillon">
            <p>
              Araschnia levana, également connue sous le nom de Carte géographique, est un papillon fascinant à découvrir. Ce papillon se distingue par ses deux formes saisonnières distinctes et ses motifs de coloration complexes. Venez en apprendre davantage sur cet incroyable spécimen et sa place dans la nature.
            </p>
          </div>
        </div>
      </div>

      <div class="section2">
        <div class="text-width-img">
          <div class="title2">Article: Brenthis daphne</div>
          <div class="article2">
            <img class="text-2" src="../images3/Araschnia_levana_(La-carte-géographique).jpg" alt="image papillon">
            <p>
              Brenthis daphne, le Nacré de la ronce, est un papillon remarquable par ses motifs nacrés sur les ailes. Il habite les zones boisées et les prairies humides. Découvrez ses habitudes alimentaires, ses méthodes de camouflage et comment il contribue à l'équilibre de son environnement.
            </p>
          </div>
        </div>
      </div>

<!----------------------------------------------- Mise a jour LE 28/06/2024 ------ V.1 ------------------------------------->
<article>
<h4 class="sub-title-h4">Horaires d'Ouverture V.1</h4>
    <table border="1">
        <tr class="head">
            <th class="hre">Jour</th>
            <th class="hre">Ouverture<br> Matin</th>
            <th class="hre">Fermeture<br> Matin</th>
            <th class="hre">Ouverture<br> Après-midi</th>
            <th class="hre">Fermeture<br> Après-midi</th>
        </tr>
        <?php if (!empty($horaires)): ?>
            <?php foreach ($horaires as $horaire): ?>
                <tr>
                  <div class="tr-cel">
                    <td class="day"><?php echo htmlspecialchars($horaire['jour']); ?></td>
                    <td class="cel"><?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
                    <td class="cel"><?php echo ($horaire['fermeture_matin'] == '00:00:00' && $horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
                    <td class="cel"><?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
                    <td class="cel"><?php echo ($horaire['fermeture_apresmidi'] == '00:00:00' && $horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
                  </div>
                  </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun horaire trouvé</td>
            </tr>
        <?php endif; ?>
    </table>

  
<!----------------------------------------------------------------------------------------->
<!--
<article> -->
  <!-- Mise a jour LE 28/06/2024 -->  <!--
  <h4 class="sub-title-h4">Horaires d'Ouverture</h4>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="hre">Jour</th>
          <th class="hre">Matin</th>
          <th class="hre">Après-midi</th>
        </tr>
      </thead>
      <tbody>
        <!?php if (!empty($horaires)): ?>
          <!?php foreach ($horaires as $horaire): ?>
            <tr>
              <td class="jour"><!?php echo htmlspecialchars($horaire['jour']); ?></td> --> <!--jour-->
              <!-- <td class="cel">
                <!?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']) . ' - ' . htmlspecialchars($horaire['fermeture_matin']); ?>
              </td>
              <td class="cel">
                <!?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']) . ' - ' . htmlspecialchars($horaire['fermeture_apresmidi']); ?>
              </td>
            </tr>
          <!?php endforeach; ?>
        <!?php else: ?>
          <tr>
            <td colspan="3">Aucun horaire trouvé</td>
          </tr>
        <!?php endif; ?>
      </tbody>
    </table>
  </div>
</article> -->



<!-------------------------------------------------->
<!--<article> -->
  <!-- Mise a jour LE 28/06/2024 -->  <!--
  <h4 class="sub-title-h4">Horaires d'Ouverture</h4>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="hre">Jour</th>
          <th class="hre">Ouverture Matin</th>
          <th class="hre">Fermeture Matin</th>
          <th class="hre">Ouverture Après-midi</th>
          <th class="hre">Fermeture Après-midi</th>
        </tr>
      </thead>
      <tbody>
        <!?php if (!empty($horaires)): ?>
          <!?php foreach ($horaires as $horaire): ?>
            <tr>
              <td class="jour" data-label="Jour"><!?php echo htmlspecialchars($horaire['jour']); ?></td>
              <td class="cel" data-label="Ouverture Matin"><!?php echo ($horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
              <td class="cel" data-label="Fermeture Matin"><!?php echo ($horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
              <td class="cel" data-label="Ouverture Après-midi"><!?php echo ($horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
              <td class="cel" data-label="Fermeture Après-midi"><!?php echo ($horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
            </tr>
          <!?php endforeach; ?>
        <!?php else: ?>
          <tr>
            <td colspan="5">Aucun horaire trouvé</td>
          </tr>
        <!?php endif; ?>
      </tbody>
    </table>
  </div>
</article>-->







<style>
@media (max-width: 576px) {
  .table-responsive {
    overflow-x: auto;
  }

  .table thead {
    display: none;
  }

  .table tbody, .table tr, .table td {
    display: block;
    width: 100%;
  }

  .table tr {
    margin-bottom: 15px;
  }

  .table td {
    text-align: right;
    padding-left: 50%;
    position: relative;
  }

  .table td::before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 45%;
    padding-left: 15px;
    font-weight: bold;
    text-align: left;
  }
}
</style>


<style>/*----------------------------------------------------------------------*/

@media (max-width: 576px) {
  /*.jour, .cel {
    display: flex;
    flex-direction: row;
    width: 100%;
    text-align: center;
    justify-content: center;
    padding: 0px;
  }*/ 

  thead, tr {
    display: flex;
    flex-direction: column;
  }

  thead {
    visibility: hidden;
  }

  .container-hour, tr, tbody{
    width: 80% !important;
  }

  tr, tbody, table, thead {
    width: 100% !important;
  }

  /*.tr-cel {
    display: flex;
    flex-direction: column ;
    background-color: aqua !important;
  }*/

 /* tr,.cel, .td, .cel {
    height: auto !important;
  }*/

}

/*.head {
  display: flex;
  flex-direction: row;
}*/

/*td/*th .day*/ /*{
  display: flex;
  flex-direction: row;
  text-align: center;
  justify-content: center;
}*/

/*.day {
  display: flex;
  flex-direction: row;
  text-align: left;
  justify-content: left;
}*/
/*----------------------------------------------------------------------------------*/
</style>






<!---------------------------------------------- V.2 ---->
<!--
<article>
    <div class="container-hour opening-hour">
        <h4>Heures d'ouverture V.2</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="hre">Jour</th>
                        <th class="hre">Ouverture Matin</th>
                        <th class="hre">Fermeture Matin</th>
                        <th class="hre">Ouverture Après-midi</th>
                        <th class="hre">Fermeture Après-midi</th>
                    </tr>
                </thead>
                <tbody>
                    <!?php if (!empty($horaires)): ?>
                        <!?php foreach ($horaires as $horaire): ?>
                            <tr>
                                <td data-label="."><!?php echo htmlspecialchars($horaire['jour']); ?></td>
                                <td class="cel" data-label="Ouverture Matin">
                                    <!?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?>
                                </td>
                                <td class="cel" data-label="Fermeture Matin">
                                    <!?php echo ($horaire['fermeture_matin'] == '00:00:00' && $horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?>
                                </td>
                                <td class="cel" data-label="Ouverture Après-midi">
                                    <!?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?>
                                </td>
                                <td class="cel" data-label="Fermeture Après-midi">
                                    <!?php echo ($horaire['fermeture_apresmidi'] == '00:00:00' && $horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?>
                                </td>
                            </tr>
                        <!?php endforeach; ?>
                    <!?php else: ?>
                        <tr>
                            <td colspan="5">Aucun horaire trouvé</td>
                        </tr>
                    <!?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</article> 
                    -->


<!------------------------------------------------------------------------------------>
<!-- test -->  <!--
<article> -->
  <!-- Mise a jour LE 28/06/2024 -->  <!--
  <h4 class="sub-title-h4">Horaires d'Ouverture</h4>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="hre">Jour</th>
          <th class="hre">Ouverture<br> Matin</th>
          <th class="hre">Fermeture<br> Matin</th>
          <th class="hre">Ouverture<br> Après-midi</th>
          <th class="hre">Fermeture<br> Après-midi</th>
        </tr>
      </thead>
      <tbody>  <
        <!?php if (!empty($horaires)): ?>
          <!?php foreach ($horaires as $horaire): ?>
            <tr>
              <td><!?php echo htmlspecialchars($horaire['jour']); ?></td>
              <td class="cel"><!?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
              <td class="cel"><!?php echo ($horaire['fermeture_matin'] == '00:00:00' && $horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
              <td class="cel"><!?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
              <td class="cel"><!?php echo ($horaire['fermeture_apresmidi'] == '00:00:00' && $horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
            </tr>
          <!?php endforeach; ?>
        <!?php else: ?>
          <tr>
            <td colspan="5">Aucun horaire trouvé</td>
          </tr>
        <!?php endif; ?>
      </tbody>
    </table>
  </div>
</article>  -->

<!--<style>
.hre {
  text-align: center;
  width: 120px;
}

.cel {
  text-align: center;
}

</style>-->


<!------------------------------------------------------------ V.3 --->
<!-- tres bien mais je desactive --> <!--
<div class="container-hour opening-hour">
        <h4>Heures d'ouverture</h4>
        <div class="table-hour">
          <table>
            <tbody>
              <tr>
                <th>Lundi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Mardi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Mercredi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Jeudi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Vendredi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Samedi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Dimanche</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> -->

<style>/*

tr, th,td {
  border: 1px solid black;
  padding: 5px;
  overflow-x: auto;
}
*/
</style>

<!------------------------------------------------------------ V.4 --->
<!--
<div class="container-hour opening-hour">
        <h4>Heures d'ouverture V.4</h4>
        <div class="table-hour">
          <table>

          <thead>
            <tr>
              <th class="hre">Jour</th>
              <th class="hre">Ouverture Matin</th>
              <th class="hre">Fermeture Matin</th>
              <th class="hre">Ouverture Après-midi</th>
              <th class="hre">Fermeture Après-midi</th>
            </tr>
        </thead>


            <tbody>

            <!?php if (!empty($horaires)): ?>
              <!?php foreach ($horaires as $horaire): ?>

              <tr> --> <!--
                <th>Lundi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Mardi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td> -->
                <!--
                <td class="day" data-label="Jour"><!?php echo htmlspecialchars($horaire['jour']); ?></td>
                <td class="cel" data-label="Ouverture Matin">
                    <!?php echo ($horaire['ouverture_matin'] == '00:00:00' && $horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?>
                </td>
                <td class="cel" data-label="Fermeture Matin">
                    <!?php echo ($horaire['fermeture_matin'] == '00:00:00' && $horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?>
                </td>
                <td class="cel" data-label="Ouverture Après-midi">
                    <!?php echo ($horaire['ouverture_apresmidi'] == '00:00:00' && $horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?>
                </td>
                <td class="cel" data-label="Fermeture Après-midi">
                    <!?php echo ($horaire['fermeture_apresmidi'] == '00:00:00' && $horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?>
                </td>
              </tr>  -->
              <!--
              <tr>
                <th>Mercredi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Jeudi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Vendredi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Samedi</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>
              </tr>
              <tr>
                <th>Dimanche</th>
                <td>09:00 - 12:00</td>
                <td>14:00 - 18:00</td>-->  <!--
              </tr> 

                  <!?php endforeach; ?>
                <!?php else: ?>
                    <tr>
                        <td colspan="5">Aucun horaire trouvé</td>
                    </tr>
                <!?php endif; ?>

            </tbody>
          </table>
        </div>
      </div>

                -->

<!--------------------------------------------------------------------------------------------------------------------->
      
        <!--<h4 class="sub-title-h4">Les horaires</h4>
        <p>
          Lundi matin de 9:00 - 12:00, après-midi 14:00 - 17:00<br>
          Mercredi matin de 9:00 - 12:00, après-midi 14:00 - 17:00<br>
          Vendredi après-midi 14:00 - 17:00<br>
          Samedi matin de 9:00 - 12:00
        </p>-->

    </article>

      <div class="section">
        <article>
          <h4 class="sub-title-h4">Adresse du Musée</h4>
          <p>
            123 Rue des Papillons<br>
            75020 Paris<br>
            France
          </p>
        </article>
      </div>

      <!--------------------------------------------------------------------------------------------------------------->
      <h4 class="sub-title-h4">Où nous trouver !</h4>
      <div class="map-responsive">
        <iframe class="map border border-primary"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44627.94716636293!2d0.11000759156281059!3d45.645867354882505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fe2d85032bc499%3A0x405d39260eec0f0!2sAngoul%C3%AAme!5e0!3m2!1sfr!2sfr!4v1678740766403!5m2!1sfr!2sfr"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

      <div class="map">
        <a href="https://www.google.com/maps" target="_blank" class="link-rep">Réserver votre plan de la ville ici !</a>
      </div>
      <!--------------------------------------------------------------------------------------------------------------->

    </div>

      <!--IMPRESSION-->
      <!--Ce lien permet de proposer l'impression de la page.
        <a href="" onClick="window.print()">Imprimer la page</a>-->
      <!--</div>-->
   
    <!--fin de main-->

    <!----------------------------------------------------------------------------------------------------------------->

    <!---------------------------------------------------------------------------------------->
    <!--ASIDE-->
    <aside class="aside"><!--d-flex flex-direction-column bolder border-success-->

      <div class="section-4">
        <img src="../images3/Capture_d’écran_2023-03-13_230400.jpg" class="img-aside" width="204" height="146"
          alt="boite papillons"><span class="img-4">Visite</span>
      </div>

      <div class="aside-nav">
        <h5>images</h5>
        <a href="https://www.photospapillons.com/papillons-de-france.php">Banques images</a>
        <a href="../pages/gallery-index.html">Galerie images</a><!--./Galerie-index.html-->
      </div>

      <div class="aside-nav"><!-- d-flex flex-direction-column-->
        <h5>Évènements</h5>
        <a href="../pages/calendar.html">Agenda</a>
        <a href="../pages/assos.html">assemblé</a>
      </div>

      <div class="aside-nav">
        <h5>Les sortie</h5>
        <a href="#">Musee</a><!--../php/horaires_bis.php-->
        <a href="../pages/exposition.html">exposition</a><!--./exposition.html-->
      </div>

      <div class="aside-nav">
        <h5>site web</h5>
        <a href="https://biodiversite-foret.fr/2023/07/05/les-groupes-despeces-les-lepidopteres/"
          target="_blank">Actualité</a>
        <a href="../pages/recherche_wiki.html">recherche wikipedia</a><!--./recherche_wiki.html-->
      </div>

      <div class="aside-nav">
        <h5>identifier</h5>
        <a href="../pages/identification.html">quel est ce papillon</a><!--./identification.html-->
        <a href="../pages/fiche-details.html">page lepidoptera</a><!--./fiche-details.html-->
      </div>

    </aside>

  </div>
  <!--fin de content-->

    <!-- FOOTER -->    
    <footer class="blockfooter">
      <div class="block-ftr">
            <div class="content-footer">
              <div class="footer-1">
                  <div class="mention-1">
                      <h5 class="cl-mention">informations</h5>
                      <a href="../rgpd/mentions_légales.html" class="cl-mention">mention légale</a>
                      <a href="./a-propos-ecf.html" class="cl-mention">A propos de cette ECF</a>
                  </div>
              </div>
      
              <div class="footer-2">
                  <div class="mention-2">
                      <h5 class="cl-contact">nous contacter</h5>
                      <a href="tel:+336250214" class="cl-contact">06 25 02 14</a>
                      <a href="mailto:entomologie-asso@example.com" class="cl-contact">Envoyer un courriel</a>
                  </div>
              </div>
            </div>
      </div>
    </footer>

  <!--</container>-->

  <!--?php include('../php/footer.php'); ?>-->
  <!--?php include('../php/horaires_script.php'); ?>-->
</body>

</html>

<!---------------------------------------------------------------------------------------->
<br>
