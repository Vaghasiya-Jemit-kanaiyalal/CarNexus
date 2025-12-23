<?php
$servername = "	sql107.infinityfree.com";
$username = "if0_40130204";
$password = "Yu9ykdozl1uNj";
$db = "if0_40130204_gadighar";


$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}

?>