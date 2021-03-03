<?php
require_once('./smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('/var/www/html/TLI/templates');
$smarty->setCompileDir('/var/www/html/TLI/templates_c/');
$smarty->setCacheDir('/var/www/html/TLI/cache/');

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=acudb','postgres-tli','tli');

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
/*echo 'recherche effectuée avec :<br /><br />';
echo 'Pathologie : '.$params['patho'].'<br />';
echo 'Symptome : '.$params['symptome'].'<br />';
echo 'Mot clef : '.$params['mot_clef'].'<br />'; 

echo "<br />\n<br />\n";*/

/* include sur une page html pour recuperer les données*/



$sth = $conn->prepare('SELECT * FROM meridien WHERE yin = FALSE');

$sth-> execute();

$result= $sth->fetchAll(PDO::FETCH_NUM);

$smarty->assign('result',$result);
$smarty->display('lancerScript.tpl');

print_r($result);

