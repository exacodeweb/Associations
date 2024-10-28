document.addEventListener("DOMContentLoaded", function() {
  const commentForm = document.getElementById("comment-form");
  const zoneCommentaires = document.getElementById("zone_commentaires");

  // Écouter l'événement submit du formulaire de commentaire
  commentForm.addEventListener("submit", function(event) {
      event.preventDefault(); // Empêcher le formulaire de recharger la page

      // Récupérer les données du formulaire
      const formData = new FormData(commentForm);
      const nom = formData.get("nom");
      const commentaire = formData.get("commentaire");

      // Envoyer les données au serveur via fetch
      fetch("../php/ajouter_commentaire.php", {
          method: "POST",
          body: formData
      })
      .then(response => response.json()) // Attendre la réponse JSON
      .then(data => {
          // Afficher un message ou effectuer d'autres actions si nécessaire
          console.log("Réponse du serveur :", data);
          // Réinitialiser le formulaire ou mettre à jour les commentaires affichés
          // Exemple : zoneCommentaires.innerHTML = `<p>${data.message}</p>`;
      })
      .catch(error => {
          console.error("Erreur lors de l'ajout du commentaire :", error);
      });
  });

  // Fonction pour récupérer et afficher les commentaires depuis le serveur
  function afficherCommentaires() {
      fetch("../php/recuperer_commentaires.php")
      .then(response => response.json())
      .then(data => {
          if (data.length > 0) {
              zoneCommentaires.innerHTML = ""; // Réinitialiser le contenu existant
              data.forEach(commentaire => {
                  const comDiv = document.createElement("div");
                  comDiv.className = "com";
                  comDiv.innerHTML = `<p>${commentaire.text}</p><span>Par ${commentaire.name} le ${commentaire.date}</span>`;
                  zoneCommentaires.appendChild(comDiv);
              });
          } else {
              zoneCommentaires.innerHTML = "Aucun commentaire pour le moment.";
          }
      })
      .catch(error => {
          console.error("Erreur lors de la récupération des commentaires :", error);
          zoneCommentaires.innerHTML = "Erreur lors de la récupération des commentaires.";
      });
  }

  // Appeler la fonction pour afficher les commentaires au chargement de la page
  afficherCommentaires();
});