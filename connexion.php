<?php
$database = "mysql:host=localhost;dbname=efm";
$user = "root";
$password = "Slme@1234";
try {
    $connexion = new PDO($database, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
