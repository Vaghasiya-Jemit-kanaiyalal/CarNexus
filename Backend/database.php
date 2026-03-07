<?php

require "env_loader.php";

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

$conn = mysqli_connect($host,$user,$password,$dbname);

if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

?>