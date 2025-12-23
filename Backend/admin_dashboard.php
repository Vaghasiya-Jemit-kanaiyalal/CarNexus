<?php
session_start();
include_once("database.php");

if (!isset($_SESSION["Jemit"])) {
    header("Location: ../Frontend/adminpanel.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        h2,
        h3 {
            text-align: center;
        }

        hr {
            border: none;
            border-top: 3px solid #3498db;
            margin: 40px 0;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-bottom: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            min-width: 700px;
        }

        th,
        td {
            padding: 14px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tr:nth-child(even) {
            background-color: #f2f6fa;
        }

        tr:hover {
            background-color: #d0e6f7;
        }

        /* Buttons at bottom */
        .action-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            color: #fff;
            transition: 0.3s;
        }

        .logout-btn {
            background-color: #e74c3c;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .delete-btn {
            background-color: #e67e22;
        }

        .delete-btn:hover {
            background-color: #d35400;
        }

        .update-btn {
            background-color: #2ecc71;
        }

        .update-btn:hover {
            background-color: #27ae60;
        }

        .button-container {
            text-align: center;
            margin-top: 40px;
        }

        @media screen and (max-width:768px) {
            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 10px 12px;
            }
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <h2>Welcome,Jemit(Admin)!</h2>

        <hr>
        <h2>Test Drive Records</h2>
        <div class="table-container">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM testdrive");
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Mobile</th><th>Car</th><th>Date</th><th>Location</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
        <td>" . htmlspecialchars($row['Name']) . "</td>
        <td>" . htmlspecialchars($row['Email']) . "</td>
        <td>" . htmlspecialchars($row['Mobile']) . "</td>
        <td>" . htmlspecialchars($row['Car']) . "</td>
        <td>" . htmlspecialchars($row['Date']) . "</td>
        <td>" . htmlspecialchars($row['Location']) . "</td>
    </tr>";
            }
            echo "</table>";
            ?>
        </div>

        <hr>
        <h2>Service Booking Records</h2>
        <div class="table-container">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM service");
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Mobile</th><th>Address</th><th>Issue</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
        <td>" . htmlspecialchars($row['Name']) . "</td>
        <td>" . htmlspecialchars($row['Email']) . "</td>
        <td>" . htmlspecialchars($row['Mobile']) . "</td>
        <td>" . htmlspecialchars($row['Address']) . "</td>
        <td>" . htmlspecialchars($row['Issue']) . "</td>
    </tr>";
            }
            echo "</table>";
            mysqli_close($conn);
            ?>
        </div>

        <!-- Action Buttons at the bottom -->
        <div class="button-container">

            <a href="update_testdrive.php" class="action-btn update-btn">Update Testdrive</a>
            <a href="update_service.php" class="action-btn update-btn">Update Service</a>
            <a href="delete_testdrive.php" class="action-btn delete-btn">Delete Test Drive Records</a>
            <a href="delete_service.php" class="action-btn delete-btn">Delete Service Records</a>
            <a href="admin_logout.php" class="action-btn logout-btn">Logout</a>


        </div>

    </div> <!-- End wrapper -->

</body>

</html>