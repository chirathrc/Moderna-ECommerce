<?php
session_start();
use Vtiful\Kernel\Format;

include ('connection.php');
if (isset($_SESSION['u'])) {
    $accountUser = $_SESSION['u'];
}

if (isset($_GET['p_id'])) {

    $p_id = $_GET['p_id'];

    $rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $p_id . "'");
    $product_data = $rs->fetch_assoc();


    $image_Main = Database::search("SELECT * FROM `product_image_main` WHERE `Product_P_id` = '" . $p_id . "'");
    $Main_image = $image_Main->fetch_assoc();

    $image_second = Database::search("SELECT * FROM `product_image2` WHERE `Product_P_id` = '" . $p_id . "'");
    $Second_image = $image_second->fetch_assoc();


} else {
    ?>

    <script>
        window.location = "index.php";
    </script>

    <?php
}
?>




<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product Description &ndash; Moderna</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="Images\MODERNA1.1.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="assets/css/plugins.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body class="template-product belle">
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
        <div id="page-content" style="margin-top: 60px;">
            <!--MainContent-->
            <div id="MainContent" class="main-content" role="main">
                <!--Breadcrumb-->
                <div class="bredcrumbWrap" style="background-color: black;">
                    <div class="container breadcrumbs ">
                        <a href="index.php" title="Back to the home page" style="color: white;">Home</a><span
                            aria-hidden="true" style="color: white;">›</span><span style="color: white;">Short Description</span>
                    </div>
                </div>
                <!--End Breadcrumb-->

                <div id="ProductSection-product-template" class="product-template__container prstyle1 container">

                    <!--product-single-->
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-details-img">
                                    <div class="product-thumb">
                                        <div id="gallery" class="product-dec-slider-2 product-tab-left">


                                            <a data-image="<?php echo ($Main_image['images']); ?>"
                                                data-zoom-image="<?php echo ($Main_image['images']); ?>"
                                                class="slick-slide slick-cloned" data-slick-index="-4"
                                                aria-hidden="true" tabindex="-1">
                                                <img class="blur-up lazyload"
                                                    src="<?php echo ($Main_image['images']); ?>" alt="" />
                                            </a>

                                            <a data-image="<?php echo ($Second_image['image']); ?>"
                                                data-zoom-image="<?php echo ($Second_image['image']); ?>"
                                                class="slick-slide slick-cloned" data-slick-index="-3"
                                                aria-hidden="true" tabindex="-1">
                                                <img class="blur-up lazyload"
                                                    src="<?php echo ($Second_image['image']); ?>" alt="" />
                                            </a>

                                            <?php

                                            $img = Database::search("SELECT * FROM `product_images` WHERE `Product_P_id` = '" . $p_id . "'");



                                            for ($x = 0; $x < $img->num_rows; $x++) {

                                                $other_img = $img->fetch_assoc();

                                                ?>
                                                <a data-image="<?php echo ($other_img['image']); ?>"
                                                    data-zoom-image="<?php echo ($other_img['image']); ?>"
                                                    class="slick-slide slick-cloned" data-slick-index="-2"
                                                    aria-hidden="true" tabindex="-1">
                                                    <img class="blur-up lazyload" src="<?php echo ($other_img['image']); ?>"
                                                        alt="" />
                                                </a>
                                                <?php

                                            }

                                            ?>


                                        </div>
                                    </div>
                                    <div class="zoompro-wrap product-zoom-right pl-20">
                                        <div class="zoompro-span">
                                            <img class="zoompro blur-up lazyload"
                                                data-zoom-image="<?php echo ($Main_image['images']); ?>" alt=""
                                                src="<?php echo ($Main_image['images']); ?>" />
                                        </div>
                                        <div class="product-labels"><span class="lbl on-sale">Sale</span><span
                                                class="lbl pr-label1">new</span></div>
                                        <div class="product-buttons">
                                            <a href="#" class="btn popup-video" title="View Video"><i
                                                    class="icon anm anm-play-r" aria-hidden="true"></i></a>
                                            <a href="#" class="btn prlightbox" title="Zoom"><i
                                                    class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                        </div>
                                    </div>


                                    <div class="lightboximages">
                                        <a href="<?php echo ($Main_image['images']); ?>" data-size="1462x2048"></a>
                                        <a href="<?php echo ($Second_image['image']); ?>" data-size="1462x2048"></a>

                                        <?php

                                        $img1 = Database::search("SELECT * FROM `product_images` WHERE `Product_P_id` = '" . $p_id . "'");

                                        for ($x = 0; $x < $img1->num_rows; $x++) {

                                            $other_img = $img1->fetch_assoc();

                                            ?>
                                            <a href="<?php echo ($other_img['image']); ?>" data-size="1462x2048"></a>
                                            <?php

                                        }

                                        ?>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-single__meta">
                                    <h1 class="product-single__title"><?php echo ($product_data['Title']); ?></h1>
                                    <div class="product-nav clearfix">
                                        <a href="#" class="next" title="Next"><i class="fa fa-angle-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="prInfoRow">
                                        <div class="product-stock">

                                            <?php
                                            if ($product_data['qty'] != 0) {
                                                ?>
                                                <span class="instock ">In Stock</span>
                                                <?php

                                            } else {
                                                ?>
                                                <span class="outstock">Unavailable</span>
                                                <?php
                                            }
                                            ?>


                                        </div>
                                        <div class="product-sku">Code: <span class="variant-sku"><?php echo ($product_data['uniq_code']); ?></span></div>
                                        <!-- <div class="product-review"><a class="reviewLink" href="#tab2"><i
                                                    class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i
                                                    class="font-13 fa fa-star"></i><i
                                                    class="font-13 fa fa-star-o"></i><i
                                                    class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6
                                                    reviews</span></a></div> -->
                                    </div>
                                    <p class="product-single__price product-single__price-product-template">

                                        <?php

                                        if ($product_data["Discount"] != 0) {

                                            $discount = $product_data["Discount"];
                                            $price = $product_data["Price"];

                                            $pre = ($price / 100) * $discount;
                                            $pre = $pre + $price;
                                            $pre = intval($pre);

                                            ?>
                                            <s id="ComparePrice-product-template"><span
                                                    class="money">Rs<?php echo ($pre); ?>.00</span></s>
                                            <?php
                                        } else {
                                            ?>
                                            <span>Regular price</span>
                                            <?php
                                        }

                                        ?>
                                        <span
                                            class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                            <span id="ProductPrice-product-template"><span
                                                    class="money">Rs.<?php echo ($product_data['Price']); ?>.00</span></span>
                                        </span>

                                        <?php

                                        if ($product_data["Discount"] != 0) {

                                            $discount = $product_data["Discount"];
                                            $price = $product_data["Price"];

                                            $pre = ($price / 100) * $discount;

                                            $pre = intval($pre);

                                            ?>
                                            <s id="ComparePrice-product-template"><span
                                                    class="money">Rs<?php echo ($pre); ?>.00</span></s>

                                            <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                                <span>You Save</span>
                                                <span id="SaveAmount-product-template" class="product-single__save-amount">
                                                    <span class="money">Rs.<?php echo ($pre); ?>.00</span>
                                                </span>
                                                <span class="off">(<span><?php echo ($discount); ?></span>%)</span>
                                            </span>


                                            <?php
                                        } else {
                                            ?>
                                            <span>Regular price</span>
                                            <?php
                                        }

                                        ?>

                                    </p>
                                  
                                </div>
                                <div class="product-single__description rte">

                                    <p><?php echo ($product_data['Description']); ?></p>
                                </div>

                                <?php
                                if ($product_data['qty'] < 11) {
                                    ?>
                                    <div id="quantity_message">Hurry! Only <span
                                            class="items"><?php echo ($product_data['qty']); ?></span> left in stock.</div>
                                    <?php

                                }
                                ?>

                                <form id="product_form_10508262282" accept-charset="UTF-8"
                                    class="product-form product-form-product-template hidedropdown"
                                    enctype="multipart/form-data" !-->



                                    <?php

                                    $size_rs = Database::search("SELECT * FROM `size_clothing` WHERE `size_id` = '" . $product_data['Size_Clothing_size_id'] . "'");
                                    $size_data = $size_rs->fetch_assoc();

                                    ?>


                                    <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                        <div class="product-form__item">
                                            <label class="header">Size: <span class="slVariant"
                                                    id="size"><?php echo ($size_data['size']); ?> </span></label>


                                            <div data-value="XXXL" class="swatch-element l available">
                                                <input class="swatchInput" id="swatch-1-xxxl" type="radio"
                                                    name="option-1" value="XXXL">
                                                <label class="swatchLbl medium rectangle" for="swatch-1-xxxl"
                                                    title="XXXL"><?php echo ($size_data['size']); ?> </label>
                                            </div>



                                        </div>
                                    </div>


                                    <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                        <div class="product-form__item">

                                            <label class="header">Color: <span class="slVariant"
                                                    id="product_cl"></span></label>


                                            <?php

                                            $colours_rs = Database::search("SELECT * FROM `colours`
                                             INNER JOIN `product_has_colours` ON  `product_has_colours`.`colours_colour_id` = `colours`.`colour_id` WHERE `Product_P_id` = '" . $p_id . "'");



                                            for ($x = 0; $x < $colours_rs->num_rows; $x++) {

                                                $colour_data = $colours_rs->fetch_assoc();

                                                ?>

                                                <div onclick="cl('<?php echo ($colour_data['colour']); ?>','<?php echo ($colour_data['colour_id']); ?>');"
                                                    data-value="<?php echo ($colour_data['colour']); ?>"
                                                    class="swatch-element color <?php echo ($colour_data['colour']); ?> available">
                                                    <input class="swatchInput"
                                                        id="swatch-0-<?php echo ($colour_data['colour']); ?>" type="radio"
                                                        name="option-0"
                                                        value="<?php echo ($colour_data['colour']); ?>"><label
                                                        class="swatchLbl color small"
                                                        for="swatch-0-<?php echo ($colour_data['colour']); ?>"
                                                        style="background-color:<?php echo ($colour_data['colour']); ?>;"
                                                        title="<?php echo ($colour_data['colour']); ?>"></label>
                                                </div>

                                                <?php

                                            }

                                            ?>



                                            <!--div data-value="Maroon" class="swatch-element color maroon available">
                                                <input class="swatchInput" id="swatch-0-maroon" type="radio"
                                                    name="option-0" value="Maroon"><label class="swatchLbl color small"
                                                    for="swatch-0-maroon" style="background-color:maroon;"
                                                    title="Maroon"></label>
                                            </div!-->
                                            <!--div data-value="Blue" class="swatch-element color blue available">
                                                <input class="swatchInput" id="swatch-0-blue" type="radio"
                                                    name="option-0" value="Blue"><label class="swatchLbl color small"
                                                    for="swatch-0-blue" style="background-color:skyblue;"
                                                    title="Blue"></label>
                                            </div!-->

                                            <!--div onclick="cl('Dark Green');" data-value="Dark Green"
                                                class="swatch-element color dark-green available">
                                                <input class="swatchInput" id="swatch-0-dark-green" type="radio"
                                                    name="option-0" value="Dark Green"><label
                                                    class="swatchLbl color small" for="swatch-0-dark-green"
                                                    style="background-color:darkgreen;" title="Dark Green"></label>
                                            </div!-->

                                        </div>
                                    </div>




                                    <p class="infolinks">
                                        <a href="#sizechart" class="sizelink btn">
                                            Size Guide
                                        </a>
                                        <a href="#productInquiry" class="emaillink btn">
                                            Ask About this Product
                                        </a>
                                    </p>


                                    <!-- Product Action -->
                                    <div class="product-action clearfix">
                                        <div class="product-form__item--quantity">

                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <a class="qtyBtn " href="javascript:void(0);"
                                                        onclick="decreaseQuantity()"><i class="fa anm anm-minus-r"
                                                            aria-hidden="true"></i></a>
                                                    <!-- Updated id attribute to quantityInput -->

                                                    <input type="text" id="quantityInput" value="1" class="qty"
                                                        onchange="quantityChanged()" readonly>
                                                    <!-- Using readonly attribute to prevent manual editing of the quantity -->

                                                    <a class="qtyBtn"
                                                        onclick="increaseQuantity(<?php echo ($product_data['qty']); ?>)"
                                                        ;>
                                                        <i class=" fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>



                                        <?php
                                        if ($product_data['qty'] != 0) {
                                            ?>
                                            <div class="product-form__item--submit" onclick="cart(<?php echo ($p_id); ?>)">
                                                <button type="button" name="add" class="btn product-form__cart-submit">
                                                    <span>Add to cart</span>
                                                </button>
                                            </div>


                                            <?php

                                        } else {
                                            ?>
                                            <div class="product-form__item--submit" onclick="unvailbale()">
                                                <button type="button" name="add" class="btn product-form__cart-submit">
                                                    <span>Add to cart</span>
                                                </button>
                                            </div>

                                            <script>
                                                function unvailbale() {

                                                    <?php if (isset($_SESSION['u'])) { ?>
                                                        document.getElementById("errorDiv").classList.remove('visually-hidden');
                                                        document.getElementById("errorMsg").innerHTML = "This Product is Currently Out Of Stock";
                                                    <?php } else { ?>
                                                        window.location = "login.php";
                                                    <?php } ?>
                                                }
                                            </script>

                                            <?php
                                        }
                                        ?>


                                        <?php
                                        if ($product_data['qty'] != 0) {
                                            ?>
                                            <div class="shopify-payment-button" data-shopify="payment-button">

                                                <button type="button" onclick="BuyNowProcess(<?php echo ($p_id); ?>);"
                                                    class="shopify-payment-button__button shopify-payment-button__button--unbranded">Buy
                                                    it now
                                                </button>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="shopify-payment-button" data-shopify="payment-button">
                                                <button type="button" disabled
                                                    class="shopify-payment-button__button shopify-payment-button__button--unbranded">Buy
                                                    it now
                                                </button>
                                            </div>

                                            <!-- <script>
                                                function unavailable2() {

                                                    <?php if (isset($_SESSION['u'])) { ?>
                                                        document.getElementById("errorDiv").classList.remove('visually-hidden');
                                                        document.getElementById("errorMsg").innerHTML = "This Product is Currently Out Of Stock";
                                                    <?php } else { ?>
                                                        window.location = "login.php";
                                                    <?php } ?>
                                                }
                                            </script> -->

                                            <?php
                                        }
                                        ?>



                                    </div>


                                    <!-- End Product Action -->
                                </form>

                                <!--alert!-->
                                <div class="row d-flex justify-content-center mt-3 visually-hidden" id="errorDiv">
                                    <div class="alert alert-danger col-md-12 col-11" role="alert" id="errorMsg">

                                    </div>
                                </div>
                                <!--alert!-->

                                <div class="display-table shareRow">

                                    <?php

                                    if (isset($_SESSION['u'])) {

                                        $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_email` = '" . $_SESSION['u']['email'] . "' AND `Product_P_id` = '" . $p_id . "'");
                                        ?>

                                        <div class="display-table-cell medium-up--one-third">
                                            <div class="wishlist-btn">
                                                <a class="wishlist add-to-wishlist"
                                                    onclick="addWish(<?php echo ($p_id) ?>);" title="Add to Wishlist"
                                                    style="cursor: poi;">

                                                    <?php
                                                    if ($wishlist_rs->num_rows == 1) {
                                                        ?>
                                                        <i id="wishColor" class="icon anm anm-heart text-danger"
                                                            aria-hidden="true"></i>
                                                        <span>In Wishlist
                                                        </span>
                                                        <?php
                                                    } else {

                                                        ?>
                                                        <i id="wishColor" class="icon anm anm-heart text-dark"
                                                            aria-hidden="true"></i>
                                                        <span>Add To Wishlist
                                                        </span>

                                                        <?php
                                                    }
                                                    ?>


                                                </a>
                                            </div>
                                        </div> <?php

                                    }

                                    ?>

                                    
                                </div>

                                <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck"
                                        aria-hidden="true"></i> ONLY <b class="freeShip"><span
                                            class="money" data-currency-usd="Rs.350.00"
                                            data-currency="RS">Rs.350.00</span></b> FOR<b> SHIPPING!</b>
                                </p>

                                <?php

                                $d = new DateTime();
                                $tz = new DateTimeZone("Asia/Colombo");
                                $d->setTimezone($tz);

                                // Get the current date
                                $date = $d->format("Y-m-d");

                                // Get the day name of the current date
                                $dayName = $d->format("l");

                                // Get the month name of the current date
                                $monthName = $d->format("F");

                                // Get the day number of the current date
                                $dayNumber = $d->format("d");

                                // Add 4 days to the current date
                                $d->modify("+4 days");

                                $newDayName = $d->format("l");

                                // Get the modified date
                                $modifiedDate = $d->format("Y-m-d");

                                // Get the modified month name
                                $modifiedMonthName = $d->format("F");

                                // Get the day number of the modified date
                                $modifiedDayNumber = $d->format("d");





                                //echo "Current Date: " . $date . "<br>";
                                //echo "Day Name: " . $dayName . "<br>";
                                //echo "Month Name: " . $monthName . "<br>";
                                //echo "Day Number: " . $dayNumber . "<br>";
                                //echo "Modified Date (+4 days): " . $modifiedDate . "<br>";
                                //echo "Modified Month Name: " . $modifiedMonthName . "<br>";
                                //echo "Modified Day Number: " . $modifiedDayNumber;
                                
                                //Current Date: 2024-04-28
                                //Day Name: Monday
                                //Month Name: April
                                //Day Number: 28
                                //Modified Date (+4 days): 2024-05-02
                                //Modified Month Name: May
                                //Modified Day Number: 02
                                
                                $d->modify("+3 days");
                                $newRecieveDayName = $d->format("l");
                                $RecieveMonthName = $d->format("F");
                                $RecieveDayNumber = $d->format("d");


                                ?>

                                <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMATED
                                    DELIVERY BETWEEN <b id="fromDate"><?php echo ($newDayName) ?>.
                                        <?php echo ($modifiedMonthName) ?>
                                        <?php echo ($modifiedDayNumber) ?>
                                    </b> and <b id="toDate"><?php echo ($newRecieveDayName) ?>.
                                        <?php echo ($RecieveMonthName) ?> <?php echo ($RecieveDayNumber) ?></b>.
                                </p>



                                <!-- <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users"
                                        aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE
                                    LOOKING
                                    FOR THIS PRODUCT</div> -->
                            </div>
                        </div>
                    </div>
                    <!--End-product-single-->

                    <!--Product Fearure-->
                    <div class="prFeatures">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                                <img src="assets/images/credit-card.png" alt="Safe Payment" title="Safe Payment" />
                                <div class="details">
                                    <h3>Safe Payment</h3>Pay with the world's most payment methods.
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                                <img src="assets/images/shield.png" alt="Confidence" title="Confidence" />
                                <div class="details">
                                    <h3>Confidence</h3>Protection covers your purchase and personal data.
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                                <img src="assets/images/worldwide.png" alt="Worldwide Delivery"
                                    title="Worldwide Delivery" />
                                <div class="details">
                                    <h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+ countries &amp;
                                    regions.
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                                <img src="assets/images/phone-call.png" alt="Hotline" title="Hotline" />
                                <div class="details">
                                    <h3>Hotline</h3>Talk to help line for your question on +94 713828744
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Product Fearure-->



                    <!--Related Product Slider-->
                    <div class="related-product grid-products mt-5">
                        <header class="section-header">
                            <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                            <!-- <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number
                                of grid to show and products from store admin.</p> -->
                        </header>
                        <div class="productSlider">

                            <?php

                            $rs = Database::search("SELECT * FROM `product` WHERE `status_id` = '1' LIMIT 10");


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
                                                src="<?php echo ($image_file['images']); ?>" alt="image" title="product"
                                                style="height: 340px;">
                                            <!-- End image -->
                                            <!-- Hover image -->
                                            <img class="hover blur-up lazyload"
                                                data-src="<?php echo ($image_file2['image']); ?>"
                                                src="<?php echo ($image_file2['image']); ?>" alt="image" title="product"
                                                style="height: 340px;">
                                            <!-- End hover image -->
                                            <!-- product label -->
                                            <div class="product-labels rectangular"><?php

                                            if ($p_data["Discount"] != 0) {

                                                ?>
                                                    <span class="lbl on-sale">-<?php echo ($p_data["Discount"]); ?>%</span> <?php


                                            }

                                            ?>
                                                <span class="lbl pr-label1">new</span>
                                            </div>
                                            <!-- End product label -->
                                        </a>
                                        <!-- end product image -->

                                        <!-- Start product button -->
                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                            method="post">
                                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                Cart</button>
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
                                            <a href="short-description.html"><?php echo ($p_data["Title"]); ?></a>
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
                    <!--End Related Product Slider-->


                </div>
                <!--#ProductSection-product-template-->
            </div>
            <!--MainContent-->
        </div>
        <!--End Body Content-->

        <!--Footer-->
        <?php include ("footer.php") ?>

        <!--End Footer-->
        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->

        <div class="hide">
            <div id="sizechart">
                <h3>WOMEN'S BODY SIZING CHART</h3>
                <table>
                    <tbody>
                        <tr>
                            <th>Size</th>
                            <th>XS</th>
                            <th>S</th>
                            <th>M</th>
                            <th>L</th>
                            <th>XL</th>
                        </tr>
                        <tr>
                            <td>Chest</td>
                            <td>31" - 33"</td>
                            <td>33" - 35"</td>
                            <td>35" - 37"</td>
                            <td>37" - 39"</td>
                            <td>39" - 42"</td>
                        </tr>
                        <tr>
                            <td>Waist</td>
                            <td>24" - 26"</td>
                            <td>26" - 28"</td>
                            <td>28" - 30"</td>
                            <td>30" - 32"</td>
                            <td>32" - 35"</td>
                        </tr>
                        <tr>
                            <td>Hip</td>
                            <td>34" - 36"</td>
                            <td>36" - 38"</td>
                            <td>38" - 40"</td>
                            <td>40" - 42"</td>
                            <td>42" - 44"</td>
                        </tr>
                        <tr>
                            <td>Regular inseam</td>
                            <td>30"</td>
                            <td>30½"</td>
                            <td>31"</td>
                            <td>31½"</td>
                            <td>32"</td>
                        </tr>
                        <tr>
                            <td>Long (Tall) Inseam</td>
                            <td>31½"</td>
                            <td>32"</td>
                            <td>32½"</td>
                            <td>33"</td>
                            <td>33½"</td>
                        </tr>
                    </tbody>
                </table>
                <h3>MEN'S BODY SIZING CHART</h3>
                <table>
                    <tbody>
                        <tr>
                            <th>Size</th>
                            <th>XS</th>
                            <th>S</th>
                            <th>M</th>
                            <th>L</th>
                            <th>XL</th>
                            <th>XXL</th>
                        </tr>
                        <tr>
                            <td>Chest</td>
                            <td>33" - 36"</td>
                            <td>36" - 39"</td>
                            <td>39" - 41"</td>
                            <td>41" - 43"</td>
                            <td>43" - 46"</td>
                            <td>46" - 49"</td>
                        </tr>
                        <tr>
                            <td>Waist</td>
                            <td>27" - 30"</td>
                            <td>30" - 33"</td>
                            <td>33" - 35"</td>
                            <td>36" - 38"</td>
                            <td>38" - 42"</td>
                            <td>42" - 45"</td>
                        </tr>
                        <tr>
                            <td>Hip</td>
                            <td>33" - 36"</td>
                            <td>36" - 39"</td>
                            <td>39" - 41"</td>
                            <td>41" - 43"</td>
                            <td>43" - 46"</td>
                            <td>46" - 49"</td>
                        </tr>
                    </tbody>
                </table>
                <div style="padding-left: 30px;"><img src="assets/images/size.jpg" alt=""></div>
            </div>
        </div>
        <div class="hide">
            <div id="productInquiry">
                <div class="contact-form form-vertical">
                    <div class="page-title">
                        <h3>Camelia Reversible Jacket</h3>
                    </div>
                    <form method="post" action="#" id="contact_form" class="contact-form">
                        <input type="hidden" name="form_type" value="contact" />
                        <input type="hidden" name="utf8" value="✓" />
                        <div class="formFeilds">
                            <input type="hidden" name="contact[product name]" value="Camelia Reversible Jacket">
                            <input type="hidden" name="contact[product link]"
                                value="/products/camelia-reversible-jacket-black-red">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <input type="text" id="ContactFormName" name="contact[name]" placeholder="Name"
                                        value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="email" id="ContactFormEmail" name="contact[email]" placeholder="Email"
                                        autocapitalize="off" value="" required>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <input required type="tel" id="ContactFormPhone" name="contact[phone]"
                                        pattern="[0-9\-]*" placeholder="Phone Number" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <textarea required rows="10" id="ContactFormMessage" name="contact[body]"
                                        placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <input type="submit" class="btn" value="Send Message">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


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
        <!-- Photoswipe Gallery -->
        <script src="assets/js/vendor/photoswipe.min.js"></script>
        <script src="assets/js/vendor/photoswipe-ui-default.min.js"></script>
        <script>
            $(function () {
                var $pswp = $('.pswp')[0],
                    image = [],
                    getItems = function () {
                        var items = [];
                        $('.lightboximages a').each(function () {
                            var $href = $(this).attr('href'),
                                $size = $(this).data('size').split('x'),
                                item = {
                                    src: $href,
                                    w: $size[0],
                                    h: $size[1]
                                }
                            items.push(item);
                        });
                        return items;
                    }
                var items = getItems();

                $.each(items, function (index, value) {
                    image[index] = new Image();
                    image[index].src = value['src'];
                });
                $('.prlightbox').on('click', function (event) {
                    event.preventDefault();

                    var $index = $(".active-thumb").parent().attr('data-slick-index');
                    $index++;
                    $index = $index - 1;

                    var options = {
                        index: $index,
                        bgOpacity: 0.9,
                        showHideOpacity: true
                    }
                    var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                    lightBox.init();
                });
            });
        </script>
    </div>

    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close"
                        title="Close (Esc)"></button><button class="pswp__button pswp__button--share"
                        title="Share"></button><button class="pswp__button pswp__button--fs"
                        title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom"
                        title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left"
                    title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right"
                    title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>


</html>