<?php
/* Smarty version 3.1.39, created on 2021-03-18 14:18:17
  from '/var/www/html/TLI/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605353198efcb9_49909594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45a9fc8a18a64f8b6f8d84e71de82334d9d40bae' => 
    array (
      0 => '/var/www/html/TLI/templates/index.tpl',
      1 => 1616073484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_605353198efcb9_49909594 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

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

    <a href=./index.php>Accueil</a>

    <a href=./page1.php>Liste de toutes les pathologies</a>

    <a href=./page2.php>Gestion de compte utilisateur</a>

</div>
<?php if ($_smarty_tpl->tpl_vars['loggedin']->value == 'true') {?>
    <div class="formulaire">
    <form action="./lancerConnexion.php" method=POST>
        <h1>Connexion</h1>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
        <br>
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <br>
        <input type="checkbox" id="stayConnected" name="stayConnected" value="true" checked>
        <label for="stayConnected"> Rester connecté </label>
        <br><br>
        <input type="submit" value="Connexion">
    </form>
    </div>

    <div class="formulaire">
    <form action="./lancerInscription.php" method=POST>
        <h1>Inscription</h1>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
        <br>
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <br><br>
        <input type="submit" value="Inscription">
    </form>
    </div>

    <div class="formulaire">
    <form action="./lancerRecherche.php">
        <label for="pathos">Pathologie recherchée :</label>
        <input type="text" id="pathos" name="pathos_name"/>
        <br><br>
        <input type="submit" value="Rechercher">
    </form> 
    </div>
<?php }?>

<div class="formulaire">
  <form action="./effacerCookie.php">
   
    <br>
    <input type="submit" value="SE DECONNECTER">
  </form> 
</div>
</body>
</html><?php }
}
