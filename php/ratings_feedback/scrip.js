document.addEventListener('DOMContentLoaded', function() {

  console.log("JavaScript Loaded");

  $('.carousel').carousel({
      interval: 2000 // soit 2 seconde
  });

    // Forcer un re-rendu
    $('.carousel').carousel('cycle');

});