<?php
 // Destroy session
 session_destroy();

 if(!isset($_SESSION['email'])) {
 // Redirecting To Home Page
 //$_SESSION['email']="ho";
 header("Location: login.php");
 }
 else{

    echo "error loging out";
    
 }
?>