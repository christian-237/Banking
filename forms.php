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
            <li class="breadcrumb-item active">Charts       </li>
          </ul>
        </div>
      </div>
      <section class="charts">
        <div class="container-fluid">
          <!-- Page Header-->
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card radar-chart-example">
                <div class="card-header d-flex align-items-center">
                  <h4>Page de gestion des comptes bancaires</h4>
                </div>
                <div class="card-body">
                  <div class="container">
                    <!--  -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterModal">Ajouter Compte</button>
                    <table class="table mt-4"> 
                      <thead> 
                        <tr> 
                          <th>Nom du compte</th> 
                          <th>Numéro de compte</th> 
                          <th>Solde</th> 
                          <th>Actions</th> 
                        </tr> 
                      </thead> 
                      <tbody> 
                        <tr> 
                          <td>Compte courant</td> 
                          <td>1234567890</td> 
                          <td>$1000</td> 
                          <td> 
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modifierModal">Modifier</button> 
                            <button class="btn btn-danger btn-sm" onclick="supprimerCompte()">Supprimer</button> 
                          </td> 
                        </tr> 
                        <!-- Autres comptes --> 
                      </tbody> 
                    </table>
                    <!-- Modal d'ajout -->
                    <div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="ajouterModalLabel">Ajouter Compte</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- Formulaire d'ajout de compte -->
                            <form action="" method="POST">
                              <div class="form-group">
                                <label for="nomCompte">Nom du compte</label>
                                <input type="text" class="form-control" id="nomCompte" name="nomCompte" required>
                              </div>
                              <div class="form-group">
                                <label for="numeroCompte">Numéro de compte</label>
                                <input type="text" class="form-control" id="numeroCompte" name="numeroCompte" required>
                              </div>
                              <div class="form-group">
                                <label for="solde">Solde</label>
                                <input type="text" class="form-control" id="solde" name="solde" required>
                              </div>
                              <!-- Ajoutez d'autres champs de formulaire selon vos besoins -->
                              <button type="submit" class="btn btn-primary" onclick="ajouterCompte()">Ajouter</button>
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
                            <h5 class="modal-title" id="modifierModalLabel">Modifier un compte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div classclass="modal-body">
                            <!-- Formulaire de modification de compte -->
                            <form action="" method="POST">
                              <div class="form-group">
                                <label for="nomCompte">Nom du compte</label>
                                <input type="text" class="form-control" id="nomCompte" name="nomCompte" required>
                              </div>
                              <div class="form-group">
                                <label for="numeroCompte">Numéro de compte</label>
                                <input type="text" class="form-control" id="numeroCompte" name="numeroCompte" required>
                              </div>
                              <div class="form-group">
                                <label for="solde">Solde</label>
                                <input type="text" class="form-control" id="solde" name="solde" required>
                              </div>
                              <!-- Ajoutez d'autres champs de formulaire selon vos besoins -->
                              <button type="submit" class="btn btn-primary" onclick="modifierCompte()">Modifier</button>
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
      </section>
      <!-- footer -->
      <?php include "footer.php"?>
    </div>
  </body>
</html>


<script>
  // Fonction pour ajouter un compte
  function ajouterCompte() {
    // Afficher une alerte de succès
    Swal.fire({
      icon: 'success',
      title: 'Compte ajouté avec succès',
      showConfirmButton: false,
      timer: 1500
    });
  }

  // Fonction pour modifier un compte
  function modifierCompte() {
    // Afficher une alerte de succès
    Swal.fire({
      icon: 'success',
      title: 'Compte modifié avec succès',
      showConfirmButton: false,
      timer: 1500
    });
  }

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