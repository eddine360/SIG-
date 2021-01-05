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
	if(isset($_SESSION['type']) and $_SESSION['type'] != 3){
	
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
					<ul class="right">
						<li><a href="#services">Rédiger un article</a></li>
						<li><a href="#services">Gérer les menus</a></li>
						<li><a href="#services">Gérer les bénificiaires </a></li>
						<li><a href="#notre_projet">Consulter les statistiques</a></li>
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
		<img src="img/tuttut.svg" height="150px"width="250px" />
			<h1 class="mean_cap" > Espace Administrateur</h1> 
		</div>
	</section>
</section>
<div class="row services_list">
	<!--  Start Services Section  -->
	<section class="services" id="services" style=padding:0px>
		<!--Actu a mettre en base de données-->

			<div class="tesimonial">
				<!--  Image camion et infos actualités  -->
					<br> 
				
					<h1 class="mean_title">Statistques </h1>
					<h2 class="sub_title">Connaître l'avis des bénificaires.  <br> 
						#####################	 <br> 
						<a href="./stats.html" > <button type="button" style="background-color:red" >  Je consulte </button> </a> 
						</h2>
						<br> 
					<h1 class="mean_title">Bénéficiaires </h1>
					<h2 class="sub_title">Gérer mes bénificaires. <br> 
						#####################	 <br> 
						<a href="./ben.php" > <button type="button" style="background-color:red" >  Je gère mes bénéficiaires </button> </a>
						</h2>
						
					<br> 
					<h1 class="mean_title"> Menus </h1>
					<h2 class="sub_title">Gérer les menus <br> 
						#####################	 <br> 
						<a href="./admi_menu.php" > <button type="button" style="background-color:red" >  Je gère les menus </button> </a>
						</h2>
				
			</div>
		</section>
	</div> 
	<br> <br> 
	<center>
		<img src="img/iut.jpg" height="150px"width="250px" />
		<img src="img/aude.png" height="150px"width="250px" />
	</center>
	<!--  Créer un article   -->
	</br></br></br></br></br></br></br></br>					
   <<form name="frm" action="./enr_art.php" method="post" >
	<section class="services" id="contacts" style=padding:0px>
	<div class="row">
	<img src="img/icon2.png" height="90px"width="90px" align=left/>
		<p style="font-family:raleway-bold, Helvetica, Arial, sans-serif; font-size: 25px; color: #454545; display: contents">
			Rédiger un Article
		</p>
	<h2 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 18px; color: #454545;">Titre de l'article </h2>

		<input type="text" id="titre" name="titre" required
			   minlength="4" maxlength="8" size="10" value="Titre">
	<h2 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 18px; color: #454545;">Article </h2>
	<div>
	  <TEXTAREA name="art" rows=4 cols=40> Commencer à rediger </TEXTAREA>
	<button type="submit" class="btn cancel">Publiez</button>
	  </FORM>
	  
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