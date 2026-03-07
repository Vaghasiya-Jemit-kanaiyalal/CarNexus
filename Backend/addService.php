<?php
include 'database.php'; // Make sure database.php has your $conn connection

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $issue = $_POST['issue'];

    $sql = "INSERT INTO service(Name, Email, Mobile, Address, Issue) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $mobile, $address, $issue);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: /Frontend/Confirmation.html");
        exit();

    } else {
        echo "<p style='color:red; text-align:center;'>There is some Error: " . mysqli_error($conn) . "</p>";
    }
}
?>