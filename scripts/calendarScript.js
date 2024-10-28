/* Fichier JavaScript pour gérer les interactions */


  document.addEventListener('DOMContentLoaded', function () {
    fetch('../data/events.json')
      .then(response => response.json())
      .then(data => {
        const eventsTable = document.getElementById('events-table');
        data.forEach(event => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${event.date}</td>
            <td>${event.title}</td>
            <td>${event.description}</td>
            <td><a href="../pages/inscription.html?event=${encodeURIComponent(event.title)}&date=${encodeURIComponent(event.date)}">S'inscrire</a></td>
          `;
          eventsTable.appendChild(row);
        });
      })
      .catch(error => console.error('Erreur lors du chargement des événements:', error));
  });
