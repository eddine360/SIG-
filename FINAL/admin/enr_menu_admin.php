
<?php

	include('./inclusion/connect.php');
	$idc=connect();

	$d=$_POST['date'];
	$p=$_POST['plat'];
	$p2=$_POST['plat2'];
	$p3=$_POST['plat3'];
	echo $d.$p.$p2.$p3; 
	
	echo "enregistrement effectué"; 
		//date
	// $sql='INSERT INTO menu (date_menu)
   		  // values(\''.$d.'\') RETURNING num_menu';
	// pg_exec($idc,$sql);
	
	
	
	 $query = pg_query('INSERT INTO menu (date_menu)
			  values(\''.$d.'\') RETURNING num_menu');
	 $row = pg_fetch_row($query);
	 $menu = $row['0'];
		echo $menu; 
	
	//plat 1 
	$sql='INSERT INTO composer  (num_plat, num_menu )
   		  values(\''.$p.'\', \''.$menu.'\')';
	pg_exec($idc,$sql);
	
	//plat 2
	$sql='INSERT INTO composer  (num_plat, num_menu )
   		  values(\''.$p2.'\', \''.$menu.'\')';
	pg_exec($idc,$sql);
	
	//plat 3
	
	$sql='INSERT INTO composer  (num_plat, num_menu )
   		  values(\''.$p3.'\', \''.$menu.'\')';
	pg_exec($idc,$sql);
	


	///header("location:./admin.php");

	
?>