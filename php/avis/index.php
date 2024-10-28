<?php
                // Connexion à la base de données
                $serveur = "localhost";
                $utilisateur = "root";
                $motdepasse = "G1i9e6t3";
                $basededonnees = "";/*ma_base_de_donnees*/
                
                $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);
                
                // Vérifie la connexion
                if ($connexion->connect_error) {
                    die("La connexion a échoué : " . $connexion->connect_error);
                }
                
                // Prépare la requête d'insertion
                $nom = "John Doe";
                $email = "john.doe@example.com";
                
                $sql = "INSERT INTO utilisateurs (nom, email) VALUES ('$nom', '$email')";
                
                // Exécute la requête d'insertion
                if ($connexion->query($sql) === TRUE) {
                    echo "Nouvelle entrée ajoutée avec succès !";
                } else {
                    echo "Erreur : " . $sql . "<br>" . $connexion->error;
                }
                
                // Ferme la connexion
                $connexion->close();
                ?>
<!--------------------------------------------------------------------------------------------------------------------->

<?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifie la connexion
    if ($conn->connect_error) {
      die("La connexion a échoué : " . $conn->connect_error);
    }

    // Préparation de la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nom, $email);

    // Définition des valeurs à insérer
    $nom = "John Doe";
    $email = "john.doe@example.com";

    // Exécution de la requête
    if ($stmt->execute()) {
      echo "Nouvelle entrée ajoutée avec succès !";
    } else {
      echo "Erreur : " . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
    ?>

