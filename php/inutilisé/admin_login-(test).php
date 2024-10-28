<?php
session_start();
$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = "root"; // à remplacer par votre nom d'utilisateur
    $admin_password = "G1i9e6t3"; // à remplacer par votre mot de passe

    if ($_POST['username'] == $admin_username && $_POST['password'] == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ./moderate_comments.php"); // Chemin relatif
        exit;
    } else {
        $login_error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="description" content="Garage vincent Parrot vous propose des services auto pour votre vehicule">

      
    <!-- BIBLIOTHEQUE D'ICÔNES BOOTSTRAP COMPOSANT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- BIBLIOTHEQUE FONTAWESOME (mon code 64e89a7edd) pour utilisé les icones free fontawesome -->
    <script src="https://kit.fontawesome.com/64e89a7edd.js" crossorigin="anonymous"></script>
    <!--POLICES D'ECRITURE typographie-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <style>

      h2 {
        display: block;
        flex-direction: row;
        text-align: center;
     


      }

      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        
      }

      /*--------------------------------------------------------------------------------------------------------------*/

      body {
        background-position: 100% 100%;
        margin: 0;
        font-size: 1em;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
      }

      .breadcrumb-item {
        width: 100%;
        background: none;
        margin: 10px;
        float: left;
        flex-direction: row;
        justify-content: center;
        align-content: center; 
        padding: 0;
      }

      .link-item {
        margin: 0 5px;
      }

      /*.breadcrumb-item {
        margin: 0 5px;
      }*/

      .content {
        display: flex;
        flex-direction: column; 
        width: 100%;/*90%*/
        margin: 20px 0;
        justify-content: center;
        align-items: center;
        padding: 20px;
      }

      .main {
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
      }

      /* TITRE ACCEUIL */
      h1 {
        color: #0000ff;
        color: #d94350;
        font-weight: 600;
        /* font-size: 2.5em;*/
      }

      .title-admin {
        z-index: 1px;
        text-align: center;
        font-size: 3.5em;
        width: 100%;
        height: auto;
        font-family: "Tangerine", serif;
        
        text-shadow: 4px 4px 4px rgba(0, 0, 255, 0.4);
        text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.4);;/**/
        margin: 15px 0px 15px 0px;
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

      .article {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: justify;/*justify*/
        padding: 10px;
        width: 50%;
      }

      .pt {
        text-align: center !important;
      }

      .section-form {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: auto;
        justify-content: center;
        align-items: center;
        padding: 10px;
      }

      .form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 50%;
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

      input {
        height: 25px;
        text-align: left;
        width: 100%;
        margin-bottom: 10px;
      }

      textarea {
        width: 100%;
      }

      .button {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 15px;
        padding: 10px;
        margin-bottom: 20px;
        width: 160px;
        height: 30px;
        border-radius: 50px;
        cursor: pointer;
        background: mediumorchid;/**/
        color: white;
        border: none;
      }

      .button:hover {
        background: rgb(211, 85, 163);
      }


      /*-------------------------------------------------*/  /*
      fieldset {
        /*background: lightgoldenrodyellow;*/  /*

        width: 100%;
        padding: 10px;
        margin: auto; /*20px*/  /*
      }

      .field-admin {
        width: 100%;

        padding: 10px;
        margin: auto; /*20px*/  /*
      }

      /*-------*/  /*

      .checkbox-radio {
        /*.check-block */  /*
        display: flex;
        flex-direction: row;
        align-items: center;
        align-content: center;
        margin: 0px 0px 0px 10px;
      }

      form input[type="radio"],
      form input[type="checkbox"],
      form input[type="submit"] {
        width: auto;
      }

      .checkbox {
        display: flex;
        flex-direction: row;
        height: auto;
        font-size: 0.7em;
      }

      .checkbox {
        max-width: 100%;
        padding: 10px;
        margin: auto;
        justify-content: space-between;
      }

      #member {
        width: 15px;
      }

      .item-admin {
        font-weight: normal;
        margin-left: 5px;
        display: block;
        margin-bottom: 0px;
        width: 100%;
      }

      .text-admin {
        display: flex;
        flex-direction: row;
        text-align: right;
        margin-left: 25px;
      }
      /*--------------------------------------------------*/

      /*------------------------------------------------------------------------------------------------------FOOTER--*/
      /*
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
          color: #0000ff;
          text-decoration: none;
        }*/

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

  <!-- Breadcrumb navigation -->
  <div class="breadcrumb-item"> 
    <a href="../pages/sommaire-index.html" class="link-item">Sommaire</a> >
    <a href="../index.html" class="link-item">Accueil</a> > Admin
  </div>


<div class="content">
  <main class="main">
    <div class="section-form">

    <h1 class="title-admin">Ailes Enchantées</h1>
    <h2>Connexion Administrateur</h2>
    <form class="form" method="post" action="admin_login.php">

      <div class="form-control">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username" required><br><br>
      </div>

      <div class="form-control">        
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br><br>
      </div>
        
        <input class="button" type="submit" value="Se connecter">


      <!---------------------------------------------------------------->
          <!-- OPTION -->  <!--
          <fieldset class="checkbox">  -->
            <!--flex items-center row-3 text-center space-between -->
            <!--<legend>Newsletter</legend>-->  <!--
            <div class="checkbox-radio">  -->
              <!-- check-block -->  <!--
              <input name="member" id="member" type="checkbox" data-error="cocher la case " required>

              <label for="member" class="item-admin">se souvenir de moi
              </label>  -->
              <!---->    <!--
            </div>    -->
            <!--J'accepte de recevoir la newsletter-->  <!--

            <a href="#" class="text-admin"><span>mot de passe oublier ?</span></a>
          </fieldset>   -->
      <!---------------------------------------------------------------->
      <p style="color: red;"><?php echo $login_error; ?></p>
    </form>

    <!-- Section d'affichage des erreurs -->
    <div id="error-message" class="mt-3 text-danger"></div>

    </div>
  </main>
</div>

</body>

</html>
<!--------------------------------------------------------------------------------------------------------------------->
