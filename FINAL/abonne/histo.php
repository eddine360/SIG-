<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Historique</title>
    
    <link rel="stylesheet" href="css/main.css" />
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet">
	
		<style type="text/css">
				body {
				background: url('img/fond_histor.jpg');
				background-repeat: no-repeat;
				
				}
		</style>
    
</head>
<body></br>
	
		<div class="bouton">
			<a href="./page_inter.php" > <button type="button" class="btn btn-light">Retour page d'accueil</button> </a>
		</div>
		<center>
			<strong>
				<p style="font-family:raleway-bold, Helvetica, Arial, sans-serif; font-size: 30px; color: #000000;margin-left: 9%">
					HISTORIQUE DE VOS COMMANDES 
				</p>
			</strong>
		</center></br>	
				<h1 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 20px; color: #000000; margin-left: 1%">
					Vous pouvez voir un historique de vos commandes sur cette page :
				</h1></br></br>	
	
		<strong>
				
		
			
				<div class="col" >
					<table id="Table" class = "table table-striped table-sm" align=center style="width:60%;background-color: white" > 
						<tr>
							<th style=width:20%>
								
							</th>
							<th style=width:20% colspan="2">
								<center> 	Durée de l'abonnement </center> 
							</th>
						</tr>
						
						<tr>
							<th style=width:20%>
									Numéro de commande
							</th>
							<th style=width:20%>
								<center> 	Date de début </center> 
							</th>
							<th style=width:20%>
								<center> 	Date de fin </center> 
							</th>
						</tr>

						<?php
						
						session_start ();
							//echo($_SESSION['id']); 
							if(isset($_SESSION['type']) and $_SESSION['type'] != 1 ){
							
							   header("Location: ./../index.php");
							}
							include('./inclusion/connect.php');
						
							$idc=connect();				
							$sql='SELECT * FROM COMPTE JOIN BENEFICIAIRE ON COMPTE.id_connexion
	= BENEFICIAIRE.id_connexion JOIN FOYER ON
	BENEFICIAIRE.num_fo = FOYER.num_fo JOIN COMMANDE_SEMAINE ON 
	FOYER.num_fo = COMMANDE_SEMAINE.num_fo JOIN 
	FACTURE ON COMMANDE_SEMAINE.num_fact = FACTURE.num_fact 
	WHERE COMPTE.id_connexion ='.$_SESSION['id'];

							$rs=pg_exec($idc,$sql);
							while($ligne=pg_fetch_assoc($rs)){
							print('<tr><td>'.$ligne['num_commande'].' </td><td> <center>  '.$ligne['date_debut'].' </center> </td>
							<td> <center> '.$ligne['date_fin'].' </center> </td></tr>');
								}
						?>

							
                           
						
							
					</table>	
				</div>
				

</body>
</html>
