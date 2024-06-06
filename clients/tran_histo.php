<?php
ini_set('display_errors', 1);
ini_set('display_status_errors', 1);
error_reporting(E_ALL);
session_start();
// Inclure les fichiers nécessaires et initialiser la connexion à la base de données
include '../connexiondb.php';
$conn = connexionMysqli();
// Lire les données POST envoyées par DataTables
$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$search = $_POST['search']['value'];
$orderColumn = $_POST['order'][0]['column'];
$orderDir = $_POST['order'][0]['dir'];

// Définir les colonnes
$columns = ['transaction_id', 'compte_source_nom', 'compte_destination_nom', 'montant', 'date_transaction'];

// Construire la requête de base avec jointures
$sql = "
    SELECT SQL_CALC_FOUND_ROWS
        t.transaction_id,
        CONCAT(cs.prenom, ' ', cs.nom) AS compte_source_nom,
        CONCAT(cd.prenom, ' ', cd.nom) AS compte_destination_nom,
        t.montant,
        t.date_transaction
    FROM transactions t
    JOIN comptes csource ON t.compte_source = csource.compte_id
    JOIN clients cs ON csource.client_id = cs.client_id
    LEFT JOIN comptes cdest ON t.compte_destination = cdest.compte_id
    LEFT JOIN clients cd ON cdest.client_id = cd.client_id";

// Filtrer par recherche
if (!empty($search)) {
    $sql .= " WHERE (t.transaction_id LIKE '%$search%' OR CONCAT(cs.prenom, ' ', cs.nom) LIKE '%$search%' OR CONCAT(cd.prenom, ' ', cd.nom) LIKE '%$search%' OR t.montant LIKE '%$search%' OR t.date_transaction LIKE '%$search%')";
}

// Trier les résultats
$sql .= " ORDER BY {$columns[$orderColumn]} $orderDir";

// Pagination
$sql .= " LIMIT $length OFFSET $start";

$result = $conn->query($sql);

// Récupérer les données
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Récupérer le nombre total de lignes filtrées
$totalFilteredRecords = $conn->query("SELECT FOUND_ROWS()")->fetch_array()[0];

// Récupérer le nombre total de lignes
$totalRecords = $conn->query("SELECT COUNT(*) FROM transactions")->fetch_array()[0];

// Préparer la réponse
$response = [
    "draw" => intval($draw),
    "recordsTotal" => intval($totalRecords),
    "recordsFiltered" => intval($totalFilteredRecords),
    "data" => $data
];

// Envoyer la réponse au format JSON
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
