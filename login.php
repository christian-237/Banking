<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>digital bank</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
  <div class="page login-page">
    <div class="container">
      <div class="form-outer text-center d-flex align-items-center">
        <div class="form-inner">
          <div class="logo text-uppercase"><span>digital</span><strong class="text-primary">bank</strong></div>
          <p>Bienvenue dans notre banque en ligne ! Nous sommes ravis de vous accueillir dans notre plateforme sécurisée et conviviale.</p>
          <form id="loginForm" class="text-left form-validate">
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" type="text" name="username" required data-msg="Please enter your username" class="form-control">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" type="password" name="password" required data-msg="Please enter your password" class="form-control">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group text-center">
              <button type="reset" class="btn btn-secondary">Reset</button>
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
          <a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.php" class="signup">Signup</a>
        </div>
        <div class="copyrights text-center">
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript files-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper.js/umd/popper.min.js"> </script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
  <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
  <script>
    $(document).ready(function() {
      $('#loginForm').submit(function(event) {
        // Empêcher la soumission par défaut du formulaire
        event.preventDefault();

        // Réinitialiser les messages d'erreur
        $('.invalid-feedback').text('');
        $('.form-control').removeClass('is-invalid');

        // Récupérer les valeurs des champs
        var username = $('#username').val();
        var password = $('#password').val();

        // Vérifier si les champs sont vides
        if (!username || !password) {
          // Afficher un message d'erreur pour les champs vides
          if (!username) {
            $('#username').next('.invalid-feedback').text('Veuillez remplir ce champ.');
            $('#username').addClass('is-invalid');
          }
          if (!password) {
            $('#password').next('.invalid-feedback').text('Veuillez remplir ce champ.');
            $('#password').addClass('is-invalid');
          }
          return;
        }

        // Envoyer la requête AJAX pour vérifier les identifiants
        $.ajax({
          url: 'connect.php',
          method: 'POST',
          data: { username: username, password: password },
          dataType: 'json',
          success: function(response) {
            if (!response.success) {
              // Afficher un message d'erreur pour les identifiants invalides
              $('#password').next('.invalid-feedback').text(response.message);
              $('#password').addClass('is-invalid');
              $('#username').next('.invalid-feedback').text(response.message);
              $('#username').addClass('is-invalid');
            } else {
              // Redirection après une requête AJAX réussie
              window.location.href = 'clients/index.php';
            }
          },
          error: function(xhr, status, error) {
            console.error('Erreur AJAX:', error);
          }
        });
      });
    });
  </script>
</body>
</html>
