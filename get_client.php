<?php
include 'connexiondb.php';
$conn = connexionMysqli();

// Récupérer tous les comptes
$sql_comptes = "SELECT compte_id, numero_compte FROM comptes";
$result_comptes = $conn->query($sql_comptes);

$data = array();
if ($result_comptes->num_rows > 0) {
    while ($row = $result_comptes->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>