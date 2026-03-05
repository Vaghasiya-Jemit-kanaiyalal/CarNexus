<?php
include_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $car = $_POST['car'];
    $date = $_POST['date'];
    $location = $_POST['location'];

    $sql = "INSERT INTO testdrive(Name, Email, Mobile, Car, Date, Location) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $mobile, $car, $date, $location);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: ../Frontend/Confirmation.html");
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'> There is some Error: " . mysqli_error($conn) . "</p>";
    }
}
?>