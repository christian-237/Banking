<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Banque - Dashboard</title>
<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet"> -->
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
</head>

<body class="">
	<?php include "header.php"?>
<div class="d-flex">
	<div class="col-sm-3 col-lg-2 sidebar">
		<?php include "sidebar.php"?>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main bg-light">
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-wallet fa-5x" ></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-credit-card fa-5x"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-dollar fa-5x"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">24</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<div>
		<div class="container">
			<h1>Mes comptes MyCollect</h1>

			<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
				<thead>
					<tr>
					<th>Nom du compte</th>
					<th>Solde</th>
					<th>Dernières transactions</th>
					<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td>Compte principal</td>
					<td>1000 €</td>
					<td>
						<ul>
						<li>Achat - 200 €</li>
						<li>Vente - 50 €</li>
						<li>Dépôt - 150 €</li>
						</ul>
					</td>
					<td>
						<a href="#" class="btn btn-primary btn-sm">Voir les détails</a>
						<a href="#" class="btn btn-danger btn-sm">Supprimer</a>
					</td>
					</tr>
					</tbody>
				</table>
			</div>
			</div>
		</div>
		</div>

	</div>	<!--/.main-->

</div>

</body>

</html>
