<!DOCTYPE html>
<?php
session_start();

// Générer un jeton CSRF unique s'il n'existe pas déjà
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/avis_style.css">
    <title>Submit Rating</title>

    <!--<style>
        /* Ajoutez votre CSS ici */
        body {
            background-position: 100% 100%;
            margin: 0;
            font-size: 1em;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0px;
        }
        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
            border: 1px solid grey;
            border-radius: 5px;
            background-color: #f8f9f8;
            padding: 10px;
        }
        .form-control {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            width: 80%;
            background-color: #f8f9f8;
            height: auto;
            border: none;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
            width: 100%;
        }
        input, textarea {
            width: 100%;
            border: 1px solid gray !important;
            margin-bottom: 10px;
        }
        .form-control-rating {
            padding-top: 20px;
        }
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            margin-top: 0em;
            margin-bottom: 0em;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 2em;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }
        .rating label::before {
            content: "\2605";
        }
        .rating label:hover,
        .rating label:hover ~ label,
        .rating input:checked ~ label,
        .rating input:checked ~ label:hover,
        .rating input:checked ~ label:hover ~ label {
            color: #FFD700;
        }
        button, .submit {
            display: block;
            width: 160px;
            height: 30px;
            padding: 0.75em;
            border: none;
            border-radius: 50px;
            background-color: mediumorchid;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            align-content: center;
            margin-bottom: 20px;
        }
        button:hover {
            background: rgb(211, 85, 163);
        }
    </style>-->

<style>
/* Styles globaux du body */
body {
  background-position: 100% 100%;
  margin: 0;
  font-size: 1em;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  min-height: 100vh; /* Assure que le body prend au moins toute la hauteur de la fenêtre */
  padding: 0;
  background-color: beige;
}
/* Styles pour le formulaire */
.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 40%;/*40%*/
  border: 1px solid grey;
  border-radius: 5px;
  background-color: #f8f9f8;
  padding: 10px;
}

/* Styles pour le titre du formulaire */
h1 {
  font-size: 1.8em;
  margin-bottom: 10px;
  color: #333; /* Couleur du texte du titre */
  text-align: center; /* Centre le titre horizontalement */
}

/* Styles pour la description du formulaire */
p {
  font-size: 1.1em;
  margin-bottom: 20px;
  color: #555; /* Couleur du texte de la description */
  text-align: center; /* Centre la description horizontalement */
}

/* Styles pour les contrôles du formulaire */
.form-control {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px;
  width: 80%;
  background-color: #f8f9f8;
  height: auto;
  border: none;
}
label {
  font-weight: bold;
  margin-bottom: 10px;
  width: 100%;
}
input {/*, textarea */
height: 30px;
  width: 100%;
  border: 1px solid gray !important;
  margin-bottom: 10px;
}
textarea {
  width: 100%;
  border: 1px solid gray !important;
  margin-bottom: 10px;
}

/* Styles pour la section de notation */
.form-control-rating {
  padding-top: 20px;
}
/* Styles pour les étoiles de notation */
.rating {
  display: flex;
  flex-direction: row-reverse;
  justify-content: center;
  margin-top: 0em;
  margin-bottom: 0em;
}
.rating input {
  display: none;
}
.rating label {
  font-size: 2em;
  color: #ccc;
  cursor: pointer;
  transition: color 0.2s ease-in-out;
}
.rating label::before {
  content: "\2605";
}
.rating label:hover,
.rating label:hover ~ label,
.rating input:checked ~ label,
.rating input:checked ~ label:hover,
.rating input:checked ~ label:hover ~ label {
  color: #FFD700;
}

/* selecteur ajouter */
.note {
display: flex;
flex-direction: row;
justify-content: center;
width: 100%;
margin-bottom: 0px;
}

/* Styles pour le bouton de soumission */
button, .submit {
  display: block;
  width: 160px; /* Largeur maximale pour le bouton */
  height: 30px; /* Hauteur augmentée pour le bouton */
  padding: 0.75em;
  border: none;
  border-radius: 50px;
  background-color: mediumorchid;
  color: white;
  font-size: 1em;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  align-content: center;
  margin-bottom: 20px;
}
button:hover {
  background: rgb(211, 85, 163); /* Couleur de survol pour le bouton */
}

/* Responsive Design pour les petits écrans */
@media (max-width: 600px) {
  .form {
      width: 95%; /* Prend presque toute la largeur de l'écran */
      padding: 15px; /* Réduit l'espace intérieur pour s'adapter aux petits écrans */
  }

  .rating label {
      font-size: 1.5em; /* Réduit la taille des étoiles sur les petits écrans */
  }

  button, .submit {
      width: 100%; /* Le bouton prend toute la largeur du formulaire */
      max-width: none; /* Supprime la largeur maximale pour les petits écrans */
  }
}
</style>


</head>
<body>
    <!--<form class="form" id="avis-form" action="../ratings/submit_ratings.php" method="post">--><!-- ./submit_ratings.php -->
    <!--<form class="form" id="avis-form" action="../ratings_feedback/submit_avis_moderate.php" method="post">-->  
    <form class="form" id="avis-form" action="../ratings_feedback/submit_avis_ratings.php" method="post">
    <input type="hidden" id="csrf_token_avis" name="csrf_token_avis" value="<?php echo htmlspecialchars($_SESSION['csrf_token_avis']); ?>">

    <h1>Soumettez Votre Avis</h1>
        <p>Nous apprécions vos retours. Veuillez remplir le formulaire ci-dessous pour partager votre expérience avec nous.</p>

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

    <!--<script src="../ratings_feedback/comments_script_ratings.js"></script>--> <!--option pour moderation des avis-->

  </body>
</html>

<!-- 
LA TABLE QUI A ETE CREER
  CREATE TABLE avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    note INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    is_approved TINYINT(1) DEFAULT 0
);
-->
