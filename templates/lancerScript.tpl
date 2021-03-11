<!DOCTYPE html>

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
  {foreach from = $result item = row}
    {foreach from = $row item = i name = col}
      {if $smarty.foreach.col.index % 12 == 0}
        </tr><tr>
      {/if}
      <td>{$i}</td>
    {/foreach}
  {/foreach}
  </tr>
</table>

</body>
</html>