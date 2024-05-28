$(document).ready(function() {
    $('#loginForm').submit(function(event) {
      // Empêcher la soumission par défaut du formulaire
      event.preventDefault();
  
      // Réinitialiser les messages d'erreur
      $('.invalid-feedback').text('');
  
      // Récupérer les valeurs des champs
      var nom = $('#nom').val();
      var mot_de_passe = $('#mot_de_passe').val();
  
      // Vérifier si les champs sont vides
      if (!nom || !mot_de_passe) {
        // Afficher un message d'erreur pour les champs vides
        $('#nom').next('.invalid-feedback').text('Veuillez remplir tous les champs.');
        return;
      }
  
      // Envoyer la requête AJAX pour vérifier les identifiants
      $.ajax({
        url: 'cone.php',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
          if (!response.success) {
            // Afficher un message d'erreur pour les identifiants invalides
            $('#mot_de_passe').next('.invalid-feedback').text(response.message);
            $('#mot_de_passe').addClass('is-invalid');
            $('#nom').next('.invalid-feedback').text(response.message);
            $('#nom').addClass('is-invalid');
          } else {
            // Redirection après une requête AJAX réussie
            window.location.href = 'index.php';
          }
        },
        error: function(xhr, status, error) {
          console.error('Erreur AJAX:', error);
        }
      });
    });
  });