<?php
session_start();
include ("connection.php");

if (!isset($_SESSION['u'])) {

    ?>
    <script>
        window.location = "login.php";
    </script>
    <?php
}


// $user = $_SESSION['u'];

$user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION['u']['email'] . "'")->fetch_assoc();


$as_rs = Database::search("SELECT * FROM `address` 
INNER JOIN `city` ON `address`.`City_city_id` = `city`.`city_id`
INNER JOIN `distric` ON `city`.`Distric_Dis_id` = `distric`.`Dis_id`  
WHERE `user_email` = '" . $_SESSION['u']['email'] . "'");

?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout &ndash; Belle</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body class="page-template belle">
    <div class="pageWrapper">


        <?php

        if (isset($_SESSION['u'])) {

            ?>

            <?php
            include ("top-header.php");
            ?>

            <!--Header-->
            <?php
            include ("header.php");
            ?>
            <!--End Header-->

            <!--Mobile Menu-->
            <?php
            include ("mobile-menu.php");
            ?>
            <!--End Mobile Menu-->


            <!--Body Content-->
            <div id="page-content" style="margin-top: 80px;">
                <!--Page Title-->
                <div class="page section-header text-center">
                    <div class="page-title">
                        <div class="wrapper">
                            <h1 class="page-width">Checkout</h1>
                        </div>
                    </div>
                </div>
                <!--End Page Title-->

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <div class="customer-box customer-coupon">
                                <h3 class="font-15 xs-font-13"><i class="icon anm anm-gift-l"></i> Have a coupon? <a
                                        href="#have-coupon" class="text-white text-decoration-underline"
                                        data-toggle="collapse">Click here to enter your code</a></h3>
                                <div id="have-coupon" class="collapse coupon-checkout-content">
                                    <div class="discount-coupon">
                                        <div id="coupon" class="coupon-dec tab-pane active">
                                            <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                            <label class="required get" for="coupon-code"><span class="required-f">*</span>
                                                Coupon</label>
                                            <input id="coupon-code" required="" type="text" class="mb-3">
                                            <button class="coupon-btn btn" type="submit">Apply Coupon</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row billing-fields">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                            <div class="create-ac-content bg-light-gray padding-20px-all">
                                <form>
                                    <fieldset>
                                        <h2 class="login-title mb-3">Billing details</h2>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-firstname">First Name <span
                                                        class="required-f">*</span></label>
                                                <input name="firstname" value="<?php echo ($user['F_name']); ?>"
                                                    id="input-firstname" type="text" disabled>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-lastname">Last Name <span
                                                        class="required-f">*</span></label>
                                                <input name="lastname" value="<?php echo ($user['email']); ?>"
                                                    id="input-lastname" type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                                <input name="email" value="<?php echo ($user['L_name']); ?>"
                                                    id="input-email" type="email" disabled>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-telephone">Telephone <span
                                                        class="required-f">*</span></label>

                                                <?php
                                                if (isset($user['mobile'])) {
                                                    ?>
                                                    <input name="telephone" value="<?php echo ($user['mobile']); ?>"
                                                        id="input-telephone" type="tel">
                                                    <?php

                                                } else {
                                                    ?>
                                                    <input name="telephone" id="input-telephone" type="tel">
                                                    <?php

                                                }

                                                ?>

                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">

                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                                <label for="input-address-1">Address <span
                                                        class="required-f">*</span></label>
                                                <?php
                                                if ($as_rs->num_rows == 1) {

                                                    $addressData = $as_rs->fetch_assoc();

                                                    ?>
                                                    <input name="address_1"
                                                        value="<?php echo ($addressData['line1'] . " " . $addressData['line2']); ?>"
                                                        id="input-address-1" type="text" disabled>
                                                    <?php

                                                } else {
                                                    ?>
                                                    <script>
                                                        alert("Fill You Account Address & Place the Order.");
                                                        window.location = "profile.php";
                                                    </script>
                                                    <?php
                                                }

                                                ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                <label for="input-address-2">City <span class="required-f">*</span></label>
                                                <input name="address_2" value="<?php echo ($addressData['city']); ?>"
                                                    id="input-address-2" type="text" disabled>
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-city">Province<span class="required-f">*</span></label>
                                                <input name="city" value="<?php echo ($addressData['Distric']); ?>"
                                                    id="input-city" type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-postcode">Post Code<span
                                                        class="required-f">*</span></label>
                                                <input name="postcode" value="" id="input-postcode" type="text">
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="country">Country<span class="required-f">*</span></label>
                                                <input name="postcode" value="Sri Lanka" id="country" type="text" disabled>
                                            </div>

                                        </div>

                                    </fieldset>


                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                <label for="input-company">Order Notes <span
                                                        class="required-f">*</span></label>
                                                <textarea class="form-control resize-both" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="your-order-payment">
                                <div class="your-order">
                                    <h2 class="order-title mb-4">Your Order</h2>

                                    <div class="table-responsive-sm order-table">
                                        <table class="bg-white table table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Product Name</th>
                                                    <th>Price</th>
                                                    <th>Size</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $cartID = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user['email'] . "' ")->fetch_assoc();
                                                $cartItems = Database::search("SELECT * FROM `product_has_cart` WHERE `cart_cart_id` = '" . $cartID['cart_id'] . "'");

                                                $subTotal = 0;
                                                $delivery = 350;

                                                $subTotal += $delivery;

                                                for ($x = 0; $x < $cartItems->num_rows; $x++) {

                                                    $cartItemsData = $cartItems->fetch_assoc();

                                                    $p_id = $cartItemsData['Product_P_id'];
                                                    $quantity = $cartItemsData['qty'];

                                                    $rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $p_id . "'");
                                                    $product_data = $rs->fetch_assoc();

                                                    $size_rs = Database::search("SELECT * FROM `size_clothing` WHERE `size_id` = '" . $product_data['Size_Clothing_size_id'] . "'");
                                                    $size_data = $size_rs->fetch_assoc();

                                                    ?>


                                                    <tr>
                                                        <td class="text-left"><?Php echo ($product_data['Title']); ?></td>
                                                        <td>Rs. <?Php echo ($product_data['Price']); ?>.00</td>
                                                        <td><?Php echo ($size_data['represent_letter']); ?></td>
                                                        <td><?Php echo ($quantity); ?></td>
                                                        <?php
                                                        $tot = $product_data['Price'] * $quantity;
                                                        $subTotal += $tot;
                                                        ?>
                                                        <td>Rs. <?Php echo ($tot); ?>.00</td>
                                                    </tr>
                                                    <?php


                                                }

                                                ?>


                                            </tbody>
                                            <tfoot class="font-weight-600">
                                                <tr>
                                                    <td colspan="4" class="text-right">Shipping </td>
                                                    <td>Rs.<?Php echo ($delivery); ?>.00</td>
                                                </tr>
                                                <?php

                                                ?>
                                                <tr>
                                                    <td colspan="4" class="text-right">Total</td>
                                                    <td>Rs. <?Php echo ($subTotal); ?>.00</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <hr />

                                <div class="your-payment">
                                    <h2 class="payment-title mb-3">payment method</h2>
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <div id="accordion" class="payment-section">
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse"
                                                            href="#collapseOne">Direct Bank Transfer </a>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <p class="no-margin font-15">Make your payment directly into our
                                                                bank account. Please use your Order ID as the payment
                                                                reference. Your order won't be shipped until the funds have
                                                                cleared in our account.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse"
                                                            href="#collapseTwo">Cheque Payment</a>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <p class="no-margin font-15">Please send your cheque to Store
                                                                Name, Store Street, Store Town, Store State / County, Store
                                                                Postcode.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card margin-15px-bottom border-radius-none">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse"
                                                            href="#collapseThree"> PayPal </a>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <p class="no-margin font-15">Pay via PayPal; you can pay with
                                                                your credit card if you don't have a PayPal account.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse"
                                                            href="#collapseFour"> Payment Information </a>
                                                    </div>
                                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                        <label for="input-cardname">Name on Card <span
                                                                                class="required-f">*</span></label>
                                                                        <input name="cardname" value=""
                                                                            placeholder="Card Name" id="input-cardname"
                                                                            class="form-control" type="text">
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                        <label for="input-country">Credit Card Type <span
                                                                                class="required-f">*</span></label>
                                                                        <select name="country_id" class="form-control">
                                                                            <option value=""> --- Please Select ---
                                                                            </option>
                                                                            <option value="1">American Express</option>
                                                                            <option value="2">Visa Card</option>
                                                                            <option value="3">Master Card</option>
                                                                            <option value="4">Discover Card</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                        <label for="input-cardno">Credit Card Number <span
                                                                                class="required-f">*</span></label>
                                                                        <input name="cardno" value=""
                                                                            placeholder="Credit Card Number"
                                                                            id="input-cardno" class="form-control"
                                                                            type="text">
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                        <label for="input-cvv">CVV Code <span
                                                                                class="required-f">*</span></label>
                                                                        <input name="cvv" value=""
                                                                            placeholder="Card Verification Number"
                                                                            id="input-cvv" class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                        <label>Expiration Date <span
                                                                                class="required-f">*</span></label>
                                                                        <input type="date" name="exdate"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                        <img class="padding-25px-top xs-padding-5px-top"
                                                                            src="assets/images/payment-img.jpg" alt="card"
                                                                            title="card" />
                                                                    </div>
                                                                </div>
                                                            </fieldset>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order-button-payment">
                                            <button class="btn" value="Place order" type="submit"
                                                onclick="FinalPaymentProcess(<?php echo ($delivery) ?>,<?php echo ($subTotal) ?>)">Place
                                                order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--End Body Content-->

            <!--Footer-->
            <footer id="footer">
                <div class="newsletter-section">
                    <div class="container">
                        <div class="row">
                            <div
                                class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                                <div class="display-table">
                                    <div class="display-table-cell footer-newsletter">
                                        <div class="section-header text-center">
                                            <label class="h2"><span>sign up for </span>newsletter</label>
                                        </div>
                                        <form action="#" method="post">
                                            <div class="input-group">
                                                <input type="email" class="input-group__field newsletter__input"
                                                    name="EMAIL" value="" placeholder="Email address" required="">
                                                <span class="input-group__btn">
                                                    <button type="submit" class="btn newsletter__submit" name="commit"
                                                        id="Subscribe"><span
                                                            class="newsletter__submit-text--large">Subscribe</span></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end align-items-center">
                                <div class="footer-social">
                                    <ul class="list--inline site-footer__social-icons social-icons">
                                        <li><a class="social-icons__link" href="#" target="_blank"
                                                title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i
                                                    class="icon icon-facebook"></i></a></li>
                                        <li><a class="social-icons__link" href="#" target="_blank"
                                                title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i
                                                    class="icon icon-twitter"></i> <span
                                                    class="icon__fallback-text">Twitter</span></a></li>
                                        <li><a class="social-icons__link" href="#" target="_blank"
                                                title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i
                                                    class="icon icon-pinterest"></i> <span
                                                    class="icon__fallback-text">Pinterest</span></a></li>
                                        <li><a class="social-icons__link" href="#" target="_blank"
                                                title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i
                                                    class="icon icon-instagram"></i> <span
                                                    class="icon__fallback-text">Instagram</span></a></li>
                                        <li><a class="social-icons__link" href="#" target="_blank"
                                                title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i
                                                    class="icon icon-tumblr-alt"></i> <span
                                                    class="icon__fallback-text">Tumblr</span></a></li>
                                        <li><a class="social-icons__link" href="#" target="_blank"
                                                title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i
                                                    class="icon icon-youtube"></i> <span
                                                    class="icon__fallback-text">YouTube</span></a></li>
                                        <li><a class="social-icons__link" href="#" target="_blank"
                                                title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i
                                                    class="icon icon-vimeo-alt"></i> <span
                                                    class="icon__fallback-text">Vimeo</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-footer">
                    <div class="container">
                        <!--Footer Links-->
                        <div class="footer-top">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                                    <h4 class="h4">Quick Shop</h4>
                                    <ul>
                                        <li><a href="#">Women</a></li>
                                        <li><a href="#">Men</a></li>
                                        <li><a href="#">Kids</a></li>
                                        <li><a href="#">Sportswear</a></li>
                                        <li><a href="#">Sale</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                                    <h4 class="h4">Informations</h4>
                                    <ul>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Privacy policy</a></li>
                                        <li><a href="#">Terms &amp; condition</a></li>
                                        <li><a href="#">My Account</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                                    <h4 class="h4">Customer Services</h4>
                                    <ul>
                                        <li><a href="#">Request Personal Data</a></li>
                                        <li><a href="#">FAQ's</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Orders and Returns</a></li>
                                        <li><a href="#">Support Center</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                                    <h4 class="h4">Contact Us</h4>
                                    <ul class="addressFooter">
                                        <li><i class="icon anm anm-map-marker-al"></i>
                                            <p>55 Gallaxy Enque,<br>2568 steet, 23568 NY</p>
                                        </li>
                                        <li class="phone"><i class="icon anm anm-phone-s"></i>
                                            <p>(440) 000 000 0000</p>
                                        </li>
                                        <li class="email"><i class="icon anm anm-envelope-l"></i>
                                            <p>sales@yousite.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Footer Links-->
                        <hr>
                        <div class="footer-bottom">
                            <div class="row">
                                <!--Footer Copyright-->
                                <div
                                    class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left">
                                    <span></span> <a href="templateshub.net">Templates Hub</a>
                                </div>
                                <!--End Footer Copyright-->
                                <!--Footer Payment Icon-->
                                <div
                                    class="col-12 col-sm-12 col-md-6 col-lg-6 order-0 order-md-1 order-lg-1 order-sm-0 payment-icons text-right text-md-center">
                                    <ul class="payment-icons list--inline">
                                        <li><i class="icon fa fa-cc-visa" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-cc-mastercard" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-cc-discover" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-cc-paypal" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-cc-amex" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-credit-card" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                                <!--End Footer Payment Icon-->
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--End Footer-->
            <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>

            <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
            <script src="assets/js/vendor/jquery.cookie.js"></script>
            <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
            <script src="assets/js/vendor/wow.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/lazysizes.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            <?php
        } else {
            ?>
            <script>
                window.location = "index.php";
            </script>
            <?php
        }
        ?>
    </div>
</body>



</html>2