<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'db_connect.php'; // Assurez-vous que le chemin est correct

echo "Point de débogage 1: Connexion à la base de données réussie.<br>";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "Point de débogage 2: Données reçues - Username: $username, Password: $password<br>";

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Point de débogage 3: Requête exécutée.<br>";

    if ($user) {
        echo "Point de débogage 4: Utilisateur trouvé.<br>";
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo "Point de débogage 5: Connexion réussie.<br>";
            header('Location: ./admin_dashboard.php');
            exit();
        } else {
            echo "Point de débogage 6: Mot de passe incorrect.<br>";
        }
    } else {
        echo "Point de débogage 7: Utilisateur non trouvé.<br>";
    }

    $error = 'Nom d’utilisateur ou mot de passe incorrect.';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrateur</title>
    <link rel="stylesheet" href="../admin-0/login_style.css">
  
</head>
<body>
    <div class="login-container">
        <h2>Connexion Administrateur</h2>   -->
        <!--?php if (isset($error)): ?>
            <div class="error">  -->  <!--?php echo $error; ?></div>  -->
        <!--?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html> --> 

<!--------------------------------------------------------------------------------------------------------------------->
<!-- php/login.php: Gère l'authentification de l'utilisateur. -->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'db_connect.php'; // Assurez-vous que le chemin est correct ./db_connect.php

//echo "Point de débogage 1: Connexion à la base de données réussie.<br>";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //echo "Point de débogage 2: Données reçues - Username: $username, Password: $password<br>";

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        //echo "Point de débogage 3: Utilisateur trouvé - Username: " . $user['username'] . "<br>";
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo "Point de débogage 4: Connexion réussie.<br>";
            header('Location: ./admin_dashboard.php');// modifier a admin_dashboard-test.php, origne a admin_dashboard.php
            exit();
        } else {
            //echo "Point de débogage 5: Mot de passe incorrect.<br>";
        }
    } else {
        //echo "Point de débogage 6: Utilisateur non trouvé.<br>";
    }

    $error = 'Nom d’utilisateur ou mot de passe incorrect.';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrateur</title>
    <link rel="stylesheet" href="xx-../admin-0/login_style.css">
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
        height: 25px !important;
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






button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 10px;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}
.error {
  color: red;
  text-align: center;
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

  <!-- BREADCRUMB -->
  <!-- breadcrumb items -->
  <div class="breadcrumb-item">
    <a href="../pages/Sommaire-index.html" class="link-rep">Sommaire</a> >
    <a href="../index.html" class="link-rep">Acceuil</a> > exposition
  </div>

  <div class="content">
    <!--<div class="login-container">-->
    <main class="main">
    <div class="section-form">
    <h1 class="title-admin">Ailes Enchantées</h1>
        <h2>Connexion Administrateur</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form class="form" method="post" action="login.php">
        <div class="form-control">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-control">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
            <button type="submit">Se connecter</button>

            <input class="button" type="submit" value="Se connecter">
        </form>
    </div>
    </main>
  </div>
</body>
</html>



    <div class="login-container">
        <h2>Connexion Administrateur</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>





<!--------------------------------------------------------------------------------------------------------------------->
<!-- php/login.php: Gère l'authentification de l'utilisateur. --> 
<!--  ?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

//require_once './db_connect.php'; // Assurez-vous que le chemin est correct
//require_once '../admin/db_connect.php';
require_once '../php/db_connect.php';

echo "Point de débogage 1: Connexion à la base de données réussie.<br>";

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
            header('Location: admin_dashboard-test.php');// modifier a admin_dashboard-test.php, origne a admin_dashboard.php
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrateur</title>
    <link rel="stylesheet" href="../admin-0/login_style.css">
</head>
<body>  -->

  <!-- BREADCRUMB -->
  <!-- breadcrumb items -->   <!--
  <div class="breadcrumb-item">
    <a href="../pages/Sommaire-index.html" class="link-rep">Sommaire</a> >
    <a href="../index.html" class="link-rep">Acceuil</a> > exposition
  </div>

    <div class="login-container">   -->  <!--
        <h2>Connexion Administrateur</h2>   -->
        <!-- ?php if (isset($error)): ?>
            <div class="error">  -->  <!-- ?php echo $error; ?></div>  -->
        <!-- ?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>  -->

<!------------------------------------------------------------------------------------->
<!-- php/login.php: Gère l'authentification de l'utilisateur. -->
<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'db_connect.php'; // Assurez-vous que le chemin est correct ./db_connect.php

echo "Point de débogage 1: Connexion à la base de données réussie.<br>";

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
        echo "Mot de passe haché stocké: " . $user['password'] . "<br>";
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo "Point de débogage 4: Connexion réussie.<br>";
            header('Location: ./admin_dashboard.php'); // Modifier à admin_dashboard-test.php si nécessaire
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrateur</title>
    <link rel="stylesheet" href="../admin-0/login_style.css">
</head>
<body>
        -->
  <!-- BREADCRUMB -->
  <!-- breadcrumb items -->         <!--
  <div class="breadcrumb-item">
    <a href="../pages/Sommaire-index.html" class="link-rep">Sommaire</a> >
    <a href="../index.html" class="link-rep">Acceuil</a> > exposition
  </div>

    <div class="login-container">
        <h2>Connexion Administrateur</h2>   -->
        <!--?php if (isset($error)): ?>
            <div class="error"><!-?php echo $error; ?></div>
        <!-?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>


        -->

<!--==========================================================================================-->
<!--==========================================================================================-->
