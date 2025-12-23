<?php
session_start();

$valid_username = "jemit";
$valid_password = "12345";

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    setcookie("username", "", time() - 3600, "/"); 
    echo "You have been logged out. <a href='index.html'>Login again</a>";
    exit();
}

if (isset($_SESSION['username']) || isset($_COOKIE['username'])) {
    $user = $_SESSION['username'] ?? $_COOKIE['username'];
    echo "Welcome back, <b>$user</b>! <br><a href='auth.php?logout=true'>Logout</a>";
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;

        if (isset($_POST['remember'])) {
            setcookie("username", $username, time() + (86400), "/");
        }

        echo "Login successful! Welcome, <b>$username</b>. <br><a href='auth.php?logout=true'>Logout</a>";
    } else {
        echo "Invalid credentials. <a href='index.html'>Try again</a>";
    }
}
?>