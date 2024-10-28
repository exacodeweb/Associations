<?php
session_start();

// Générer un token CSRF s'il n'existe pas déjà
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/avis_style.css">
    <title>Soumettre un avis</title>
    <style>
        /* CSS content unchanged for brevity */
    </style>
</head>
<body>

<div class="section-form">
  <div class="article">
      <h2 class="title">Soumettre un avis</h2>
      <div class="pt text-center">
          <p>
              Nous serions ravis de recevoir vos avis sur notre association. Merci de prendre le temps de partager votre expérience avec nous.
          </p>
      </div>
  </div>

  <form class="form" id="avis-form" action="./submit_avis.php" method="post">
      <input type="hidden" name="csrf_token_avis" value="<?php echo htmlspecialchars($_SESSION['csrf_token_avis']); ?>">

      <div class="form-control">
          <label for="nom">Nom :</label>
          <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
      </div>
      <div class="form-control">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" placeholder="Votre adresse e-mail" required>
      </div>
      <div class="form-control">
          <label for="message">Message :</label>
          <textarea id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
      </div>
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

      <div class="btn">
          <button class="submit" type="submit">Envoyer</button>
      </div>
  </form>

  <div id="error-message" class="mt-3 text-danger"></div>
</div>

</body>
</html>




<!--?php
session_start();

// Générer un token CSRF s'il n'existe pas déjà
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/avis_style.css">
    <title>Submit Rating</title>
    <style>
        /* CSS content unchanged for brevity */
    </style>
</head>
<body>

<div class="section-form">
  <div class="article">
      <h2 class="title">Soumettre un avis</h2>
      <div class="pt text-center">
          <p>
              Nous serions ravis de recevoir vos avis sur notre association. Merci de prendre le temps de partager votre expérience avec nous.
          </p>
      </div>
  </div>    -->
  <!--
  <form class="form" id="avis-form" action="../php/submit_rating.php" method="post">
      <input type="hidden" id="csrf_token_avis" name="csrf_token_avis" value="<!-?php echo htmlspecialchars($_SESSION['csrf_token_avis']); ?>">

      <div class="form-control">
          <label for="nom">Nom :</label>
          <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
      </div>
      <div class="form-control">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" placeholder="Votre adresse e-mail" required>
      </div>
      <div class="form-control">
          <label for="message">Message :</label>
          <textarea id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
      </div>
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

      <div class="btn">
          <button class="submit" type="submit">Envoyer</button>
      </div>
  </form> -->

<!--
  <form class="form" id="contact-form" action="../php/submit_avis.php" method="post">
    <input type="hidden" name="csrf_token" value="<!-?php echo $_SESSION['csrf_token']; ?>">
    <div class="form-control">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
    </div>
    <div class="form-control">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="Votre adresse e-mail" required>
    </div>
    <div class="form-control">
        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
    </div>
    <section class="form-rating">
        <div class="form-control-rating">
            <label class="note" for="note">Note :</label>
            <div class="rating">
                <input type="radio" id="star5" name="note" value="5" required /><label for="star5" title="5 étoiles"></label>
                <input type="radio" id="star4" name="note" value="4" required /><label for="star4" title="4 étoiles"></label>
                <input type="radio" id="star3" name="note" value="3" required /><label for="star3" title="3 étoiles"></label>
                <input type="radio" id="star2" name="note" value="2" required /><label for="star2" title="2 étoiles"></label>
                <input type="radio" id="star1" name="note" value="1" required /><label for="star1" title="1 étoile"></label>
            </div>
        </div>
    </section>
    <div class="btn">
        <button class="submit" type="submit">Envoyer</button>
    </div>
</form>



  <div id="error-message" class="mt-3 text-danger"></div>
</div>
-->
<!--<script src="../scripts/avis_script-test.js"></script>-->  <!--
</body>
</html>  -->


<!--
CREATE TABLE user_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    note INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-->