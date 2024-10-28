
document.addEventListener('DOMContentLoaded', function () {
  const galleryContainer = document.getElementById('gallery-container');

  // Fonction pour charger les données des papillons
  function loadPapillons() {
    fetch('../data/papillons.json')
      .then(response => response.json())
      .then(data => {
        data.forEach(papillon => {
          const papillonCard = createPapillonCard(papillon);
          galleryContainer.appendChild(papillonCard);
        });
      })
      .catch(error => console.error('Erreur lors du chargement des papillons:', error));
  }

  // Fonction pour créer une carte de papillon
  function createPapillonCard(papillon) {
    const cardDiv = document.createElement('div');
    cardDiv.classList.add('card', 'section-2');

    const imgDiv = document.createElement('div');
    imgDiv.classList.add('card-img-top2');
    const img = document.createElement('img');
    img.src = `../assets/images/${papillon.image}`;
    img.alt = papillon.name;
    imgDiv.appendChild(img);

    const subsectionDiv = document.createElement('div');
    subsectionDiv.classList.add('subsection');
    const h5 = document.createElement('h5');
    h5.textContent = papillon.name;
    const p = document.createElement('p');
    p.classList.add('f01');
    p.textContent = papillon.description;

    const button = document.createElement('button');
    button.classList.add('btn', 'btn-primary', 'fiche-detail');
    button.dataset.id = papillon.id;
    button.textContent = 'Fiche détail';
    button.addEventListener('click', () => afficherDetailsPapillon(papillon.id));

    subsectionDiv.appendChild(h5);
    subsectionDiv.appendChild(p);
    subsectionDiv.appendChild(button);

    cardDiv.appendChild(imgDiv);
    cardDiv.appendChild(subsectionDiv);

    return cardDiv;
  }

  // Fonction pour afficher les détails d'un papillon
  function afficherDetailsPapillon(id) {
    window.location.href = `../pages/fiche-details.html?id=${id}`;
  }

  loadPapillons();
});