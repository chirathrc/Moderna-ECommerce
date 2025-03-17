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


?>

<?php

if (!isset($_SESSION["data"])) {
    die("Unknown Error Occured");
}

$data = $_SESSION["data"];
$p_id = $data['product_id'];
$quantity = $data['quantity'];

$user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION['u']['email'] . "'")->fetch_assoc();

$as_rs = Database::search("SELECT * FROM `address` 
INNER JOIN `city` ON `address`.`City_city_id` = `city`.`city_id`
INNER JOIN `distric` ON `city`.`Distric_Dis_id` = `distric`.`Dis_id`  
WHERE `user_email` = '" . $_SESSION['u']['email'] . "'");


$rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $p_id . "'");
$product_data = $rs->fetch_assoc();


$size_rs = Database::search("SELECT * FROM `size_clothing` WHERE `size_id` = '" . $product_data['Size_Clothing_size_id'] . "'");
$size_data = $size_rs->fetch_assoc();


?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout &ndash; Moderna</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="Images\MODERNA1.1.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                <div class="page section-header text-center" style="background-color: black;">
                    <div class="page-title">
                        <div class="wrapper">
                            <h1 class="page-width"
                                style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white; font-weight: bold">
                                Checkout</h1>
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

                                                <tr>
                                                    <td class="text-left"><?Php echo ($product_data['Title']); ?></td>
                                                    <td>Rs. <?Php echo ($product_data['Price']); ?>.00</td>
                                                    <td><?Php echo ($size_data['represent_letter']); ?></td>
                                                    <td><?Php echo ($quantity); ?></td>
                                                    <?php
                                                    $tot = $product_data['Price'] * $quantity;
                                                    $delivery = 350;
                                                    $subTotal = $tot + $delivery;
                                                    ?>
                                                    <td>Rs. <?Php echo ($tot); ?>.00</td>
                                                </tr>

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
                                                            <p class="no-margin font-15">Not Available Yet.</p>
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
                                                            <p class="no-margin font-15">Not Available Yet.</p>
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
                                                            <p class="no-margin font-15">Not Available Yet</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse"
                                                            href="#collapseFour"> Payment Information </a>
                                                    </div>
                                                    <!-- <div id="collapseFour" class="collapse" data-parent="#accordion">
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
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order-button-payment">
                                            <button class="btn" value="Place order"
                                                onclick="singleItemBuy(<?php echo ($p_id) ?>,<?php echo ($quantity) ?>,<?php echo ($delivery) ?>)">Place
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

<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->

</html>