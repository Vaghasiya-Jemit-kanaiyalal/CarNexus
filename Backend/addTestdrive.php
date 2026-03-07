<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include_once('database.php');

// Handle CORS preflight request
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    exit(0);
}

// Handle actual form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

        echo json_encode([
            "status" => "success",
            "message" => "Test drive booked"
        ]);

    } else {
        echo json_encode([
            "status" => "error",
            "message" => mysqli_error($conn)
        ]);
    }
}
?>