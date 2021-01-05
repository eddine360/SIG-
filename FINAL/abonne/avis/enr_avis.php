
<?php

	include('./inclusion/connect.php');
	$idc=connect();
	$date=date('d-m-Y');
	$sexe=$_POST['sexe2'];
	$mdp=$_POST['zs_mdp'];


	$sql='INSERT INTO compte (identifiant, mdp, num_type_co)
   		  values(\''.$log.'\', \''.$mdp.'\', 1)';
	

	$rs=pg_exec($idc,$sql);

	header("location:./inscription2.php");
 }
	
?>