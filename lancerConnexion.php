<?php

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=acudb','postgres-tli','tli');

$username = $_POST['username'];
//$password = $_POST['password'];
$passwordSha = sha1($_POST['password']);
$stayConnected = 0;
if (isset($_POST['stayConnected'] )){
    $stayConnected = ($_POST['stayConnected']);
}


$sth = $conn->prepare("SELECT * FROM logg WHERE logg.username = :username");

//REMPLACEMENT VARIABLE (++securité)
$sth->bindParam(':username',$username ,PDO::PARAM_STR);

//LANCER LA REQUETE SQL
$sth-> execute();

//facon d'affichger le resultat
$result= $sth->fetchAll(PDO::FETCH_NUM);

$username_exist = 0;
foreach ($result as $key => $value) {
    foreach ($value as $key2 => $value2) {
        if ($key2 == 0){
            //echo "Username : {$value2} <br>";
            if ($value2 == $username){
                $username_exist = 1;
            }
        }
        if ($key2 == 1){
            //echo "Password : {$key2} <br>";
        }
    }
}

if ($username_exist){
    if ($passwordSha == $value2){
        echo "Connexion réussie !<br>";
        if ($stayConnected == true){
            session_start();
            $_SESSION['stayConnected'] = 1;
            // store user data in cookie
            setcookie('user', json_encode([
            'username' => $username,
            'password' => $passwordSha,
            'loggedin' => "true"
            ]), time() + 3600 * 24 ); //rester connecté sur 24h
        }

    } else {
        echo "Mot de passe incorrect !<br>";
    }
}else{
    echo "Cet username n'existe pas !<br>";
}

echo '<a href="/TLI/index.html">Continuer</a>';
