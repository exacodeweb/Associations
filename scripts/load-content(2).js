// scripts/load-content.js
document.addEventListener('DOMContentLoaded', function () {
  const urlParams = new URLSearchParams(window.location.search);
  const id = urlParams.get('id');
  
  // Charger les données du papillon spécifique
  fetch('../data/papillons(2).json')
  .then(response => response.json())
  .then(data => {
      const papillon = data.find(papillon => papillon.id === parseInt(id));
      if (papillon) {
          // Afficher les détails du papillon
          document.querySelector('.details h1').textContent = papillon.name;
          //document.querySelector('.details img').src = `../assets/images/${papillon.image}`;
          document.querySelector('.details img').src = `../assets/images/${papillon.image}`;
          //document.querySelector('.details img').src = `../images3/${papillon.image}`;
          // Ajouter d'autres détails si nécessaire
      } else {
          console.error('Papillon non trouvé');
      }
  })
  .catch(error => console.error('Erreur de chargement des données:', error));
});