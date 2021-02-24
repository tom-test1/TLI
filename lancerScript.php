<?php
$conn = new PDO('pgsql:host=localhost;port=5432;dbname=acudb','postgres-tli','tli');

print("cest un test stp");


$sth = $conn->prepare('SELECT * FROM meridien');

$sth-> execute();

$result= $sth->fetchAll();


print_r($result);



/* include sur une page html pour recuperer les données*/
