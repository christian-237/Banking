<?php
ini_set('display_errors', 1);
ini_set('display_status_errors', 1);
error_reporting(E_ALL);
session_start();

include '../connexiondb.php';
$conn = connexionMysqli();

$response = ['success' => false];

if (isset($_SESSION["client_id"])) {
    $client_id = $_SESSION["client_id"];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date_naissance = $_POST['date_naissance'];

    $sql = "UPDATE clients SET nom = ?, email = ?, telephone = ?, date_naissance = ? WHERE client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nom, $email, $telephone, $date_naissance, $client_id);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['user'] = [
            'nom' => $nom,
            'email' => $email,
            'telephone' => $telephone,
            'date_naissance' => $date_naissance
        ];
    } else {
        $response['error'] = $stmt->error;
    }
}

echo json_encode($response);
?>