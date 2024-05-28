<?php
ini_set('display_errors', 1);
ini_set('display_status_errors', 1);
error_reporting(E_ALL);
// Vérifier si la requête est faite en utilisant AJAX
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // La requête est faite en utilisant AJAX

    // Récupérer les identifiants de connexion
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    $hachepassword = md5($password );
    // echo $hachepassword;
    // Connexion à la base de données
    require_once 'connexiondb.php';
    $connexion = connexionMysqli();
    // Préparer la requête SQL pour vérifier les identifiants
    $requete = $connexion->prepare("SELECT * FROM clients WHERE nom = ? AND password = ? ");
    $requete->bind_param("ss", $username, $hachepassword);
    $requete->execute();
    $resultat = $requete->get_result();
    
    // Si les identifiants sont valides, renvoyer une réponse JSON avec succès true
    if ($resultat->num_rows === 1) {
        // Récupérer la ligne de résultat
        $row = $resultat->fetch_assoc();
    
        // Récupérer l'ID de l'utilisateur
        $id = $row['client_id'];
    
        // Démarrer la session
        session_start();
    
        // Stocker les informations de session
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["client_id"] = $id;
    
        // Fermer la connexion à la base de données
        $requete->close();
        $connexion->close();
    
        // Répondre avec une réponse JSON de succès
        echo json_encode(['success' => true]);
        exit;
    }
     else {
        // Si les identifiants sont invalides, renvoyer une réponse JSON avec succès false et un message d'erreur
        echo json_encode(['success' => false, 'message' => 'Identifiants invalides']);
    }
    
    
    // Ajouter l'en-tête JSON à la réponse
    header('Content-Type: application/json');
    // Fermer la connexion à la base de données
    $requete->close();
    $connexion->close();
    exit; // Arrêter l'exécution du script après avoir renvoyé la réponse JSON
}
?>
