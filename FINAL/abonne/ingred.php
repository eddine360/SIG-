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
		</style> 
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/foundation.min.css" />
		<link rel="stylesheet" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<body >
	
<section class="notre_projet" id="notre_projet">
		<div class="row">
			<div id="carousel">
				<div class="tesimonial">
				
					<p style="font-family:raleway-bold, Helvetica, Arial, sans-serif; font-size: 18px; color: #454545; display: contents">
						Ingredients 
					</p><br><br>
					
							
				<table id="myTable" class = "table table-striped table-sm" align=center> 
						<tr>
						<th style=width:10%>
								Ingredient
							</th>
							<th style=width:10%>
								Allergène 
							</th>
							</tr>
	<?php
							include('./inclusion/connect.php');
							$idc=connect();		
							$ingre=$_POST["ing"];			
							//echo $ingre; 
							$sql='select * from plat
							inner join  contenir on 
							plat.num_plat = contenir.num_plat
							 inner join ingredients
							 on  ingredients.num_ingre = contenir.num_ingre
							 where plat.num_plat ='.$ingre ;
							$rs=pg_exec($idc,$sql);
							while($ligne=pg_fetch_assoc($rs)){
							print('<tr><td>'.$ligne['nom_ingre'].' </td><td>'.$ligne['allergene'].' </td></tr>');
							}
							?>
</table>
<a href="./menu.php" > <button type="button"  class="btn btn-primary btn-lg "> 
Retour </button> </a> 
</section>

	
</body>
</html>
