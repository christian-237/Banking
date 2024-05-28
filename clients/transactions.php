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
              <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#transactionModal">Effectuer une transaction</button>

              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Rechercher par date, montant, type de transaction..." id="searchInput">
                <button class="btn btn-outline-secondary" type="button" id="searchButton">Rechercher</button>
              </div>

              <table class="table table-striped" id="transactionsTable">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Montant</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Nouvelle transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="transactionForm">
                  <div class="form-group">
                    <label for="toAccount">Compte créditeur:</label>
                    <!-- <select name="mySelect" id="mySelect" class="libelles"></select> -->
                    <select required class="libelles form-control col-12" id="libelles" name="libelles" style='width: 100%;'></select>
                  </div>
                  <div class="form-group">
                    <label for="amount">Montant:</label>
                    <input type="number" class="form-control" id="amount" min="0" step="0.01">
                  </div>
                  <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" form="transactionForm" class="btn btn-primary">Effectuer la transaction</button>
              </div>
            </div>
          </div>
        </div>

        <script src="script.js"></script>

      </div>
    </div>
  </div>
</body>
<script>
// $(document).ready(function() {
//   $('#mySelect').select2({
//     placeholder: 'Sélectionnez un compte',
//     allowClear: true,
//     ajax: {
//       url: 'get_client_accounts.php',
//       dataType: 'json',
//       delay: 250,
//       data: function (params) {
//         return {
//           term: params.term
//         };
//       },
//       processResults: function (data) {
//         return {
//           results: data
//         };
//       },
//       cache: true
//     },
//     minimumInputLength: 1
//   });
// });
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
