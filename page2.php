<!-- <!DOCTYPE html>

<html lang="fr-FR">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="icone.png" />
  <title>Association des acupuncteurs</title>
  <link rel="stylesheet" href="indexcss.css">
</head>

<body>


<h1>Site de l'Association des Acupuncteurs soucieux de l'Accessibilité</h1>

<h2>(AAAc)</h2>

<div class="menuDuHaut">

    <a href=./index.php>Accueil</a>

    <a href=./page1.php>Liste de toutes les pathologies</a>

    <a href=./page2.php>Gestion de compte utilisateur</a>
    
</div> -->

<?php
require_once('./smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('/var/www/html/TLI/templates');
$smarty->setCompileDir('/var/www/html/TLI/templates_c/');
$smarty->setCacheDir('/var/www/html/TLI/cache/');
if(isset($_COOKIE['user'])){
  $user = json_decode($_COOKIE['user'], true);
  if(isset($user["loggedin"])){
    if($user["loggedin"] == "true"){
      $loggedin = $user["loggedin"];
      $username = $user["username"];
      $password = $user["password"];
      $smarty->assign('username',$username);
      $smarty->assign('password',$password);
    }
  }
}
else{
  $loggedin = false;
}
$smarty->assign('loggedin',$loggedin);
$smarty->display('page2.tpl');

?>

