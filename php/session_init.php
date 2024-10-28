<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    echo "Session démarrée avec succès.";
} else {
    echo "Session déjà démarrée.";
}

//<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


  //session_start();
  //if (!isset($_SESSION['csrf_token_avis'])) {
      //$_SESSION['csrf_token-avis'] = bin2hex(random_bytes(32));
  //}
  //?>



<!-------------------------------------------------------------------------------------------->
<!--?php
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>  -->

<!--?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Génération du token CSRF si nécessaire
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>  -->

<!-------------------------------------------------------------------------------------------->
<!--?php
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>  -->

<!--?php
session_start();

// Vérification du démarrage de la session
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session démarrée avec succès.<br>";
} else {
    echo "Erreur : La session n'a pas pu être démarrée.<br>";
}

// Génération du token CSRF si nécessaire
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>   -->
