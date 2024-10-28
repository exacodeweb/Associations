
<!--------------------------------------------------------------------------------------------------------------------->
<!-- 3. Création du Premier Administrateur -->
<?php
require_once '../../../config-a/config.php';

$password = password_hash('MotDePasseAdmin2024!', PASSWORD_DEFAULT);//MotDePasseAdmin2024! //A9d@7Kb#zX3!qLm
//$password = password_hash('', PASSWORD_DEFAULT);

try {
    $conn = get_db_connection();
    $stmt = $conn->prepare('INSERT INTO admins (username, password) VALUES (:username, :password)');
    $stmt->execute(['username' => 'admin', 'password' => $password]);
    echo "Administrateur ajouté avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!--
// test: http://localhost/Mon_projet/php/login.php
//root
//G1i9e6t3
//$2y$10$Kw3U0mst4EF/48OgHbGZYOxwkJcwS9WL97pMDWi6j1K/YTKfQl6ES
//MotDePasseAdmin2024!
//A9d@7Kb#zX3!qLm  N'oubliez pas de supprimer ce fichier après avoir exécuté le script pour éviter tout risque de sécurité.
//Voici un mot de passe fort généré aléatoirement pour votre administrateur :
//A9d@7Kb#zX3!qLm
-->
<!--
Pour ajouter ce code afin de créer un administrateur dans votre table admins, 
vous pouvez créer un fichier PHP temporaire, par exemple create_admin.php, 
et exécuter ce fichier une seule fois pour insérer l'administrateur 
dans la base de données. Voici comment procéder :

Étapes pour ajouter un administrateur
Créez un nouveau fichier nommé create_admin.php dans votre projet.
Collez le code suivant dans ce fichier :

Accédez à ce fichier via votre navigateur :
Ouvrez votre navigateur et allez à l'adresse suivante : http://localhost/Mon_projet/php/create_admin.php

Vérifiez que le message "Administrateur ajouté avec succès." s'affiche.
Supprimez le fichier create_admin.php après l'exécution pour des raisons de sécurité.

Accéder au fichier dans le navigateur :
bash
Copier le code
http://localhost/Mon_projet/php/create_admin.php
Une fois l'administrateur ajouté, supprimez le fichier create_admin.php.
Cela permettra de créer un administrateur avec le nom d'utilisateur admin et le mot de passe 
que vous avez défini. Vous pourrez ensuite vous connecter avec ces identifiants 
sur la page de connexion administrateur.
-->
<!--
bien donc quand on livre un site on se sert de ce fichier ?
ChatGPT
Lorsqu'on livre un site, le fichier pour ajouter un administrateur (create_admin.php) n'est généralement pas inclus dans la version finale du site pour des raisons de sécurité. Voici comment vous pouvez procéder pour gérer la création d'administrateurs lors de la livraison d'un site :

Processus de livraison sécurisé
Créez l'administrateur avant la livraison :

Utilisez create_admin.php pour créer les comptes administrateur nécessaires avant de livrer le site.
Accédez au fichier via votre navigateur pour insérer les administrateurs dans la base de données.
Supprimez le fichier create_admin.php avant de livrer le site :

Une fois les administrateurs créés, supprimez create_admin.php pour éviter que quelqu'un d'autre puisse y accéder et ajouter des comptes administrateurs.
Documentez le processus pour les futures modifications :

Si le client ou un futur développeur doit ajouter d'autres administrateurs, 
fournissez des instructions claires sur la manière de le faire, par exemple 
via une interface d'administration sécurisée ou en exécutant un script spécifique.
Exemple de documentation pour la livraison

Voici un exemple de documentation que vous pourriez inclure pour 
expliquer comment ajouter un administrateur :








Exemple de documentation pour la livraison
Voici un exemple de documentation que vous pourriez inclure pour expliquer comment ajouter un administrateur :

Ajout d'un Administrateur

Pour ajouter un administrateur au site "Les Ailes Enchantées", suivez ces étapes :

Créez un fichier PHP temporaire :
Créez un fichier nommé create_admin.php avec le contenu suivant :


Téléchargez le fichier sur le serveur :

Placez create_admin.php dans le répertoire php de votre projet.
Accédez au fichier via votre navigateur :

Ouvrez votre navigateur et allez à l'adresse suivante : http://votre_domaine/Mon_projet/php/create_admin.php
Vous devriez voir le message "Administrateur ajouté avec succès."
Supprimez le fichier create_admin.php :

Pour des raisons de sécurité, supprimez le fichier du serveur une fois l'administrateur créé.
Connectez-vous avec les nouveaux identifiants :

Utilisez le nom d'utilisateur et le mot de passe définis pour vous connecter à l'interface d'administration.
Automatisation et Sécurité
Pour un site en production, il est plus sûr de fournir une interface d'administration pour 
gérer les utilisateurs, y compris la possibilité d'ajouter de nouveaux administrateurs. Cela peut inclure :

Formulaire de gestion des utilisateurs : Une section dans le tableau de bord 
administrateur pour ajouter, modifier et supprimer des comptes administrateurs.
Sécurité renforcée : Utilisation de mesures de sécurité comme des tokens CSRF, 
des captchas et des limitations de tentatives de connexion pour protéger l'interface d'administration.
Ainsi, vous pouvez assurer une gestion sécurisée des administrateurs sans 
avoir besoin de fichiers temporaires pour créer des comptes.
-->
