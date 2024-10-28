// main.js
// Attendre que le DOM soit complètement chargé
document.addEventListener('DOMContentLoaded', () => {
  // Sélectionner le bouton héroïque
  const heroBtn = document.querySelector('.hero-btn');
  // Ajouter un événement de clic au bouton
  heroBtn.addEventListener('click', () => {
  // Faire défiler la page jusqu'à la section d'introduction
    document.getElementById('introduction').scrollIntoView({ behavior: 'smooth' });
  });
});

/* Le script principal pour les interactions et le chargement dynamique de contenu.*/
/*
conçu pour ajouter une fonctionnalité de défilement fluide lorsqu'un bouton dans la 
section héros de la page est cliqué. Voici ce que fait ce script :

Il utilise l'événement DOMContentLoaded pour s'assurer que le DOM est entièrement 
chargé avant d'attacher des écouteurs d'événements.
Une fois que le DOM est chargé, il recherche le bouton héros en utilisant document.querySelector('.hero-btn').
Ensuite, il ajoute un écouteur d'événements sur ce bouton pour détecter le clic.
Lorsque le bouton est cliqué, il utilise scrollIntoView({ behavior: 'smooth' }) 
sur l'élément avec l'ID introduction, ce qui provoque un défilement fluide jusqu'à cet élément.
Assurez-vous que l'élément avec l'ID introduction existe sur votre page HTML et que 
le bouton avec la classe hero-btn est correctement défini pour que ce script fonctionne comme prévu.

Si vous avez d'autres questions ou besoin de plus de détails, n'hésitez pas à demander !
*/