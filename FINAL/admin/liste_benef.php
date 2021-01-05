<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>templates</title>
	<meta name="author" content="Pierre" />
	<!-- Date: 2017-02-03 -->
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/foundation.min.css" />
		<link rel="stylesheet" href="css/main.css" />
</head>
<body>
<table id="myTable" class = "table table-striped table-sm">
						<tr>
							<th style=width:10%>
								Numéro 
							</th>
							<th style=width:10%>
								Nom
							</th>
							<th style=width:40%>
								Genre
							</th>
							<th style=width:40%>
								Date de naissance
							</th>
							<th style=width:40%>
								Tel
							</th>
							<th style=width:40%>
								Mail
							</th>
							<th style=width:40%>
								Adresse
							</th>
							<th style=width:40%>
								Alergènes
							</th>
						</tr>
	
<?php
	include('./inclusion/fcts_dates.inc');
	include('./inclusion/connect.php');
	$idc=connect();
	
	$num=$_GET['num'];
	
	$sql='select * from beneficiaire 
	inner join foyer on
	beneficiaire.num_fo = foyer.num_fo 
	where num_benef = \''.$num.'\'';
	$rs=pg_exec($idc, $sql);
	while($ligne=pg_fetch_assoc($rs)){
		print('<tr><td>'.$ligne['num_benef'].' </td><td>'.$ligne['nom_benef'].' </td>
		<td>'.$ligne['genre'].' </td><td>'.$ligne['date_nais_benef'].' </td><td>'.$ligne['tel_benef'].' </td>
		<td>'.$ligne['mail_benef'].' </td><td>'.$ligne['adress_fo'].' </td>
		<td>'.$ligne['alerg'].' </td></tr>');
	}
?>
</table>

</body>
</html>
