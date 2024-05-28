<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard admin</title>
  </head>
  <body>
    <!-- Side Navbar -->
      <?php include "sidebar.php"?>
    <!-- Side Navbar -->
    <div class="page">
      <!-- navbar-->
      <?php include "header.php"?>
      <!-- navbar fin-->
      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
              <div class="panel panel-blue panel-widget ">
                <div class="row no-padding">
                  <div class="col-sm-3 col-lg-5 widget-left">
                    <i class="fa fa-wallet fa-5x" ></i>
                  </div>
                  <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large">120</div>
                    <div class="text-muted">solde</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
              <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                  <div class="col-sm-3 col-lg-5 widget-left">
                    <i class="fa fa-credit-card fa-5x"></i>
                  </div>
                  <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large">237</div>
                    <div class="text-muted">comptes</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
              <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                  <div class="col-sm-3 col-lg-5 widget-left">
                    <i class="fa fa-dollar fa-5x"></i>
                  </div>
                  <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large">24</div>
                    <div class="text-muted">New Users</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
              <div class="panel panel-red panel-widget">
                <div class="row no-padding">
                  <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                  </div>
                  <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large">25.2k</div>
                    <div class="text-muted">Page Views</div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--/.row-->
        </div>
      </section>
      <!-- Header Section-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card radar-chart-example">
              <div class="card-header d-flex align-items-center">
                <h4>recharger comptes</h4>
              </div>
              <div class="card-body">
                <div class="chart-container">
                    <form id="rechargeForm">
                      <div class="mb-3">
                          <label for="montant" class="form-label">Montant à recharger:</label>
                          <input type="number" class="form-control" id="montant" placeholder="Entrez le montant">
                      </div>
                      <div class="mb-3">
                          <label for="moyenPaiement" class="form-label">Moyen de paiement:</label>
                          <select class="form-select" id="moyenPaiement">
                            <option value="" disabled selected>Sélectionnez un compte</option>
                          </select>
                      </div>
                      <button type="submit" class="btn btn-success">Recharger</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card radar-chart-example">
              <div class="card-header d-flex align-items-center">
                <h4>gestion des comptes bancaires</h4>
              </div>
              <div class="card-body">
                <div class="container">
                  <!--  -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterModal">Ajouter Compte</button>
                  <table id="dataTable" class="table mt-4">
                    <thead>
                      <tr>
                        <th>Nom client</th>
                        <th>Numéro de compte</th>
                        <th>Type de compte</th>
                        <th>Solde</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                  <!-- Modal d'ajout -->
                  <div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="ajouterModalLabel">Ajouter un Compte</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- Formulaire d'ajout de compte -->
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
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal de modification -->
                  <div class="modal fade" id="modifierModal" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="modifierModalLabel">Modifier Compte</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body">
                            <!-- Formulaire de modification de compte -->
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
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer -->
      <?php include "footer.php"?>
    </div>
  </body>
</html>
<script>
$(document).ready(function() {
    // Remplir la liste des comptes
    $.ajax({
        url: "get_client.php",
        type: "POST",
        success: function(data) {
            var accounts = JSON.parse(data);
            var select = $('#moyenPaiement');
            select.empty();
            select.append('<option value="" disabled selected>Sélectionnez un compte</option>');
            $.each(accounts, function(index, account) {
                select.append('<option value="' + account.compte_id + '">' + account.nom + ' ' + account.prenom + '</option>');
            });
        },
        error: function() {
            Swal.fire("Erreur", "Erreur lors du chargement des comptes.", "error");
        }
    });

    // Gérer la soumission du formulaire
    $('#rechargeForm').submit(function(event) {
        event.preventDefault();
        var montant = $('#montant').val();
        var compte_id = $('#moyenPaiement').val();
        if (montant > 0 && compte_id) {
            $.ajax({
                url: "recharge.php",
                type: "POST",
                data: {
                    montant: montant,
                    compte_id: compte_id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        Swal.fire("Succès", data.message, "success");
                    } else {
                        Swal.fire("Erreur", data.message, "error");
                    }
                    // Réinitialiser le formulaire
                    $('#rechargeForm')[0].reset();
                },
                error: function() {
                    Swal.fire("Erreur", "Erreur lors de la recharge.", "error");
                }
            });
        } else {
            Swal.fire("Erreur", "Veuillez entrer un montant valide et sélectionner un compte.", "error");
        }
    });
});

</script>


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
<script>
$(document).ready(function() {
  $('#dataTable').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
      "url": "server-side.php", // Le fichier PHP qui renvoie les données du serveur
      "type": "POST"
    },
    "columns": [
      { "data": "nom" },
      { "data": "numero_compte" },
      { "data": "type_compte" },
      { "data": "solde" },
      { "data": "actions" }
    ]
  });
});

  // Fonction pour modifier un compte

$(document).ready(function() {
  // Soumettre le formulaire de modification avec Ajax
  $('#modifierForm').submit(function(e) {
    e.preventDefault(); // Empêcher le rechargement de la page

    // Récupérer les données du formulaire
    var formData = new FormData(this);

    // Envoyer la requête Ajax
    $.ajax({
      url: 'modifierCompte.php', // Le fichier PHP qui traite la modification du compte
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        // Traiter la réponse du serveur
        console.log(response); // Afficher la réponse dans la console
        // Actualiser le tableau DataTable avec les nouvelles données
        Swal.fire({
          icon: 'success',
          title: 'Compte modifié avec succès',
          showConfirmButton: false,
          timer: 1500
        });
        // Fermer le modal de modification
        $('#modifierModal').modal('hide');
      },
      error: function(xhr, status, error) {
        // Gérer les erreurs
        console.log(xhr.responseText); // Afficher les détails de l'erreur dans la console
      }
    });
  });
});

  // Fonction pour supprimer un compte
  function supprimerCompte() {
    // Afficher une alerte de confirmation
    Swal.fire({
      icon: 'warning',
      title: 'Êtes-vous sûr de vouloir supprimer ce compte ?',
      showCancelButton: true,
      confirmButtonText: 'Oui',
      cancelButtonText: 'Non'
    }).then((result) => {
      if (result.isConfirmed) {
        // Afficher une alerte de succès
        Swal.fire({
          icon: 'success',
          title: 'Compte supprimé avec succès',
          showConfirmButton: false,
          timer: 1500
        });
      }
    });
  }
</script>