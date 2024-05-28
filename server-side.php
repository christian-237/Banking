<?php
// Connexion à la base de données
include 'connexiondb.php';
$conn = connexionMysqli();

// Requête SQL pour récupérer les données des clients et des comptes
$sql = "SELECT c.nom, co.numero_compte, co.type_compte, co.solde
        FROM clients c
        INNER JOIN comptes co ON c.client_id = co.client_id";
$result = $conn->query($sql);

// Vérification des erreurs de la requête
if ($result === false) {
    die('Erreur SQL : ' . $conn->error);
}

// Tableau de données pour la réponse JSON
$data = array();

// Parcours des résultats de la requête
while ($row = $result->fetch_assoc()) {
  $actions = '<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modifierModal">Modifier</button> 
              <button class="btn btn-danger btn-sm" onclick="supprimerCompte()">Supprimer</button>';

  $data[] = array(
    'nom' => $row['nom'],
    'numero_compte' => $row['numero_compte'],
    'type_compte' => $row['type_compte'],
    'solde' => $row['solde'],
    'actions' => $actions
  );
}

// Fermeture de la connexion
$conn->close();

// Réponse JSON avec les données des clients et des comptes
echo json_encode(array('data' => $data));
?>
