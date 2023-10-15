<?php
include('admin_authSession.php');
require('dbCon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_GET["id"];

    $stmt = $con->prepare("DELETE FROM users WHERE id= ?");
    $stmt->bind_param("i", $userId);    

    if ($stmt->execute()) {
        echo "Product added successfully!";
        header("location:admin_users.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>