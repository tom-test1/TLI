<?php
/* Smarty version 3.1.39, created on 2021-03-18 15:08:05
  from '/var/www/html/TLI/templates/page2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60535ec5dab6c0_16887983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e281b75189402bcc06a12c51f9ef19c96bc6195' => 
    array (
      0 => '/var/www/html/TLI/templates/page2.tpl',
      1 => 1616076330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60535ec5dab6c0_16887983 (Smarty_Internal_Template $_smarty_tpl) {
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

<h2>Gestion compte utilisateur</h2>

<div class="menuDuHaut">

    <a href=./index.php>Accueil</a>

    <a href=./page1.php>Liste de toutes les pathologies</a>

    <a href=./page2.php>Gestion de compte utilisateur</a>
    
</div>


<?php if ($_smarty_tpl->tpl_vars['loggedin']->value == 'true') {?>
    <div class ="formulaireModif">
    <p>Connecté en tant que <b><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</b></p>
        <p>Changez ici vos informations utilisateur</p>
        <form action="modifBddUser.php">
            <div class = "insideForm">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="user_name">
            </div>
        <div class = "insideForm">
            <label for="forename">Prenom : </label>
            <input type="text" id="forename" name="user_forename">
        </div>
        <div class = "insideForm">
            <label for="forename">Date de naissance: </label>
            <input type="date" id="birthdate" name="user_birthdate" value="2021-03-15" min="1930-01-01" max="2020-12-31">
        </div>
        <div class = "insideForm">
            <input type="submit" value="Modifier mes informations utilisateur">
        </div>
        </form>
    </div>
<?php } else { ?>
    <div>
        <div class="formulaire">
        <p>Vous devez être connecté pour pouvoir modifier vos informations</p>
            <form action="./lancerConnexion.php" method=POST>
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                <br>
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                <br>
                <input type="checkbox" id="stayConnected" name="stayConnected" value="true">
                <label for="stayConnected"> Rester connecté </label>
                <br><br>
                <input type="submit" value="Connexion">
            </form>
        </div>
    </div>
<?php }?>


</body>
</html><?php }
}
