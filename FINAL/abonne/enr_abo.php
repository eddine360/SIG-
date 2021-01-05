
<?php
	include('./inclusion/connect.php');
	$idc=connect();
	session_start ();
	echo($_SESSION['id']); 
	if(isset($_SESSION['type']) and $_SESSION['type'] != 1 ){
	   header("Location: ./../index.php");
	}
	 $sqlid='
		SELECT num_fo  from   beneficiaire 
			 where id_connexion = \''.$_SESSION['id'].'\'';
	$rs=pg_exec($idc,$sqlid);
    echo '<br>  	'; 
	echo 'id1 -----------'; 
	echo '<br>  	'; 
	$AA = pg_fetch_result($rs, 0, 0);
	echo '<br>  	'; 
	echo $AA; 
	echo ' <br> id2 ---------------'; 
	echo '<br>  	'; 
	setlocale(LC_TIME, 'fra_fra');
	$date=strftime('%d-%m-%y');
	$date_deb=$_POST['date_abonement'];
	$date_fin=date_add(date_create($date_deb), date_interval_create_from_date_string('7 days'));
	echo $date_deb; 
	    echo '<br>  	'; 
	echo  date_format($date_fin , 'd-m-y'); 
	    echo '<br>  	'; 
	echo $date;
    echo '<br>  -----------------	'; 
	echo $date_fin->format('d-m-y') ; 
	$dax= $date_fin->format('d-m-y') ; 




	 $sqlfact='SELECT max(num_fact)  from  commande_semaine'; 
			// where num_fo=\''.$AA.'\''; 
		$rs=pg_exec($idc,$sqlfact);
		$commande = pg_fetch_result($rs, 0, 0);	


	
	
 
$commande2 = $commande+1; 

$sql='INSERT INTO facture (montant_fact, date_fact, num_commande)
   		 values(50,\''.$date.'\', \''.$commande2.'\')';
$rs=pg_exec($idc,$sql);
//$fact2 = $fact+1; 


 $sqlfact='SELECT max(num_fact)  from  facture'; 
			// where num_fo=\''.$AA.'\''; 
		$rs=pg_exec($idc,$sqlfact);
		$fact = pg_fetch_result($rs, 0, 0);
		
//echo '<br>' + $fact2;
 $sql='INSERT INTO commande_semaine (date_com, date_debut, date_fin, num_fact, num_fo)
   		 values(\''.$date.'\', \''.$date_deb.'\',  \''.$dax.'\',  \''.$fact.'\' ,  \''.$AA.'\')';
	

	$rs=pg_exec($idc,$sql);

	header("location:./menu.php");
 
	
?>