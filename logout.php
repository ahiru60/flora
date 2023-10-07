<?php
 // Destroy session
 unset($_SESSION['username']);
 session_destroy();

 if(!isset($_SESSION['username'])) {
 // Redirecting To Home Page
 //$_SESSION['email']="ho";
 header("Location: login.php");
 }
 else{

    echo "error loging out";
    
 }
?>