$(document).ready(function() {
  $('#contact-form').on('submit', function(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire traditionnel

    var formData = $(this).serialize(); // Sérialise les données du formulaire
    var errorMessage = '';

    // Validation côté client
    if ($('#name').val().trim() === '') {
      errorMessage += 'Le nom est requis.<br>';
    }
    if ($('#email').val().trim() === '') {
      errorMessage += 'L\'email est requis.<br>';
    }
    if ($('#message').val().trim() === '') {
      errorMessage += 'Le message est requis.<br>';
    }
    if (errorMessage) {
      $('#error-message').html(errorMessage);
      return;
    }

    // Envoi du formulaire via AJAX
    $.ajax({
      type: 'POST',
      url: '../php/submit_avis.php',
      data: formData,
      success: function(response) {
        if (response.trim() === 'success') {
          window.location.href = '../pages/thank_you.html';/*test_thank_you.html*/
        } else {
          $('#error-message').html(response);
        }
      },
      error: function() {
        $('#error-message').html('Une erreur est survenue lors de l\'envoi du formulaire.');
      }
    });
  });
});
