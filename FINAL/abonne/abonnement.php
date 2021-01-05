<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Nouvelle commande </title>
		<!--Stylesheet Files-->
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/foundation.min.css" />
		<link rel="stylesheet" href="css/main.css" />
		<!-- bootstrap -->
		


	
</head>
<body>
<!--  Start Hero Section  -->
	<section class="abo">
		<header>
			<div class="row">
				<nav class="top-bar" data-topbar role="navigation">
					<!--Start Logo-->
					<ul class="title-area">
						<li class="name">
							<a href="https://www.villedebram.fr/" class="logo">
								<span class="tld"><h1>LES SAVEURS DE BRAM </h1></span>
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
						<li><a  href="#montab1"   >Déconnexion</a></li>
					</ul>
				</section>
				<!--End Navigation Menu-->
			</nav>
		</div>
	</header>
	<!--Start Hero Caption-->
	<section class="caption">
		<div class="row">
			<h1 class="mean_cap">Nouvelle commande</h1>
			<h2 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 30px; color: #b39346"> Vous devez souscrire à un abonnement d'au moins une semain afin de bénificier du service de livraison à domicile</h2>
		</div>
	</section>
</section>
<section>
	<?php
	session_start ();
	//echo($_SESSION['id']); 
	if(isset($_SESSION['type']) and $_SESSION['type'] != 1 ){
	
	   header("Location: ./../index.php");
	}
	

    include('./inclusion/connect.php');
	$idc=connect();
    $sql="SELECT * FROM COMPTE JOIN BENEFICIAIRE ON COMPTE.id_connexion
	= BENEFICIAIRE.id_connexion JOIN FOYER ON
	BENEFICIAIRE.num_fo = FOYER.num_fo JOIN COMMANDE_SEMAINE ON 
	FOYER.num_fo = COMMANDE_SEMAINE.num_fo JOIN 
	FACTURE ON COMMANDE_SEMAINE.num_fact = FACTURE.num_fact 
	WHERE COMPTE.id_connexion = $1 AND COMMANDE_SEMAINE.date_fin >
	current_date ORDER BY COMMANDE_SEMAINE.date_fin";
    $values = array($_SESSION['id']);
    $req_prep = pg_prepare($idc, "requête de recherche de d'abonement", $sql);
    $result = pg_execute($idc, "requête de recherche de d'abonement", $values);
    $nb_lignes = pg_numrows($result);
    if ($nb_lignes < 1){
        echo "
			<img src='img/alert.png' height='150px' width='250px' />
		<h2> 	Vous n'avez aucun abonnement en cours </h2>  <br> <br> 
			
			
			
		<h2> Souhaitez vous passer une nouvelle commande ?  </h2> 
		";
    }
	// paragraphes qui liste les abonnements 
    else {
        echo "<div><p>liste de vos abonements</p>";
        for ($i=0; $i < $nb_lignes; $i++) { 
            $abo = pg_fetch_assoc($result, $i);
            echo "<div><p> Du ";
            echo $abo["date_debut"];
            echo " au ";
            echo $abo["date_fin"];
            echo ". Fait le ";
            echo $abo["date_com"];
            echo ".</p></div>";
        }
        echo "</div>";
    }
	// passer une nouvelle commande
    echo "<form action='./enr_abo.php' method='post'>
					<label for='date_abonement'>
					<h3>Veillez sélectionner la date de début de la livraison: </h3>
					</label>
					<input type='date'
					name='date_abonement'
					id='date_abonement' 
					required  
					value=' <?php 
								echo date('Y-m-d', strtotime(date('Y-m-d')));
							?>
				<input type='submit'  class='btn btn-success px-3' value='Submit'>
		 </form>";
?>
<section>
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