<?php
header("Content-Type: application/json; charset=UTF-8");

$conn = pg_connect("host=localhost port=5432 dbname=projet user=postgres password=postgres");
$result = pg_query($conn, "SELECT * FROM foyer
inner join beneficiaire
on beneficiaire.num_fo = foyer.num_fo
inner join  commande_semaine 
on commande_semaine.num_fo = foyer.num_fo");
$outp = pg_fetch_all($result);

echo json_encode($outp);
?>