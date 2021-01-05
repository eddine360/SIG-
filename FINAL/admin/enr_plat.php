
<?php

	include('./inclusion/connect.php');
	$idc=connect();

	$n=$_POST['nom'];
	$d=$_POST['desc'];
	$i=$_POST['img'];
	$t=$_POST['plat'];
	echo $t; 
 /*pour reperer des similaritées de logins */

 

	$sql='INSERT INTO plat (nom_plat,image_plat , description,num_type)
   		  values(\''.$n.'\', \''.$i.'\',  \''.$d.'\' , \''.$t.'\')';
	
	$rs=pg_exec($idc,$sql);

	///header("location:./admin.php");

	
?>