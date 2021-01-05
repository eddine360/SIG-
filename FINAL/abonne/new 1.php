<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Espace menu</title>
		<!--Stylesheet Files-->
		<style> 
		img {
			width: 150px; 
			height: 150px; 
			object-fit: cover; 
			}
		
		
		}
		
		
		</style> 
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/foundation.min.css" />
		<link rel="stylesheet" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<body >

<section class="menu">
		<header>
			<div class="row">
				<nav class="top-bar"  data-topbar role="navigation" >
					<!--Start Logo-->
					<ul class="title-area">
						<li class="name">
							<a href="https://www.villedebram.fr/" class="logo">
								<span class="tld" ><h1>Les saveurs de Bram </h1></span>
							</a>
						</li>
					</ul>
					<!--End Logo-->
					<!--Start Navigation Menu-->
					<section class="top-bar-section" id="mean_nav">
						<ul class="right" >
							<li ><a href="#services" style="color: #454545"> Nouvelle commande </a></h2>
						</li>
						<li><a href="#notre_projet" style="color: #454545">Facture</a></li>
						<li><a  href="deconnexion.php"  style="color: #454545">Déconnexion</a></li>
					</ul>
				</section>
				<!--End Navigation Menu-->
			</nav>
		</div>
	</header>
	<!--Start menu Caption-->
	<section class="caption">
		<div class="row">
			<h1 class="mean_cap">Espace commandes </h1>
			<h2 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 30px; color: #454545">Votre service de livraison de repas à domicile pour personnes âgées</h2>
		</div>
	</section>
<section class="notre_projet" id="notre_projet">
		<div class="row">
			<div id="carousel">
				<div class="tesimonial">
					<!--  Image marker cuisine et explications projet  -->
					<br><br><br><br><br>
					<img src="img/marker.svg" height="90px"width="90px" align=left/>
					<p style="font-family:raleway-bold, Helvetica, Arial, sans-serif; font-size: 25px; color: #454545; display: contents">
						Mon menu
					</p><br><br><br>
					<p style="font-family:raleway-bold, Helvetica, Arial, sans-serif; font-size: 18px; color: #454545; display: contents">
						Selectionnez les plats que vous souhaitez vous faire livrer	
					</p><br><br>
					
	<form name="frm" action="./enr_menu.php" method="post" >
	
				<table id="myTable" class = "table table-striped table-sm" align=center> 
<?php
include('./inclusion/connect.php');
$idc=connect();
$bnef = false;
$adm = false;
session_start ();

//verif menus en cours 
$bnef = true;
$sql="SELECT MENU.num_menu, TYPE_PLAT.num_type, MENU.date_menu, PLAT.num_plat, PLAT.nom_plat, PLAT.image_plat, PLAT.description, TYPE_PLAT.nom_type FROM MENU JOIN composer ON MENU.num_menu = composer.num_menu JOIN PLAT ON composer.num_plat = PLAT.num_plat JOIN TYPE_PLAT ON PLAT.num_type = TYPE_PLAT.num_type WHERE menu.date_menu > current_date ORDER BY menu.date_menu, TYPE_PLAT.num_type";
$result = pg_query($idc, $sql);
$nb_lignes = pg_numrows($result);
if ($nb_lignes < 1){
	echo "
	<img src='img/alert.png' height='150px' width='250px' /> <br> 
	Aucun menu n'a pu être trouvé pour la période sélectionnée ! <br> <br> 
	Revenez en arrière et choisissez une période plus récente <br> <br> "; 
}

// abonements en cours 
else {
	$tab= array(); 
	$menu = -1;
	for ($i=0; $i < $nb_lignes; $i++) { 
		$plat = pg_fetch_assoc($result, $i);
		// afficher Date livraison 
		$tab[$i]=$plat["num_menu"];
		
		if ($i==0) {
			echo "<div>  <tr> <td  colspan=5  bgcolor='79ff96' style='text-align:center' ><p> Livraison du " ;
			echo $plat["date_menu"];
			echo "</p> ";
			$menu = $plat["num_menu"];
			
			
			
		}
		elseif ($menu != $plat["num_menu"]) {
			echo "</div> <div> <tr> <td  colspan=5  bgcolor='79ff96' style='text-align:center' ><p> Livraison du ";
			echo $plat["date_menu"];
			echo "</p> </td></tr>";
			$menu = $plat["num_menu"];
			echo $menu.$i; 
			$tab[$i]=$plat["num_menu"];
		}
		if ($adm) {
			$tab[$i]=$plat["num_menu"];
			echo "<form action='/menu.php' method='post'>
					<label for='plat'>";
			echo $plat["nom_type"];
			echo " : </label>";
			echo "<select id='plat' name='plat'>";
			$sql = "SELECT * from PLAT JOIN TYPE_PLAT ON PLAT.num_type = TYPE_PLAT.num_type WHERE TYPE_PLAT.nom_type = $1";
			$req_prep = pg_prepare($idc, "requête de recherche de plat", $sql);
			$values = array($plat["nom_type"]);
			$result2 = pg_execute($idc, "requête de recherche de plat", $values);
			for ($j=0; $j < pg_numrows($result2); $j++) { 
				$choix_plat = pg_fetch_assoc($result2, $j);
				echo "<option value='";
				echo $plat["num_menu"];
				echo "_";
				echo $choix_plat["num_plat"];
				echo "'>";
				echo $choix_plat["nom_plat"];
				echo "</option>";
			}
		  	echo "</select><input type='submit' value='Afficher les ingrediants'></form>";
		}
		// Afficher plats + image + description
		else{
			echo "<div> <tr> <td> <p>";
			echo $plat["nom_type"];
			echo " : ";
		//	echo $plat["nom_plat"];
			echo "</p> </td>";
			echo "<td><img src='./plats/".$plat["image_plat"].".jpg'  /></td>";
	
		}		
		echo " <td> <p>";
		echo $plat["description"];
		$num=$plat["num_plat"];
		//echo $num; 
		echo "</p></td>";
		// selection quantité 
		if ($bnef) {
			echo
//type='image'
			"
					<td>
					<form  name='frm' method='post'  action='./ingred.php'  > 
					<label for='quantity'> Quantité: </label>
					<input type='number' id='quantity' name='quantity' min='0' max='2'>
					
						<button   id=".$num."   style='border:none;' type='submit' name='ing' value=".$num."  />
							<img src='img/ing.png' />
						</button>
					<br>
					</form>  
				  </td>
				  </tr>";
		}
		echo "</div>";
	}
	echo "</div>";
	
}
//echo '<input type="hidden" name="var2" value="'.$tab.'"></input> '; 
var_dump($tab);
?>
</table>
<input  type="submit" value="continuer" />
</form> 
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
							
								<p >
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
