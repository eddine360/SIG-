<?php
	include('./inclusion/connect.php');
	$idc=connect();
// eregistrement benef 1
$nom1=pg_escape_string($_POST['nom1']);
$prenom1=pg_escape_string($_POST['prenom1']);
$date1=pg_escape_string($_POST['date1']);
$tel1=pg_escape_string($_POST['tel1']);
$sexe1=pg_escape_string($_POST['sexe1']);
// coordonnées 
$mail=!empty($_POST['mail']) ? $_POST['mail'] : NULL;
$adresse=pg_escape_string($_POST['adresse']);
$lat=$_POST['geo'];
$lng=$_POST['geo2'];

// $cp=pg_escape_string($_POST['cp']);
// $ville=pg_escape_string($_POST['ville']);
//requetes sql

 $sql9='select max(num_fo) from foyer';
 $res1=pg_exec($idc,$sql9);
 $num_fo = pg_fetch_result($res1, 0);
 echo $lat; 
 echo $lng; 
 
 $sql9='select max(id_connexion) from compte';
 $res2=pg_exec($idc,$sql9);
 $id_co = pg_fetch_result($res2,0, 0);
 //echo($id_co + "ID CONNEX"); 
  
 	$sql1='insert into beneficiaire (nom_benef,prenom_benef,genre,date_nais_benef, tel_benef, mail_benef, num_fo, id_connexion)
			values(\''.$nom1.'\',\''.$prenom1.'\',\''.$sexe1.'\',\''.$date1.'\', \''.$tel1.'\' ,  \''.$mail.'\', '.$num_fo.', '.$id_co.')';

	$sql3='insert into foyer (adress_fo, lat, lng)
			values(\''.$adresse.'\', '.$lat.','.$lng.' )';	
			


pg_exec($idc,$sql3);

pg_exec($idc,$sql1);
 
 // eregistrement benef 2
if(isset($_POST['nom2']) && isset($_POST['prenom2']) 
	&& isset($_POST['date2']) && isset($_POST['tel2']) && 
	isset($_POST['sexe2'])  ){
		
		$nom2=pg_escape_string($_POST['nom2']);
		$prenom2=pg_escape_string($_POST['prenom2']);
		$date2=pg_escape_string($_POST['date2']);
		$tel2=pg_escape_string($_POST['tel2']);
		$sexe2=pg_escape_string($_POST['sexe2']);		

		$sql2='insert into beneficiaire (nom_benef,prenom_benef,genre,date_nais_benef, tel_benef, mail_benef,num_fo)
				values(\''.$nom2.'\',\''.$prenom2.'\',\''.$sexe2.'\',\''.$date2.'\', \''.$tel2.'\' ,  \''.$mail.'\', '.$num_fo.')';
				
		pg_exec($idc,$sql2);
 
	}
header("location:./../../index.php");

?>