document.addEventListener('DOMContentLoaded', () => {
  const avisForm = document.getElementById('avis-form');

  avisForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(avisForm);
    const errorMessage = document.getElementById('error-message');

    fetch('../php/submit_avis.php', {//php/submit_avis.php
      method: 'POST',
      body: formData,
    })
    .then(response => response.text())
    .then(data => {
      if (data.trim() === 'success') {
        window.location.href = '../pages/thank_you_avis.html';//pages/thank_you_avis.html
      } else {
        errorMessage.innerHTML = data;
      }
    })
    .catch(error => {
      errorMessage.innerHTML = 'Une erreur est survenue lors de l\'envoi du formulaire.';
    });
  });
}); 