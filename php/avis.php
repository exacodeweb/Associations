<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Entomologie">
    <link rel="stylesheet" href="./avis_style.css">
    <title>ECF-Formulaire-Avis</title>
</head>
<body>
    <!-- Breadcrumb navigation -->
    <div class="breadcrumb-item">
        <a href="../pages/sommaire.html" class="link-item">Sommaire</a> >
        <a href="../index.html" class="link-item">Accueil</a> > Avis
    </div>
    <div class="content">
        <main class="main">
            <div class="section-form">
                <div class="article">
                    <h2 class="title">Laisser un Avis</h2>
                    <div class="pt text-center">
                        <p>
                            Nous serions ravis de recevoir vos avis. Il vous suffit de remplir ce formulaire et de le valider.<br>
                            Merci de partager vos impressions avec nous !
                        </p>
                    </div>
                </div>
                <!-- Formulaire de contact -->
                <form class="form" id="avis-form" action="./submit_avis.php" method="post">
                    
                    <!-- Token CSRF pour la sécurité -->
                    <!--?php include '../php/csrf_token_avis.php'; ?>-->
                
                <!-- Token CSRF pour la sécurité -->
                    <?php 
                    include './csrf_token.php'; 
                    ?>
                    <input type="hidden" name="./csrf_token_avis" value="<?php echo $_SESSION['csrf_token_avis']; ?>">

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
                        <input type="number" id="note" name="note" placeholder="Votre note (1-5)" min="1" max="5">
                    </div>
                    <button type="submit">Envoyer</button>
                </form>

                <!-- Section d'affichage des erreurs -->
                <div id="error-message" class="mt-3 text-danger"></div>
            </div>
        </main>
    </div>
</body>
</html>
