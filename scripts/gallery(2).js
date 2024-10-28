
/*--------------------------------------------------------------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
  const butterflies = [
      {
          id: 1,
          name: "Aglais urticae",
          commonName: "La petite tortue",
          description: "Un papillon commun en Europe.",
          image: "../images3/photo1.jpg"
      },
      {
          id: 2,
          name: "Araschnia levana-Test",
          commonName: "La carte géographique",
          description: "Un papillon commun en Europe.",
          image: "../images3/Araschnia_levana_(La-carte-géographique).jpg"
      },
      // TEST
      {
        id: 3,
        name: "Brenthis daphne",
        commonName: "La carte géographique",
        description: "Un papillon commun en Europe.",
        image: "../images3/Brenthis_daphne_(Le-Nacré-de-la-ronce).jpg"
      },
      // Ajoutez les autres papillons ici...

  ];

  const buttons = document.querySelectorAll(".fiche-details");
  //const buttons = document.querySelectorAll("../pages/fiche-details.html");
  buttons.forEach(button => {
      button.addEventListener("click", function () {
          const id = this.getAttribute("data-id");
          const butterfly = butterflies.find(b => b.id == id);

          if (butterfly) {
              sessionStorage.setItem("selectedButterfly", JSON.stringify(butterfly));
              window.location.href = "fiche-details(2).html";
          }
      });
  });
  // VOIR LA PAGE FICHE DETAIL //
  const selectedButterfly = JSON.parse(sessionStorage.getItem("selectedButterfly"));
  if (selectedButterfly && window.location.pathname.endsWith("fiche-details(2).html")) {
      document.getElementById("butterfly-name").textContent = selectedButterfly.commonName;
      //document.getElementById("butterfly-image").src = selectedButterfly.image;
      document.getElementById("butterfly-image").src = `../assets/images/${selectedButterfly.image}`;
      document.getElementById("butterfly-description").textContent = selectedButterfly.description;
  }
});










document.addEventListener("DOMContentLoaded", function () {
  const butterflies = [
      { id: 1, name: "Aglais urticae", commonName: "La petite tortue", description: "Un papillon commun en Europe.", image: "photo1.jpg" },
      { id: 2, name: "Araschnia levana", commonName: "La carte géographique", description: "Un papillon commun en Europe.", image: "Araschnia_levana_(La-carte-géographique).jpg" },
      { id: 3, name: "Brenthis daphne", commonName: "La carte géographique", description: ".1- Un papillon commun en Europe.", image: "Brenthis_daphne_(Le-Nacré-de-la-ronce).jpg" },
      // Ajoutez les autres papillons ici...
  ];

  const buttons = document.querySelectorAll(".fiche-details");

  buttons.forEach(button => {
      button.addEventListener("click", function () {
          const id = this.getAttribute("data-id");
          const butterfly = butterflies.find(b => b.id == id);
          if (butterfly) {
              sessionStorage.setItem("selectedButterfly", JSON.stringify(butterfly));
              window.location.href = "../pages/fiche-details(2).html";
          }
      });
  });

  const selectedButterfly = JSON.parse(sessionStorage.getItem("selectedButterfly"));
  if (selectedButterfly && window.location.pathname.endsWith("../pages/fiche-details(2).html")) {
      document.getElementById("butterfly-name").textContent = selectedButterfly.commonName;
      document.getElementById("butterfly-image").src = `../assets/images/${selectedButterfly.image}`;
      document.getElementById("butterfly-description").textContent = selectedButterfly.description;
  }
});
