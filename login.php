

<?php
session_start();
require('dbCon.php');
if(!isset($_GET['error'])){$error=$_GET['error'];}
            // When form submitted, check and create user session.
            
            if (isset($_POST['username'])) {
                if($_REQUEST['password']=="admin"&&$_REQUEST['username']=="admin@flora.com"){
                    $_SESSION["username"] = $username;
                    $_SESSION['loggedin_admin'] = true;
                    header("Location: admin_products.php");
                }else{
                    $username = stripslashes($_REQUEST['username']); //removes backslashes
                $username = mysqli_real_escape_string($con, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);// Check user is exist in the database
                $query = "SELECT * FROM `users` WHERE email='".$username."' AND password='" . md5($password) . "'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                $rows = mysqli_num_rows($result);
                if ($rows ==1) {
                //session_start();    
                $_SESSION["username"] = $username;
                while($row = $result->fetch_assoc()){
                $_SESSION["id"] = $row['id'];}
                // Redirect to user dashboard page
                $_SESSION['loggedin'] = true;
                
                if(isset($_GET['redirect'])){
                    header("Location: product-details.php?product_id=".$_GET['redirect']);
                }
                else{
                    header("Location: index.php");
                }
                }
                
            else {
                /*echo "rows = ".$rows;
                echo "<div class='form'>
                <h3>Incorrect Username/password.</h3><br/>
                <p class='link txt1'>Click here to <a
                href='login.php' class='txt2' >Login</a> again.</p>
                </div>";*/
                
            }}
 }
 ?>
 <!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from htmldemo.net/flosun/flosun/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
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
                        <h3 class="title-3">Login-Register</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Login-Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Login Area Start Here -->
    <div class="login-register-area mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                    <div class="login-register-wrapper">
                        <div class="section-content text-center mb-5">
                            <h2 class="title-4 mb-2">Login</h2>
                            <p class="desc-content">Please login using account detail bellow.</p>
                            <?php
                            if($error){
                                echo "<p class='desc-content'>Please login using account detail bellow.</p>";
                            }
                            ?>
                        </div>
                        <form action="login.php?error=true" method="post">
                            <div class="single-input-item mb-3">
                                <input type="email" placeholder="Email or Username" name= "username">
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="password" placeholder="Enter your Password" name="password">
                            </div>
                            <div class="single-input-item mb-3">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                        </div>
                                    </div>
                                    <a href="#" class="forget-pwd mb-3">Forget Password?</a>
                                </div>
                            </div>
                            <div class="single-input-item mb-3">
                                <input class="btn flosun-button secondary-btn theme-color rounded-0" type="submit" value="Login">
                            </div>
                            <div class="single-input-item">
                                <a href="register.php">Creat Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Area End Here -->
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

<!-- Mirrored from htmldemo.net/flosun/flosun/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
</html>