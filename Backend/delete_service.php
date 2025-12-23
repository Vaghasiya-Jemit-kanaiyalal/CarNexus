<!-- <?php
include 'database.php';
session_start();
if (!isset($_SESSION["Jemit"])) {
    header("Location: ../Frontend/adminpanel.html");
    exit;
}

// ---------------------------
// Handle deletion if form submitted
// ---------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $del_id = intval($_POST['id']); // Get ID from POST
    $delete_sql = "DELETE FROM service WHERE id=$del_id";
    mysqli_query($conn, $delete_sql);
    header("Location: admin_dashboard.php"); // redirect to dashboard
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Delete Service Records</title>
<style>
body {font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f4f6f8; padding:20px;}
h2 {text-align:center;}
table {width:100%; border-collapse:collapse; margin:20px 0; background:#fff; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
th, td {padding:12px; border-bottom:1px solid #ddd; text-align:left;}
th {background:#3498db; color:#fff;}
tr:nth-child(even){background:#f2f6fa;}
tr:hover{background:#d0e6f7;}
.delete-btn {background:#e74c3c; color:#fff; padding:6px 12px; border:none; border-radius:4px; cursor:pointer;}
.delete-btn:hover {background:#c0392b;}
form {margin:0;} /* keep form inline in table */
</style>
</head>
<body>

<h2>Service Records</h2>
<table>
<tr>
<th>Name</th><th>Email</th><th>Mobile</th><th>Address</th><th>Issue</th><th>Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM service");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>".htmlspecialchars($row['Name'])."</td>
        <td>".htmlspecialchars($row['Email'])."</td>
        <td>".htmlspecialchars($row['Mobile'])."</td>
        <td>".htmlspecialchars($row['Address'])."</td>
        <td>".htmlspecialchars($row['Issue'])."</td>
        <td>
            <!-- Form for deletion using POST -->
            <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this record?\");'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <button type='submit' name='delete' class='delete-btn'>Delete</button>
            </form>
        </td>
    </tr>";
}
?>
</table>

</body>
</html> -->
