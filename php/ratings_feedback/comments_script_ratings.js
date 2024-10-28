document.addEventListener("DOMContentLoaded", function() {
  fetch("../php/recuperer_commentaires_beta.php")
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok ' + response.statusText);
          }
          return response.json();
      })
      .then(data => {
          const zoneCommentaires = document.getElementById("zone_commentaires");
          if (!zoneCommentaires) {
              console.error("Element with ID 'zone_commentaires' not found.");
              return;
          }

          if (data.length > 0) {
              zoneCommentaires.innerHTML = "";
              data.forEach(commentaire => {
                  const comDiv = document.createElement("div");
                  comDiv.className = "com";
                  comDiv.innerHTML = `<p>${commentaire.message}</p><span>Par ${commentaire.nom} le ${commentaire.date}</span><span>Note : ${commentaire.note}</span>`;
                  zoneCommentaires.appendChild(comDiv);
              });
          } else {
              zoneCommentaires.innerHTML = "Aucun commentaire pour le moment.";
          }
      })
      .catch(error => {
          console.error("Erreur lors de la récupération des commentaires :", error);
      });
});







/*
document.addEventListener("DOMContentLoaded", function() {
  fetch("../php/recuperer_commentaires_beta.php")
      .then(response => response.json())
      .then(data => {
          const zoneCommentaires = document.getElementById("zone_commentaires");
          if (data.length > 0) {
              data.forEach(commentaire => {
                  const comDiv = document.createElement("div");
                  comDiv.className = "com";
                  comDiv.innerHTML = `<p>${commentaire.message}</p><span>Par ${commentaire.nom} le ${commentaire.date}</span><span>Note : ${commentaire.note}</span>`;
                  zoneCommentaires.appendChild(comDiv);
              });
          } else {
              zoneCommentaires.innerHTML = "Aucun commentaire pour le moment.";
          }
      })
      .catch(error => {
          console.error("Erreur lors de la récupération des commentaires :", error);
      });
});
*/

/*
document.addEventListener("DOMContentLoaded", function() {
  fetch("../php/recuperer_commentaires_beta.php")
      .then(response => response.json())
      .then(data => {
          const zoneCommentaires = document.getElementById("zone_commentaires");
          if (data.length > 0) {
              data.forEach(commentaire => {
                  const comDiv = document.createElement("div");
                  comDiv.className = "com";
                  comDiv.innerHTML = `<p>${commentaire.message}</p><span>Par ${commentaire.nom} le ${commentaire.date}</span><span>Note : ${commentaire.note}</span>`;
                  zoneCommentaires.appendChild(comDiv);
              });
          } else {
              zoneCommentaires.innerHTML = "Aucun commentaire pour le moment.";
          }
      })
      .catch(error => {
          console.error("Erreur lors de la récupération des commentaires :", error);
      });
});*/