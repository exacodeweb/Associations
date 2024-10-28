document.addEventListener('DOMContentLoaded', function() {
  const jsonUrl = '../json/events.json?' + new Date().getTime();

  function remplirTableau(data) {
      const tableBody = document.getElementById('events-table');

      tableBody.innerHTML = '';

      data.forEach(event => {
          const row = document.createElement('tr');

          row.innerHTML = `
              <td>${event.date}</td>
              <td>${event.title}</td>
              <td>${event.description}</td>
              <td><a href="inscription.html?event=${encodeURIComponent(event.title)}&date=${encodeURIComponent(event.date)}" class="btn btn-primary">S'inscrire</a></td>
          `;

          tableBody.appendChild(row);
      });
  }

  fetch(jsonUrl)
      .then(response => {
          if (!response.ok) {
              throw new Error('Erreur HTTP ! statut : ' + response.status);
          }
          return response.json();
      })
      .then(data => {
          remplirTableau(data);
      })
      .catch(error => {
          console.error('Erreur lors du chargement du fichier JSON :', error);
      });
});