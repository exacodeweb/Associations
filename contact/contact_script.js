document.addEventListener('DOMContentLoaded', function() {
  // URL du fichier JSON avec cache-busting
  const jsonUrl = '../data/events.json?' + new Date().getTime();

  // Fonction pour remplir le tableau avec les données JSON
  function remplirTableau(data) {
      const tableBody = document.getElementById('events-table');

      // Effacer les lignes existantes dans le tableau
      tableBody.innerHTML = '';

      // Parcourir chaque événement dans les données JSON
      data.forEach(event => {
          const row = document.createElement('tr');

          row.innerHTML = `
              <td>${event.date}</td>
              <td>${event.title}</td>
              <td>${event.description}</td>
              <td><a href="../pages/inscription.html?event=${encodeURIComponent(event.title)}&date=${encodeURIComponent(event.date)}" class="btn btn-primary">S'inscrire</a></td>
          `;

          // Ajouter la ligne au corps du tableau
          tableBody.appendChild(row);
      });
  }

  // Charger le fichier JSON et remplir le tableau
  fetch(jsonUrl)
      .then(response => {
          if (!response.ok) {
              throw new Error('Erreur HTTP ! statut : ' + response.status);
          }
          return response.json();
      })
      .then(data => {
          // Appeler la fonction pour remplir le tableau avec les données JSON
          remplirTableau(data);
      })
      .catch(error => {
          // Afficher une erreur dans la console en cas de problème lors du chargement du fichier JSON
          console.error('Erreur lors du chargement du fichier JSON :', error);
      });
});