<?php
/* Smarty version 3.1.39, created on 2021-03-18 15:08:02
  from '/var/www/html/TLI/templates/page1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60535ec2866578_66075024',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03d2d7a780b887f5f6d33a77a3adf8cfdad1e68d' => 
    array (
      0 => '/var/www/html/TLI/templates/page1.tpl',
      1 => 1616076330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60535ec2866578_66075024 (Smarty_Internal_Template $_smarty_tpl) {
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

<h2>Liste de toutes les pathologies</h2>

<div class="menuDuHaut">

  <a href=./index.php>Accueil</a>

    <a href=./page1.php>Liste de toutes les pathologies</a>

    <a href=./page2.php>Gestion de compte utilisateur</a>

</div>



<form action="./lancerRecherche.php">


    </br>
    <p> Remplissez au moins un des champs suivants :</p>
    <br>

    <p>Mots-clefs :
        <input type="text" placeholder="Ex : Poumon" id="mot_clef" name="mot_clef">
    </p>

    <p>Symptômes :
        <input type="text" placeholder="Ex : Baîllements" id="symptome" name="symptome">
    </p>

    <p>Pathologie :
    <input type="text" placeholder="Ex : voie luo de la rate vide" id="patho" name="patho">
    </p>

    <p>Méridiens :
        <input type="text" placeholder="Ex : Chong Mai" id="meridien" name="meridien">
    </p>

    </br>
    <?php if ($_smarty_tpl->tpl_vars['loggedin']->value == true) {?>
        <p> Filtres :</p>
        <br>

        <input type="checkbox" id="keywords_idk" name="keywords_idk" value="true">
        <label for="keywords_idk"> idk </label><br>

        <input type="checkbox" id="keywords_name" name="keywords_name" value="true" checked>
        <label for="keywords_name"> mot-clef </label><br>

        <input type="checkbox" id="keySympt_ids" name="keySympt_ids" value="true">
        <label for="keySympt_ids"> ids </label><br>

        <input type="checkbox" id="symptome_desc" name="symptome_desc" value="true" checked>
        <label for="symptome_desc"> symptome </label><br>

        <input type="checkbox" id="symptPatho_idp" name="symptPatho_idp" value="true">
        <label for="symptPatho_idp"> idp </label><br>

        <input type="checkbox" id="symptPatho_aggr" name="symptPatho_aggr" value="true">
        <label for="symptPatho_aggr"> aggr </label><br>

        <input type="checkbox" id="patho_mer" name="patho_mer" value="true">
        <label for="patho_mer"> mer </label><br>

        <input type="checkbox" id="patho_type" name="patho_type" value="true">
        <label for="patho_type"> type patho </label><br>

        <input type="checkbox" id="patho_desc" name="patho_desc" value="true" checked>
        <label for="patho_desc"> desc patho </label><br>

        <input type="checkbox" id="meridien_nom" name="meridien_nom" value="true" checked>
        <label for="meridien_nom"> nom meridien</label><br>
        
        <input type="checkbox" id="meridien_element" name="meridien_element" value="true">
        <label for="meridien_element"> element meridien </label><br>

        <input type="checkbox" id="meridien_yin" name="meridien_yin" value="true">
        <label for="meridien_yin"> yin meridien </label><br>
        <br>
    <?php }?>
    <input type="submit" value="Rechercher">

</form>


</body>
</html>
<?php }
}
