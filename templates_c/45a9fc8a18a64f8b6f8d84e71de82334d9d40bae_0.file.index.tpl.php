<?php
/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6053569475fed0_82547237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45a9fc8a18a64f8b6f8d84e71de82334d9d40bae' => 
    array (
      0 => '/var/www/html/TLI/templates/index.tpl',
      1 => 1616074379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6053569475fed0_82547237 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php if ($_smarty_tpl->tpl_vars['loggedin']->value == false) {?>
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
<?php } else { ?>
  <div class="formulaire">
<<<<<<< HEAD
    <p>Connecté en tant que <?php echo $_smarty_tpl->tpl_vars['loggedin']->value;?>
</p>
=======
    <p>Connecté en tant que <b><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</b></p>
>>>>>>> 32cb10e7936429995c30c269a5351e918c7ba5f7
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
