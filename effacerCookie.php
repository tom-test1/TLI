<?php

if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', '', time() - 3600, '/'); // empty value and old timestamp
}


echo '<a href="/TLI/index.html">Continuer</a>';

