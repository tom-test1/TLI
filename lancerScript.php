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
INNER JOIN symptpatho ON symptpatho.idse = symptome.ids 
INNER JOIN patho ON patho.idp = symptpatho.idp 
INNER JOIN meridien ON meridien.code = patho.mer WHERE nom = 'Poumon'");
*/

echo 'Test 1 : <br>';
$testt= "SELECT * FROM keywords ";
$sth = $conn->prepare($testt);
echo '<br>';

echo 'Test 2 : <br>';

$sth = $conn->prepare("SELECT * FROM keywords 
INNER JOIN keysympt ON keywords.idk = keysympt.idk 
INNER JOIN symptome ON symptome.ids = keysympt.ids 
INNER JOIN symptpatho ON symptpatho.ids = symptome.ids
INNER JOIN patho ON patho.idp = symptpatho.idp 
INNER JOIN meridien ON meridien.code = patho.mer WHERE patho.type = :patho");

//$sth->bindParam(':mot_clef',$mot_clef,PDO::PARAM_STR);
$sth->bindParam(':patho',$patho,PDO::PARAM_STR);
/*$sth->bindParam(':symptome',$symptome,PDO::PARAM_STR);
$sth->bindParam(':meridien',$meridien,PDO::PARAM_STR);*/


echo 'Test 3 : <br>';
var_dump('anxiété');
echo '<br>';
var_dump($patho);
echo '<br>';
echo '<br>';

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

$smarty->assign('result',$result);
$smarty->display('lancerScript.tpl');

print_r($result);



