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
$indexTab = "";

$LIKEmot_clef = "%".$mot_clef."%";
$LIKEpatho = "%".$patho."%";
$LIKEsymptome = "%".$symptome."%";
$LIKEmeridien = "%".$meridien."%";

if (isset($params['keywords_idk'])){
    $indexTab = $indexTab."idk;";
}

if (isset($params['keywords_name'])){
    $indexTab = $indexTab."mot-clef;";
}

if (isset($params['keySympt_ids'])){
    $indexTab = $indexTab."ids;";
}

if (isset($params['symptome_desc'])){
    $indexTab = $indexTab."symptome;";
}

if (isset($params['symptPatho_idp'])){
    $indexTab = $indexTab."idp;";
}

if (isset($params['symptPatho_aggr'])){
    $indexTab = $indexTab."aggr;";
}

if (isset($params['patho_mer'])){
    $indexTab = $indexTab."patho mer;";
}

if (isset($params['patho_type'])){
    $indexTab = $indexTab."type;";
}

if (isset($params['patho_desc'])){
    $indexTab = $indexTab."patho;";
}

if (isset($params['meridien_nom'])){
    $indexTab = $indexTab."nom meridien;";
}

if (isset($params['meridien_element'])){
    $indexTab = $indexTab."element;";
}

if (isset($params['meridien_yin'] )){
    $indexTab = $indexTab."yin;";
}


// test pour clément :
echo '$indexTab = ';
echo $indexTab;


// REQUETE SQL
$sth = $conn->prepare("SELECT keywords.idk, keywords.name, symptome.ids, symptome.desc, symptpatho.idp, symptpatho.aggr,
patho.mer, patho.type, patho.desc, meridien.nom, meridien.element, meridien.yin
FROM keywords 
INNER JOIN keysympt ON keywords.idk = keysympt.idk 
INNER JOIN symptome ON symptome.ids = keysympt.ids 
INNER JOIN symptpatho ON symptpatho.ids = symptome.ids
INNER JOIN patho ON patho.idp = symptpatho.idp 
INNER JOIN meridien ON meridien.code = patho.mer 
WHERE keywords.name LIKE :mot_clef 
AND patho.desc LIKE :patho 
AND symptome.desc LIKE :symptome 
AND meridien.nom LIKE :meridien");

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


/*
foreach ($result as $row) {
    foreach ($row as $col=>$val) {
        $g = gettype($val);
        if (gettype($val) == "boolean")
            echo $val ? 'Vrai' : 'Faux';
        print " $col  : $val ; $g |";
    }
    print "<br>";
}
*/


$smarty->assign('result',$result);
$smarty->assign('mot_clef',$mot_clef);
$smarty->assign('patho',$patho);
$smarty->assign('symptome',$symptome);
$smarty->assign('meridien',$meridien);
$smarty->display('lancerScript.tpl');

