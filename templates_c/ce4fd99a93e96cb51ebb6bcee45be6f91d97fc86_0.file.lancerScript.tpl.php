<?php
/* Smarty version 3.1.39, created on 2021-03-21 22:56:10
  from '/var/www/html/TLI/templates/lancerScript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6057c0fa1032c7_18159942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce4fd99a93e96cb51ebb6bcee45be6f91d97fc86' => 
    array (
      0 => '/var/www/html/TLI/templates/lancerScript.tpl',
      1 => 1616074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6057c0fa1032c7_18159942 (Smarty_Internal_Template $_smarty_tpl) {
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


<div class = tableau>
  <table>
  <caption>Recherche effectuée avec les mots suivants</caption>
    <tr>
    <th>Mot-clef</th>
    <th>Patho</th>
    <th>Symptôme</th>
    <th>Méridien</th>
    </tr>
    <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['mot_clef']->value;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['patho']->value;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['symptome']->value;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['meridien']->value;?>
</td>
    </tr>
  </table>

<div class ="tableau">
  <table>
    <caption>Résultat de recherche</caption>
    <tr>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indexTab']->value, 'name');
$_smarty_tpl->tpl_vars['name']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->do_else = false;
?>
      <th><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</th>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>

    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
      <tr>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'i', false, NULL, 'col', array (
));
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?>
        <?php if (gettype($_smarty_tpl->tpl_vars['i']->value) == "boolean") {?>
            <?php if ($_smarty_tpl->tpl_vars['i']->value == 1) {?>
              <td>Vrai</td>
            <?php } else { ?>
              <td>Faux</td>
            <?php }?>
        <?php } else { ?>
          <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td> 
        <?php }?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
  </table>
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

  <input type="submit" value="Rechercher">

</form>
</body>
</html><?php }
}
