// Fonction pour charger les papillons depuis un fichier JSON et les afficher
function loadPapillons() {
  fetch('../data/papillons(2).json')
    .then(response => response.json())
    .then(data => {
      const galleryContainer = document.getElementById('gallery-container');
      data.forEach(papillon => {
        const papillonCard = createPapillonCard(papillon);
        galleryContainer.appendChild(papillonCard);
      });
    })
    .catch(error => console.error('Erreur lors du chargement des papillons:', error));
}

// Fonction pour créer une carte de papillon à partir des données
function createPapillonCard(papillon) {
  const cardDiv = document.createElement('div');
  cardDiv.classList.add('card', 'section-2');

  const imgDiv = document.createElement('div');
  imgDiv.classList.add('card-img-top2');
  const img = document.createElement('img');
  img.src = papillon.image_principale;
  img.alt = papillon.name;
  imgDiv.appendChild(img);

  const subsectionDiv = document.createElement('div');
  subsectionDiv.classList.add('subsection');
  const h5 = document.createElement('h5');
  h5.textContent = papillon.name;
  const p = document.createElement('p');
  p.classList.add('f01');
  p.textContent = `${papillon.name_scientifique} - ${papillon.repartition}`;
  const desc = document.createElement('p');
  desc.textContent = papillon.description;

  const button = document.createElement('button');
  button.classList.add('btn', 'btn-primary', 'fiche-details');
  button.dataset.id = papillon.id;
  button.textContent = 'Fiche détails';
  button.addEventListener('click', () => afficherDetailsPapillon(papillon.id));

  subsectionDiv.appendChild(h5);
  subsectionDiv.appendChild(p);
  subsectionDiv.appendChild(desc);
  subsectionDiv.appendChild(button);

  cardDiv.appendChild(imgDiv);
  cardDiv.appendChild(subsectionDiv);

  return cardDiv;
}

// Fonction pour rediriger vers la page de détails avec l'ID du papillon dans l'URL
function afficherDetailsPapillon(id) {
//window.location.href = `fiche-details(2).html?id=${id}`;

  window.location.href = `../pages/fiche-details.html?id=${id}`;
}

// Charger les papillons lorsque le script est exécuté
document.addEventListener('DOMContentLoaded', function () {
  loadPapillons();
});


