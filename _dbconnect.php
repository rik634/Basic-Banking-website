<?php

// Connecting to database 
$server = "localhost";
$username = "root";
$password = "12345";
$database = "customers-1";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn){
    die("error : ".mysqli_connect_error());
}

?>