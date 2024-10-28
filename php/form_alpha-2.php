<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xxx../style/avis_style.css">
    <title>Submit Rating</title>

<style>
body {
  background-position: 100% 100%;
  margin: 0;
  font-size: 1em;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0px;/*20px*/
}

/*.breadcrumb-item {
  width: 100%;
  background: none;
  margin: 10px;
  float: left;
  flex-direction: row;
  justify-content: center;
  align-content: center; 
  padding: 0;
}*/

/*.link-item {
  margin: 0 5px;
}  */

/*.breadcrumb-item {
  margin: 0 5px;
}*/

/*.content {
  display: flex;
  flex-direction: column; 
  width: 100%;/*90%*/  /*
  margin: 20px 0;
  justify-content: center;
  align-items: center;
  padding: 20px;
}*/

/*.main {
  flex-direction: column;
  width: 100%;
  padding: 20px;
  background: #fbfbf9;
  align-items: center;
  border-radius: 5px;
  box-shadow: 0 0 40px rgba(128, 128, 128, 0.2); 
  display: flex;
  justify-content: center;
  align-content: center;
}*/

/*.pt {
  text-align: center !important;
}*/

/* Section spécifique pour le formulaire 1 */
.section-form {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: auto;
  justify-content: center;
  align-items: center;
  padding: 0px;/*10px*/
}

.form {/*------------------------------------------*/
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 40%;
  border: 1px solid grey;
  border-radius: 5px;
  background-color: #f8f9f8;
  padding: 10px;
}

.article {/*--*/
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: justify;/*justify*/
  padding: 10px;
  width: 40%;
}

h2 {
  color: #0000ff;
  font-weight: 600;
  font-size: 1.5em;
  margin-top: 0;
}

