// load-content.js
// Attendre que le DOM soit complètement chargé
document.addEventListener('DOMContentLoaded', () => {
  // Faire une requête pour charger le fichier JSON de contenu
  fetch('../data/content.json')/*fetch('data/json/content.json')*/
    .then(response => response.json())
    .then(data => {
      // Appeler la fonction pour charger le contenu
      loadContent(data);
    })
    .catch(error => console.error('Error loading content:', error));
});
// Fonction pour charger le contenu du JSON dans le DOM
function loadContent(data) {
  const mainContent = document.getElementById('main-content');

  const sections = ['biologie', 'habitats', 'role'];
  // Parcourir chaque section définie dans le JSON
  sections.forEach(section => {
    const content = data[section];
    const sectionElement = document.createElement('section');
    sectionElement.classList.add('section');
    // Créer et ajouter le titre de la section
    const title = document.createElement('h3');
    title.textContent = content.title;
    // Créer et ajouter l'image de la section
    const image = document.createElement('img');
    image.src = content.image;
    image.alt = content.title;
    // Créer et ajouter le texte de la section
    const text = document.createElement('div');
    text.innerHTML = content.text;
    // Ajouter les éléments au DOM
    sectionElement.appendChild(title);
    sectionElement.appendChild(image);
    sectionElement.appendChild(text);

    mainContent.appendChild(sectionElement);
  });
}

/*scripts/load-content.js : Un script dédié pour charger et injecter le contenu du fichier JSON dans le DOM.*/

/*
Voici un aperçu de ce que fait ce script :
Il utilise la méthode fetch pour récupérer les données à partir du fichier JSON spécifié (../data/json/content.json).
Une fois les données récupérées avec succès, 
elles sont transformées en format JSON à l'aide de la méthode response.json().
Ensuite, la fonction loadContent est appelée avec les données JSON récupérées.
Dans la fonction loadContent, les données JSON sont utilisées pour 
créer des éléments HTML (titres, images, textes) correspondant à chaque section du contenu.
Ces éléments sont ensuite ajoutés au DOM à l'intérieur de l'élément avec l'ID main-content.
Assurez-vous que le chemin vers le fichier JSON est correct et que 
le fichier JSON contient les données structurées conformément aux attentes du script. 
Si le chemin vers le fichier JSON est incorrect ou si le fichier JSON est mal formaté, 
le script ne fonctionnera pas comme prévu.
*/

