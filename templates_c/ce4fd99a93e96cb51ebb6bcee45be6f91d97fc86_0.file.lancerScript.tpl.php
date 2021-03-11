<?php
/* Smarty version 3.1.39, created on 2021-03-11 09:03:20
  from '/var/www/html/TLI/templates/lancerScript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6049cec84dd431_64301296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce4fd99a93e96cb51ebb6bcee45be6f91d97fc86' => 
    array (
      0 => '/var/www/html/TLI/templates/lancerScript.tpl',
      1 => 1615449798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6049cec84dd431_64301296 (Smarty_Internal_Template $_smarty_tpl) {
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
<h2>(AAA) Test </h2>

<div class="menuDuHaut">

    <a href=./index.html>Accueil</a>

    <a href=./page1.html>Liste de toutes les pathologies</a>

    <a href=./page2.html>Gestion de compte utilisateur</a>

    <a href=./page3.html>Liste de toutes les pathologies 2</a>

</div>
<table>
  <tr>
    <th>idk</th>
    <th>name</th>
    <th>ids</th>
    <th>desc</th>
    <th>idp</th>
    <th>aggr</th>
    <th>mer</th>
    <th>type</th>
    <th>code</th>
    <th>nom</th>
    <th>element</th>
    <th>yin</th>
  </tr>

  <tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'i', false, NULL, 'col', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_col']->value['index']++;
?>
      <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_col']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_col']->value['index'] : null)%12 == 0) {?>
        </tr><tr>
      <?php }?>
      <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tr>
</table>

</body>
</html><?php }
}
