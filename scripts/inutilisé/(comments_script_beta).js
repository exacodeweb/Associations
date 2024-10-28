
document.addEventListener("DOMContentLoaded", function() {
    fetch("../php/recuperer_commentaires_beta.php")
        .then(response => response.json())
        .then(data => {
            const zoneCommentaires = document.getElementById("zone_commentaires");
            if (data.length > 0) {
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
        });
});
