<?php include '../php/session_init-4.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Soumettre un avis</title>
    <link rel="stylesheet" href="../style/avis_style.css">
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

        <form class="form" id="avis-form" action="../php/submit_rating-4.php" method="post">
            <?php include('../php/csrf_token_avis-4.php'); ?>
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
                        <input type="radio" id="star5" name="note" value="5" required><label for="star5" title="5 étoiles"></label>
                        <input type="radio" id="star4" name="note" value="4" required><label for="star4" title="4 étoiles"></label>
                        <input type="radio" id="star3" name="note" value="3" required><label for="star3" title="3 étoiles"></label>
                        <input type="radio" id="star2" name="note" value="2" required><label for="star2" title="2 étoiles"></label>
                        <input type="radio" id="star1" name="note" value="1" required><label for="star1" title="1 étoile"></label>
                    </div>
                </div>
            </section>

            <div class="btn">
                <button class="submit" type="submit">Envoyer</button>
            </div>
        </form>
        <div id="error-message" class="mt-3 text-danger"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../php/avis_script-4.js"></script>
    </div>
</body>
</html>



<!--?php include '../php/session_init-4.php'; ?> --> <!-- ../php/session_init_avis.php -->  <!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Soumettre un avis</title>
    <link rel="stylesheet" href="../style/avis_style.css">
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

        <form class="form" id="avis-form" action="../php/submit_rating-4.php" method="post">
            <!-?php include('../php/csrf_token_avis-4.php'); ?>
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
                        <input type="radio" id="star5" name="note" value="5" required><label for="star5" title="5 étoiles"></label>
                        <input type="radio" id="star4" name="note" value="4" required><label for="star4" title="4 étoiles"></label>
                        <input type="radio" id="star3" name="note" value="3" required><label for="star3" title="3 étoiles"></label>
                        <input type="radio" id="star2" name="note" value="2" required><label for="star2" title="2 étoiles"></label>
                        <input type="radio" id="star1" name="note" value="1" required><label for="star1" title="1 étoile"></label>
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
-->

<!--?php
// Inclure le fichier de configuration
$config = include('../config/config-4.php');

// Démarrer la session pour utiliser le token CSRF
session_start();

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier le token CSRF
    if (!isset($_POST['csrf_token_avis']) || $_POST['csrf_token_avis'] !== $_SESSION['csrf_token']) {
        die('Erreur de validation du token CSRF.');
    }

    // Assainir les données du formulaire pour éviter les injections XSS
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $note = (int) $_POST['note'];

    // Configuration de la connexion à la base de données
    $host = $config['db']['host'];
    $dbname = $config['db']['dbname'];
    $user = $config['db']['user'];
    $password = $config['db']['pass'];
    $charset = $config['db']['charset'];

    // Création de la chaîne de connexion DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    try {
        // Création d'une nouvelle instance PDO
        $pdo = new PDO($dsn, $user, $password);

        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO userratings (nom, email, message, note) VALUES (:nom, :email, :message, :note)";
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de remerciement
            header('Location: ../pages/thank_you_avis-4.html');
            exit();
        } else {
            echo "Erreur lors de l'insertion des données.";
        }
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher un message
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>

-->


<!--?php
session_start();

// Générer un token CSRF s'il n'existe pas déjà
if (empty($_SESSION['csrf_token-avis'])) {
    $_SESSION['csrf_token-avis'] = bin2hex(random_bytes(32));
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

      <form class="form" id="avis-form" action="./submit_rating-4.php" method="post">  --> <!-- ./submit_rating_alpha2.php -->
         <!-- <input type="hidden" id="csrf_token_avis" name="csrf_token_avis" value="<!-?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

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
</html> -->