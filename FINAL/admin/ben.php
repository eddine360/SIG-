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
	
		<link rel="stylesheet" type="text/css" href="carte/leaflet/leaflet.css" />
		<link rel="stylesheet" type="text/css" href="carte/CSS/Style.css" />
		<!-- Bootstrap -->
		
		<style>
		/* css to customize Leaflet default styles  */
		.custom .leaflet-popup-tip,
		.custom .leaflet-popup-content-wrapper {
			background: #e93434;
			color: #ffffff;
		}
		</style>
		<script src="carte/JavaScript/jquery-3.4.1.js"></script> 
		<script src="carte/leaflet/leaflet.js"></script>
		<script src="carte/JavaScript/main.js"></script>
	<script>	
	//---------ajax script 
	function creer_httpr()
{
	var h;
	if (window.XMLHttpRequest) 
	{ // Mozilla, Safari, ...
		h = new XMLHttpRequest();
		if (h.overrideMimeType) 
		{
            h.overrideMimeType('text/xml;charset=UTF-8');
		}

	}
	else 
	{
		if (window.ActiveXObject) 
		{ // IE
			h = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return(h);
}
	var httpRequest;
	function recup_data()
	{
		if (httpRequest.readyState == 4 && 
			httpRequest.status == 200) 
		{
			madiv.innerHTML=httpRequest.responseText;
		} 
	}
	function synchro_lst()
	{
			httpRequest = creer_httpr();
			var prg = "./liste_benef.php";
			
			var num = document.frm["num"].value
			var param="?num="+num;
			// si un autre param�tre ajouter :
			// num2=document.frm["xxxxxx"].value;
			// param=param+"&num2="+num2;

			httpRequest.onreadystatechange = recup_data;
			httpRequest.open("GET", prg+param, true);
			httpRequest.send(null);

	}  </script>
</head>
<body >			

<a href="./admin.php" > <button type="button" style="background-color:red" >  Retour</button> </a> <br>

 <div id="map"></div><br>
 


 
 Rechercher un Bénéficiaire par son numéro de bénéficiaire <br>
<FORM name="frm" action="./list_benef.php"method="POST">
<SELECT name="num" onchange="synchro_lst()" size="1">
<?php
include('./inclusion/connect.php');
	$idc=connect();
	
	$sql='select num_benef from beneficiaire';
	$rs=pg_exec($idc, $sql);
	while($ligne=pg_fetch_assoc($rs)){
		print('<option value="'.$ligne['num_benef'].'" >'.$ligne['num_benef'].'</option>'."\n");
	}
?>

</SELECT>
</FORM>

<div class="col">
<!-- résultats Ajax *--> 						
 <div id="madiv">
<div class="col">		
<!--<?php
// include('./inclusion/connect.php');
// $idc=connect();				
// $sql='select * from beneficiaire 
// inner join foyer on

// beneficiaire.num_fo = foyer.num_fo ';
// $rs=pg_exec($idc,$sql);
// while($ligne=pg_fetch_assoc($rs)){
// print('<tr><td>'.$ligne['num_benef'].' </td><td>'.$ligne['nom_benef'].' </td><td>'.$ligne['genre'].' </td><td>'.$ligne['date_nais_benef'].' </td><td>'.$ligne['tel_benef'].' </td><td>'.$ligne['mail_benef'].' </td><td>'.$ligne['adress_fo'].' </td></tr>');
// }
// ?> -->
	
	
	
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