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
<ul>
{foreach from = $result item = row}
{foreach from = $row item = col}
<li>{$col  }</li>
{/foreach}
</br>
{/foreach}
</ul>

</body>
</html>