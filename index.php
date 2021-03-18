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
    }
  }
}
else{
  $loggedin = false;
}
$smarty->assign('loggedin',$loggedin);
$smarty->display('index.tpl');

?>