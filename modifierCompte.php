<?php
ini_set('display_errors', 1);
ini_set('display_status_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
include 'connexiondb.php';
$conn = connexionMysqli();

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['date_naissance'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$imageclient = $_FILES['imageclient']['name'];
$mot_de_passe = $_POST['mot_de_passe'];
$typeCompte = $_POST['typeCompte'];

// Effectuer les opérations de modification du compte dans la base de données
$sql = "UPDATE comptes SET nom=?, prenom=?, date_naissance=?, email=?, telephone=?, imageclient=?, mot_de_passe=?, typeCompte=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssi", $nom, $prenom, $date_naissance, $email, $telephone, $imageclient, $mot_de_passe, $typeCompte, $id);

$id = $_POST['id']; // Remplacez 'id' par le nom de votre champ d'identifiant de compte dans le formulaire

if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Le compte a été modifié avec succès.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Une erreur s\'est produite lors de la modification du compte : ' . $conn->error;
}

// Répondre avec un message de succès ou d'erreur
header('Content-Type: application/json');
echo json_encode($response);

// Fermer la connexion à la base de données
$stmt->close();
$conn->close();
?>