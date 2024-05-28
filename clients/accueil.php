<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banque en Ligne</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">

</head>
<body>

<!-- Header -->
<header class="bg-primary text-white text-center py-5">
  <h1>Bienvenue à Notre Banque en Ligne</h1>
  <p>Gérez vos comptes facilement et en toute sécurité</p>
  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#ajouterModal">Créer un Compte</button>
</header>

<!-- Carrousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-50" src="img/2.png" alt="First slide">
      <div class="carousel-caption d-md-block">
        <h5>Gestion Facile</h5>
        <p>Accédez à vos comptes en quelques clics.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/3.png" alt="Second slide">
      <div class="carousel-caption d-md-block">
        <h5>Sécurité Maximale</h5>
        <p>Vos données sont protégées avec les dernières technologies.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/5.png" alt="Third slide">
      <div class="carousel-caption d-md-block">
        <h5>Services Personnalisés</h5>
        <p>Des offres adaptées à vos besoins.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
  <p>&copy; 2024 Notre Banque en Ligne. Tous droits réservés.</p>
  <p>Contactez-nous : <a href="mailto:contact@banqueenligne.com">contact@banqueenligne.com</a></p>
  <p>
    <a href="#">À propos de nous</a> |
    <a href="#">Conditions d'utilisation</a> |
    <a href="#">Politique de confidentialité</a>
  </p>
</footer>

<!-- Modal d'ajout -->
<div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ajouterModalLabel">Créer un Compte</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulaire de création de compte -->
        <form id="ajouterCompteForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
          </div>
          <div class="form-group">
            <label for="date_naissance">Date de naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" required>
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="typeCompte">Type de compte</label>
            <select class="form-control" id="typeCompte" name="typeCompte" required>
              <option value="courant">Compte courant</option>
              <option value="epargne">Compte épargne</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Créer</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
</body>
</html>
<script>
$(document).ready(function() {
    $('#ajouterCompteForm').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: 'ajouter_compte.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response);
                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: result.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#ajouterCompteForm')[0].reset();
                    window.location.href="index.php";
                    } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: result.message,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur réseau',
                    text: 'Veuillez vérifier votre connexion et réessayer',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>
