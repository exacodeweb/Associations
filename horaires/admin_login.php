<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <style>
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
        .content {
            display: flex;
            flex-direction: column;
            width: 90%;
            margin: 20px 0;
            justify-content: center;
            align-items: center;
        }
        .main {
            flex-direction: column;
            width: 100%;
            background: #fbfbf9;
            align-items: center;
            border-radius: 5px;
            box-shadow: 0 0 40px rgba(128, 128, 128, 0.2);
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .title-admin {
            text-align: center;
            font-size: 3.5em;
            width: 100%;
            height: auto;
            font-family: "Tangerine", serif;
            text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.4);
            margin: 15px 0;
        }
        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30%;
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
        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            margin-bottom: 20px;
            width: 160px;
            height: 30px;
            border-radius: 50px;
            cursor: pointer;
            background: mediumorchid;
            color: white;
            border: none;
        }
        .button:hover {
            background: rgb(211, 85, 163);
        }
        @media screen and (max-width: 576px) {
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
      /*--*/
      body {
        background-position: 100% 100%;
        margin: 0;
        font-size: 1em;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0px 20px 20px 20px;/* origine 20px */
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
        padding: 0px 0px 0px 20px;/* origine 20px */
      }
      .main {
        flex-direction: column;
        width: 100%;
        padding:  0px 0px 0px 20px;/* origine 20px */
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
        width: 30%;/*50%*/
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
        text-align: center;
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
                <?php if (isset($error)): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
                <form class="form" method="post" action="login.php"><!-- login.php -->
                    <div class="form-control">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-control">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <input class="button" type="submit" value="Se connecter">
                </form>
            </div>
        </main>
    </div>
</body>
</html>









<!--------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------->

<!--?php
session_start();
$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = "root"; // Remplacez par votre nom d'utilisateur
    $admin_password = "G1i9e6t3"; // Remplacez par votre mot de passe

    // Utilisez htmlspecialchars pour empêcher les injections XSS
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Vérifiez les informations d'identification
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../horaires/admin_dashboard-horaires.php"); // Utilisez un chemin relatif correct
        exit();
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
    <meta name="description" content="Garage Vincent Parrot vous propose des services auto pour votre véhicule">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/64e89a7edd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <style>
        /* Styles personnalisés pour la page de connexion */
        h1, h2 {
            text-align: center;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f8f9f8;
        }
        .content {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background: #fbfbf9;
            border-radius: 5px;
            box-shadow: 0 0 40px rgba(128, 128, 128, 0.2);
        }
        .form-control {
            width: 100%;
            margin-bottom: 20px;
        }
        .button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: mediumorchid;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
        }
        .button:hover {
            background: rgb(211, 85, 163);
        }
        .breadcrumb-item {
            margin-bottom: 20px;
        }
        @media screen and (max-width: 576px) {
            .content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div class="breadcrumb-item">
    <a href="../pages/sommaire-index.html" class="link-item">Sommaire</a> >
    <a href="../index.html" class="link-item">Accueil</a> > Admin
</div>
<div class="content">
    <h1 class="title-admin">Ailes Enchantées</h1>
    <h2>Connexion Administrateur</h2>
    <form method="post" action="./admin_login.php"> -->  <!--modifier--><!--admin_login-test.php-->
       <!-- <div class="form-control">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-control">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input class="button" type="submit" value="Se connecter">
        <!?php if ($login_error): ?>
            <p style="color: red;"><!?php echo $login_error; ?></p>
        <!?php endif; ?>
    </form>
</div>
</body>
</html>
        -->



<!--?php
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
?> -->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">  -->
    
    <!--<meta name="description" content="Aile enchenter">-->

      
    <!-- BIBLIOTHEQUE D'ICÔNES BOOTSTRAP COMPOSANT 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">-->
    <!-- BIBLIOTHEQUE FONTAWESOME (mon code 64e89a7edd) pour utilisé les icones free fontawesome
    <script src="https://kit.fontawesome.com/64e89a7edd.js" crossorigin="anonymous"></script>--> 
    <!--POLICES D'ECRITURE typographie--> <!--
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

-->
    <!--<style>
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
        padding: 0px 20px 20px 20px;/* origine 20px */
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
        padding: 0px 0px 0px 20px;/* origine 20px */
      }
      .main {
        flex-direction: column;
        width: 100%;
        padding:  0px 0px 0px 20px;/* origine 20px */
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
        width: 30%;/*50%*/
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
        text-align: center;
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
    </style>    -->

   <!-- <style>

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

      body {
        background-position: 100% 100%;
        margin: 0;
        font-size: 1em;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0px 20px 20px 20px;/* origine 20px */
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
        padding: 0px 0px 0px 20px;/* origine 20px */
      }

      .main {
        flex-direction: column;
        width: 100%;
        padding:  0px 0px 0px 20px;/* origine 20px */
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
        width: 30%;/*50%*/
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
        text-align: center;
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

    </style>--> 

<!--

</head>
<body>
    <div class="content">
        <main class="main">
            <div class="section-form">
                <h1 class="title-admin">Ailes Enchantées</h1>
                <h2>Connexion Administrateur</h2> -->
                <!--?php if (isset($error)): ?>
                    <div class="error"> -->  <!--?php echo $error; ?></div>  -->
                <!--?php endif; ?>
                <form class="form" method="post" action="./admin_login.php"> -->  <!-- ./login.php -->
                  <!--  <div class="form-control">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-control">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <input class="button" type="submit" value="Se connecter">
                </form>
            </div>
        </main>
    </div>
</body>
</html>  -->

<!---------------------------- MES MODIFICATION ! BUG PEUT ETRE --------------------------->
<!--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine"> -->
    <!--<style>
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
        .content {
            display: flex;
            flex-direction: column;
            width: 90%;
            margin: 20px 0;
            justify-content: center;
            align-items: center;
        }
        .main {
            flex-direction: column;
            width: 100%;
            background: #fbfbf9;
            align-items: center;
            border-radius: 5px;
            box-shadow: 0 0 40px rgba(128, 128, 128, 0.2);
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .title-admin {
            text-align: center;
            font-size: 3.5em;
            width: 100%;
            height: auto;
            font-family: "Tangerine", serif;
            text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.4);
            margin: 15px 0;
        }
        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30%;
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
        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            margin-bottom: 20px;
            width: 160px;
            height: 30px;
            border-radius: 50px;
            cursor: pointer;
            background: mediumorchid;
            color: white;
            border: none;
        }
        .button:hover {
            background: rgb(211, 85, 163);
        }
        @media screen and (max-width: 576px) {
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
    </style>-->
    <!--
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

      body {
        background-position: 100% 100%;
        margin: 0;
        font-size: 1em;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0px 20px 20px 20px;/* origine 20px */
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
        padding: 0px 0px 0px 20px;/* origine 20px */
      }

      .main {
        flex-direction: column;
        width: 100%;
        padding:  0px 0px 0px 20px;/* origine 20px */
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
        width: 30%;/*50%*/
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
        text-align: center;
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

<body>                -->

  <!-- Breadcrumb navigation -->     <!---
  <div class="breadcrumb-item"> 
    <a href="../pages/sommaire-index.html" class="link-item">Sommaire</a> >
    <a href="../index.html" class="link-item">Accueil</a> > Admin
  </div>

<div class="content">
  <main class="main">
    <div class="section-form"> 

    <h1 class="title-admin">Ailes Enchantées</h1>
    <h2>Connexion Administrateur</h2>                          -->

    <!--?php if (isset($error)): ?>
            <div class="error">   -->   <!--?php echo $error; ?></div>  -->
    <!--?php endif; ?>

    <form class="form" method="post" action="login.php"> -->   <!-- ../php/admin_login.php  -->
      <!--
      <div class="form-control">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username" required><br><br>
      </div>

      <div class="form-control">        
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br><br> 
      </div>
        
      <input class="button" type="submit" value="Se connecter">     -->
      <!--<button class="button" type="submit">Se connecter</button>-->


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
      <!---------------------------------------------------------------->     <!--

    </form>    -->

    <!--<p style="color: red;"> -->  <!--?php echo $login_error; ?></p> -->

    <!-- Section d'affichage des erreurs -->
    <!--<div id="error-message" class="mt-3 text-danger"></div>-->

    <!--</div>-->    <!--
  </main>
</div>

</body>
</html>
    -->
<!------------------ FIN DU CODE EMPLACEMENT DECALE QUI PEUT FAIRE BUGUE ------------------>

<!-------------------------------------------------------------------------------------------->
<!-- php/login.php: Gère l'authentification de l'utilisateur. -->
<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//session_start();

require_once 'db_connect.php'; // Assurez-vous que le chemin est correct, ../php/db_connect.php

//echo "Point de débogage 1: Connexion à la base de données réussie.<br>";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "Point de débogage 2: Données reçues - Username: $username, Password: $password<br>";

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "Point de débogage 3: Utilisateur trouvé - Username: " . $user['username'] . "<br>";
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo "Point de débogage 4: Connexion réussie.<br>";
            header('Location: ./admin_dashboard.php');// modifier a admin_dashboard-test.php, origne a admin_dashboard.php
            exit();
        } else {
            echo "Point de débogage 5: Mot de passe incorrect.<br>";
        }
    } else {
        echo "Point de débogage 6: Utilisateur non trouvé.<br>";
    }

    $error = 'Nom d’utilisateur ou mot de passe incorrect.'; 
}
?>
    -->


<!--------------------------------------------------------------------------------------------------------------------->

<!--?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: ../php/login.php');//login.php
    exit;
}

require_once '../../../config-a/config.php';

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

// Récupérer les horaires actuels
try {
    $conn = get_db_connection();
    $stmt = $conn->prepare('SELECT * FROM horaires');
    $stmt->execute();
    $horaires = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Dashboard Admin</h2>

    <h3>Gérer les horaires</h3>    -->
    <!--?php if (!empty($success_message)): ?>
        <p style="color:green;">  -->  <!--?php echo $success_message; ?></p>  -->
    <!--?php endif; ?>

    <form method="post" action="../php/admin_dashboard.php">
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

    <h3>Horaires actuels</h3>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture</th>
            <th>Fermeture</th>
        </tr>  -->
        <!--?php foreach ($horaires as $horaire): ?>
            <tr>
                <td> -->  <!--?php echo $horaire['jour']; ?></td>
                <td> -->  <!--?php echo $horaire['ouverture']; ?></td>
                <td> -->  <!--?php echo $horaire['fermeture']; ?></td>
            </tr>  -->
        <!--?php endforeach; ?>
    </table>
</body>
</html>
        -->

<!----------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------->
