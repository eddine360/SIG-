
<?php

	include('./inclusion/connect.php');
	$idc=connect();
	$log=$_POST['zs_ident'];
	$mdp=$_POST['zs_mdp'];
 /*pour reperer des similaritées de logins */
 $sqlid='SELECT identifiant FROM 	compte WHERE identifiant = \''.$log.'\'';
 $rs=pg_exec($idc,$sqlid);
 
 if($rs== 0){
   // Pseudo déjà utilisé
   echo 'Ce pseudo est déjà utilisé';
}else{
   // Pseudo libre

	$sql='INSERT INTO compte (identifiant, mdp, num_type_co)
   		  values(\''.$log.'\', \''.$mdp.'\', 1)';
	
	$_SESSION['login'] = $log;
	$rs=pg_exec($idc,$sql);

	header("location:./inscription2.php");
 }
	
?>