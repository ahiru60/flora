<?php
include('authSession.php');
include('dbCon.php');

$user_id = $_SESSION['id'];


// Fetch cart items for the user from the database
$query = "SELECT * FROM `cart` JOIN `products`ON cart.product_id = products.id WHERE user_id = '".$user_id."'";
$result = mysqli_query($con, $query);
//$cart_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/flosun/flosun/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:26 GMT -->
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
        include("header.php")
        ?>
    <!-- Header Area End Here -->
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Checkout</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Checkout Area Start Here -->
    <div class="checkout-area mt-no-text">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6 col-12 col-custom">
                    <form action="#">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="myniceselect nice-select wide rounded-0">
                                            <option data-display="Bangladesh">Bangladesh</option>
                                            <option value="uk">London</option>
                                            <option value="rou">Romania</option>
                                            <option value="fr">French</option>
                                            <option value="de">Germany</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list create-acc">
                                        <input id="cbox" type="checkbox">
                                        <label for="cbox">Create an account?</label>
                                    </div>
                                    <div id="cbox-info" class="checkout-form-list create-account">
                                        <p class="mb-2">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                        <label>Account password <span class="required">*</span></label>
                                        <input placeholder="password" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="different-address">
                                <div class="ship-different-title">
                                    <div>
                                        <input id="ship-box" type="checkbox">
                                        <label for="ship-box">Ship to a different address?</label>
                                    </div>
                                </div>
                                <div id="ship-box-info" class="row mt-2">
                                    <div class="col-md-12 col-custom">
                                        <div class="myniceselect country-select clearfix">
                                            <label>Country <span class="required">*</span></label>
                                            <select class="myniceselect nice-select wide rounded-0">
                                                <option data-display="Bangladesh">Bangladesh</option>
                                                <option value="uk">London</option>
                                                <option value="rou">Romania</option>
                                                <option value="fr">French</option>
                                                <option value="de">Germany</option>
                                                <option value="aus">Australia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Company Name</label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input placeholder="Street address" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>State / County <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="order-notes mt-3">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12 col-custom">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            if ($result->num_rows > 0) {
                                // output data of each row
                                $subTotal = 0;
                                while($row = $result->fetch_assoc()){
                                    $price = $row['price'];
                                            if($row['is_sale']){
                                                $price =intval(str_replace('$','',$price))-((intval(str_replace('$','',$price))/100)*20);
                                            }
                                            else{
                                                $price =intval(str_replace('$','',$price));
                                            }
                                            
                                            $product_name = $row['product_name'];
                                        
                                        $subTotal = $subTotal+($price*$row['quantity']);
                                    echo"<tr class='cart_item'>
                                    <td class='cart-product-name'>".$product_name."<strong class='product-quantity'>
                        ×".$row['quantity']."</strong></td>
                                    <td class='cart-product-total text-center'><span class='amount'> $".number_format($price,2)."</span></td>
                                </tr>

                                    ";

                                }}?>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td class="text-center"><span class="amount"><?php echo "$".number_format($subTotal,2); ?></span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td class="text-center"><strong><span class="amount"><?php echo "$".number_format($subTotal,2); ?></span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title mb-3">
                                                <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-2">
                                            <h5 class="panel-title mb-3">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Cheque Payment
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title mb-3">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <button class="btn flosun-button secondary-btn black-color rounded-0 w-100">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End Here -->
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


<!-- Mirrored from htmldemo.net/flosun/flosun/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
</html>