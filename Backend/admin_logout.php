<?php
session_start();

// Check if admin is logged in
if (isset($_SESSION["admin"])) {
    // Remove all session variables
    session_unset();

    // Destroy the session
    session_destroy();
}

// Redirect back to the admin login page
header("Location: ../Frontend/adminpanel.html");
exit;
?>
