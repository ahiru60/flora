<?php
 //echo $_SESSION["username"];
 if(!isset($_SESSION["loginUname"])) {
 header("Location: login.php");
 //exit();
 }
?>
