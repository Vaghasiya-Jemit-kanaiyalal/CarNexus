<?php
include 'database.php';
session_start();
if (!isset($_SESSION["Jemit"])) {
    header("Location: ../Frontend/adminpanel.html");
    exit;
}

// Check if a row is selected for editing
$edit_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['Mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
    $issue = mysqli_real_escape_string($conn, $_POST['Issue']);

    $update_sql = "UPDATE service 
                   SET Name='$name', Email='$email', Mobile='$mobile', Address='$address', Issue='$issue' 
                   WHERE id=$id";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: admin_dashboard.php"); // redirect to dashboard
        exit();
    } else {
        echo "<p style='color:red;text-align:center;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Service Record</title>
<style>
body {font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f4f6f8; padding:20px;}
h2 {text-align:center;}
table {width:100%; border-collapse:collapse; margin:20px 0; background:#fff; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
th, td {padding:12px; border-bottom:1px solid #ddd; text-align:left;}
th {background:#3498db; color:#fff;}
tr:nth-child(even){background:#f2f6fa;}
tr:hover{background:#d0e6f7;}
.update-btn {background:#2ecc71; color:#fff; padding:6px 12px; border:none; border-radius:4px; text-decoration:none;}
.update-btn:hover {background:#27ae60;}
form {background:#fff; padding:20px; border-radius:8px; max-width:500px; margin:20px auto; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
label {display:block; margin-top:10px; font-weight:bold;}
input[type=text] {width:100%; padding:8px; margin-top:5px; border-radius:4px; border:1px solid #ccc;}
button {margin-top:15px; padding:10px 20px; border:none; border-radius:5px; background:#2ecc71; color:white; cursor:pointer; font-weight:bold;}
button:hover {background:#27ae60;}
a {display:inline-block; margin-top:20px; text-decoration:none; color:#3498db;}
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
        <td><a href='update_service.php?id=".$row['id']."' class='update-btn'>Update</a></td>
    </tr>";
}
?>
</table>

<?php
// Show update form if a row is selected
if ($edit_id > 0) {
    $edit_sql = "SELECT * FROM service WHERE id=$edit_id";
    $edit_result = mysqli_query($conn, $edit_sql);
    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $edit_row = mysqli_fetch_assoc($edit_result);
        ?>
        <h2>Update Service Record</h2>
        <form method="post" action="update_service.php">
            <input type="hidden" name="id" value="<?php echo $edit_row['id']; ?>">

            <label>Name:</label>
            <input type="text" name="Name" value="<?php echo htmlspecialchars($edit_row['Name']); ?>" required>

            <label>Email:</label>
            <input type="text" name="Email" value="<?php echo htmlspecialchars($edit_row['Email']); ?>" required>

            <label>Mobile:</label>
            <input type="text" name="Mobile" value="<?php echo htmlspecialchars($edit_row['Mobile']); ?>" required>

            <label>Address:</label>
            <input type="text" name="Address" value="<?php echo htmlspecialchars($edit_row['Address']); ?>" required>

            <label>Issue:</label>
            <input type="text" name="Issue" value="<?php echo htmlspecialchars($edit_row['Issue']); ?>" required>

            <button type="submit" name="update">Update</button>
        </form>
        <?php
    }
}
?>

</body>
</html>
