<?php
include('admin_authSession.php');
require('dbCon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $is_sale = isset($_POST["is_sale"]) ? 1 : 0;

    // Handle the uploaded file
    $target_dir = "assets/images/product/"; // Change this to the path where you want to store product images
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    // Insert the product into the database
    $stmt = $con->prepare("INSERT INTO products (product_name, price, description, img, is_sale) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $product_name, $price, $description, $target_file, $is_sale);

    if ($stmt->execute()) {
        echo "Product added successfully!";
        header("location:admin_products.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
