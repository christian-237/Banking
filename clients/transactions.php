<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>
</head>
<body class="">
  <?php include "header.php"?>
  <div class="d-flex">
    <div class="col-sm-3 col-lg-2 sidebar">
      <?php include "sidebar.php"?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main bg-light">
      <br>
      <?php include "row.php"?><br><br>
      <div>
        <div class="container rounded shadow">
          <h1>Mes transactions</h1>

          <div class="row">
            <div class="col-md-12">
            <div class="chart-container">
                <form id="transactionForm">
                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant à transférer:</label>
                        <input type="number" class="form-control" id="montant" placeholder="Entrez le montant">
                    </div>
                    <div class="mb-3">
                        <label for="compteDestination" class="form-label">Compte destination:</label>
                        <select class="form-select" id="compteDestination">
                            <option value="" disabled selected>Sélectionnez un compte destination</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Transférer</button>
                </form>
            </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Rechercher par date, montant, type de transaction..." id="searchInput">
                <button class="btn btn-outline-secondary" type="button" id="searchButton">Rechercher</button>
              </div>

              <table id="transactionsTable" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>ID Transaction</th>
                          <th>Compte Source</th>
                          <th>Compte Destination</th>
                          <th>Montant</th>
                          <th>Date Transaction</th>
                      </tr>
                  </thead>
                  <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <script src="script.js"></script>

      </div>
    </div>
  </div>
</body>
<script>
$(document).ready(function() {
    // Remplir la liste des comptes destinataires
    function remplirListeComptesDestinataires() {
        $.ajax({
            url: "../get_client.php",
            type: "POST",
            success: function(data) {
                var accounts = JSON.parse(data);
                var compteDestination = $('#compteDestination');
                compteDestination.empty();
                compteDestination.append('<option value="" disabled selected>Sélectionnez un compte destination</option>');
                $.each(accounts, function(index, account) {
                    var option = '<option value="' + account.compte_id + '">' + account.nom + ' ' + account.prenom + '</option>';
                    compteDestination.append(option);
                });

            },
            error: function() {
                Swal.fire("Erreur", "Erreur lors du chargement des comptes.", "error");
            }
        });
    }

    // Appeler la fonction pour remplir la liste au chargement de la page
    remplirListeComptesDestinataires();

    // Gérer la soumission du formulaire de transaction
    $('#transactionForm').submit(function(event) {
        event.preventDefault();
        var montant = $('#montant').val();
        var compteDestination = $('#compteDestination').val();
        if (montant > 0 && compteDestination) {
            $.ajax({
                url: "add_transaction.php",
                type: "POST",
                data: {
                    montant: montant,
                    compteDestination: compteDestination
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        Swal.fire("Succès", data.message, "success");
                    } else {
                        Swal.fire("Erreur", data.message, "error");
                    }
                    // Réinitialiser le formulaire
                    $('#transactionForm')[0].reset();
                },
                error: function() {
                    Swal.fire("Erreur", "Erreur lors de la transaction.", "error");
                }
            });
        } else {
            Swal.fire("Erreur", "Veuillez entrer un montant valide et sélectionner un compte destination.", "error");
        }
    });
});
  </script>
      <script>
        $(document).ready(function() {
            $('#transactionsTable').DataTable({
                "serverSide": true,
                "ajax": {
                    "url": "lit_transactions.php",
                    "type": "POST"
                },
                "columns": [
                    { "data": "transaction_id" },
                    { "data": "compte_source" },
                    { "data": "compte_destination" },
                    { "data": "montant" },
                    { "data": "date_transaction" }
                ]
            });
        });
    </script>
  <script>
    $('#libelles').select2({
      dropdownParent: $('#transactionModal'),
      // Autres options select2 ici
    });

    $(document).ready(function(){
        	let urlx = "get_client_accounts.php";
	        $('.libelles').select2({
                placeholder: '--- Chercher Un Médicament ---',
                minimumInputLength: 1,
                selectOnClose: true,
                allowClear: true,
                ajax: {
                  url: urlx,
                  dataType: 'json',
                  delay: 300,
                  method: 'POST',
                  data: function (params) {
                       return {
                            search: params.term // search term
                       };
                  },
                  processResults: function(response){
                    return {
                      results: response
                    };
                  },
                  cache: true
                },
                dropdownParent: $('#select2-modal'), //pour afficher sur le modal
                error: function(response) {
                }
              });
		    });
  </script>
</html>
