<?php
session_start();
include ('connection.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/cart-variant2.html   11 Nov 2019 12:44:32 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Your cart &ndash; Belle</title>
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
            $user_data = $_SESSION['u'];


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
            <div id="page-content">
                <!--Page Title-->
                <div class="page section-header text-center" style="margin-top: 60px; background-color: black;">
                    <div class="page-title">
                        <div class="wrapper">
                            <h1 class="page-width" style="color: white; font-weight: bold">Your cart</h1>
                        </div>
                    </div>
                </div>
                <!--End Page Title-->

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                            <form action="#" method="post" class="cart style2">
                                <table>
                                    <thead class="cart__row cart__header">
                                        <tr>
                                            <th colspan="2" class="text-center">Product</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Total</th>
                                            <th class="action">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <!--tr class="cart__row border-bottom cart-flex border-top ">
                                            <td class="text-right small--hide cart-price h1 text-center " style="height: 200px;">
                                                <div><span>Empty Cart</span></div>
                                            </td>
                                        </tr!-->
                                        <?php

                                        $total = 0;

                                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user_data['email'] . "'");
                                        $cart_id = $cart_rs->fetch_assoc();

                                        $product_cart_rs = Database::search("SELECT * FROM `product_has_cart` WHERE `cart_cart_id` = '" . $cart_id['cart_id'] . "'");

                                        for ($x = 0; $x < $product_cart_rs->num_rows; $x++) {

                                            $product_in_cart_data = $product_cart_rs->fetch_assoc();
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $product_in_cart_data['Product_P_id'] . "'");
                                            $product = $product_rs->fetch_assoc();

                                            $size_rs = Database::search("SELECT * FROM `size_clothing` WHERE `size_id` = '" . $product['Size_Clothing_size_id'] . "'");
                                            $size_data = $size_rs->fetch_assoc();

                                            $product_image = Database::search("SELECT * FROM `product_image_main` WHERE `Product_P_id` = '" . $product['P_id'] . "'");
                                            $product_image_rs = $product_image->fetch_assoc();

                                            $color = Database::search("SELECT * FROM `colours` WHERE `colour_id` = '" . $product_in_cart_data['colours_colour_id'] . "'");
                                            $color_data = $color->fetch_assoc();

                                            ?>

                                            <tr class="cart__row border-bottom line1 cart-flex border-top">
                                                <td class="cart__image-wrapper cart-flex-item">
                                                    <a href="#"><img class="cart__image"
                                                            src="<?php echo ($product_image_rs['images']); ?>"
                                                            alt="Elastic Waist Dress - Navy / Small"></a>
                                                </td>
                                                <td class="cart__meta small--text-left cart-flex-item">
                                                    <div class="list-view-item__title">
                                                        <a href="#"><?php echo ($product['Title']); ?></a>
                                                    </div>

                                                    <div class="cart__meta-text">
                                                        Color: <?php echo ($color_data['colour']); ?><br>Size:
                                                        <?php echo ($size_data['size']); ?><br>
                                                    </div>
                                                </td>
                                                <td class="cart__price-wrapper cart-flex-item ">
                                                    <span class="money d-none d-md-block">Rs.
                                                        <?php echo ($product['Price']); ?>.00</span>
                                                </td>
                                                <td class="cart-flex-item text-right">
                                                    <div class="cart__qty text-center">

                                                        <div class="qtyField">
                                                            <a class="qtyBtn" href="javascript:void(0);"
                                                                onclick="decreaseQuantity2(<?php echo ($product_in_cart_data['crt_id']); ?>)"><i
                                                                    class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                            <!-- Updated id attribute to quantityInput -->

                                                            <input type="text"
                                                                id="quantityInput<?php echo ($product_in_cart_data['crt_id']); ?>"
                                                                value="<?php echo ($product_in_cart_data['qty']); ?>"
                                                                class="qty" onchange="quantityChanged2()" readonly>
                                                            <!-- Using readonly attribute to prevent manual editing of the quantity -->

                                                            <a class="qtyBtn"
                                                                onclick="increaseQuantity2(<?php echo ($product['qty']); ?>,<?php echo $product_in_cart_data['crt_id']; ?>)"
                                                                ;>
                                                                <i class=" fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                        </div>


                                                    </div>
                                                </td>
                                                <td class="text-right ">
                                                    <div><span class="money">Rs. <?php

                                                    $q = $product_in_cart_data['qty'];
                                                    $pr = $product['Price'];
                                                    $to = ($q * $pr);
                                                    $total = $total + $to;
                                                    echo ($to);

                                                    ?> .00</span></div>
                                                </td>
                                                <td class="text-center small--hide">
                                                    <a href="#"
                                                        onclick="removeCart(' <?php echo ($product['P_id']); ?>','<?php echo ($product_in_cart_data['crt_id']); ?>');"
                                                        class="btn btn--secondary cart__remove" title="Remove tem">
                                                        <i class="icon icon anm anm-times-l"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <?php






                                        }


                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-left"><a href="grid.php"
                                                    class="btn--link cart-continue"><i
                                                        class="icon icon-arrow-circle-left"></i> Continue shopping</a></td>
                                            <td colspan="3" class="text-right"><button type="submit" name="update"
                                                    class="btn--link cart-update"><i class="fa fa-refresh"></i>
                                                    Update</button></td>
                                        </tr>
                                    </tfoot>
                                </table>



                            </form>


                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                            <!-- <div class="cart-note">
                                <div class="solid-border">
                                    <h5><label for="CartSpecialInstructions" class="cart-note__label small--text-center">Add
                                            a note to your order</label></h5>
                                    <textarea name="note" id="CartSpecialInstructions" class="cart-note__input"></textarea>
                                </div>
                            </div> -->
                            <div class="solid-border">
                                <div class="row">
                                    <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                                    <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span
                                            class="money">Rs. <?php echo ($total) ?>.00</span></span>
                                </div>
                                <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                                <p class="cart_tearm">
                                    <label>
                                        <input type="checkbox" name="tearm" id="cartTearm" class="checkbox" value="tearm"
                                            required="">
                                        I agree with the terms and conditions</label>
                                </p>
                                <a href="cartCheckout.php">
                                    <!-- <input type="submit" name="checkout" id="cartCheckout"
                                        class="btn btn--small-wide checkout" value="Checkout" disabled="disabled"> -->

                                    <Button class="btn btn--small-wide checkout" id="cartCheckout">Checkout</Button>
                                </a>

                                <div class="paymnet-img"><img src="assets/images/payment-img.jpg" alt="Payment"></div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!--End Body Content-->

            <?php
        } else {
            ?>
            <script>
                window.location = "login.php";
            </script>

            <?php
        }
        ?>


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

<!-- belle/cart-variant2.html   11 Nov 2019 12:44:32 GMT -->

</html>