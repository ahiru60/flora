<?php
include('dbCon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from POST request
    if($_POST['user_id']== 'null'){
        header("Location: login.php?redirect=".$_POST['product_id']);
    }else{
        $user_id = $_POST['user_id'] ?? null;
        $product_id = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? null;
        $image = $_POST['image'] ?? null;
    
    // Check if product already in cart for the user
    $query = "SELECT * FROM `cart` WHERE user_id = '".$user_id."' AND product_id = '".$product_id."'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0 && isset($user_id)) {
        // Update quantity if product already in cart
        echo "Updated quantity if product already in cart";
        $query = "UPDATE `cart` SET quantity = quantity + ".$quantity." WHERE user_id = '".$user_id."' AND product_id = '".$product_id."'";
        mysqli_query($con, $query);
        header("Location: product-details.php?product_id=".$product_id."");
    } if(mysqli_num_rows($result) < 1 && isset($user_id)) {
        // Insert new item if product not in cart
        echo "Inserted new item if product not in cart";
        $query = "INSERT INTO `cart` (user_id, product_id, quantity, img) VALUES ('".$user_id."', '".$product_id."','". $quantity."','".$image."')";
        mysqli_query($con, $query);
        header("Location: product-details.php?product_id=".$product_id."");
    }
    
    //mysqli_query($con, $query);
}
    
}
else{
    echo "error inserting data";
}
?>
