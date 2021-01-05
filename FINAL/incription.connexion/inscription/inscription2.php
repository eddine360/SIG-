<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		   <meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML</title>
		<meta name="author" content="eddine360" />
	    <link rel="stylesheet" type="text/css" href="leaflet/leaflet.css" />
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<style>
		body {
		 background-image: url("img/img.jpg");
		 background-color: #cccccc;
		   opacity: 1;
		}
		.center_div{
			margin: 0 auto;
			width:80% /* value of your choice which suits your alignment */
		}
		
		
	</style>
		<link rel="stylesheet" type="text/css" href="CSS/Style.css" />
	   <!-- Bootstrap -->
    <link href="bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet">

	<script type="text/javascript" src="js/fonctions.js"></script>
	<script src="JavaScript/jquery-3.5.1.js"></script> 
    <script src="leaflet/leaflet.js"></script>
    <script src="leaflet/GpPluginLeaflet.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="JavaScript/main.js"></script>


	</head>
	<body  >

	<script>
	function myFunction() {
	  document.getElementById("1").disabled = true;
	  document.getElementById("2").disabled = true;
	  document.getElementById("3").disabled = true;
	  document.getElementById("4").disabled = true;
	  document.getElementById("5").disabled = true;
	  document.getElementById("6").disabled = true;
	}
	function myFunction2() {
	   document.getElementById("1").disabled = false;
	  document.getElementById("2").disabled = false;
	  document.getElementById("3").disabled = false;
	  document.getElementById("4").disabled = false;
	  document.getElementById("5").disabled = false;
	  document.getElementById("6").disabled = false;
	}
	</script>
	
	
		<div class="text-center">	
			<form name="frm" action="./enr2.php" method="post" >
				<h2> S'enregistrer </h2>
				<h3>Combiens êtes vous dans voter foyer ? </h3> <br> 
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" onchange="myFunction()" name="inlineRadioOptions" id="inlineRadio1" checked="checked" value="option1">
				  <label class="form-check-label" for="inlineRadio1"   >1</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input"  onchange="myFunction2()" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
				  <label class="form-check-label" for="inlineRadio2" > 2 </label>
				</div>
				<br /><br />
				<table class="table table-dark">
				  <tr>
					<th>Bénéficiaires</th>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Date de naissance <br></th>
					<th>Numéro de téléphone <br></th>
					<th>Sexe </br>(M/F)</th>
				  </tr>
				  <tr>
					<td>Bénéficiaire 1</td>
					<td><input type="text" name="nom1" required></td>
					<td><input type="text" name="prenom1"required></td>
					<td><input type="date" name="date1"required></td>
					<td><input type="number" name="tel1" required></td>
					<td>
						<input type="radio" name="sexe1" value="M" required>
						<input type="radio" name="sexe1" value="F" required>
					</td>
				  </tr>
				  <tr>
					<td>Bénéficiaire 2</td>
					<td><input type="text" name="nom2"required disabled="True" id="1"> </td>
					<td><input type="text" name="prenom2" disabled="True" required id="2"></td>
					<td><input type="date" name="date2"  disabled="True" required id="3"> </td>
					<td><input type="number" name="tel2" disabled="True" required   id="4"></td>
					<td>
					<input type="radio" name="sexe2" value="M" required disabled="True"  id="5" >
					<input type="radio" name="sexe2" value="F" required  disabled="True" id="6" >
					</td>
				</table>
				
				<div class="row">
					<div class="col-6">
						<table class="table table-dark"> 
							<tr>
								<td>

									Adresse mail ( pour la newsletter )  <br/>
									<input type="email" name="mail" required="entrez votre mail">
									<br/> 
									Adresse du Foyer <br/>	
									<div id="params">
										<input type="text" name="adresse" id="recherche_adresse"  />
										<input type="button" value="Vérifier l'adresse" onclick="recherche()"/>
									</div>
									
									 Géocode Lat/Lng<br/>  
									 <input  type="text" id="geo"    name="geo" />
									 <input  type="text" id="geo2"    name="geo2" />
									 <br/>
									 <!--
									 Ville <br/> 
									 <input type="text" name="ville" required="entrez votre ville"> <br><br>
									-->
									
									<input class="btn btn-success" type="submit" value="valider" />
								</td>
							</tr> 
						</table>
					</div>
			
						<div class="col-4">
								 <div id="map"></div>
						</div>
						
				</div>
			</form>
		</div>

	</body>
</html>
