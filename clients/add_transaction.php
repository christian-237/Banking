<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_status_errors', 1);
error_reporting(E_ALL);
include '../connexiondb.php';
$conn = connexionMysqli();

if (!isset($_SESSION["client_id"])) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté.']);
    exit();
}

$client_id = $_SESSION["client_id"];
$montant = $_POST['montant'];
$compteDestination = $_POST['compteDestination'];

$response = array();

try {
    // Récupérer le compte source de l'utilisateur connecté
    $sql_get_source_account = "SELECT compte_id, solde FROM comptes WHERE client_id = ? AND etat = 'actif'";
    $stmt_get_source_account = $conn->prepare($sql_get_source_account);
    $stmt_get_source_account->bind_param("i", $client_id);
    $stmt_get_source_account->execute();
    $result_source_account = $stmt_get_source_account->get_result();

    if ($result_source_account->num_rows > 0) {
        $row = $result_source_account->fetch_assoc();
        $compteSource = $row['compte_id'];
        $solde = $row['solde'];

        if ($solde < $montant) {
            throw new Exception("Fonds insuffisants sur le compte source.");
        }
    } else {
        throw new Exception("Compte source introuvable ou inactif.");
    }

    // Fermer la requête pour libérer les ressources
    $stmt_get_source_account->close();

    // Commencer une transaction
    $conn->begin_transaction();

    // Débiter le compte source
    $sql_debit = "UPDATE comptes SET solde = solde - ? WHERE compte_id = ?";
    $stmt_debit = $conn->prepare($sql_debit);
    $stmt_debit->bind_param("di", $montant, $compteSource);
    if (!$stmt_debit->execute()) {
        throw new Exception("Erreur lors du débit du compte source: " . $stmt_debit->error);
    }

    // Créditer le compte destination
    $sql_credit = "UPDATE comptes SET solde = solde + ? WHERE compte_id = ?";
    $stmt_credit = $conn->prepare($sql_credit);
    $stmt_credit->bind_param("di", $montant, $compteDestination);
    if (!$stmt_credit->execute()) {
        throw new Exception("Erreur lors du crédit du compte destination: " . $stmt_credit->error);
    }

    // Tout s'est bien passé, on valide la transaction
    $conn->commit();
    $response['success'] = true;
    $response['message'] = "Transaction réussie!";
    // Insérer la transaction dans la table "transactions"
    $sql_insert_transaction = "INSERT INTO transactions (compte_source, compte_destination, montant) VALUES (?, ?, ?)";
    $stmt_insert_transaction = $conn->prepare($sql_insert_transaction);
    $stmt_insert_transaction->bind_param("iid", $compteSource, $compteDestination, $montant);
    $stmt_insert_transaction->execute();

    $stmt_insert_transaction->close();
} catch (Exception $e) {
    // En cas d'erreur, on annule la transaction
    $conn->rollback();
    $response['success'] = false;
    $response['message'] = $e->getMessage();
}

// Fermer les statements seulement s'ils ont été définis
if (isset($stmt_debit)) {
    $stmt_debit->close();
}
if (isset($stmt_credit)) {
    $stmt_credit->close();
}

$conn->close();

echo json_encode($response);
?>
