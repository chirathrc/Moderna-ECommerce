<?php
session_start();
include ('connection.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Moderna</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="shortcut icon" href="Images\MODERNA1.1.png" />
  
    <link rel="stylesheet" href="assets/css/plugins.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="template-index belle template-index-belle">
    <div id="pre-loader">
        <img src="assets/images/loader.gif" alt="Loading..." />
    </div>
    <div class="pageWrapper">

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
            <!--Home slider-->
            <div class="slideshow slideshow-wrapper pb-section sliderFull">
                <div class="home-slideshow">
                    <div class="slide">
                        <div class="blur-up lazyload bg-size">
                            
                            <img class="blur-up lazyload bg-img"
                                data-src="assets\images\slideshow-banners\pexels-borevina-1778412.jpg"
                                src="assets\images\slideshow-banners\pexels-borevina-1778412.jpg" alt="Shop Our New Collection"
                                title="Shop Our New Collection" />


                            <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                                <div class="slideshow__text-content bottom">
                                    <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Shop Our New Collection</h2>
                                        <span class="mega-subtitle slideshow__subtitle">From Hight to low, classic or
                                            modern. We have you covered</span>

                                        <a href="grid.php">

                                            <span class="btn">Shop now</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blur-up lazyload bg-size">

                            <img class="blur-up lazyload bg-img"
                                data-src="assets\images\slideshow-banners\pexels-anastasia-shuraeva-5705478.jpg"
                                src="assets\images\slideshow-banners\pexels-anastasia-shuraeva-5705478.jpg" alt="Summer Bikini Collection"
                                title="Summer Bikini Collection" />
                                
                            <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                                <div class="slideshow__text-content bottom">
                                    <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Various Clothing Collection</h2>
                                        <span class="mega-subtitle slideshow__subtitle">Save up to 50%
                                            </span>
                                        <a href="grid.php">

                                            <span class="btn">Shop now</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Home slider-->


            <!--Collection Tab slider-->

            <!--Womans !-->
            <div class="tab-slider-product section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="section-header text-center">
                                <h2 class="h2">Our Products</h2>
                                <p>Browse the huge variety of our products</p>
                            </div>
                            <div class="tabs-listing">
                                <ul class="tabs clearfix">
                                    <li class="active" rel="tab1">Women</li>
                                    <li rel="tab2">Men</li>
                                    <!-- <li rel="tab3">Sale</li> -->
                                </ul>
                                <div class="tab_container">
                                    <div id="tab1" class="tab_content grid-products">
                                        <div class="productSlider">



                                            <?php

                                            $rs = Database::search("SELECT * FROM `product` WHERE `Category_Cat_id` = '1' AND `status_id` = '1' LIMIT 5");


                                            for ($x = 0; $x < $rs->num_rows; $x++) {

                                                $p_data = $rs->fetch_assoc();
                                                $image = Database::search("SELECT * FROM `product_image_main` WHERE `Product_P_id` = '" . $p_data["P_id"] . "'");
                                                $image_file = $image->fetch_assoc();

                                                $image2 = Database::search("SELECT * FROM `product_image2` WHERE `Product_P_id` = '" . $p_data["P_id"] . "'");
                                                $image_file2 = $image2->fetch_assoc();




                                                ?>
                                                <div class="col-12 item">
                                                    <!-- start product image -->
                                                    <div class="product-image">
                                                        <!-- start product image -->
                                                        <a href="short-description.php?p_id=<?php echo $p_data['P_id']; ?>">

                                                            <!-- image -->
                                                            <img class="primary blur-up lazyload"
                                                                data-src="<?php echo ($image_file['images']); ?>"
                                                                src="<?php echo ($image_file['images']); ?>" alt="image"
                                                                title="product" style="height: 340px;">
                                                            <!-- End image -->
                                                            <!-- Hover image -->
                                                            <img class="hover blur-up lazyload"
                                                                data-src="<?php echo ($image_file2['image']); ?>"
                                                                src="<?php echo ($image_file2['image']); ?>" alt="image"
                                                                title="product" style="height: 340px;">
                                                            <!-- End hover image -->
                                                            <!-- product label -->
                                                            <div class="product-labels rectangular">
                                                                <?php
                                                                if ($p_data["Discount"] != 0) {


                                                                    ?>
                                                                    <span
                                                                        class="lbl on-sale">-<?php echo ($p_data["Discount"]); ?>%</span>
                                                                    <?php
                                                                }
                                                                ?>


                                                                <!--span class="lbl pr-label1">new</span!-->
                                                                <?php

                                                                if ($p_data["Discount"] != 0) {

                                                                    $discount = $p_data["Discount"];
                                                                    $price = $p_data["Price"];

                                                                    $pre = ($price / 100) * $discount;
                                                                    $pre = intval($pre);

                                                                    ?>
                                                                    <span
                                                                        class="lbl pr-label1 bg-success">-<?php echo ($pre); ?>.00</span>
                                                                    <?php
                                                                }

                                                                ?>

                                                            </div>
                                                            <!-- End product label -->
                                                        </a>
                                                        <!-- end product image -->

                                                        <!-- countdown start -->
                                                        <div class="saleTime desktop" data-countdown="2024/06/01"></div>
                                                        <!-- countdown end -->

                                                        <!-- Start product button -->
                                                        <form class="variants add" action="#"
                                                            onclick="window.location.href='cart.html'" method="post">
                                                            <button class="btn btn-addto-cart" type="button"
                                                                tabindex="0">Add To Cart</button>
                                                        </form>
                                                        <!-- <div class="button-set">
                                                            <a href="javascript:void(0)" title="Quick View"
                                                                class="quick-view-popup quick-view" data-toggle="modal"
                                                                data-target="#content_quickview">
                                                                <i class="icon anm anm-search-plus-r"></i>
                                                            </a>
                                                            <div class="wishlist-btn">
                                                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                                    <i class="icon anm anm-heart-l"></i>
                                                                </a>
                                                            </div>
                                                            <div class="compare-btn">
                                                                <a class="compare add-to-compare" href="compare.html"
                                                                    title="Add to Compare">
                                                                    <i class="icon anm anm-random-r"></i>
                                                                </a>
                                                            </div>
                                                        </div> -->
                                                        <!-- end product button -->
                                                    </div>
                                                    <!-- end product image -->
                                                    <!--start product details -->
                                                    <div class="product-details text-center">
                                                        <!-- product name -->
                                                        <div class="product-name">
                                                            <a
                                                                href="short-description.html"><?php echo ($p_data["Title"]); ?></a>
                                                        </div>
                                                        <!-- End product name -->
                                                        <!-- product price -->
                                                        <div class="product-price">
                                                            <?php

                                                            if ($p_data["Discount"] != 0) {

                                                                $discount = $p_data["Discount"];
                                                                $price = $p_data["Price"];

                                                                $pre = ($price / 100) * $discount;
                                                                $pre = intval($pre);

                                                                ?>

                                                                <span
                                                                    class="old-price">Rs.<?php echo ($pre + $price); ?>.00</span>
                                                                <?php
                                                            }

                                                            ?>

                                                            <span
                                                                class="price">Rs.<?php echo ($p_data["Price"]); ?>.00</span>
                                                        </div>
                                                        <!-- End product price -->

                                                        <!-- <div class="product-review">
                                                            <i class="font-13 fa fa-star"></i>
                                                            <i class="font-13 fa fa-star"></i>
                                                            <i class="font-13 fa fa-star-o"></i>
                                                            <i class="font-13 fa fa-star-o"></i>
                                                            <i class="font-13 fa fa-star-o"></i>
                                                        </div> -->
                                                        <!-- Variant -->
                                                        <!-- <ul class="swatches">
                                                            <li class="swatch medium rounded"><img
                                                                    src="assets/images/product-images/variant1.jpg"
                                                                    alt="image" /></li>
                                                            <li class="swatch medium rounded"><img
                                                                    src="assets/images/product-images/variant2.jpg"
                                                                    alt="image" /></li>
                                                            <li class="swatch medium rounded"><img
                                                                    src="assets/images/product-images/variant3.jpg"
                                                                    alt="image" /></li>
                                                            <li class="swatch medium rounded"><img
                                                                    src="assets/images/product-images/variant4.jpg"
                                                                    alt="image" /></li>
                                                            <li class="swatch medium rounded"><img
                                                                    src="assets/images/product-images/variant5.jpg"
                                                                    alt="image" /></li>
                                                            <li class="swatch medium rounded"><img
                                                                    src="assets/images/product-images/variant6.jpg"
                                                                    alt="image" /></li>
                                                        </ul> -->
                                                        <!-- End Variant -->
                                                    </div>
                                                    <!-- End product details -->
                                                </div>
                                                <?php


                                            }

                                            ?>




                                        </div>
                                    </div>

                                    <!-- Mens !-->

                                    <div id="tab2" class="tab_content grid-products">
                                        <div class="productSlider">

                                            <?php

                                            $rs = Database::search("SELECT * FROM `product` WHERE `Category_Cat_id` = '2' AND `status_id` = '1' LIMIT 5");


                                            for ($x = 0; $x < $rs->num_rows; $x++) {

                                                $p_data = $rs->fetch_assoc();
                                                $image = Database::search("SELECT * FROM `product_image_main` WHERE `Product_P_id` = '" . $p_data["P_id"] . "'");
                                                $image_file = $image->fetch_assoc();

                                                $image2 = Database::search("SELECT * FROM `product_image2` WHERE `Product_P_id` = '" . $p_data["P_id"] . "'");
                                                $image_file2 = $image2->fetch_assoc();


                                                ?>


                                                <div class="col-12 item">
                                                    <!-- start product image -->
                                                    <div class="product-image">
                                                        <!-- start product image -->
                                                        <a href="short-description.php?p_id=<?php echo $p_data['P_id']; ?>">
                                                            <!-- image -->
                                                            <img class="primary blur-up lazyload"
                                                                data-src="<?php echo ($image_file['images']); ?>"
                                                                src="<?php echo ($image_file['images']); ?>" alt="image"
                                                                title="product">
                                                            <!-- End image -->
                                                            <!-- Hover image -->
                                                            <img class="hover blur-up lazyload"
                                                                data-src="<?php echo ($image_file2['image']); ?>"
                                                                src="<?php echo ($image_file2['image']); ?>" alt="image"
                                                                title="product">
                                                            <!-- End hover image -->
                                                            <!-- product label -->
                                                            <div class="product-labels rectangular"><?php

                                                            if ($p_data["Discount"] != 0) {

                                                                ?>
                                                                    <span
                                                                        class="lbl on-sale">-<?php echo ($p_data["Discount"]); ?>%</span> <?php


                                                            }

                                                            ?>
                                                                <span class="lbl pr-label1">new</span>
                                                            </div>
                                                            <!-- End product label -->
                                                        </a>
                                                        <!-- end product image -->

                                                        <!-- Start product button -->
                                                        <form class="variants add" action="#"
                                                            onclick="window.location.href='cart.html'" method="post">
                                                            <button class="btn btn-addto-cart" type="button"
                                                                tabindex="0">Add To Cart</button>
                                                        </form>
                                                        <div class="button-set">
                                                            <a href="javascript:void(0)" title="Quick View"
                                                                class="quick-view-popup quick-view" data-toggle="modal"
                                                                data-target="#content_quickview">
                                                                <i class="icon anm anm-search-plus-r"></i>
                                                            </a>
                                                            <div class="wishlist-btn">
                                                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                                    <i class="icon anm anm-heart-l"></i>
                                                                </a>
                                                            </div>
                                                            <div class="compare-btn">
                                                                <a class="compare add-to-compare" href="compare.html"
                                                                    title="Add to Compare">
                                                                    <i class="icon anm anm-random-r"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- end product button -->
                                                    </div>
                                                    <!-- end product image -->

                                                    <!--start product details -->
                                                    <div class="product-details text-center">
                                                        <!-- product name -->
                                                        <div class="product-name">
                                                            <a
                                                                href="short-description.html"><?php echo ($p_data["Title"]); ?></a>
                                                        </div>
                                                        <!-- End product name -->
                                                        <!-- product price -->
                                                        <div class="product-price">
                                                            <span class="price">RS. <?php echo ($p_data["Price"]); ?>
                                                                .00</span>
                                                        </div>
                                                        <!-- End product price -->

                                                        <div class="product-review">
                                                            <i class="font-13 fa fa-star"></i>
                                                            <i class="font-13 fa fa-star"></i>
                                                            <i class="font-13 fa fa-star"></i>
                                                            <i class="font-13 fa fa-star-o"></i>
                                                            <i class="font-13 fa fa-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <!-- End product details -->
                                                </div>


                                                <?php
                                            }

                                            ?>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Collection Tab slider-->

         
            <!--Logo Slider-->
            <!-- <div class="section logo-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="logo-bar">
                                <div class="logo-bar__item">
                                    <img src="assets/images/logo/brandlogo1.png" alt="" title="" />
                                </div>
                                <div class="logo-bar__item">
                                    <img src="assets/images/logo/brandlogo2.png" alt="" title="" />
                                </div>
                                <div class="logo-bar__item">
                                    <img src="assets/images/logo/brandlogo3.png" alt="" title="" />
                                </div>
                                <div class="logo-bar__item">
                                    <img src="assets/images/logo/brandlogo4.png" alt="" title="" />
                                </div>
                                <div class="logo-bar__item">
                                    <img src="assets/images/logo/brandlogo5.png" alt="" title="" />
                                </div>
                                <div class="logo-bar__item">
                                    <img src="assets/images/logo/brandlogo6.png" alt="" title="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--End Logo Slider-->



          
            <!--Store Feature-->
            <div class="store-feature section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="display-table store-info">
                                <li class="display-table-cell">
                                    <i class="icon anm anm-truck-l"></i>
                                    <h5>Best Shipping</h5>
                                    <span class="sub-text">All Products Delivered On time.</span>
                                </li>
                                <li class="display-table-cell">
                                    <i class="icon anm anm-dollar-sign-r"></i>
                                    <h5>Money Guarantee</h5>
                                    <span class="sub-text">30 days money back guarantee</span>
                                </li>
                                <li class="display-table-cell">
                                    <i class="icon anm anm-comments-l"></i>
                                    <h5>Online Support</h5>
                                    <span class="sub-text">We support online 24/7 on day</span>
                                </li>
                                <li class="display-table-cell">
                                    <i class="icon anm anm-credit-card-front-r"></i>
                                    <h5>Secure Payments</h5>
                                    <span class="sub-text">All payment are Secured and trusted.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--End Store Feature-->
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

        <!-- Newsletter Popup -->
        <div class="newsletter-wrap" id="popup-container">
            <div id="popup-window">
                <a class="btn closepopup"><i class="icon icon anm anm-times-l"></i></a>
                <!-- Modal content-->
                <div class="display-table splash-bg">
                    <div class="display-table-cell width40"><img src="assets/images/newsletter-img.jpg"
                            alt="Join Our Mailing List" title="Join Our Mailing List" /> </div>
                    <div class="display-table-cell width60 text-center">
                        <div class="newsletter-left">
                            <h2>Join Our Mailing List</h2>
                            <p>Sign Up for our exclusive email list and be the first to know about new products and
                                special offers</p>
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="email" class="input-group__field newsletter__input" name="EMAIL"
                                        value="" placeholder="Email address" required="">
                                    <span class="input-group__btn">
                                        <button type="submit" class="btn newsletter__submit" name="commit"
                                            id="subscribeBtn"> <span
                                                class="newsletter__submit-text--large">Subscribe</span> </button>
                                    </span>
                                </div>
                            </form>
                            <ul class="list--inline site-footer__social-icons social-icons">
                                <li><a class="social-icons__link" href="#" title="Facebook"><i
                                            class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="Twitter"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="Pinterest"><i class="fa fa-pinterest"
                                            aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="Instagram"><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="YouTube"><i class="fa fa-youtube"
                                            aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="Vimeo"><i class="fa fa-vimeo"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Newsletter Popup -->

        <!-- Including Jquery -->
        <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="assets/js/vendor/jquery.cookie.js"></script>
        <script src="assets/js/vendor/wow.min.js"></script>
        <!-- Including Javascript -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/lazysizes.js"></script>
        <script src="assets/js/main.js"></script>
        <!--For Newsletter Popup-->
        <!-- <script>
            jQuery(document).ready(function () {
                jQuery('.closepopup').on('click', function () {
                    jQuery('#popup-container').fadeOut();
                    jQuery('#modalOverly').fadeOut();
                });

                var visits = jQuery.cookie('visits') || 0;
                visits++;
                jQuery.cookie('visits', visits, { expires: 1, path: '/' });
                console.debug(jQuery.cookie('visits'));
                if (jQuery.cookie('visits') > 1) {
                    jQuery('#modalOverly').hide();
                    jQuery('#popup-container').hide();
                } else {
                    var pageHeight = jQuery(document).height();
                    jQuery('<div id="modalOverly"></div>').insertBefore('body');
                    jQuery('#modalOverly').css("height", pageHeight);
                    jQuery('#popup-container').show();
                }
                if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
            });

            jQuery(document).mouseup(function (e) {
                var container = jQuery('#popup-container');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.fadeOut();
                    jQuery('#modalOverly').fadeIn(200);
                    jQuery('#modalOverly').hide();
                }
            });
        </script> -->
        <!--End For Newsletter Popup-->

        <script src="script.js"></script>
    </div>
</body>


</html>