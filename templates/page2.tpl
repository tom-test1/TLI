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

<h2>Gestion compte utilisateur</h2>

<div class="menuDuHaut">

    <a href=./index.php>Accueil</a>

    <a href=./page1.php>Liste de toutes les pathologies</a>

    <a href=./page2.php>Gestion de compte utilisateur</a>
    
</div>


{if $loggedin == 'true'}
    <div class ="formulaireModif">
    <p>Connecté en tant que <b>{$username}</b></p>
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
{else}
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
{/if}


</body>
</html>