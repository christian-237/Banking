<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Banque - Dashboard</title>
<script src="js/lumino.glyphs.js"></script>
</head>
<body class="">
	<?php include "header.php"?>
<div class="d-flex">
	<div class="col-sm-3 col-lg-2 ">
		<?php include "sidebar.php"?>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main bg-light">
		<br>
		<?php include "row.php"?>
		<br>

		<div class="container col-sm-8">
			<div class="card ">
				<div class="card-header">
					<h2>paiement de factures</h2>
				</div>
				<div class="card-body">
					<form>
						<div class="form-group">
							<label for="nom">Nom du bénéficiaire</label>
							<input type="text" class="form-control" id="nom" placeholder="Nom du bénéficiaire">
						</div>
						<div class="form-group">
							<label for="montant">Montant à payer</label>
							<input type="number" class="form-control" id="montant" placeholder="Montant à payer">
						</div>
						<div class="form-group">
							<label for="reference">Référence de la facture</label>
							<input type="text" class="form-control" id="reference" placeholder="Référence de la facture">
						</div>
						<div class="form-group">
							<label for="date">Date d'échéance</label>
							<input type="date" class="form-control" id="date" placeholder="Date d'échéance">
						</div>
						<div class="form-group">
							<label for="mode">Mode de paiement</label>
							<select class="form-control" id="mode">
								<option>Carte de crédit</option>
								<option>Compte bancaire</option>
								<option>Portefeuille électronique</option>
							</select>
						</div>
						<div class="col-12 text-center">
							<button type="submit" class="btn btn-success">Payer</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>	<!--/.main-->

</div>

</body>

</html>
