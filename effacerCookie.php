<meta http-equiv="refresh" content="1.5; url=./index.php">

<?php

if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', '', time() - 3600, '/'); // empty value and old timestamp
    //var_dump($_COOKIE, time() -3600);
}

echo 'Vous avez bien été déconnecté.<br>';
echo 'Vous allez être redirigé... <a href="/TLI/index.php">Continuer</a>';

?>
