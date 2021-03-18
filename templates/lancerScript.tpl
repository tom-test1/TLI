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
<h2>(AAA)</h2>

<div class="menuDuHaut">

    <a href=./index.html>Accueil</a>

    <a href=./page1.html>Liste de toutes les pathologies</a>

    <a href=./page2.html>Gestion de compte utilisateur</a>
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
    <td>{$mot_clef}</td>
    <td>{$patho}</td>
    <td>{$symptome}</td>
    <td>{$meridien}</td>
    </tr>
  </table>

<div class ="tableau">
  <table>
    <caption>Résultat de recherche</caption>
    <tr>
      {foreach from = $indexTab item = name}
      <th>{$name}</th>
      {/foreach}
    </tr>

    
    {foreach from = $result item = row}
      <tr>
      {foreach from = $row item = i name = col}
        {if gettype($i) == "boolean"}
            {if $i == 1}
              <td>Vrai</td>
            {else}
              <td>Faux</td>
            {/if}
        {else}
          <td>{$i}</td> 
        {/if}
      {/foreach}
      </tr>
    {/foreach}
    
  </table>
</div>
</body>

</body>
</html>