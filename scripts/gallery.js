
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






// Exécuter le code une fois que le DOM est entièrement chargé
document.addEventListener('DOMContentLoaded', function () {
  // Sélectionner l'élément qui contiendra la galerie
  const galleryContainer = document.getElementById('gallery-container');

  // Fonction pour charger les données des papillons depuis un fichier JSON
  function loadPapillons() {
    fetch('../data/papillons.json') // Effectuer une requête pour obtenir le fichier JSON
      .then(response => response.json()) // Convertir la réponse en format JSON
      .then(data => {
        // Pour chaque papillon dans les données, créer une carte et l'ajouter à la galerie
        data.forEach(papillon => {
          const papillonCard = createPapillonCard(papillon);
          galleryContainer.appendChild(papillonCard);
        });
      })
      .catch(error => console.error('Erreur lors du chargement des papillons:', error)); // Gérer les erreurs
  }

  // Fonction pour créer une carte de papillon à partir des données
  function createPapillonCard(papillon) {
    const cardDiv = document.createElement('div');
    cardDiv.classList.add('card', 'section-2');

    const imgDiv = document.createElement('div');
    imgDiv.classList.add('card-img-top2');
    const img = document.createElement('img');
    img.src = `../assets/images3/${papillon.image}`; // Définir la source de l'image
    img.alt = papillon.name; // Définir le texte alternatif de l'image
    imgDiv.appendChild(img);

    const subsectionDiv = document.createElement('div');
    subsectionDiv.classList.add('subsection');
    const h5 = document.createElement('h5');
    h5.textContent = papillon.name; // Ajouter le nom du papillon
    const p = document.createElement('p');
    p.classList.add('f01');
    p.textContent = papillon.description; // Ajouter une description du papillon

    const button = document.createElement('button');
    button.classList.add('btn', 'btn-primary', 'fiche-detail(2)');
    button.dataset.id = papillon.id; // Définir un attribut de données pour l'identifiant du papillon
    button.textContent = 'Fiche détail';
    button.addEventListener('click', () => afficherDetailsPapillon(papillon.id)); // Ajouter un écouteur d'événement pour afficher les détails du papillon

    subsectionDiv.appendChild(h5);
    subsectionDiv.appendChild(p);
    subsectionDiv.appendChild(button);

    cardDiv.appendChild(imgDiv);
    cardDiv.appendChild(subsectionDiv);

    return cardDiv; // Retourner l'élément de la carte
  }

  // Fonction pour afficher les détails d'un papillon (rediriger vers une page de détails)
  function afficherDetailsPapillon(id) {
    window.location.href = `fiche-details.html?id=${id}`; // Rediriger vers la page de détails avec l'identifiant du papillon en paramètre d'URL
  }

  // Charger les papillons lorsque le script est exécuté
  loadPapillons();
});
