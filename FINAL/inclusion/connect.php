<?php
function connect(){
	$idc=pg_connect('host=localhost user=postgres password=postgres dbname=projet');
	return($idc);
}
?>