.title {
  display: flex;
  justify-content: center;
  text-align: center;
  margin: 12px 0 20px;/*12px 0 50px*/
  font-size: 1.5em;
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

/*.form-control-rating {
  /*display: flex;
  flex-direction: row;
  align-items: center;
  padding: 10px;
  width: 80%;

  background-color: #f8f9f8;
  height: auto;
  border: none;

  
  /*
  position: absolute;
  top: 0;
  left: 0*//*
  text-align: center !important; *//*

  padding-top: 20px;
}*/

label {
  font-weight: bold;
  margin-bottom: 10px;
  width: 100%;
}

input {
  height: 30px !important; /*25px*//*35px*/
  text-align: left;
  width: 100%;
  margin-bottom: 10px;
}

textarea {
  width: 100%;
}

/* Section spécifique pour le formulaire 2 */
form,
label,
input {
  display: flex;
  flex-direction: column;
  justify-content: center;
  display: block;
  margin-bottom: 10px;
}

input {
  height: 30px;
  /*padding: 10px !important;*/
  text-align: left;
  width: 80%;
}

input, textarea {
  border: 1px solid gray !important;
}

.avis-form {
  width: 50% !important;
}

.form-control {
    margin-bottom: 0px;/*1em*/
}

.form-control label {
    display: block;
    margin-bottom: 0.5em;
    font-weight: bold;
}

.form-control input,
.form-control textarea {
    width: 100%;
    padding: 0.5em;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-control textarea {
    resize: vertical;
}


/* Section spécifique pour les étoiles */
.form-control-rating {
  padding-top: 20px;
}

.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    margin-top: 0em;/*1em*/
    margin-bottom: 0em;/*1em*/
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
.rating label:hover ~ label {
    color: #FFD700;
}

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

/* Section spécifique pour le bouton */
button, .submit {
  display: block;
  width: 100%;
  width: 160px;
  height: 30px;
  padding: 0.75em;
  border: none;
  border-radius: 50px 50px;/*4px*/
  background-color: #28a745;
  background: mediumorchid;
  color: white;
  font-size: 1em;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;

  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  align-content: center;
  /*margin-bottom: 20px;*/
}

button:hover {
  background-color: #218838;
  background: rgb(211, 85, 163);
}

.btn {
  /*top: 30px;*/
  padding-top: 0px;
  padding-bottom: 0px;
  left: 0;


  /*flex-direction: column;
  align-items: center;
  justify-content: center;
  align-content: center;*/
  margin-bottom: 20px;
}



/* Responsive Design */
@media screen and (max-width: 576px) {
  .content {
      width: 100%;
      padding: 5px;
  }

  .main {
      width: 90%;
      border: 1px solid red;
      padding: 20px;
  }

  .article {
    width: 100% ;
  }

  .form {
      width: 100%;
  }

  .form-control {
      width: 100%;
  }

  input {
      width: 100%;
  }
}

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

  <form class="form" id="avis-form" action="../php/submit_rating.php" method="post">
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
include './session_init-test.php';//path/to/../php/session_init-test.php  // Mettez le chemin correct vers le fichier session_init.php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Entomologie">
  <link rel="stylesheet" href="xxx../style/avis_style.css">
  <title>ECF-Contact</title>

  <style>
body {
  background-position: 100% 100%;
  margin: 0;
  font-size: 1em;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0px;/*20px*/
}

/*.breadcrumb-item {
  width: 100%;
  background: none;
  margin: 10px;
  float: left;
  flex-direction: row;
  justify-content: center;
  align-content: center; 
  padding: 0;
}*/

/*.link-item {
  margin: 0 5px;
}  */

/*.breadcrumb-item {
  margin: 0 5px;
}*/

/*.content {
  display: flex;
  flex-direction: column; 
  width: 100%;/*90%*/  /*
  margin: 20px 0;
  justify-content: center;
  align-items: center;
  padding: 20px;
}*/

/*.main {
  flex-direction: column;
  width: 100%;
  padding: 20px;
  background: #fbfbf9;
  align-items: center;
  border-radius: 5px;
  box-shadow: 0 0 40px rgba(128, 128, 128, 0.2); 
  display: flex;
  justify-content: center;
  align-content: center;
}*/

/*.pt {
  text-align: center !important;
}*/

/* Section spécifique pour le formulaire 1 */
.section-form {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: auto;
  justify-content: center;
  align-items: center;
  padding: 0px;/*10px*/
}

.form {/*------------------------------------------*/
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 40%;
  border: 1px solid grey;
  border-radius: 5px;
  background-color: #f8f9f8;
  padding: 10px;
}

.article {/*--*/
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: justify;/*justify*/
  padding: 10px;
  width: 40%;
}

h2 {
  color: #0000ff;
  font-weight: 600;
  font-size: 1.5em;
  margin-top: 0;
}

.title {
  display: flex;
  justify-content: center;
  text-align: center;
  margin: 12px 0 20px;/*12px 0 50px*/
  font-size: 1.5em;
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

/*.form-control-rating {
  /*display: flex;
  flex-direction: row;
  align-items: center;
  padding: 10px;
  width: 80%;

  background-color: #f8f9f8;
  height: auto;
  border: none;

  
  /*
  position: absolute;
  top: 0;
  left: 0*//*
  text-align: center !important; *//*

  padding-top: 20px;
}*/

label {
  font-weight: bold;
  margin-bottom: 10px;
  width: 100%;
}

input {
  height: 30px !important; /*25px*//*35px*/
  text-align: left;
  width: 100%;
  margin-bottom: 10px;
}

textarea {
  width: 100%;
}

/* Section spécifique pour le formulaire 2 */
form,
label,
input {
  display: flex;
  flex-direction: column;
  justify-content: center;
  display: block;
  margin-bottom: 10px;
}

input {
  height: 30px;
  /*padding: 10px !important;*/
  text-align: left;
  width: 80%;
}

input, textarea {
  border: 1px solid gray !important;
}

.avis-form {
  width: 50% !important;
}

.form-control {
    margin-bottom: 0px;/*1em*/
}

.form-control label {
    display: block;
    margin-bottom: 0.5em;
    font-weight: bold;
}

.form-control input,
.form-control textarea {
    width: 100%;
    padding: 0.5em;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-control textarea {
    resize: vertical;
}


/* Section spécifique pour les étoiles */
.form-control-rating {
  padding-top: 20px;
}

.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    margin-top: 0em;/*1em*/
    margin-bottom: 0em;/*1em*/
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
.rating label:hover ~ label {
    color: #FFD700;
}

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

/* Section spécifique pour le bouton */
button, .submit {
  display: block;
  width: 100%;
  width: 160px;
  height: 30px;
  padding: 0.75em;
  border: none;
  border-radius: 50px 50px;/*4px*/
  background-color: #28a745;
  background: mediumorchid;
  color: white;
  font-size: 1em;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;

  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  align-content: center;
  /*margin-bottom: 20px;*/
}

button:hover {
  background-color: #218838;
  background: rgb(211, 85, 163);
}

.btn {
  /*top: 30px;*/
  padding-top: 0px;
  padding-bottom: 0px;
  left: 0;


  /*flex-direction: column;
  align-items: center;
  justify-content: center;
  align-content: center;*/
  margin-bottom: 20px;
}



/* Responsive Design */
@media screen and (max-width: 576px) {
  .content {
      width: 100%;
      padding: 5px;
  }

  .main {
      width: 90%;
      border: 1px solid red;
      padding: 20px;
  }

  .article {
    width: 100% ;
  }

  .form {
      width: 100%;
  }

  .form-control {
      width: 100%;
  }

  input {
      width: 100%;
  }
}

</style>


</head>

<body>               -->

  <!-- Breadcrumb navigation -->                <!--
  <div class="breadcrumb-item"> 
    <a href="../pages/sommaire.html" class="link-item">Sommaire</a> >
    <a href="../index.html" class="link-item">Accueil</a> > Avis
  </div>

  <div class="content">
    <main class="main">
      <div class="section-form">
        <div class="article">
          <h2 class="title">Laisser un Avis</h2>
          <div class=" pt text-center">
          <p >                                                                                   -->
            <!--Nous serions ravis de recevoir vos questions, suggestions ou commentaires.
            Il vous suffit de remplir ce formulaire et de le valider. Un e-mail de confirmation vous sera envoyé.
            Merci de prendre le temps de nous contacter. Nous vous répondrons dans les plus brefs délais !-->
        <!--
            Nous serions ravis de recevoir vos avis. Il vous suffit de remplir ce formulaire et de le valider.<br> 
            Merci de partager vos impressions avec nous !

          </p>
          </div>
        </div>

       
        <form class="form" id="contact-form" action="../php/submit_avis.php" method="post">

          <input type="hidden" name="csrf_token" value="<!-?php echo $_SESSION['csrf_token']; ?>">

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

          <div class="form-control">
            <label for="note">Note :</label>
            <input type="number" id="note" name="note"  placeholder="Votre note (1-5)" min="1" max="5">
          </div> --> <!--class="form-control"-->
<!--
          <button type="submit">Envoyer</button>


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


        </form>                                                       -->
        <!-- Section d'affichage des erreurs -->                            <!--
        <div id="error-message" class="mt-3 text-danger"></div>
      </div>
    </main>
  </div>

  <script src="../scripts/avis_script.js"></script>
</body>

</html>
-->



<!--?php
session_start();

// Générer un token CSRF s'il n'existe pas déjà
if (empty($_SESSION['csrf_token_avis'])) {
    $_SESSION['csrf_token_avis'] = bin2hex(random_bytes(32));
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

        <form class="form" id="avis-form" action="./submit_rating.php" method="post">
            <input type="hidden" id="csrf_token_avis" name="csrf_token_avis" value="<?php echo htmlspecialchars($_SESSION['csrf_token_avis']); ?>">

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

-->















<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xxx../style/avis_style.css">
    <title>Submit Rating</title>

<style>
body {
  background-position: 100% 100%;
  margin: 0;
  font-size: 1em;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0px;/*20px*/
}

/*.breadcrumb-item {
  width: 100%;
  background: none;
  margin: 10px;
  float: left;
  flex-direction: row;
  justify-content: center;
  align-content: center; 
  padding: 0;
}*/

/*.link-item {
  margin: 0 5px;
}  */

/*.breadcrumb-item {
  margin: 0 5px;
}*/

/*.content {
  display: flex;
  flex-direction: column; 
  width: 100%;/*90%*/  /*
  margin: 20px 0;
  justify-content: center;
  align-items: center;
  padding: 20px;
}*/

/*.main {
  flex-direction: column;
  width: 100%;
  padding: 20px;
  background: #fbfbf9;
  align-items: center;
  border-radius: 5px;
  box-shadow: 0 0 40px rgba(128, 128, 128, 0.2); 
  display: flex;
  justify-content: center;
  align-content: center;
}*/

/*.pt {
  text-align: center !important;
}*/

/* Section spécifique pour le formulaire 1 */
.section-form {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: auto;
  justify-content: center;
  align-items: center;
  padding: 0px;/*10px*/
}

.form {/*------------------------------------------*/
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 40%;
  border: 1px solid grey;
  border-radius: 5px;
  background-color: #f8f9f8;
  padding: 10px;
}

.article {/*--*/
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: justify;/*justify*/
  padding: 10px;
  width: 40%;
}

h2 {
  color: #0000ff;
  font-weight: 600;
  font-size: 1.5em;
  margin-top: 0;
}

.title {
  display: flex;
  justify-content: center;
  text-align: center;
  margin: 12px 0 20px;/*12px 0 50px*/
  font-size: 1.5em;
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

/*.form-control-rating {
  /*display: flex;
  flex-direction: row;
  align-items: center;
  padding: 10px;
  width: 80%;

  background-color: #f8f9f8;
  height: auto;
  border: none;

  
  /*
  position: absolute;
  top: 0;
  left: 0*//*
  text-align: center !important; *//*

  padding-top: 20px;
}*/

label {
  font-weight: bold;
  margin-bottom: 10px;
  width: 100%;
}

input {
  height: 30px !important; /*25px*//*35px*/
  text-align: left;
  width: 100%;
  margin-bottom: 10px;
}

textarea {
  width: 100%;
}

/* Section spécifique pour le formulaire 2 */
form,
label,
input {
  display: flex;
  flex-direction: column;
  justify-content: center;
  display: block;
  margin-bottom: 10px;
}

input {
  height: 30px;
  /*padding: 10px !important;*/
  text-align: left;
  width: 80%;
}

input, textarea {
  border: 1px solid gray !important;
}

.avis-form {
  width: 50% !important;
}

.form-control {
    margin-bottom: 0px;/*1em*/
}

.form-control label {
    display: block;
    margin-bottom: 0.5em;
    font-weight: bold;
}

.form-control input,
.form-control textarea {
    width: 100%;
    padding: 0.5em;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-control textarea {
    resize: vertical;
}


/* Section spécifique pour les étoiles */
.form-control-rating {
  padding-top: 20px;
}

.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    margin-top: 0em;/*1em*/
    margin-bottom: 0em;/*1em*/
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
.rating label:hover ~ label {
    color: #FFD700;
}

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

/* Section spécifique pour le bouton */
button, .submit {
  display: block;
  width: 100%;
  width: 160px;
  height: 30px;
  padding: 0.75em;
  border: none;
  border-radius: 50px 50px;/*4px*/
  background-color: #28a745;
  background: mediumorchid;
  color: white;
  font-size: 1em;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;

  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  align-content: center;
  /*margin-bottom: 20px;*/
}

button:hover {
  background-color: #218838;
  background: rgb(211, 85, 163);
}

.btn {
  /*top: 30px;*/
  padding-top: 0px;
  padding-bottom: 0px;
  left: 0;


  /*flex-direction: column;
  align-items: center;
  justify-content: center;
  align-content: center;*/
  margin-bottom: 20px;
}



/* Responsive Design */
@media screen and (max-width: 576px) {
  .content {
      width: 100%;
      padding: 5px;
  }

  .main {
      width: 90%;
      border: 1px solid red;
      padding: 20px;
  }

  .article {
    width: 100% ;
  }

  .form {
      width: 100%;
  }

  .form-control {
      width: 100%;
  }

  input {
      width: 100%;
  }
}

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
-->
  <!--<form class="form" id="avis-form" action="../php/submit_rating.php" method="post">-->

      <!--<input type="hidden" id="csrf_token_avis" name="csrf_token_avis" value=" --><!--?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">-->
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
-->
  <!-- Section d'affichage des erreurs -->  <!--
  <div id="error-message" class="mt-3 text-danger"></div>

</div>
  <script src="../scripts/avis_script.js"></script>
</body>
</html>  -->