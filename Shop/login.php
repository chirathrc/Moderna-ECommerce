<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Account Login &ndash; Belle</title>
  <meta name="description" content="description">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="assets/images/favicon.png"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="assets/css/plugins.css">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body class="page-template belle">
  <div class="pageWrapper">

    <?php
    include ("top-header.php");
    ?>

    <!--Header-->
    <?php
    include ("header.php");
    ?>
    <!--End Header-->

    <br><br><br><br><br>

    <!--Mobile Menu-->
    <?php
    include ("mobile-menu.php");
    ?>
    <!--End Mobile Menu-->




    <!--Body Content-->
    <div id="page-content">
      <!--Page Title-->
      <div class="page section-header text-center">
        <div class="page-title">
          <div class="wrapper">
            <h1 class="page-width">Login</h1>
          </div>
        </div>
      </div>
      <!--End Page Title-->

      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
            <div class="mb-4">

              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <label for="CustomerEmail">Email</label>
                    <input type="email"  placeholder="" id="CustomerEmail" class=""
                      autocorrect="off" autocapitalize="off" autofocus="">
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <label for="CustomerPassword">Password</label>
                    <input type="password" id="CustomerPassword"
                      class="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                  <input onclick="SignIN();" class="btn mb-3" value="Sign In">
                  <p class="mb-4">
                    <a href="#" id="RecoverPassword">Forgot your password?</a> &nbsp; | &nbsp;
                    <a href="register.php" id="customer_register_link">Create account</a> &nbsp; | &nbsp;
                    <a href="http://localhost/BELLE/login.php" id="customer_register_link">Admin Sign In</a>
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
    <!--End Body Content-->

    <!--Footer-->
    <?php
    include ("footer.php");
    ?>
    <!--End Footer-->


    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->

    <!-- Including Jquery -->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/jquery.cookie.js"></script>
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <!-- Including Javascript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/lazysizes.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="script.js"></script>
  </div>
</body>

</html>