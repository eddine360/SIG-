<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Portage de repas à domicile</title>
		<!--Stylesheet Files-->
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/foundation.min.css" />
		<link rel="stylesheet" href="css/main.css" />

		
	

</head>
<body>

	<?php
	session_start ();
	//echo($_SESSION['id']); 
	if(isset($_SESSION['type']) and $_SESSION['type'] != 1 ){
	
	   header("Location: ./../index.php");
	}
	?>

	<!--  Start Hero Section  -->
	<section class="hero">
		<header>
			<div class="row">
				<nav class="top-bar" data-topbar role="navigation">
					<!--Start Logo-->
					<ul class="title-area">
						<li class="name">
							<a href="https://www.villedebram.fr/" class="logo">
								<span class="tld"><h1>Les saveurs de Bram </h1></span>
							</a>
						</li>
					</ul>
					<!--End Logo-->
					<!--Start Navigation Menu-->
					<section class="top-bar-section" id="mean_nav">
						<ul class="right" >
							<li ><a href="#services">Nouvelle commande</a></h2>
						</li>
						<li><a href="#notre_projet">Facture</a></li>
						<li><a href="./../deco.php" > Déconnexion</a></li>
					</ul>
				</section>
				<!--End Navigation Menu-->
			</nav>
		</div>
	</header>
	<!--Start Hero Caption-->
	<section class="caption">
		<div class="row">
			<h1 class="mean_cap">Espace Abonné</h1>
			<h2 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 30px; color: #ffffff">Espace de saisi et consultation des commandes </h2>
		</div>
	</section>
</section>
<section class="services" id="services" style=padding:0px>
	<!--Actu a mettre en base de données-->
	<div class="row services_list">
		<div class="tesimonial">
			<!--  Image camion et new commande  -->
			<img src="img/tuttut2.svg" height="150px"width="250px" />
			<div class="col">
				<h1 class="mean_title">Mes commande</h1>
				<h2 class="sub_title">
					Réaliser une commande ou consulter l'historique  
					<br>
					<a href="./abonnement.php" > <button type="button"  class="btn btn-primary btn-lg "> Nouvelle commande </button> </a> 
				</h2>
				</br>
				<h1 class="mean_title">Avis</h1>
				<h2 class="sub_title">
					Je contribue à l'amélioration du service en donnant mon avis
					<br>
					<a href="./avis/avis.html" > <button type="button" style="background-color:red" >  Je donne mon avis  </button> </a> 
				</h2>
				</br>
				<h1 class="mean_title">Historique</h1>
				<h2 class="sub_title">
					Je consulte mon historique
					<br>
					<a href="./histo.php" > <button type="button" style="background-color:lightgreen" >  Je consult mon historique de commandes </button> </a> 
				</h2>
				</br>
				
				</br>
				</br>
			</div>
		</div>
	</div>
</section>
<!--  Start Testimonials Section  -->
<section class="services" id="services" style=padding:0px>
	<!--Actu a mettre en base de données-->
	<div class="row services_list">
		<div class="tesimonial">
			<!--  Image camion et new commande  -->
			<img src="img/marker.svg" height="90px"width="90px"/>
			<div class="col">
				<h1 class="mean_title">Historique de commandes</h1>
				<h2 class="sub_title">La liste de vos commandes est accessible ci-dessous :</h2>
				</br>
			</div>
		</div>
	</div>
	<table id="myTable" class = "table table-striped table-sm" align=center>
		<tr>
			<th style=width:15%>
				N° de votre commande
			</th>
			<th style=width:15%>
				Date de la commande
			</th>
			<th style=width:20%>
				Montant de la facture (€)
			</th>
		</tr>
		<?php
							include('./inclusion/connect.php');
							$idc=connect();	

							echo 'Votre numéro de bénéficiaire est '.$_SESSION['id']; 
							$sql='SELECT * FROM COMPTE JOIN BENEFICIAIRE ON COMPTE.id_connexion
								= BENEFICIAIRE.id_connexion JOIN FOYER ON
								BENEFICIAIRE.num_fo = FOYER.num_fo JOIN COMMANDE_SEMAINE ON 
								FOYER.num_fo = COMMANDE_SEMAINE.num_fo JOIN 
								FACTURE ON COMMANDE_SEMAINE.num_fact = FACTURE.num_fact 
								WHERE COMPTE.id_connexion ='.$_SESSION['id'];
							$rs=pg_exec($idc,$sql);
							while($ligne=pg_fetch_assoc($rs)){
							print('<tr><td>'.$ligne['num_commande'].' </td><td>'.$ligne['date_fact'].' </td><td>'.$ligne['montant_fact'].' </td></tr>');
							}
						?>
		</table>
		</br>
		</br>
		</br>
	</section>
	<!--  Start Footer Section  -->
	<footer>
		<div class="row">
			<div class="col" style="position:absolute ">
				<img src="img/upvd.png" height="300px"width="300px"/>
			</div>
			<div class="col" style="position:absolute margin-left:10%">
				<div class="small-12 medium-8 large-8 columns">
					<div class="contact_details right">
						<div class="contact">
							<div class="details">
								<p>
									stid@univ-perp.fr
								</p>
								<p>
									04 68 47 71 60
								</p>
								<p>
									<a href="http://iut.univ-perp.fr"> Lien Web du site de l'IUT</a>
								</p>
							</div>
							<p class="adress">
								Domaine Universitaire d'Auriac Av du Docteur Suzanne Noël11000 CARCASSONNE
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
