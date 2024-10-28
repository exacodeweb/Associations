


<!--?php include '../php/session_init_contact.php'; ?>-->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Entomologie">
  <link rel="stylesheet" href="../style/contact_style.css">
  <title>ECF-Contact</title>
</head>
<body>
  <!-- Breadcrumb navigation -->
  <div class="breadcrumb-item">
    <a href="sommaire-index.html" class="link-item">Sommaire</a> >
    <a href="../index.html" class="link-item">Accueil</a> > Contact
  </div>

  <div class="content">
    <main class="main">
      <div class="section-form">
        <div class="article">
          <h2 class="title">Nous Contacter</h2>
          <div class="pt text-center">
            <p>
              Nous serions ravis de recevoir vos questions, suggestions ou commentaires.
              Il vous suffit de remplir ce formulaire et de le valider. Un e-mail de confirmation vous sera envoyé.
              Merci de prendre le temps de nous contacter. Nous vous répondrons dans les plus brefs délais !
            </p>
          </div>
        </div>

        <!-- Formulaire de contact -->
        <!--<form class="form" id="contact-form" action="../php/submit_contact.php" method="post">-->
        <form class="form" id="avis-form" action="../ratings/submit_ratings.php" method="post"> 
        <!--<form class="form" id="contact-form" action="../php/" method="post">-->
          <!-- Token CSRF pour la sécurité -->
          <!--<input type="hidden" name="csrf_token_contact" value="<?php echo $_SESSION['csrf_token_contact']; ?>">-->
          <input type="hidden" id="csrf_token_avis" name="csrf_token_avis" value="<?php echo htmlspecialchars($_SESSION['csrf_token_avis']); ?>">
          <div class="form-control">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" placeholder="Votre nom" required>
          </div>
          <div class="form-control">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Votre adresse e-mail" required>
          </div>
          <div class="form-control">
            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
          </div>

          <!-- Section pour la note -->
        <section class="form-rating">
            <div class="form-control-rating">
                <label class="note" for="note">Note :</label>
                <div class="rating">
                    <input type="radio" id="star5" name="note" value="5" required/><label for="star5" title="5 étoiles"></label>
                    <input type="radio" id="star4" name="note" value="4" required/><label for="star4" title="4 étoiles"></label>
                    <input type="radio" id="star3" name="note" value="3" required/><label for="star3" title="3 étoiles"></label>
                    <input type="radio" id="star2" name="note" value="2" required/><label for="star2" title="2 étoiles"></label>
                    <input type="radio" id="star1" name="note" value="1" required/><label for="star1" title="1 étoile"></label>
                </div>
            </div>
        </section>

          <button type="submit">Envoyer</button>
        </form>
        <!-- Section d'affichage des erreurs -->
        <div id="error-message" class="mt-3 text-danger"></div>
      </div>
    </main>
  </div>

  <!--<script src="../scripts/contact_script.js"></script>-->
</body>
</html>

<!-- ! cet explication concerne une autre version
Explication de chaque point :
Base de Données :

Utiliser des requêtes préparées empêche les injections SQL, car les entrées utilisateur ne sont jamais directement intégrées dans les requêtes SQL.
Restreindre les permissions des utilisateurs de la base de données minimise les dégâts en cas de compromission des informations d'identification.
Chiffrer les données sensibles garantit que même en cas de fuite de données, celles-ci ne seront pas lisibles.
Back-end :

Sanitiser et valider les entrées utilisateur assure que les données reçues sont dans le format attendu et empêche l'injection de scripts malveillants.
Utiliser des jetons CSRF empêche les attaques de type cross-site request forgery, où un attaquant pourrait faire en sorte qu'un utilisateur effectue des actions à son insu.
La gestion des erreurs sans divulguer d'informations sensibles évite de donner des indices aux attaquants sur la structure ou les vulnérabilités de l'application.
Utiliser HTTPS pour chiffrer les communications empêche l'interception des données par des attaquants.
Front-end :

Valider les données côté client offre une première ligne de défense contre les entrées incorrectes ou malveillantes, bien que cela ne remplace pas la validation côté serveur.
Utiliser des jetons CSRF dans les formulaires protège contre les soumissions de formulaires malveillants.
Éviter les messages d'erreur détaillés réduit les informations disponibles pour les attaquants en cas d'erreur.
En appliquant ces bonnes pratiques, vous assurez que votre application de contact est sécurisée, robuste, et prête à répondre aux besoins des utilisateurs tout en minimisant les risques de sécurité.


-->
