<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "power tycoon";

try{
    $db = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connect > ok";

}catch(PDOException $e){
    echo $e;
}