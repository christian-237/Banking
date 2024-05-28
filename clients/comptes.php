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
		<?php include "row.php"?>
		<div>
            <div class="container">
                <h1>Mes comptes</h1>

                <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped shadow">
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
