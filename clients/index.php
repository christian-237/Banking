<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banque - Dashboard</title>
    <script src="js/lumino.glyphs.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="">
    <?php include "header.php"?>
    <div class="d-flex">
        <div class="col-sm-3 col-lg-2 ">
            <?php include "sidebar.php"?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main bg-light">
            <br>
            <?php include "row.php"?>
            <div class="container">
                <h1>Profil utilisateur</h1>
                <div class="row">
                    <div class="col-md-6 shadow">
                        <div class="card">
                            <div class="card-header">
                                <h3>Votre compte</h3>
                            </div>
                            <div class="card-body">
                                <img src="https://placehold.co/150x150" class="img-thumbnail rounded-circle" alt="Photo de profil">
                                <p><strong>Nom:</strong> <span id="user-nom"></span></p>
                                <p><strong>Adresse e-mail:</strong> <span id="user-email"></span></p>
                                <p><strong>Téléphone:</strong> <span id="user-telephone"></span></p>
                                <p><strong>Anniversaire:</strong> <span id="user-anniversaire"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 shadow">
                        <div class="card">
                            <div class="card-header">
                                <h3>Modifier votre profil</h3>
                            </div>
                            <div class="card-body">
                                <form id="profileForm">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom:</label>
                                        <input type="text" class="form-control" id="nom" name="nom">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Adresse e-mail:</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Téléphone:</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="anniversaire" class="form-label">Anniversaire:</label>
                                        <input type="date" class="form-control" id="anniversaire" name="date_naissance">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Récupérer les informations de l'utilisateur au chargement de la page
        $.ajax({
            url: 'get_user_info.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#user-nom').text(response.user.nom);
                    $('#user-email').text(response.user.email);
                    $('#user-telephone').text(response.user.telephone);
                    $('#user-anniversaire').text(response.user.date_naissance);

                    $('#nom').val(response.user.nom);
                    $('#email').val(response.user.email);
                    $('#telephone').val(response.user.telephone);
                    $('#anniversaire').val(response.user.date_naissance);
                }
            }
        });

        // Soumettre le formulaire de mise à jour du profil
        $('#profileForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: 'update_profile.php',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert('Profil mis à jour avec succès.');
                        // Mettre à jour les informations affichées
                        $('#user-nom').text(response.user.nom);
                        $('#user-email').text(response.user.email);
                        $('#user-telephone').text(response.user.telephone);
                        $('#user-anniversaire').text(response.user.date_naissance);
                    } else {
                        alert('Erreur lors de la mise à jour du profil.');
                    }
                }
            });
        });
    });
    </script>
</body>
</html>