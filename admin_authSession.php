<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['loggedin_admin']) || $_SESSION['loggedin_admin'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>