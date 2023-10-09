<?php
require('dbCon.php');

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $delete_query = "DELETE FROM `products` WHERE id = $product_id";
    
    if(mysqli_query($con, $delete_query)){
        header("Location: admin_products.php"); // Redirect back to the shop page after deleting
        exit;
    } else {
        echo "Error deleting product.";
    }
}
?>
