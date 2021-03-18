<?php

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


$name = $params['user_name'];
$forename= $params['user_forename'];
$birthdate = $params['user_birthdate'];
if(isset($_COOKIE['user'])){
    $user = json_decode($_COOKIE['user'], true);
    if(isset($user["loggedin"])){
      if($user["loggedin"] == "true"){
        $loggedin = $user["loggedin"];
        $username = $user["username"];
        $password = $user["password"];
      }
    }
  }

$sql = "UPDATE public.logg SET name = :name, surname = :forename, birthdate = :birthdate WHERE username = :username";

$stmt= $conn->prepare($sql);
$stmt->bindParam(':username',$username ,PDO::PARAM_STR);
$stmt->bindParam(':name',$name ,PDO::PARAM_STR);
$stmt->bindParam(':forename',$forename ,PDO::PARAM_STR);
$stmt->bindParam(':birthdate',$birthdate ,PDO::PARAM_STR);
$stmt->execute();