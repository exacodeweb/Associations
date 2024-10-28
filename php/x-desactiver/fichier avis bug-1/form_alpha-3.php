<?php
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

      <form class="form" id="avis-form" action="./submit_rating_alpha2.php" method="post">
          <input type="hidden" id="csrf_token_avis" name="csrf_token_avis" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

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
          <div class="form-control">
              <label for="note">Note :</label>
              <input type="number" id="note" name="note" min="1" max="5" required>
          </div>

          <button type="submit">Envoyer</button>
      </form>
      <div id="error-message" class="mt-3 text-danger"></div>
    </div>

</body>
</html>