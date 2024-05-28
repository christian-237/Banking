<?php
include 'connexiondb.php';
$conn = connexionMysqli();

// Récupérer tous les comptes et les clients
$sql_comptes = "SELECT compte_id, numero_compte, client_id FROM comptes";
$result_comptes = $conn->query($sql_comptes);

$sql_clients = "SELECT client_id, nom, prenom FROM clients";
$result_clients = $conn->query($sql_clients);

$data = array(
    "comptes" => array(),
    "clients" => array()
);

while ($row = $result_comptes->fetch_assoc()) {
    $data["comptes"][] = $row;
}

while ($row = $result_clients->fetch_assoc()) {
    $data["clients"][] = $row;
}
echo json_encode($data);

$conn->close();
?>