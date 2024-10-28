document.addEventListener("DOMContentLoaded", function () {
  // Tableau des données des papillons
  const butterflies = [
      { id: 1, name: "Aglais urticae", commonName: "La petite tortue", description: "Un papillon commun en Europe.", image: "photo1.jpg", classe: "insecte", ordre: "lépidoptera" },
      { id: 2, name: "Araschnia levana", commonName: "La carte géographique", description: "Un papillon commun en Europe.", image: "photo2.jpg", classe: "insecte", ordre: "lépidoptera" },/*Araschnia_levana_(La-carte-géographique).jpg*/
      { id: 3, name: "Brenthis daphne", commonName: "Le Nacré de la ronce", description: "Un papillon commun en Europe.", image: "photo3.jpg", classe: "insecte", ordre: "lépidoptera" },
      // Ajoutez les autres papillons ici...
      { id: 4, name: "Inachis io", commonName: "Paon du jour", description: "Un papillon commun en Europe.", image: "photo4.jpg", classe: "insecte", ordre: "lépidoptera" },
      { id: 5, name: "Nom: Melitaea cinxia", commonName: "La Mélitée du plantain", description: "Un papillon commun en Europe.", image: "photo5.jpg", classe: "insecte", ordre: "lépidoptera" },/*Araschnia_levana_(La-carte-géographique).jpg*/
      { id: 6, name: "Papilio machaon", commonName: "Le grand porte queue", description: "Un papillon commun en Europe.", image: "photo6.jpg", classe: "insecte", ordre: "lépidoptera" }
  ];

  // Sélection de l'élément de la galerie dans le DOM
  const gallery = document.querySelector('.gallery');

  // Création des cartes pour chaque papillon
  butterflies.forEach(butterfly => {
      const card = document.createElement('div');
      card.classList.add('card');

      const cardContent = `
          <img src="../images3/${butterfly.image}" alt="${butterfly.name}">
          <h2>${butterfly.commonName}</h2>
          <p>${butterfly.description}</p>
          <div class="submit">
          <button class="fiche-details" data-id="${butterfly.id}">Voir les détails</button>
         </div>
      `;
      card.innerHTML = cardContent;
      gallery.appendChild(card);
  });

  // Sélection des boutons de détails
  const buttons = document.querySelectorAll(".fiche-details");

  // Ajout des écouteurs d'événements pour chaque bouton
  buttons.forEach(button => {
      button.addEventListener("click", function () {
          const id = this.getAttribute("data-id");
          const butterfly = butterflies.find(b => b.id == id);
          if (butterfly) {
              // Stockage des détails du papillon sélectionné dans sessionStorage
              sessionStorage.setItem("selectedButterfly", JSON.stringify(butterfly));
              // Redirection vers la page des détails
              window.location.href = "../pages/fiche-details(3).html";
          }
      });
  });
});