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

    <a href=./page3.html>Liste de toutes les pathologies 2</a>

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

$mot_clef = $params['mot_clef'];
$patho = $params['patho'];
$symptome = $params['symptome'];
$meridien = $params['meridien'];

// Display result 
echo 'recherche effectuée avec :<br /><br />';
echo 'Mot clef : '.$mot_clef.'<br />'; 
echo 'Pathologie : '.$patho.'<br />';
echo 'Symptome : '.$symptome.'<br />';
echo 'Meridien : '.$meridien.'<br />'; 


echo "<br /><br />";





/* include sur une page html pour recuperer les données*/

if ($params['meridien'] != "none")
    echo "test" ;
    echo" <br>" ;

//   celle-ci fonctionne :
/*$sth = $conn->prepare("SELECT * FROM keywords 
INNER JOIN keysympt ON keywords.idk = keysympt.idk 
INNER JOIN symptome ON symptome.ids = keysympt.ids 
INNER JOIN symptpatho ON symptpatho.ids = symptome.ids 
INNER JOIN patho ON patho.idp = symptpatho.idp 
INNER JOIN meridien ON meridien.code = patho.mer WHERE nom = 'Poumon'");
*/

$sth = $conn->prepare("SELECT * FROM keywords 
INNER JOIN keysympt ON keywords.idk = keysympt.idk 
INNER JOIN symptome ON symptome.ids = keysympt.ids 
INNER JOIN symptpatho ON symptpatho.ids = symptome.ids 
INNER JOIN patho ON patho.idp = symptpatho.idp 
INNER JOIN meridien ON meridien.code = patho.mer WHERE keywords.name = 'absence' ");


//$sth = $conn->prepare("SELECT * FROM keywords WHERE name = 'absence'");

$sth-> execute();

//$result= $sth->fetchAll(PDO::FETCH_NUM);
$result= $sth->fetchAll(PDO::FETCH_ASSOC);


print "name   |  ids  | <br><br>";
 



foreach ($result as $row) {
    foreach ($row as $col=>$val) {
        $g = gettype($val);
        if (gettype($val) == "boolean")
            echo $val ? 'Vrai' : 'Faux';
        print " $col  : $val ; $g |";
    }
    print "<br>";
}  


print_r($result);



