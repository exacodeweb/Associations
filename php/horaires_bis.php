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
  <link rel="stylesheet" href="../styles/horaires_style.css">
  <link rel="stylesheet" href="/../style/contenu_style.css">
  <link rel="stylesheet" href="/../style/contenu_musée_style.css">
  <link rel="stylesheet" href="../style/footer_style.css">

  <!--style de police d'ecriture-->
  <link href="https://fonts.cdnfonts.com/css/rajdhani" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">


  <!--STYLE-CSS-->
  <style>
  
  </style>
</head>

<body>
  <!--HEADER-->
  <nav class="header">
    <div class="logo">Ailes-Enchantées</div><!--Entomologie-->
    <!--OPTION MENU BURGER-->
    <div class="menu">
      <a href="../index.html" title="Accueil" class="link-nav m-2">Accueil</a>
      <a href="../pages/blog.html" title="Blog" class="link-nav m-2">Blog</a>
      <a href="../pages/Agenda.html" title="A propos" class="link-nav m-2">Évènements</a>
      <a href="../pages/proflle_team.html" title="Qui somme nous" class="link-nav m-2">Qui sommes nous ?</a>
      <a href="https://www.facebook.com/forum.lepidoptera/" target="_blank" title="Forum" class="link-nav m-2">Forum</a>
      <a href="../contact/contact.html" title="Contact" class="link-nav m-2">Contact</a>
    </div>
  </nav>

  <!--FIL D'ARIANE-->
  <div class="breadcrumb-item">
    <a href="./Sommaire-index.html" class="link-rep">Sommaire</a> /
    <a href="../index.html" class="link-rep">Acceuil</a> / musée <!--des
    papillons-->
  </div>

  <!--CONTENER-->
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
            <div class="article">
              <p>
                Araschnia levana, également connue sous le nom de Carte géographique, est un papillon fascinant à découvrir. Ce papillon se distingue par ses deux formes saisonnières distinctes et ses motifs de coloration complexes. Venez en apprendre davantage sur cet incroyable spécimen et sa place dans la nature.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="section2">
        <div class="text-width-img">
          <div class="title2">Article: Brenthis daphne</div>
          <div class="article2">
            <img class="text-2" src="../images3/Araschnia_levana_(La-carte-géographique).jpg" alt="image papillon">
            <div class="article">
              <p>
                Brenthis daphne, le Nacré de la ronce, est un papillon remarquable par ses motifs nacrés sur les ailes. Il habite les zones boisées et les prairies humides. Découvrez ses habitudes alimentaires, ses méthodes de camouflage et comment il contribue à l'équilibre de son environnement.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!--------------------------------------------------------------------------------------------------------------------->
      <!-- Affiché les horaires tableau -->
      <?php
      include './db_connect.php';
      $sql = "SELECT * FROM horaires";
      $result = $pdo->query($sql);
      $horaires = [];
      if ($result->rowCount() > 0) {
        $horaires = $result->fetchAll(PDO::FETCH_ASSOC);
      }
      $pdo = null;
      ?>

      <!-- Mise a jour LE 28/06/2024 ------ V.1 -->
      <section><!--article-->
        <h4 class="sub-title-h4">Horaires d'Ouverture V.1</h4>
        <div class="table-responsive">
        <table border="1">
        <thead>
        <tr class="thead"><!---->
            <th class="hre">Jour</th>
            <th class="hre">Ouverture<br> Matin</th>
            <th class="hre">Fermeture<br> Matin</th>
            <th class="hre">Ouverture<br> Après-midi</th>
            <th class="hre">Fermeture<br> Après-midi</th>
        </tr>
        </thead> 
        <?php if (!empty($horaires)): ?>
            <?php foreach ($horaires as $horaire): ?>
                <tr>
                  <div class="tr-cel">
                    <td class="day bg-light "><?php echo htmlspecialchars($horaire['jour']); ?></td>
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
    </div>
    </section>



        <!------------------------------------------------>
        
        <!--<article>

        <h4 class="sub-title-h4">Horaires d'Ouverture</h4>
        <div class="table-responsive">
        <table border="1" > --> <!--class="table table-bordered"--> <!--
        <thead>
          <tr>
            <th class="hre">Jour</th>
            <th class="hre">Ouverture<br> Matin</th>
            <th class="hre">Fermeture<br> Matin</th>
            <th class="hre">Ouverture<br> Après-midi</th>
            <th class="hre">Fermeture<br> Après-midi</th>
          </tr>  
        </thead>  -->
          <!--?php if (!empty($horaires)): ?>
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
        </table>--><!--
        </div>
        
      </article>-->


        <!------------------------------------------------------------------------------------>

        <!--<article>-->
  <!-- Mise a jour LE 28/06/2024 --><!--
  <h4 class="sub-title-h4">Horaires d'Ouverture</h4>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>-->

        <!--<tr>
          <th class="hre">Jour</th>
          <th class="hre">Ouverture Matin</th>
          <th class="hre">Fermeture Matin</th>
          <th class="hre">Ouverture Après-midi</th>
          <th class="hre">Fermeture Après-midi</th>
        </tr>--><!--

        <tr>
            <th class="hre">Jour</th>
            <th class="hre">Ouverture<br> Matin</th>
            <th class="hre">Fermeture<br> Matin</th>
            <th class="hre">Ouverture<br> Après-midi</th>
            <th class="hre">Fermeture<br> Après-midi</th>
          </tr>  

      </thead>
      <tbody>
        <!-?php if (!empty($horaires)): ?>
          <!?php foreach ($horaires as $horaire): ?>
            <tr>
              <td><!?php echo htmlspecialchars($horaire['jour']); ?></td>
              <td class="cel"><!?php echo ($horaire['ouverture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_matin']); ?></td>
              <td class="cel"><!?php echo ($horaire['fermeture_matin'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_matin']); ?></td>
              <td class="cel"><!?php echo ($horaire['ouverture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['ouverture_apresmidi']); ?></td>
              <td class="cel"><!?php echo ($horaire['fermeture_apresmidi'] == '00:00:00') ? 'Fermé' : htmlspecialchars($horaire['fermeture_apresmidi']); ?></td>
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






      <!--------------------------------------------------------------------------------------------------------------------->

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

    <!----------------------------------------------------------------------------------------------------------------->
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

  <!--<footer class="blockfooter">
    <div class="block-ftr">
      <div class="contact">
        <a href="../pages/contact.html" title="Contact">Contact</a>
      </div>
      <p>Ⓒ Ailes Enchantées</p>
      <p>Mentions légales</p>
    </div>
  </footer>-->

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