// scripts/gallery.js
document.addEventListener('DOMContentLoaded', function () {
  const gallery = document.getElementById('gallery');

  // Charger les données des papillons depuis le fichier JSON
  fetch('../data/papillons(A-1).json')
  .then(response => response.json())
  .then(data => {
      // Générer une carte pour chaque papillon
      data.forEach(papillon => {
          const card = document.createElement('div');
          card.classList.add('card');
          card.innerHTML = `
              <img src="../assets/images3/${papillon.image}" alt="${papillon.name}">
              <div class="info">
                  <h3>${papillon.name}</h3>
                  <button class="btn btn-primary fiche-details(A-1)" data-id="${papillon.id}">Fiche details</button>
              </div>
          `;
          gallery.appendChild(card);
      });

      // Gestion des clics sur les boutons "Fiche détails"
      const ficheDetailsButtons = document.querySelectorAll('.fiche-details');
      ficheDetailsButtons.forEach(button => {
          button.addEventListener('click', function () {
              const id = this.getAttribute('data-id');
              window.location.href = `../pages/fiche-details(A-1).html?id=${id}`;
              //window.location.href = `../pages/fiche-details.html?id=${id}`;

          });
      });
  })
  .catch(error => console.error('Erreur de chargement des données:', error));
});

/*--------------------------------------------------------------------------------------------------------------------*/
//document.addEventListener("DOMContentLoaded", function () {
  //const butterflies = [
      //{
          //id: 1,
          //name: "Aglais urticae",
          //commonName: "La petite tortue",
          //description: "Un papillon commun en Europe.",
          //image: "../images3/photo1.jpg"
      //},
      //{
          //id: 2,
          //name: "Araschnia levana",
          //commonName: "La carte géographique",
          //description: "Un papillon commun en Europe.",
          //image: "../images3/Araschnia_levana_(La-carte-géographique).jpg"
      //},
      // TEST
      //{
        //id: 3,
        //name: "Brenthis daphne",
        //commonName: "La carte géographique",
        //description: "Un papillon commun en Europe.",
        //image: "../images3/Brenthis_daphne_(Le-Nacré-de-la-ronce).jpg"
      //},
      // Ajoutez les autres papillons ici...

  //];

  //const buttons = document.querySelectorAll(".fiche-details(A-1)");
  //DESACTIVER///const buttons = document.querySelectorAll("../pages/fiche-details.html");
  //buttons.forEach(button => {
  //button.addEventListener("click", function () {
          //const id = this.getAttribute("data-id");
          //const butterfly = butterflies.find(b => b.id == id);

          //if (butterfly) {
              //sessionStorage.setItem("selectedButterfly", JSON.stringify(butterfly));
              //window.location.href = "../pages/fiche-details(A-1).html";
          //}
      //});
  //});
  // VOIR LA PAGE FICHE DETAIL //
  //const selectedButterfly = JSON.parse(sessionStorage.getItem("selectedButterfly"));
  //if (selectedButterfly && window.location.pathname.endsWith("fiche-details(A-1).html")) {
      //document.getElementById("butterfly-name").textContent = selectedButterfly.commonName;
      //DESACTIVER//document.getElementById("butterfly-image").src = selectedButterfly.image;
      //document.getElementById("butterfly-image").src = `../assets/images3/${selectedButterfly.image}`;
      //document.getElementById("butterfly-description").textContent = selectedButterfly.description;
  //}
//});
