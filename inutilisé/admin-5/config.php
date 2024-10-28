<?php
return [
    'username' => 'admin', // Remplacez par votre nom d'utilisateur
    'password' => password_hash('adminpassword', PASSWORD_DEFAULT) // Remplacez par votre mot de passe
];
?>

<!--
Étape 1 : Configuration de base
Ce fichier contiendra les informations de connexion pour l'administrateur.
-->

<!--
Pour créer un espace administrateur où l'administrateur peut se connecter et 
gérer différentes choses comme les horaires, nous allons utiliser PHP pour 
la gestion des sessions et des connexions, ainsi que JavaScript (AJAX) pour 
permettre la mise à jour des horaires sans recharger la page.
-->
