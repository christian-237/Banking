$(document).ready(function() {
  // Chargement des comptes dans les listes déroulantes
  loadAccounts();

  // Soumission du formulaire de transaction
  $('#transactionForm').submit(function(e) {
    e.preventDefault();
    performTransaction();
  });

  // Recherche de transactions
  $('#searchButton').click(function() {
    searchTransactions();
  });
});

function loadAccounts() {
  // Récupération des comptes depuis le serveur (à implémenter)
  // Remplissage des listes déroulantes
  $('#fromAccount').html('<option value="">Choisissez un compte</option>');
  $('#toAccount').html('<option value="">Choisissez un compte</option>');
}

function performTransaction() {
  // Récupération des données du formulaire
  var fromAccount = $('#fromAccount').val();
  var toAccount = $('#toAccount').val();
  var amount = $('#amount').val();
  var description = $('#description').val();

  // Envoi de la transaction au serveur (à implémenter)
  $.ajax({
    url: 'process_transaction.php',
    type: 'POST',
    data: {
      fromAccount: fromAccount,
      toAccount: toAccount,
      amount: amount,
      description: description
    },
    success: function(response) {
      // Traitement de la réponse du serveur
      console.log(response);
      // Fermer la modal, rafraîchir la liste des transactions, etc.
    },
    error: function(xhr, status, error) {
      // Gestion des erreurs
      console.error(error);
    }
  });
}

function searchTransactions() {
  var searchTerm = $('#searchInput').val();

  // Récupération des transactions depuis le serveur (à implémenter)
  $.ajax({
    url: 'get_transactions.php',
    type: 'GET',
    data: {
      search: searchTerm
    },
    success: function(response) {
      // Mise à jour du tableau des transactions
      updateTransactionTable(response);
    },
    error: function(xhr, status, error) {
      // Gestion des erreurs
      console.error(error);
    }
  });
}

function updateTransactionTable(transactions) {
  var tableBody = $('#transactionsTable tbody');
  tableBody.empty();

  $.each(transactions, function(index, transaction) {
    var row = $('<tr>');
    row.append($('<td>').text(transaction.date_transaction));
    row.append($('<td>').text(transaction.description));
    row.append($('<td>').text(transaction.montant));
    row.append($('<td>').text(transaction.type_transaction));
    tableBody.append(row);
  });
}