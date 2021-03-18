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
<h2>Accueil</h2>

<div class="menuDuHaut">

    <a href=./index.php>Accueil</a>

    <a href=./page1.php>Liste de toutes les pathologies</a>

    <a href=./page2.php>Gestion de compte utilisateur</a>

</div>
{if $loggedin == false}
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
{else}
  <div class="formulaire">
    <p>Connecté en tant que <b>{$username}</b></p>
  </div>
{/if}

<div class="formulaire">
  <form action="./effacerCookie.php">
   
    <br>
    <input type="submit" value="SE DECONNECTER">
  </form> 
</div>
</body>
</html>