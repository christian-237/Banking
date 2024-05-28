<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php include "sidebar.php"?>
    <!-- Side Navbar -->
    <div class="page">
      <!-- navbar-->
      <?php include "header.php"?>
      <!-- navbar fin-->
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Charts</li>
          </ul>
        </div>
      </div>
      <section class="Bank">
        <div class="container-fluid">
          <!-- Page Header-->
          <div class="row">
            <div class="col-lg-12">
              <div class="card radar-Bank-example">
                <div class="card-header d-flex align-items-center">
                  <h4>Radar Bank Example</h4>
                </div>
                <div class="card-body">
                  <div class="container">
                    <h2>gestion des utilisateurs</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Ajouter Utilisateur</button>
                    <table class="table mt-4">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>John Doe</td>
                          <td>johndoe@example.com</td>
                          <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modifierModal">Modifier</button>
                            <button class="btn btn-danger btn-sm" onclick="supprimerUtilisateur()">Supprimer</button>
                          </td>
                        </tr>
                        <!-- Autres utilisateurs -->
                      </tbody>
                    </table>
                  </div>

                  <!-- Modal d'ajout -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Ajouter Agent</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- Ajoutez ici votre formulaire -->
                          <form action="" method="POST">
                            <div class="form-group">
                              <label for="nom">Nom</label>
                              <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="form-group">
                              <label for="prenom">Prénom</label>
                              <input type="text" class="form-control" id="prenom" name="prenom" required>
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                              <label for="dateNaissance">Date de naissance</label>
                              <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" required>
                            </div>
                            <div class="form-group">
                              <label for="tel">Téléphone</label>
                              <input type="number" class="form-control" id="tel" name="tel" min="0" required>
                            </div>
                            <!-- Ajoutez d'autres champs de formulaire selon vos besoins -->
                            <button type="submit" class="btn btn-primary" onclick="ajouterUtilisateur()">Ajouter</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal de modification -->
                  <div class="modal fade" id="modifierModal" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modifierModalLabel">Modifier un utilisateur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- Formulaire de modification d'utilisateur -->
                          <form action="" method="POST">
                            <div class="form-group">
                              <label for="nom">Nom</label>
                              <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <!-- Ajoutez d'autres champs de formulaire selon vos besoins -->
                            <button type="submit" class="btn btn-primary" onclick="modifierUtilisateur()">Enregistrer</button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- footer -->
      <?php include "footer.php"?>
    </div>

    <script>
      function supprimerUtilisateur() {
        Swal.fire({
          title: 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Supprimer',
          cancelButtonText: 'Annuler'
        }).then((result) => {
          if (result.isConfirmed) {
            // Logique de suppression de l'utilisateur
            Swal.fire(
              'Utilisateur supprimé !',
              'L\'utilisateur a été supprimé avec succès.',
              'success'
            );
          }
        });
      }

      function modifierUtilisateur() {
        // Logique de modification de l'utilisateur

        // Afficher le SweetAlert2 après la modification réussie
        Swal.fire({
          icon: 'success',
          title: 'Utilisateur modifié',
          text: 'L\'utilisateur a été modifié avec succès !'
        });
      }

      function ajouterUtilisateur() {
        // Logique d'ajout d'un nouvel utilisateur

        // Afficher le SweetAlert2 après l'ajout réussi
        Swal.fire({
          icon: 'success',
          title: 'Utilisateur ajouté',
          text: 'Un nouvel utilisateur a été ajouté avec succès !'
        });
      }
    </script>
  </body>
</html>