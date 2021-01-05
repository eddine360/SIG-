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
		<link href="bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet">
		<script src="carte/JavaScript/jquery-3.4.1.js"></script> 
		<script src="carte/leaflet/leaflet.js"></script>
		<script src="carte/JavaScript/main.js"></script>

</head>
<body>			

<a href="./admin.php" > <button type="button" style="background-color:red" >  Retour</button> </a> <br>
  <div class="form-row">
	<div class="col-sm">
		<FORM name="frm" action="./enr_menu_admin.php"method="POST">
			<h2> Constituer un nouveau menu </h2>
			  <label for="validationCustom01">Date de disponiblité</label>
			  <input type="date" name="date" class="form-control"  required>
			  <div class="form-row">
				  <div class="col-sm">
				  Entrée: <br>
				  <select id='plat' name='plat'>
				  	<?php
					include('./inclusion/connect.php');
					$idc=connect();
					session_start ();
					
					$sql = "SELECT * from  plat inner join type_plat on plat.num_type= type_plat.num_type where plat.num_type=3 ";
					$rs=pg_exec($idc, $sql);
					while($ligne=pg_fetch_assoc($rs)){
						print('<OPTION value="'.$ligne['num_plat'].'">'.$ligne['nom_plat'].'</option>'."\n");
					}
				?>
				</select>
				  </div>
				  <div class="col-sm">
				  Plat:  <br>
					 <select id='plat2' name='plat2'>
				  	<?php
			
					
					$sql = "SELECT * from  plat inner join type_plat on plat.num_type= type_plat.num_type where plat.num_type=4";
					$rs=pg_exec($idc, $sql);
					while($ligne=pg_fetch_assoc($rs)){
						print('<OPTION value="'.$ligne['num_plat'].'">'.$ligne['nom_plat'].'</option>'."\n");
					}
					?>
					</select>

					  </div>
					  <div class="col-sm">
					  Dessert:  <br> 
					   <select id='plat3' name='plat3'>
						<?php
				
						
						$sql = "SELECT * from  plat inner join type_plat on plat.num_type= type_plat.num_type where plat.num_type=2";
						$rs=pg_exec($idc, $sql);
						while($ligne=pg_fetch_assoc($rs)){
							print('<OPTION value="'.$ligne['num_plat'].'">'.$ligne['nom_plat'].'</option>'."\n");

						}
					?>
				</select>
				</div>
			</div>
			<br><br><br>
			<button class="btn btn-secondary" type="submit">Enregister le menu </button>
		</form>
		<br><br><br>
				
		
				
	</div>
	<div class="col-sm">
		<FORM name="frm" action="./enr_plat.php"method="POST">
			<h2> Ajouter un nouveau plat</h2>
			<label for="validationCustom01"> Nom de plat </label>
			<input type="text"  id="nom" name="nom" class="form-control" value="Ex: Salade de fruits" required>
			<br>
			<label for="validationCustom01"> Description  </label>
			<input type="textarea"  name="desc"   rows="5" cols="33" class="form-control"  value="Entrez une description" required>
			<label for="validationCustom01"> Image  </label>
			<input  name="img"  type="file" value="Image du plat" required>
			<label for="validationCustom02">type de plat</label>
			  <select id='plat' name="plat">
					<?php
					$sql = "SELECT * from  TYPE_PLAT ";
					$rs=pg_exec($idc, $sql);
					while($ligne=pg_fetch_assoc($rs)){
						print('<OPTION value="'.$ligne['num_type'].'">'.$ligne['nom_type'].'</option>'."\n");
					}
				?>
				</select>
				<br><br><br>
				<button class="btn btn-primary" type="submit">Enregister un nouveau plat </button>
		</form>
	 </div>
</div>


		

	
	
	
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