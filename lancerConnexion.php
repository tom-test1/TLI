<?php

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=acudb','postgres-tli','tli');

$username = $_POST['username'];
$password = $_POST['password'];
print_r($username);
echo"<br>";
print_r($password);


$sql = "INSERT INTO public.logg VALUES ('$username', '$password')";
$stmt= $conn->prepare($sql);
$stmt->execute();

//password_hash($psw)