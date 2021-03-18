<?php

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


$mot_clef = $params['user_name'];
$patho = $params['patho'];
$symptome = $params['symptome'];
$meridien = $params['meridien'];