<?php
include('dbCon.php');

    // Get data from POST request
    $id = $_GET['id'];

// Check if product already in cart for the user
$query = "DELETE FROM `cart` WHERE id = '".$id."'";
mysqli_query($con, $query);
header("Location: cart.php");
exit();

?>