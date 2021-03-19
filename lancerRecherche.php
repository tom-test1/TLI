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
$indexArray = array ();

$LIKEmot_clef = "%".$mot_clef."%";
$LIKEpatho = "%".$patho."%";
$LIKEsymptome = "%".$symptome."%";
$LIKEmeridien = "%".$meridien."%";
$selectTab = "";


if (isset($params['keywords_idk'])){
    array_push($indexArray, "idk");
    $selectTab = $selectTab."keywords.idk, ";
}

if (isset($params['keywords_name'])){
    array_push($indexArray, "mot-clef");
    $selectTab = $selectTab."keywords.name, ";
}

if (isset($params['keySympt_ids'])){
    array_push($indexArray, "ids");
    $selectTab = $selectTab."keySympt.ids, ";
}

if (isset($params['symptome_desc'])){
    array_push($indexArray, "symptome");
    $selectTab = $selectTab."symptome.desc, ";
}

if (isset($params['symptPatho_idp'])){
    array_push($indexArray, "idp");
    $selectTab = $selectTab."symptPatho.idp, ";
}

if (isset($params['symptPatho_aggr'])){
    array_push($indexArray, "aggr");
    $selectTab = $selectTab."symptPatho.aggr, ";
}

if (isset($params['patho_mer'])){
    array_push($indexArray, "patho mer");
    $selectTab = $selectTab."patho.mer, ";
}

if (isset($params['patho_type'])){
    array_push($indexArray, "type");
    $selectTab = $selectTab."patho.type, ";
}

if (isset($params['patho_desc'])){
    array_push($indexArray, "patho");
    $selectTab = $selectTab."patho.desc, ";
}

if (isset($params['meridien_nom'])){
    array_push($indexArray, "nom meridien");
    $selectTab = $selectTab."meridien.nom, ";
}

if (isset($params['meridien_element'])){
    array_push($indexArray, "element");
    $selectTab = $selectTab."meridien.element, ";
}

if (isset($params['meridien_yin'] )){
    array_push($indexArray, "yin");
    $selectTab = $selectTab."meridien.yin, ";
}

if ($selectTab != ""){
    $selectTab = chop($selectTab,", ");
} else{
    $selectTab = "keywords.idk, keywords.name, symptome.ids, symptome.desc, symptpatho.idp, symptpatho.aggr, patho.mer, patho.type, patho.desc, meridien.nom, meridien.element, meridien.yin";
    array_push($indexArray, "idk");
    array_push($indexArray, "mot-clef");
    array_push($indexArray, "ids");
    array_push($indexArray, "symptome");
    array_push($indexArray, "idp");
    array_push($indexArray, "aggr");
    array_push($indexArray, "patho mer");
    array_push($indexArray, "type");
    array_push($indexArray, "patho");
    array_push($indexArray, "nom meridien");
    array_push($indexArray, "element");
    array_push($indexArray, "yin");
}


// test débugger :
/*echo '$selectTab = ';
print_r( $selectTab);
echo '<br>';
echo '$indexArray = ';
print_r( $indexArray);
echo '<br>';*/

// REQUETE SQL
//SELECT keywords.idk, keywords.name, symptome.ids, symptome.desc, symptpatho.idp, symptpatho.aggr,
//patho.mer, patho.type, patho.desc, meridien.nom, meridien.element, meridien.yin
//FROM keywords 

$sql = "SELECT ".$selectTab." FROM keywords 
INNER JOIN keysympt ON keywords.idk = keysympt.idk 
INNER JOIN symptome ON symptome.ids = keysympt.ids 
INNER JOIN symptpatho ON symptpatho.ids = symptome.ids
INNER JOIN patho ON patho.idp = symptpatho.idp 
INNER JOIN meridien ON meridien.code = patho.mer 
WHERE keywords.name LIKE :mot_clef 
AND patho.desc LIKE :patho 
AND symptome.desc LIKE :symptome 
AND meridien.nom LIKE :meridien";

$sth = $conn->prepare($sql);


//REMPLACEMENT VARIABLE (++securité)
$sth->bindParam(':mot_clef',$LIKEmot_clef ,PDO::PARAM_STR);
$sth->bindParam(':patho',   $LIKEpatho    ,PDO::PARAM_STR);
$sth->bindParam(':symptome',$LIKEsymptome ,PDO::PARAM_STR);
$sth->bindParam(':meridien',$LIKEmeridien ,PDO::PARAM_STR);


//LANCER LA REQUETE SQL
$sth-> execute();

//facon d'affichger le resultat
$result= $sth->fetchAll(PDO::FETCH_NUM);
//$result= $sth->fetchAll(PDO::FETCH_ASSOC);


$smarty->assign('result',$result);
$smarty->assign('mot_clef',$mot_clef);
$smarty->assign('patho',$patho);
$smarty->assign('symptome',$symptome);
$smarty->assign('meridien',$meridien);
$smarty->assign('indexTab',$indexArray);
$smarty->display('lancerScript.tpl');
