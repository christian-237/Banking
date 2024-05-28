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
    $sql = "SELECT nom, email, telephone, date_naissance FROM clients WHERE client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response['user'] = $row;
        $response['success'] = true;
    }
}

echo json_encode($response);
?>