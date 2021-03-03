<!DOCTYPE html>

<html lang="fr-FR">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="icone.png" />
  <title>Association des acupuncteurs</title>
  <link rel="stylesheet" href="indexcss.css">
</head>

<body>


<h1>Site de l'Association des Acupuncteurs soucieux de l'Accessibilité</h1>
<h2>(AAA)</h2>

<div class="menuDuHaut">

    <a href=./index.html>Accueil</a>

    <a href=./page1.html>Liste de toutes les pathologies</a>

    <a href=./page2.html>Gestion de compte utilisateur</a>

</div>



</body>
</html>






<?php
$conn = new PDO('pgsql:host=localhost;port=5432;dbname=acudb','postgres-tli','tli');

print("Cette page fonctionne correctement\n");
echo "<br />\n<br />\n";

// ____LE SCRIPT CI DESSOUS SERT A RECUPERER LES PARAMETRES DE L URL_____
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
$url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    

//echo $url;  

// Use parse_url() function to parse the URL  
// and return an associative array which 
// contains its various components 
$url_components = parse_url($url); 
  
// Use parse_str() function to parse the 
// string passed via URL 
parse_str($url_components['query'], $params); 
      
// Display result 
echo 'Le param 1 est : '.$params['param1'].', le 2eme est : '.$params['param2']; 
echo ' Le param 3 est : '.$params['mot_clef'].''; 
echo "<br />\n<br />\n";





/* include sur une page html pour recuperer les données*/



$sth = $conn->prepare('SELECT nom FROM meridien WHERE yin = FALSE');

$sth-> execute();

$result= $sth->fetchAll();


print_r($result);

