<meta http-equiv="refresh" content="2; url=./index.php">
<?php

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=acudb','postgres-tli','tli');

$username = $_POST['username'];
//$password = $_POST['password'];
$passwordSha = sha1($_POST['password']);

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
                echo "cet username existe deja..<br>";
                $username_exist = 1;
            }
        }
        if ($key2 == 1){
            //echo "Password : {$key2} <br>";
        }
    }
}

//if username existe pas, alors : ajouter
if (!$username_exist){
    $sql = "INSERT INTO public.logg VALUES ('$username', '$passwordSha')";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    echo "Votre compte a bien été crée !<br>";
} else{
    echo "Votre compte n'a pas été crée !<br>";
}

echo 'Vous allez être redirigé... <a href="/TLI/index.php">Continuer</a>';