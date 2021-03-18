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
</html>