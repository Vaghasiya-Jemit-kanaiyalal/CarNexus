<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $car = trim($_POST['car']);
    $date = trim($_POST['date']);
    $location = trim($_POST['location']);


    $data = "Name: $name | Email: $email | Mobile: $mobile | Car: $car | Date: $date | Location: $location" . PHP_EOL;


    $file = "../Datafile/TestdriveData.txt";

    
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {

        header("Location: ../Frontend/Confirmation.html");
        exit;
    } else {
        echo "<h2>Error saving your booking. Please try again later.</h2>";
    }
} else {
    echo "<h3>No data received.</h3>";
}
?>
