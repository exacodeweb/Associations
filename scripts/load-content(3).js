document.addEventListener('DOMContentLoaded', function () {
  // Récupération des détails du papillon sélectionné depuis sessionStorage
  const selectedButterfly = JSON.parse(sessionStorage.getItem("selectedButterfly"));

  if (selectedButterfly) {
      // Affichage des détails du papillon sur la page
      document.getElementById("butterfly-name").textContent = selectedButterfly.commonName;
      document.getElementById("butterfly-image").src = `../images3/${selectedButterfly.image}`;
      document.getElementById("butterfly-description").textContent = selectedButterfly.description;
      document.getElementById("butterfly-classe").textContent = selectedButterfly.classe;
      document.getElementById("butterfly-ordre").textContent = selectedButterfly.ordre;
  } else {
      console.error('Papillon non trouvé dans le stockage de session');
  }
});