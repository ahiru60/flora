<?php
include('authSession.php');
include('dbCon.php');

$user_id = $_SESSION['id'];


// Fetch cart items for the user from the database
$query = "SELECT * FROM `cart` WHERE user_id = '".$user_id."'";
$result = mysqli_query($con, $query);
//$cart_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/flosun/flosun/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:26 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FloSun - Flower Shop HTML5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="assets/css/vendor/linearicons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

 

    <!-- Header Area Start Here -->
    <?php
        include("header.php");
        ?>
    <!-- Header Area End Here -->
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Shopping Cart</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                echo $user_id;
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $subTotal = 0;
                                    while($row = $result->fetch_assoc()){
                                        $query2 = "SELECT * FROM `products` WHERE id = '".$row['product_id']."'";
                                        $result2 = mysqli_query($con, $query2);

                                        while($row2 = $result2->fetch_assoc()){
                                            $price = $row2['price'];
                                        }
                                        $subTotal = $subTotal+($price*$row['quantity']);
                                        echo"
                                        <tr>
                                    <td class='pro-thumbnail'><a href='#'><img class='img-fluid' src='".$row['img']."' alt='Product' /></a></td>
                                    <td class='pro-title'><a href='#'>Pearly Everlasting <br> s / green</a></td>
                                    <td class='pro-price'><span>"."$".strval(number_format(intval(str_replace('$','',$price))-((intval(str_replace('$','',$price))/100)*20),2))."</span></td>
                                    <td class='pro-quantity'>
                                        <div class='quantity'>
                                            ".$row['quantity']."
                                        </div>
                                    </td>
                                    <td class='pro-subtotal'><span>$".number_format($price*$row['quantity'],2)."</span></td>
                                    <td class='pro-remove'><a href='remove_from_cart.php?id=".$row['id']."'><i class='lnr lnr-trash'></i></a></td>
                                </tr>";
                                    }}
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Update Option -->
                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="btn flosun-button primary-btn rounded-0 black-btn">Apply Coupon</button>
                            </form>
                        </div>
                        <div class="cart-update mt-sm-16">
                            <a href="#" class="btn flosun-button primary-btn rounded-0 black-btn">Update Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto col-custom">
                    <!-- Cart Calculation Area -->
                    <?php
                    
                        if(isset($subTotal)){
                            echo "<div class='cart-calculator-wrapper'>
                            <div class='cart-calculate-items'>
                                <h3>Cart Totals</h3>
                                <div class='table-responsive'>
                                    <table class='table'>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>$".number_format($subTotal,2)."</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td>$".number_format(($subTotal*0.1),2)."</td>
                                        </tr>
                                        <tr class='total'>
                                            <td>Total</td>
                                            <td class='total-amount'>$".number_format($subTotal+($subTotal*0.1),2)."</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href='checkout.php' class='btn flosun-button primary-btn rounded-0 black-btn w-100'>Proceed To Checkout</a>
                        </div>";

                            
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
    <!--Footer Area Start-->
    <?php
   include("footer.php")
   ?>
    <!--Footer Area End-->

    <!-- JS
============================================ -->


    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery Migrate JS -->
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>


    <!-- Swiper Slider JS -->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <!-- nice select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- Ajaxchimpt js -->
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Ui js -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- Jquery Countdown js -->
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <!-- jquery magnific popup js -->
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>


</body>


<!-- Mirrored from htmldemo.net/flosun/flosun/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:26 GMT -->
</html>