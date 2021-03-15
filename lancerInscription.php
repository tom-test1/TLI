<?php

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=acudb','postgres-tli','tli');

$username = $_POST['username'];
$password = $_POST['password'];
print_r("username : ".$username);
echo"<br>";
print_r("password : ".$password);
echo"<br>";



//////////////
$sth = $conn->prepare("SELECT * FROM logg WHERE logg.username = '$username'");


//REMPLACEMENT VARIABLE (++securité)

//$sth->bindParam(':mot_clef',$LIKEmot_clef ,PDO::PARAM_STR);

//LANCER LA REQUETE SQL
$sth-> execute();

//facon d'affichger le resultat
$result= $sth->fetchAll(PDO::FETCH_NUM);

print_r($result);
/////////////////

//if username existe pas, alors : ajouter

$sql = "INSERT INTO public.logg VALUES ('$username', '$password')";
$stmt= $conn->prepare($sql);
$stmt->execute();

//password_hash($psw)