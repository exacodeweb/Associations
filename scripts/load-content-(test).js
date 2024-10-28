// load-content.js
document.addEventListener('DOMContentLoaded', () => {
  fetch('../data/content.json')
    .then(response => response.json())
    .then(data => {
      loadContent(data);
    })
    .catch(error => console.error('Error loading content:', error));
});

function loadContent(data) {
  const mainContent = document.getElementById('main-content');

  const sections = ['biologie', 'habitats', 'role'];

  sections.forEach(section => {
    const content = data[section];
    const sectionElement = document.createElement('section');
    sectionElement.classList.add('section');

    const title = document.createElement('h3');
    title.textContent = content.title;

    const image = document.createElement('img');
    image.src = content.image;
    image.alt = content.title;

    const text = document.createElement('div');
    text.innerHTML = content.text;

    sectionElement.appendChild(title);
    sectionElement.appendChild(image);
    sectionElement.appendChild(text);

    mainContent.appendChild(sectionElement);
  });
}