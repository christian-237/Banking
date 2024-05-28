<?php
session_start();
include '../connexiondb.php';
$conn = connexionMysqli();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_SESSION["client_id"];
    $compte_credit = "3";
    $montant = "500";

    // Vérifier si les comptes existent et appartiennent bien à l'utilisateur connecté
    $sql = "SELECT * FROM comptes WHERE numero_compte = ? AND client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $compte_debit, $client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        echo "Erreur: le compte à débiter n'existe pas ou n'appartient pas à l'utilisateur connecté.";
        exit;
    }

    $stmt->bind_param("si", $compte_credit, $client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        echo "Erreur: le compte à créditer n'existe pas ou n'appartient pas à l'utilisateur connecté.";
        exit;
    }

    // Effectuer le transfert
    $sql = "UPDATE comptes SET solde = solde - ? WHERE numero_compte = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $montant, $compte_debit);
    $stmt->execute();

    $sql = "UPDATE comptes SET solde = solde + ? WHERE numero_compte = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $montant, $compte_credit);
    $stmt->execute();

    echo "Transfert effectué avec succès.";
}

$stmt->close();
$conn->close();
?>