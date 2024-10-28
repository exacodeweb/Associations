document.getElementById("comment-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Empêcher le rechargement de la page par défaut

  const formData = new FormData(this); // Récupérer les données du formulaire
  fetch("/submit-comment", {
      method: "POST",
      body: formData
  })
  .then(response => {
      if (!response.ok) {
          throw new Error("Erreur lors de la soumission du commentaire.");
      }
      return response.json(); // Si vous attendez une réponse JSON du serveur
  })
  .then(data => {
      // Gérer la réponse du serveur, par exemple actualiser la liste des commentaires
      console.log("Commentaire soumis avec succès :", data);
  })
  .catch(error => {
      console.error("Erreur :", error);
  });
});

// formulaire et envoyer les données du formulaire au serveur via une requête HTTP 
//(par exemple, AJAX) pour traitement asynchrone, afin que la page ne soit pas 
//rafraîchie entièrement lors de la soumission du formulaire. Voici un exemple de code JavaScript pour cela :

/*
2 - Traitement côté serveur : L'action du formulaire (action="/submit-comment") spécifie l'URL du script côté serveur qui 
traitera les données du formulaire lorsqu'il sera soumis. Côté serveur (par exemple, 
  en utilisant PHP, Node.js, Python, etc.), vous auriez un script qui recevrait les données du formulaire, 
  les validerait et les sauvegarderait dans une base de données.

3 - Traitement côté client : En JavaScript, vous pouvez écouter l'événement de soumission du formulaire et envoyer les 
données du formulaire au serveur via une requête HTTP (par exemple, AJAX) pour traitement asynchrone, 
afin que la page ne soit pas rafraîchie entièrement lors de la soumission du formulaire. 
Voici un exemple de code JavaScript pour cela :

4 - Traitement côté serveur (suite) : Le script côté serveur recevra les données du formulaire, les validera, 
les sauvegardera dans la base de données, puis renverra une réponse appropriée au client (par exemple, 
  un code de statut HTTP 200 pour succès, ou un code d'erreur 400 pour erreur de validation).

5 - Affichage du nouveau commentaire : Une fois que le commentaire est soumis avec succès et que le client 
reçoit une réponse positive du serveur, vous pouvez utiliser JavaScript pour mettre à jour dynamiquement la liste 
des commentaires sur la page sans recharger toute la page.

Notification (facultative) : Si vous souhaitez recevoir une notification lorsque de nouveaux commentaires sont soumis, 
vous pouvez configurer cela côté serveur, par exemple en envoyant un e-mail d'alerte à l'administrateur du site.

*/

/*--------------------------------------------------------------------------------------------------------------------*/


/*
Traitement côté client : Vous pouvez utiliser JavaScript pour envoyer les données du formulaire au 
script côté serveur de manière asynchrone, puis traiter la réponse pour afficher un message de succès ou 
d'erreur à l'utilisateur. Voici un exemple de code JavaScript :
*/

document.getElementById("contact-form").addEventListener("submit", function(event) {
  event.preventDefault();

  const formData = new FormData(this);
  fetch("/submit-contact", {
      method: "POST",
      body: formData
  })
  .then(response => {
      if (!response.ok) {
          throw new Error("Erreur lors de l'envoi du message.");
      }
      return response.json();
  })
  .then(data => {
      alert(data.message); // Afficher un message de succès ou d'erreur à l'utilisateur
  })
  .catch(error => {
      console.error("Erreur :", error);
      alert("Une erreur est survenue. Veuillez réessayer plus tard.");
  });
});

/*--------------------------------------------------------------------------------------------------------------------*/

document.getElementById("comment-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Empêcher le rechargement de la page par défaut

  const formData = new FormData(this); // Récupérer les données du formulaire
  fetch("/submit-comment", {
      method: "POST",
      body: formData
  })
  .then(response => {
      if (!response.ok) {
          throw new Error("Erreur lors de la soumission du commentaire.");
      }
      return response.json(); // Si vous attendez une réponse JSON du serveur
  })
  .then(data => {
      // Gérer la réponse du serveur, par exemple actualiser la liste des commentaires
      console.log("Commentaire soumis avec succès :", data);
      alert("Commentaire soumis avec succès !");
      // Ajouter le nouveau commentaire à la liste des commentaires
  })
  .catch(error => {
      console.error("Erreur :", error);
      alert("Une erreur est survenue. Veuillez réessayer plus tard.");
  });
});

document.getElementById("contact-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Empêcher le rechargement de la page par défaut

  const formData = new FormData(this); // Récupérer les données du formulaire
  fetch("/submit-contact", {
      method: "POST",
      body: formData
  })
  .then(response => {
      if (!response.ok) {
          throw new Error("Erreur lors de l'envoi du message.");
      }
      return response.json(); // Si vous attendez une réponse JSON du serveur
  })
  .then(data => {
      // Gérer la réponse du serveur, par exemple afficher un message de succès
      console.log("Message envoyé avec succès :", data);
      alert("Message envoyé avec succès !");
      // Réinitialiser le formulaire de contact
      document.getElementById("contact-form").reset();
  })
  .catch(error => {
      console.error("Erreur :", error);
      alert("Une erreur est survenue. Veuillez réessayer plus tard.");
  });
});

/*--------------------------------------------------------------------------------------------------------------------*/
document.getElementById('contactForm').addEventListener('submit', function(event) {
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var message = document.getElementById('message').value;

  if (name === '' || email === '' || message === '') {
      alert('Veuillez remplir tous les champs.');
      event.preventDefault();
  }
});
