
<?php

	include('./inclusion/connect.php');
	$idc=connect();
	session_start ();
	//echo $_SESSION['id'];
		 /*pour reperer des similaritées de logins */
		 $sqlid='SELECT max(num_commande) from  commande_semaine  
				inner join  foyer 
				on commande_semaine.num_fo = foyer.num_fo 
				inner join beneficiaire 
				on  foyer.num_fo =beneficiaire.num_fo
				inner join compte
				on  compte.id_connexion= beneficiaire.id_connexion
				where compte.id_connexion =  \''.$_SESSION['id'].'\'';
		 $rs=pg_exec($idc,$sqlid);
		$a= pg_fetch_result($rs, 0, 0);  
	//	echo $a; 
	$date =  date("Y-m-d");

/*
// numéro de menus
	$m1=$_POST['var0'];
	$m2=$_POST['var3'];
	$m3=$_POST['var6'];
	$m4=$_POST['var9'];
	$m5=$_POST['var12'];
	$m6=$_POST['var15'];
	$m7=$_POST['var18'];
	
// quantité commandée 
$q1=$_POST['q0'];
	$q2=$_POST['q3'];
	$q3=$_POST['q6'];
	$q4=$_POST['q9'];
	$q5=$_POST['q12'];
	$q6=$_POST['q15'];
	$q7=$_POST['q18'];
	
// num plat commandée 
	$p1=$_POST['plat0'];
	$p2=$_POST['plat1'];
	$p3=$_POST['plat2'];
	$p4=$_POST['plat3'];
	$p5=$_POST['plat4'];
	$p6=$_POST['plat5'];
	$p7=$_POST['plat6'];
	$p8=$_POST['plat7'];
	$p9=$_POST['plat8'];
	$p10=$_POST['plat9'];
	$p11=$_POST['plat10'];
	$p12=$_POST['plat11'];
	$p13=$_POST['plat12'];
	$p14=$_POST['plat13'];
	$p15=$_POST['plat14'];
	$p16=$_POST['plat15'];
	$p17=$_POST['plat16'];
	$p18=$_POST['plat17'];
	$p19=$_POST['plat18'];
	$p20=$_POST['plat19'];
	$p21=$_POST['plat20'];


	echo $p1.'-'.$p2.'-'. $p3.'-'.$p4.'-'.$p5.'-'.$p6.'-'.$p7.'-'.
	$p1.'-'.$p8.'-'.$p9; 
	
	//echo $m1.'  '.$m2.' '.$m3.'   '.$m6.$m7; 
	
	//echo $date; 
	
	// $sql='insert into commande_jour(date_jour, num_liv ,num_commande ) 
          // values (\''.$date.'\', 1 , '.$a.')'; 
   // $rs=pg_exec($idc,$sql);
	// $sql='insert into commande_jour(date_jour, num_liv ,num_commande ) 
          // values (\''.$date.'\', 1 , '.$a.')'; 
   // $rs=pg_exec($idc,$sql);
   // $sql='insert into commande_jour(date_jour, num_liv ,num_commande ) 
          // values (\''.$date.'\',1 , '.$a.')'; 
   // $rs=pg_exec($idc,$sql);
   // $sql='insert into commande_jour(date_jour, num_liv ,num_commande ) 
          // values (\''.$date.'\', 1 , '.$a.')'; 
   // $rs=pg_exec($idc,$sql);
   // $sql='insert into commande_jour(date_jour, num_liv ,num_commande ) 
          // values (\''.$date.'\', 1 , '.$a.')'; 
   // $rs=pg_exec($idc,$sql);
   // $sql='insert into commande_jour(date_jour, num_liv ,num_commande ) 
          // values (\''.$date.'\', 1, '.$a.')'; 
   // $rs=pg_exec($idc,$sql);
   // $sql='insert into commande_jour(date_jour, num_liv ,num_commande ) 
          // values (\''.$date.'\',1 , \''.$a.'\')'; 
   // $rs=pg_exec($idc,$sql);
   
   
    $sqlid='SELECT max(commande_jour_id) from commande_jour';
		 $rs=pg_exec($idc,$sqlid);
		$b= pg_fetch_result($rs, 0, 0);
		
   $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p1.', '.$m1.' ,'.$b.','.$q1.' )'; 
		$rs=pg_exec($idc,$sql);
	  $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p2.', '.$m1.' ,'.$b.','.$q1.' )'; 
		$rs=pg_exec($idc,$sql);
		  $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p3.', '.$m1.' ,'.$b.','.$q1.' )'; 
		$rs=pg_exec($idc,$sql);
		
		
    $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p4.','.$m2.' ,'.$b.','.$q2.' )'; 
		$rs=pg_exec($idc,$sql);
		$sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p5.','.$m2.' ,'.$b.','.$q2.' )'; 
		$rs=pg_exec($idc,$sql);
		$sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p6.','.$m2.' ,'.$b.','.$q2.' )'; 
		$rs=pg_exec($idc,$sql);
		
		
	 $sql='insert into commande_plat( num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p7.','.$m3.' ,'.$b.','.$q3.' )'; 
		$rs=pg_exec($idc,$sql);
		$sql='insert into commande_plat( num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p8.','.$m3.' ,'.$b.','.$q3.' )'; 
		$rs=pg_exec($idc,$sql);
		$sql='insert into commande_plat( num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p9.','.$m3.' ,'.$b.','.$q3.' )'; 
		$rs=pg_exec($idc,$sql);
		
		
	 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p10.','.$m4.' ,'.$b.','.$q4.' )'; 
		$rs=pg_exec($idc,$sql);
		 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p11.','.$m4.' ,'.$b.','.$q4.' )'; 
		$rs=pg_exec($idc,$sql);
		 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p12.','.$m4.' ,'.$b.','.$q4.' )'; 
		$rs=pg_exec($idc,$sql);
		
		
	 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p13.','.$m5.' ,'.$b.','.$q5.' )'; 
		$rs=pg_exec($idc,$sql);
		 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p14.','.$m5.' ,'.$b.','.$q5.' )'; 
		$rs=pg_exec($idc,$sql);
		 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p15.','.$m5.' ,'.$b.','.$q5.' )'; 
		$rs=pg_exec($idc,$sql);
		
	 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p16.','.$m6.' ,'.$b.','.$q6.' )'; 
		$rs=pg_exec($idc,$sql);
		$sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p17.','.$m6.' ,'.$b.','.$q6.' )'; 
		$rs=pg_exec($idc,$sql);
		$sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p18.','.$m6.' ,'.$b.','.$q6.' )'; 
		$rs=pg_exec($idc,$sql);
		
	 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p19.','.$m7.' ,'.$b.','.$q7.' )'; 
		$rs=pg_exec($idc,$sql);
		 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p20.','.$m7.' ,'.$b.','.$q7.' )'; 
		$rs=pg_exec($idc,$sql);
		 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$p21.','.$m7.' ,'.$b.','.$q7.' )'; 
		$rs=pg_exec($idc,$sql);
   
   
   
   */
  for ($i = 1; ; $i++) {
    if ($i > 20) {
        break;
    }
    
	$sql='insert into commande_jour(date_jour, num_liv ,num_commande ) 
           values (\''.$date.'\',1 , \''.$a.'\')'; 
    $rs=pg_exec($idc,$sql);
	
	$sqlid='SELECT max(commande_jour_id) from commande_jour';
		 $rs=pg_exec($idc,$sqlid);
		$b= pg_fetch_result($rs, 0, 0);
	
	 $sql='insert into commande_plat(num_plat, num_menu, commande_jour_id,qte_commandee) 
          values ('.$_POST['plat'.$i].', '.$_POST['var'.$i].' ,'.$b.','.$_POST['q'.$i].' )'; 
		$rs=pg_exec($idc,$sql);
	
	
	
}
   
   
   
	

//	header("location:./recap.php");

?>