<?php
ini_set('display_errors', 1);
ini_set('display_status_errors', 1);
error_reporting(E_ALL);

try {
    include 'connexiondb.php';
    $conn = connexionMysqli();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $typeCompte = $_POST['typeCompte'];
    
    // Hachage sécurisé du mot de passe
    $hashedPassword = md5($password);

    if (empty($nom) || empty($prenom) || empty($date_naissance) || empty($email) || empty($telephone) || empty($hashedPassword) || empty($typeCompte)) {
        echo json_encode([
            'success' => false,
            'message' => 'Tous les champs sont obligatoires.'
        ]);
        exit();
    }

    $sqlCheckEmail = "SELECT email FROM clients WHERE email = ?";
    $stmtCheckEmail = $conn->prepare($sqlCheckEmail);
    $stmtCheckEmail->bind_param("s", $email);
    $stmtCheckEmail->execute();
    $stmtCheckEmail->store_result();

    if ($stmtCheckEmail->num_rows > 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Cet email est déjà utilisé.'
        ]);
        $stmtCheckEmail->close();
        exit();
    }
    $stmtCheckEmail->close();

    $sqlInsertClient = "INSERT INTO clients (nom, prenom, date_naissance, email, telephone, password, etat)
                        VALUES (?, ?, ?, ?, ?, ?, 'actif')";
    $stmtInsertClient = $conn->prepare($sqlInsertClient);
    if ($stmtInsertClient === false) {
        throw new Exception('Erreur lors de la préparation de la requête client: ' . $conn->error);
    }
    $stmtInsertClient->bind_param("ssssss", $nom, $prenom, $date_naissance, $email, $telephone, $hashedPassword);
    $stmtInsertClient->execute();

    if ($stmtInsertClient->error) {
        throw new Exception('Erreur lors de l\'insertion du client: ' . $stmtInsertClient->error);
    }

    $client_id = $stmtInsertClient->insert_id;
    $stmtInsertClient->close();

    $numero_compte = "C" . $client_id;
    $solde_initial = 0.00;
    $etat_compte = "actif";
    $sqlInsertCompte = "INSERT INTO comptes (client_id, numero_compte, type_compte, solde, etat)
                        VALUES (?, ?, ?, ?, ?)";
    $stmtInsertCompte = $conn->prepare($sqlInsertCompte);
    if ($stmtInsertCompte === false) {
        throw new Exception('Erreur lors de la préparation de la requête compte: ' . $conn->error);
    }
    $stmtInsertCompte->bind_param("issds", $client_id, $numero_compte, $typeCompte, $solde_initial, $etat_compte);
    $stmtInsertCompte->execute();

    if ($stmtInsertCompte->error) {
        throw new Exception('Erreur lors de l\'insertion du compte: ' . $stmtInsertCompte->error);
    }

    $stmtInsertCompte->close();
    $conn->close();

    echo json_encode([
        'success' => true,
        'message' => 'Compte ajouté avec succès.'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
