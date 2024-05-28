<?php
include 'connexiondb.php';
$conn = connexionMysqli();

$montant = $_POST['montant'];
$compte_id = $_POST['compte_id'];

// Mettre à jour le solde du compte
$sql_update = "UPDATE comptes SET solde = solde + ? WHERE compte_id = ?";
$stmt = $conn->prepare($sql_update);
$stmt->bind_param("di", $montant, $compte_id);

$response = array();

if ($stmt->execute()) {
    $response['success'] = true;
    $response['message'] = "Recharge réussie!";
} else {
    $response['success'] = false;
    $response['message'] = "Erreur lors de la recharge: " . $conn->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
