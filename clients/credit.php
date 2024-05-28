<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>crédit</title>
</head>

<body class="">
	<?php include "header.php"?>
<div class="d-flex">
	<div class="col-sm-3 col-lg-2 sidebar">
		<?php include "sidebar.php"?>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main bg-light">
		<br>
		<?php include "row.php"?>
		<div>
        	<h1>Demande de crédit</h1>

            <div class="container rounded shadow">
                <form id="formulaire-demande" class="row">
                    <div class="col-md-6 mb-3">
                    <label for="nom" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="prenom" class="form-label">Prénom:</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="dateNaissance" class="form-label">Date de naissance:</label>
                    <input type="date" class="form-control" id="dateNaissance" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="revenuAnnuel" class="form-label">Revenu annuel:</label>
                    <input type="number" class="form-control" id="revenuAnnuel" placeholder="Entrez votre revenu annuel" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="montantDemande" class="form-label">Montant demandé:</label>
                    <input type="number" class="form-control" id="montantDemande" placeholder="Entrez le montant souhaité" required>
                    </div>
                    <div class="col-md-12 mb-3">
                    <label for="motif" class="form-label">Motif de la demande:</label>
                    <textarea class="form-control" id="motif" rows="3" placeholder="Expliquez votre besoin de crédit" required></textarea>
                    </div>
					<div class="col-12 text-center">
						<button type="submit" class="btn btn-success">Envoyer la demande</button>
					</div>
                </form>
            </div>
		</div>

	</div>	<!--/.main-->

</div>

</body>

</html>
