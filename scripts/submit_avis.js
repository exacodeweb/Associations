// scripts/avis.js
document.addEventListener('DOMContentLoaded', function() {
  const stars = document.querySelectorAll('#rating .star');
  const noteInput = document.getElementById('note');

  stars.forEach(star => {
      star.addEventListener('click', () => {
          const rating = star.getAttribute('data-value');
          noteInput.value = rating;
          stars.forEach(s => s.innerHTML = '&#9734;'); // Reset stars
          for (let i = 0; i < rating; i++) {
              stars[i].innerHTML = '&#9733;'; // Fill stars
          }
      });
  });
});