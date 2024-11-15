<?php
$serverName="127.0.0.1";
$username="root";
$password= "";
$dbname= "proyecto_recetas_prog_web";

try{
    $conn = new PDO("mysql:host=".$serverName.";dbname=".$dbname.";charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
    echo "error".$e ->getMessage();
}