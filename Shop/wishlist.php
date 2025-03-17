<?php
session_start();
include ('connection.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Wishlist &ndash; Moderna</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="Images\MODERNA1.1.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="assets/css/plugins.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
            <div id="page-content" style="margin-top: 80px;">
                <!--Page Title-->
                <div class="page section-header text-center" style="background-color: black;">
                    <div class="page-title">
                        <div class="wrapper">
                            <h1 class="page-width"
                                style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white; font-weight: bold">
                                Wish List</h1>
                        </div>
                    </div>
                </div>
                <!--End Page Title-->

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                            <form action="#">
                                <div class="wishlist-table table-content table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="product-name text-center alt-font">Remove</th>
                                                <th class="product-price text-center alt-font">Images</th>
                                                <th class="product-name alt-font">Product</th>
                                                <th class="product-price text-center alt-font">Unit Price</th>
                                                <th class="stock-status text-center alt-font">Stock Status</th>
                                                <th class="product-subtotal text-center alt-font">Add to Cart</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_email` = '" . $user_data['email'] . "'");

                                            for ($x = 0; $x < $wishlist_rs->num_rows; $x++) {

                                                $wishlist_rs_data = $wishlist_rs->fetch_assoc();
                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $wishlist_rs_data['Product_P_id'] . "'");
                                                $product_rs_data = $product_rs->fetch_assoc();

                                                $product_image = Database::search("SELECT * FROM `product_image_main` WHERE `Product_P_id` = '" . $product_rs_data['P_id'] . "'");
                                                $product_image_rs = $product_image->fetch_assoc();

                                                ?>

                                                <tr>
                                                    <td class="product-remove text-center" valign="middle"><a href="#"><i
                                                                onclick="removewatchlist(<?php echo ($wishlist_rs_data['wish_id']); ?>);"
                                                                class="icon icon anm anm-times-l"></i></a></td>
                                                    <td class="product-thumbnail text-center">
                                                        <a href="#"><img src="<?php echo ($product_image_rs['images']); ?>"
                                                                alt="" title="" /></a>
                                                    </td>
                                                    <td class="product-name">
                                                        <h4 class="no-margin"><a
                                                                href="#"><?php echo ($product_rs_data['Title']); ?></a></h4>
                                                    </td>
                                                    <td class="product-price text-center"><span
                                                            class="amount">Rs.<?php echo ($product_rs_data['Price']); ?>.00</span>
                                                    </td>


                                                    <?php

                                                    if ($product_rs_data['qty'] != 0) {
                                                        ?>
                                                        <td class="stock text-center">
                                                            <span class="in-stock">in stock</span>
                                                        </td>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td class="stock text-center">
                                                            <span class="in-stock text-danger" style="font-weight: bolder;">Out of
                                                                Stock</span>
                                                        </td>

                                                        <?php
                                                    }
                                                    ?>

                                                    <td class="product-subtotal text-center"><button type="button"
                                                            class="btn btn-small">Add To Cart</button></td>
                                                </tr>

                                                <?php
                                            }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </form>
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

</html>