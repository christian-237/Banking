<?php
include 'connexiondb.php';
$conn = connexionMysqli();

// Récupérer tous les comptes avec les noms de clients
$sql_comptes = "SELECT comptes.compte_id, clients.nom, clients.prenom, comptes.numero_compte 
                FROM comptes 
                JOIN clients ON comptes.client_id = clients.client_id";
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
