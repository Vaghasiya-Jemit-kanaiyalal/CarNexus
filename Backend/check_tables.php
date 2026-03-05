<?php
include 'database.php';

$result = mysqli_query($conn, "SHOW TABLES LIKE 'testdrive'");
if (mysqli_num_rows($result) > 0) {
    echo "testdrive table exists.\n";
} else {
    echo "testdrive table does not exist.\n";
}

$result = mysqli_query($conn, "SHOW TABLES LIKE 'service'");
if (mysqli_num_rows($result) > 0) {
    echo "service table exists.\n";
} else {
    echo "service table does not exist.\n";
}
?>