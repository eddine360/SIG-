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
		<style>
			*
			{
				box-sizing: border-box;
			}

			body
			{
				font-family: Roboto, Helvetica, sans-serif;
			}

			/* Fixez le bouton sur le côté gauche de la page the button on the left side of the page */
			.open-btn
			{
				display: flex;
				justify-content: left;
			}

			/* Stylez et fixez le bouton sur la page */
			.open-button
			{
				background-color: #1c87c9;
				color: white;
				padding: 12px 20px;
				border: none;
				border-radius: 5px;
				cursor: pointer;
				opacity: 0.8;
				position: fixed;
			}

			/* Positionnez la forme Popup */
			.login-popup
			{
				position: relative;
				text-align: center;
				width: 100%;
			}

			/* Masquez la forme Popup */
			.form-popup
			{
				display: none;
				position: fixed;
				left: 45%;
				top:5%;
				transform: translate(-45%,5%);
				border: 2px solid #666;
				z-index: 9;
			}

			/* Styles pour le conteneur de la forme */
			.form-container
			{
				max-width: 300px;
				padding: 20px;
				background-color:rgba(255, 255, 255, .8);
			}

			/* Largeur complète pour les champs de saisie */
			.form-container input[type=text], .form-container input[type=password]
			{
				width: 100%;
				padding: 10px;
				margin: 5px 0 22px 0;
				border: none;
				background: #eee;
				background-color:rgba(255, 255, 255, .9);
			}

			/* Quand les entrées sont concentrées, faites quelque chose */
			.form-container input[type=text]:focus, .form-container input[type=password]:focus
			{
				background-color: #ddd;
				outline: none;
			}

			/* Stylez le bouton de connexion */
			.form-container .btn
			{
				background-color: #8ebf42;
				color: #fff;
				padding: 12px 20px;
				border: none;
				cursor: pointer;
				width: 100%;
				margin-bottom:10px;
			}

			/* Stylez le bouton d'inscrciption */
			.form-container .btn_i
			{
				background-color: #2ebf80;
				color: #fff;
				padding: 12px 20px;
				border: none;
				cursor: pointer;
				width: 100%;
				margin-bottom:10px;
				opacity: 0.8;
			}

			/* Stylez le bouton pour annuler */
			.form-container .cancel
			{
				background-color: #cc0000;
			}

			/* Planez les effets pour les boutons */
			.form-container .btn:hover, .open-button:hover
			{
				opacity: 1;
			}
		</style>
	
	</body>

</head>
<body>
	<!--  Start Hero Section  -->
	<section class="hero">
		<header>
			<div class="row">
				<nav class="top-bar" data-topbar role="navigation">
					<!--Start Logo-->
					<ul class="title-area">
						<li class="name">
							<a href="https://www.villedebram.fr/" class="logo">
								<span class="tld"><h1>COMMUNE DE BRAM </h1></span>
							</a>
						</li>
					</ul>
				<!--End Logo-->
				<!--Start Navigation Menu-->
				<section class="top-bar-section" id="mean_nav">
					<ul class="right">
						<li><a href="#services">Actualités</a></li>
						<li><a href="#notre_projet">Notre projet</a></li>
						<li><a  href="#montab1"  onclick="openForm()">Connexion</a></li>
					</ul>
				</section>
				<!--End Navigation Menu-->
			</nav>
		</div>
	</header>
	<!--Start Hero Caption-->
	<section class="caption">
		<div class="row">
			<h1 class="mean_cap" >Les saveurs de Bram</h1>
			<h2 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 30px; color: #ffffff;">Votre service de livraison de repas à domicile pour personnes âgées</h2>
		</div>
	</section>
</section>
<!-- Connexion espace  -->
<div class="login-popup">
	<div class="form-popup" id="popupForm" >
		<form  method="post" action="incription.connexion/connexion/verif_infos_connexion.php" class="form-container">
			<h2>Veuillez vous connecter</h2>
			<label for="email"><strong>E-mail</strong></label>
			<input type="text" name="zs_id" placeholder="Votre Email">
			<label  for="psw"><strong>Mot de passe</strong></label>
			<input name="zs_mdp" type="password" id="psw" placeholder="Votre Mot de passe" name="psw" required>
			<button  type="submit" class="btn">Connecter</button>
			<button class="btn_i" onclick=window.location.href='incription.connexion/inscription/incription0.php'> S'inscrire </button>
			<button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
		</form>
	</div>
</div>
<script>
	function openForm() {
		document.getElementById("popupForm").style.display="block";
	}
	function closeForm() {
		document.getElementById("popupForm").style.display="none";
	}
</script>
<!--  Start Services Section  -->
<section class="services" id="services" style=padding:0px>
	<!--Actu a mettre en base de données-->
	<div class="row services_list">
		<div class="tesimonial">
			<!--  Image camion et infos actualités  -->
			<img src="img/tuttut.svg" height="150px"width="250px" />
			<div class="col">
				<h1 class="mean_title">Actualités</h1>
				<h2 class="sub_title">Infos à ne pas manquer.</h2>
				<div class="col">
					<table id="myTable" class = "table table-striped table-sm">
						<tr>
							<th style=width:10%>
								Date
							</th>
							<th style=width:10%>
								Nom article
							</th>
							<th style=width:40%>
								Article
							</th>
						</tr>
						
							<?php
							include('./inclusion/connect.php');
							$idc=connect();				
							$sql='SELECT * FROM public.news';
							$rs=pg_exec($idc,$sql);
							while($ligne=pg_fetch_assoc($rs)){
							print('<tr><td>'.$ligne['date_news'].' </td><td>'.$ligne['titre_news'].' </td><td>'.$ligne['article'].' </td></tr>');
							}
							?>
								
							
						</table>	
					</div>
				</div>
			</div>
		</div>
	</section>
	<center>
		<img src="img/iut.jpg" height="150px"width="250px" />
		<img src="img/aude.png" height="150px"width="250px" />
		<img src="img/cfa.jpg" height="100px"width="200px" />
		<img src="img/stid.png" height="200px"width="300px" />
	</center>
	<!--  Start Testimonials Section  -->
	</br></br></br></br></br></br></br></br>					
	<section class="notre_projet" id="notre_projet">
		<div class="row">
			<div id="carousel">
				<div class="tesimonial">
					<!--  Image marker cuisine et explications projet  -->
					<img src="img/marker.svg" height="90px"width="90px" align=left/>
					<p style="font-family:raleway-bold, Helvetica, Arial, sans-serif; font-size: 25px; color: #454545; display: contents">
						PROJET 2019 - 2020 
					</p>
					<h2 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 20px; color: #454545"> En utilisant les outils à notre disposition, notre mission était de créer un application web. Cette application concerne la gestion des portages de repas, elle va gèrer la commande, la facturation et la livraison des repas aux personnes à mobilités réduites. </h2>
					</br>
				</div>
			</div>
		</div>
	</section>
	
	<section class="services" id="contacts" style=padding:0px>
	<div class="row">
	<img src="img/contact.png" height="90px"width="90px" align=left/>
		<p style="font-family:raleway-bold, Helvetica, Arial, sans-serif; font-size: 25px; color: #454545; display: contents">
			Contacts 
		</p>
	<h2 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 18px; color: #454545;">Réalisé par GUIZARD Alexis, PINEDE Eva et MAIMOUNI Charaf-eddine </h2>
					
	<div>
	</section>
	
	</br></br></br>	
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