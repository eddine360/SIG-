<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Finalisation</title>
    
    <link rel="stylesheet" href="css/main.css" />
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet">
	
		<style type="text/css">
				body {
				background: url('img/fond_ff.jpg');
				background-repeat: no-repeat;
				
				}
		</style>
    
</head>
<body></br>
	<?php
	session_start ();
	//echo($_SESSION['id']); 
	if(isset($_SESSION['type']) and $_SESSION['type'] != 1){
	
	   header("Location: ./../index.php");
	}
?> 
		<div class="bouton">
			<a href="./page_inter.php"><button type="button" class="btn btn-success">Valider</button> </a> 
		</div>
		<center>
			<strong>
				<p style="font-family:raleway-bold, Helvetica, Arial, sans-serif; font-size: 30px; color: #000000">
					VALIDATION DE VOTRE COMMANDE 
				</p>
			</strong>
		</center></br>	
				<h1 style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 20px; color: #000000; margin-left: 1%">
					Vous venez d’effectuer une commande sur notre site, vous pouvez voir un récapitulatif de votre panier avant validation de celui-ci. 
					Une fois que votre commande vous semble correct cliquez sur le bouton Valider.
				</h1></br></br>	
	
		<strong>
				<p style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 18px; color: #000000; margin-left: 1%">
					VOTRE NUMERO DE COMMANDE EST :   
					<?php
							include('./inclusion/connect.php');
							$idc=connect();				
							$sql='SELECT num_commande FROM commande_semaine 
								inner join foyer
								on commande_semaine.num_fo = foyer.num_fo
								inner join  beneficiaire
								on beneficiaire.num_fo = foyer.num_fo
								where id_connexion = \''.$_SESSION['id'].'\'';
							$rs=pg_exec($idc,$sql);
							while($ligne=pg_fetch_assoc($rs)){
							print('<tr><td>'.$ligne['num_commande']);
							}
						?></br>
				<p style="font-family:raleway-light, Helvetica, Arial, sans-serif; font-size: 18px; color: #000000; margin-left: 1%">
					VOUS AVEZ PASSE VOTRE COMMANDE DU  <?php
							
							$idc=connect();				
							$sql='SELECT * FROM public.commande_semaine
							
							inner join foyer
								on commande_semaine.num_fo = foyer.num_fo
								inner join  beneficiaire
								on beneficiaire.num_fo = foyer.num_fo
								where id_connexion = \''.$_SESSION['id'].'\'
							
							';
							$rs=pg_exec($idc,$sql);
							while($ligne=pg_fetch_assoc($rs)){
							print('<tr><td>'.$ligne['date_debut']);
							}
						?>  
							AU <?php
							
							$idc=connect();				
							$sql='SELECT * FROM public.commande_semaine
							
							inner join foyer
								on commande_semaine.num_fo = foyer.num_fo
								inner join  beneficiaire
								on beneficiaire.num_fo = foyer.num_fo
								where id_connexion = \''.$_SESSION['id'].'\'
							';
							$rs=pg_exec($idc,$sql);
							while($ligne=pg_fetch_assoc($rs)){
							print('<tr><td>'.$ligne['date_fin']);
							}
						?>  
				</p>
			</strong>	
			
				<div class="col" >
					<table id="Table" class = "table table-striped table-sm" align=center style="width:60%;background-color: white" > 
						<tr>
							<th style=width:15%>
									Date
							</th>
							<th style=width:30%>
									Nom du plat
							</th>
							<th style=width:15%>
									Quantité commandée
							</th>
						</tr>

						<?php
							
							
						
							$sql = 'SELECT *
								FROM plat P
								JOIN composer CO ON CO.num_plat = P.num_plat
								JOIN menu M ON CO.num_menu = M.num_menu
								JOIN commande_plat CP ON CO.num_plat = CP.num_plat AND CO.num_menu = CP.num_menu
								JOIN commande_jour CJ ON CP.commande_jour_id = CJ.commande_jour_id
								JOIN commande_semaine CS ON CJ.num_commande = CS.num_commande
								JOIN foyer F ON CS.num_fo = F.num_fo
								JOIN beneficiaire B ON F.num_fo = B.num_fo
								JOIN compte C ON B.id_connexion = C.id_connexion
								WHERE B.id_connexion = $1
								ORDER BY date_com DESC
								 ';
							$rs = pg_prepare($idc, "sélection du dernier abonnement", $sql);
							$rs = pg_execute($idc, "sélection du dernier abonnement", array($_SESSION["id"]));

						
							while($ligne=pg_fetch_assoc($rs)){

							print('<tr><td>'.$ligne['date_jour'].' </td><td>'.$ligne['nom_plat'].' </td><td>'.$ligne['qte_commandee'].' </td></tr>');
								}
                            ?>
						
							
					</table>	
				</div>
				

</body>
</html>
