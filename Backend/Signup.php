<?php
include_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password !== $confirm) {
        echo "<p style='color:red; text-align:center;'>Passwords do not match!</p>";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO Signup (Username, Email, Password) 
            VALUES ('$username', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        // on successful signup, redirect to homepage with a success flag
        header("Location: ../Frontend/1index.html?success=1");
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>There is some error: " . mysqli_error($conn) . "</p>";
    }
}
?>
