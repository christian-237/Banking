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
							<i class="fa fa-wallet fa-5x text-success" ></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">solde</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-credit-card fa-5x text-success"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">comptes</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-dollar fa-5x text-success"></i>
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
							<svg class="glyph stroked app-window-with-content text-success"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">crédit</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<div>
		    <div class="d-flex">
                <div class="col-md-6">
                    <h2>Catégories</h2>
                    <ul class="list-group">
                    <li class="list-group-item"><a href="#" onclick="afficherArticles('comptes')">Comptes</a></li>
                    <li class="list-group-item"><a href="#" onclick="afficherArticles('cartes')">Cartes</a></li>
                    <li class="list-group-item"><a href="#" onclick="afficherArticles('virements')">Virements</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h2>Articles</h2>
                    <div id="articles">
                    </div>
                </div>
            </div>
            <h1>Messagerie sécurisée</h1>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="message" class="form-label">Nouveau message:</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Entrez votre message ici"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn-primary" onclick="envoyerMessage()">Envoyer</button>
                    </div>
                </div>

                <div id="messages-banque" class="row mt-3">
                    </div>
                </div>
            </div>

	</div>	<!--/.main-->

</div>

</body>

</html>
<script>
    // Exemple de données d'articles (remplacez par vos données réelles)
const articles = {
  comptes: [
    { titre: "Ouvrir un compte", contenu: "Lorem ipsum..." },
    { titre: "Consulter mon solde", contenu: "Lorem ipsum..." },
    // ...
  ],
  cartes: [
    { titre: "Activer ma carte", contenu: "Lorem ipsum..." },
    { titre: "Signaler une carte perdue", contenu: "Lorem ipsum..." },
    // ...
  ],
  virements: [
    { titre: "Effectuer un virement", contenu: "Lorem ipsum..." },
    { titre: "Planifier un virement", contenu: "Lorem ipsum..." },
    // ...
  ],
  // Ajoutez d'autres catégories et articles ici
};

// Fonction pour afficher les articles d'une catégorie
function afficherArticles(categorie) {
  const articlesElement = document.getElementById('articles');
  articlesElement.innerHTML = ''; // Vider le contenu existant

  articles[categorie].forEach(article => {
    const articleElement = document.createElement('div');
    articleElement.classList.add('card', 'mb-3');
    articleElement.innerHTML = `
      <div class="card-header">${article.titre}</div>
      <div class="card-body">
        <p>${article.contenu}</p>
      </div>
    `;
    articlesElement.appendChild(articleElement);
  });
}

// Afficher les articles de la première catégorie par défaut
afficherArticles('comptes');

</script>
