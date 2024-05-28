<?php
ini_set('display_errors', 1);
ini_set('display_status_errors', 1);
error_reporting(E_ALL);
session_start();

include '../connexiondb.php';
$conn = connexionMysqli();

if (isset($_SESSION["client_id"])) {
    $client_id = $_SESSION["client_id"];
// Récupérer les transactions du compte sélectionné
$compte_id = $_GET['compte_id'];

$sql = "SELECT 
            t.transaction_id,
            t.date_transaction,
            t.type_transaction,
            t.montant,
            t.description,
            t.etat
        FROM transactions t
        WHERE t.compte_id = ?
        ORDER BY t.date_transaction DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $compte_id);
$stmt->execute();
$result = $stmt->get_result();

// Afficher les transactions
echo "<table>";
echo "<tr><th>ID</th><th>Date</th><th>Type</th><th>Montant</th><th>Description</th><th>Etat</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["transaction_id"] . "</td>";
    echo "<td>" . $row["date_transaction"] . "</td>";
    echo "<td>" . $row["type_transaction"] . "</td>";
    echo "<td>" . $row["montant"] . "</td>";
    echo "<td>" . $row["description"] . "</td>";
    echo "<td>" . $row["etat"] . "</td>";
    echo "</tr>";
}
echo "</table>";
}

$stmt->close();
$conn->close();
?>