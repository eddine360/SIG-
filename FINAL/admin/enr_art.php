
<?php

	include('./inclusion/connect.php');
	$idc=connect();
	setlocale(LC_TIME, 'fra_fra');
	$date=strftime('%Y-%m-%d');
	$log=$_POST['titre'];
	$mdp=$_POST['art'];
 /*pour reperer des similaritées de logins */

 

	$sql='INSERT INTO news (titre_news, article, date_news)
   		  values(\''.$log.'\', \''.$mdp.'\',  \''.$date.'\' )';
	
	$rs=pg_exec($idc,$sql);

	///header("location:./admin.php");

	
?>