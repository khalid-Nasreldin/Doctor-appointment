<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "main_db";

$mysqli = new mysqli(hostname:$host, username:$username, password:$password, database:$database);

if($mysqli->error){
    die("Connection error" . $mysqli->error);
}

return $mysqli;