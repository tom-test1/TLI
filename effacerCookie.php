<?php

if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', '', time() - 3600, '/'); // empty value and old timestamp
    var_dump($_COOKIE, time() -3600);
}




echo '<a href="/TLI/index.html">Continuer</a>';

