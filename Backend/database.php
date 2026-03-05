<?php
$servername = "localhost";
$username = "root";
$password = "Root@280";
$db = "Toyota";


$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}

?>