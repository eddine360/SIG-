<?php


include('./inclusion/connect.php');
	$idc=connect();
	$id=$_POST['zs_id'];
	$mdp=$_POST['zs_mdp'];
	// demarer une session 
	session_start ();
	//données de controle
	$sql='select id_connexion, identifiant , mdp , num_type_co from compte
	where identifiant=\''.$id.'\'' ;
	$rs=pg_exec($idc, $sql);
	$ligne=pg_fetch_assoc($rs);
	$login_valide = $ligne['identifiant'];
	$pwd_valide = $ligne['mdp'];
	$type_co=$ligne['num_type_co'];
	$id_conex=$ligne['id_connexion'];
	echo($login_valide ); 
echo(	$type_co  ); 
echo($id_conex );

	if (isset($_POST['zs_id']) && isset($_POST['zs_mdp']) ) {
		if ($pwd_valide == $mdp ) {
			session_start();
			$_SESSION['id'] = $id_conex;
			$_SESSION['type'] = $type_co; 
			
			if ($type_co == 2) {
				echo("bon") ; 
				header("Location:./../admin/Livreur.php");
			}
			else { 
				if ($type_co ==3 ) { 
					header("Location:./../../admin/admin.php");
				}
				else { 
					header("Location:./../../abonne/page_inter.php");
				}
			}
			
		}
	}		                                        
	else
	{
				echo "<script>alert(\"la variable est nulle\")</script>";
				header("Location:./../../index.php");
	}  
?>