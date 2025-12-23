<?php
session_start();


$admin_user = "Jemit";
$admin_pass = "toyotaIsgreAt"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION["Jemit"] = $username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "<h3 style='color:red; text-align:center;'>Invalid username or password!</h3>";
    }
}
?>
