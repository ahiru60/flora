<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/flosun/flosun/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
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
    <!-- Register Area Start Here -->
    <div class="login-register-area mt-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                    <div class="login-register-wrapper">
                        <div class="section-content text-center mb-5">
                            <h2 class="title-4 mb-2">Create Account</h2>
                            <p class="desc-content">Please Register using account detail bellow.</p>
                        </div>
                        <?php
 require('dbCon.php');
 // When form submitted, insert values into the database.
    if (isset($_REQUEST['first_name'])&&isset($_REQUEST['last_name'])&&isset($_REQUEST['email'])&&isset($_REQUEST['password'])&&isset($_REQUEST['password_confirm'])) {
            // removes backslashes
            $fullname = $_REQUEST['first_name']." ".$_REQUEST['last_name'];
            $fullname = stripslashes($fullname);
            //escapes special characters in a string
            $fullname = mysqli_real_escape_string($con, $fullname);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            $passwordCon = stripslashes($_REQUEST['password_confirm']);
            $passwordCon = mysqli_real_escape_string($con, $password);

            $created_datetime = date("Y-m-d H:i:s");
            $query = "INSERT into `users` (username, password, email, created_datetime) VALUES ('$fullname', '" . md5($password) . "','$email', '$created_datetime')";
            
			if(strlen($_REQUEST['first_name'])>0&&strlen($_REQUEST['email'])>0&&strlen($_REQUEST['password'])>0){
				$result = mysqli_query($con, $query);
			}

            if ($result) {
                echo "<div class='form'>
                <h3>You are registered successfully.</h3><br/>
                <p class='link'>Click here to <a
                href='login.php'>Login</a></p>
                </div>";
            } 
            else {
                echo "<div class='form'>
                <h3>Required fields are missing.</h3><br/>
                <p class='link'>Click here to <a
                href='registration.php'>registration</a> again.</p>
                </div>";
            }
 }
 else{
?>
                        <form method = "post" onSubmit="return validate()">
                            <div class="single-input-item mb-3">
                                <input name="first_name" type="text" placeholder="First Name">
                            </div>
                            <div class="single-input-item mb-3">
                                <input name="last_name" type="text" placeholder="Last Name">
                            </div>
                            <div class="single-input-item mb-3">
                                <input name="email" type="email" placeholder="Email or Username">
                            </div>
                            <div class="single-input-item mb-3">
                                <input name="password" type="password" placeholder="Enter your Password">
                            </div>
                            <div class="single-input-item mb-3">
                                <input name="password_confirm" type="password" placeholder="Confirm your Password">
                            </div>
                            <div class="single-input-item mb-3">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Subscribe Our Newsletter</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item mb-3">
                                <button class="btn flosun-button secondary-btn theme-color rounded-0">Register</button>
                            </div>
                        </form>
                        <?php
    }
?>
<script>
        function validate(){
            var email = document.getElementById("email").value;
            var pword = document.getElementById("passw").value;
			var rpword = document.getElementById("rpassw").value;

            if(email.indexOf(".")<email.length-3&&email.indexOf("@")<email.indexOf(".")-2&&email.indexOf("@")>1){
                if(pword.length>7){
					if(pword===rpword){
						var message ="successful";
						document.getElementById("promptext").innerText = message;
						return true;
					}
					else{
						var message ="Re entered password doesn't match";
						document.getElementById("promptext").innerText = message;
                    	return false;
					}
                }
                else{
                    var message ="password must be 8 characters long";
					document.getElementById("promptext").innerText = message;
                    return false;
                }
            }
			else{
				var message ="Email is not valid";
				document.getElementById("promptext").innerText = message;
                return false;
			}

        }
    </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Area End Here -->
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


<!-- Mirrored from htmldemo.net/flosun/flosun/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
</html>