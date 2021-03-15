<?php
//Check if there is an already logged in user in the cookie and then set its data to the session

if(isset($_COOKIE['user']) && !isset($_SESSION["loggedin"])) {
    $user = json_decode($_COOKIE['user'], true);

    // do the stuff to check if there is a user with $user['username'] and $user['password'] in the database, then if there is one, do as below :
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $userId; // retrieved from database
    $_SESSION["username"] = $user['username'];
    // else if there is no user with that credentials from cookie, do the following to prevent further checking on database :
    $_SESSION["loggedin"] = false;

}

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

}
$_SESSION['stayConnected']; 