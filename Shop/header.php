<?

session_start();
include ('connection.php');

?>

<div class="header-wrap classicHeader animated d-flex">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!--Desktop Logo-->
            <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                <a href="index.php">
                    <img src="Images\MODERNA1.1.png" alt="Belle Multipurpose Html Template"
                        title="Belle Multipurpose Html Template" />
                </a>
            </div>
            <!--End Desktop Logo-->
            <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                <div class="d-block d-lg-none">
                    <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        <i class="icon anm anm-times-l"></i>
                        <i class="anm anm-bars-r"></i>
                    </button>
                </div>
                <!--Desktop Menu-->
                <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                    <ul id="siteNav" class="site-nav medium center hidearrow">
                        <li class="lvl1"><a href="index.php">Home <i class="anm anm-angle-down-l"></i></a>
                        </li>
                        <!-- <li class="lvl1 parent megamenu"><a href="grid.php">Shop <i class="anm anm-angle-down-l"></i></a> -->
                          
                        </li>
                        <!-- <li class="lvl1 parent megamenu"><a href="#">Product <i class="anm anm-angle-down-l"></i></a>
                            <div class="megamenu style2">
                                <ul class="grid mmWrapper">
                                    <li class="grid__item one-whole">
                                        <ul class="grid">
                                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#"
                                                    class="site-nav lvl-1">Product Page</a>
                                                <ul class="subLinks">
                                                    <li class="lvl-2"><a href="product-layout-1.html"
                                                            class="site-nav lvl-2">Product Layout 1</a></li>
                                                    <li class="lvl-2"><a href="product-layout-2.html"
                                                            class="site-nav lvl-2">Product Layout 2</a></li>
                                                    <li class="lvl-2"><a href="product-layout-3.html"
                                                            class="site-nav lvl-2">Product Layout 3</a></li>
                                                    <li class="lvl-2"><a href="product-with-left-thumbs.html"
                                                            class="site-nav lvl-2">Product With Left Thumbs</a>
                                                    </li>
                                                    <li class="lvl-2"><a href="product-with-right-thumbs.html"
                                                            class="site-nav lvl-2">Product With Right Thumbs</a>
                                                    </li>
                                                    <li class="lvl-2"><a href="product-with-bottom-thumbs.html"
                                                            class="site-nav lvl-2">Product With Bottom
                                                            Thumbs</a></li>
                                                </ul>
                                            </li>
                                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#"
                                                    class="site-nav lvl-1">Product Features</a>
                                                <ul class="subLinks">
                                                    <li class="lvl-2"><a href="short-description.html"
                                                            class="site-nav lvl-2">Short Description</a></li>
                                                    <li class="lvl-2"><a href="product-countdown.html"
                                                            class="site-nav lvl-2">Product Countdown</a></li>
                                                    <li class="lvl-2"><a href="product-video.html"
                                                            class="site-nav lvl-2">Product Video</a></li>
                                                    <li class="lvl-2"><a href="product-quantity-message.html"
                                                            class="site-nav lvl-2">Product Quantity Message</a>
                                                    </li>
                                                    <li class="lvl-2"><a href="product-visitor-sold-count.html"
                                                            class="site-nav lvl-2">Product Visitor/Sold Count
                                                            <span class="lbl nm_label3">Hot</span></a></li>
                                                    <li class="lvl-2"><a href="product-zoom-lightbox.html"
                                                            class="site-nav lvl-2">Product Zoom/Lightbox <span
                                                                class="lbl nm_label1">New</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#"
                                                    class="site-nav lvl-1">Product Features</a>
                                                <ul class="subLinks">
                                                    <li class="lvl-2"><a href="product-with-variant-image.html"
                                                            class="site-nav lvl-2">Product with Variant
                                                            Image</a></li>
                                                    <li class="lvl-2"><a href="product-with-color-swatch.html"
                                                            class="site-nav lvl-2">Product with Color Swatch</a>
                                                    </li>
                                                    <li class="lvl-2"><a href="product-with-image-swatch.html"
                                                            class="site-nav lvl-2">Product with Image Swatch</a>
                                                    </li>
                                                    <li class="lvl-2"><a href="product-with-dropdown.html"
                                                            class="site-nav lvl-2">Product with Dropdown</a>
                                                    </li>
                                                    <li class="lvl-2"><a href="product-with-rounded-square.html"
                                                            class="site-nav lvl-2">Product with Rounded
                                                            Square</a></li>
                                                    <li class="lvl-2"><a href="swatches-style.html"
                                                            class="site-nav lvl-2">Product Swatches All
                                                            Style</a></li>
                                                </ul>
                                            </li>
                                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#"
                                                    class="site-nav lvl-1">Product Features</a>
                                                <ul class="subLinks">
                                                    <li class="lvl-2"><a href="product-accordion.html"
                                                            class="site-nav lvl-2">Product Accordion</a></li>
                                                    <li class="lvl-2"><a href="product-pre-orders.html"
                                                            class="site-nav lvl-2">Product Pre-orders <span
                                                                class="lbl nm_label1">New</span></a></li>
                                                    <li class="lvl-2"><a href="product-labels-detail.html"
                                                            class="site-nav lvl-2">Product Labels</a></li>
                                                    <li class="lvl-2"><a href="product-discount.html"
                                                            class="site-nav lvl-2">Product Discount In %</a>
                                                    </li>
                                                    <li class="lvl-2"><a href="product-shipping-message.html"
                                                            class="site-nav lvl-2">Product Shipping Message</a>
                                                    </li>
                                                    <li class="lvl-2"><a href="size-guide.html"
                                                            class="site-nav lvl-2">Size Guide <span
                                                                class="lbl nm_label1">New</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="grid__item large-up--one-whole imageCol"><a href="#"><img
                                                src="assets/images/megamenu-bg2.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </li> -->

                        <!-- <li class="lvl1 parent dropdown"><a href="#">Pages <i class="anm anm-angle-down-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="cart-variant1.html" class="site-nav">Cart Page <i
                                            class="anm anm-angle-right-l"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="cart-variant1.html" class="site-nav">Cart Variant1</a></li>
                                        <li><a href="cart-variant2.html" class="site-nav">Cart Variant2</a></li>
                                    </ul>
                                </li>
                                <li><a href="compare-variant1.html" class="site-nav">Compare Product <i
                                            class="anm anm-angle-right-l"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="compare-variant1.html" class="site-nav">Compare
                                                Variant1</a></li>
                                        <li><a href="compare-variant2.html" class="site-nav">Compare
                                                Variant2</a></li>
                                    </ul>
                                </li>
                                <li><a href="checkout.html" class="site-nav">Checkout</a></li>
                                <li><a href="about-us.html" class="site-nav">About Us <span
                                            class="lbl nm_label1">New</span> </a></li>
                                <li><a href="contact-us.html" class="site-nav">Contact Us</a></li>
                                <li><a href="faqs.html" class="site-nav">FAQs</a></li>
                                <li><a href="lookbook1.html" class="site-nav">Lookbook<i
                                            class="anm anm-angle-right-l"></i></a>
                                    <ul>
                                        <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                                        <li><a href="lookbook2.html" class="site-nav">Style 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="404.html" class="site-nav">404</a></li>
                                <li><a href="coming-soon.html" class="site-nav">Coming soon <span
                                            class="lbl nm_label1">New</span> </a></li>
                            </ul>
                        </li>
                        <li class="lvl1 parent dropdown"><a href="#">Blog <i class="anm anm-angle-down-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                                <li><a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                                <li><a href="blog-fullwidth.html" class="site-nav">Fullwidth</a></li>
                                <li><a href="blog-grid-view.html" class="site-nav">Gridview</a></li>
                                <li><a href="blog-article.html" class="site-nav">Article</a></li>
                            </ul>
                        </li>
                        <li class="lvl1"><a href="#"><b>Buy Now!</b> <i class="anm anm-angle-down-l"></i></a>
                        </li> -->
                    </ul>
                </nav>
                <!--End Desktop Menu-->
            </div>
            <!--Mobile Logo-->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                <div class="logo">
                    <a href="index.html">
                        <img src="assets/images/logo.svg" alt="Belle Multipurpose Html Template"
                            title="Belle Multipurpose Html Template" />
                    </a>
                </div>
            </div>


            <?php

            if (isset($_SESSION['u'])) {


                $user_data = $_SESSION['u'];


                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user_data['email'] . "'");
                $cart_id = $cart_rs->fetch_assoc();

                $product_cart_rs = Database::search("SELECT * FROM `product_has_cart` WHERE `cart_cart_id` = '" . $cart_id['cart_id'] . "'");
                $product_cart_rs_rows = $product_cart_rs->num_rows;


                if ($product_cart_rs_rows == 0) {

                    ?>
                    <!--Mobile Logo-->
                    <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                        <div class="site-cart">
                            <a href="cart.php" class="site-header__cartB">
                                <i class="icon anm anm-bag-l"></i>

                                <span id="CartCount" class="site-header__cart-count"
                                    data-cart-render="item_count"><?php echo ($product_cart_rs_rows) ?></span>
                            </a>

                        </div>
                    </div>

                    <?php

                } else {

                    ?>

                    <!--Mobile Logo-->
                    <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                        <div class="site-cart">
                            <a href="#;" class="site-header__cart" title="Cart">
                                <i class="icon anm anm-bag-l"></i>
                                <span id="CartCount" class="site-header__cart-count"
                                    data-cart-render="item_count"><?php echo ($product_cart_rs_rows) ?></span>
                            </a>

                            <!--Minicart Popup-->
                            <div id="header-cart" class="block block-cart">
                                <ul class="mini-products-list">


                                    <?php
                                    for ($x = 0; $x < 1; $x++) {

                                        $product_in_cart_data = $product_cart_rs->fetch_assoc();
                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $product_in_cart_data['Product_P_id'] . "'");
                                        $product = $product_rs->fetch_assoc();

                                        $product_image = Database::search("SELECT * FROM `product_image_main` WHERE `Product_P_id` = '" . $product['P_id'] . "'");
                                        $product_image_rs = $product_image->fetch_assoc();

                                        $color = Database::search("SELECT * FROM `colours` WHERE `colour_id` = '" . $product_in_cart_data['colours_colour_id'] . "'");
                                        $color_data = $color->fetch_assoc();

                                        $size_rs = Database::search("SELECT * FROM `size_clothing` WHERE `size_id` = '" . $product['Size_Clothing_size_id'] . "'");
                                        $size_data = $size_rs->fetch_assoc();

                                        ?>


                                        <li class="item">
                                            <a class="product-image" href="#">
                                                <img src="<?php echo ($product_image_rs['images']); ?>"
                                                    alt="3/4 Sleeve Kimono Dress" title="" />
                                            </a>
                                            <div class="product-details">
                                                <a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                                <a href="#" class="edit-i remove"><i class="anm anm-edit"
                                                        aria-hidden="true"></i></a>
                                                <a class="pName" href="cart.php"><?php echo ($product['Title']); ?></a>
                                                <div class="variant-cart"><?php echo ($color_data['colour']); ?> /
                                                    <?php echo ($size_data['size']); ?>
                                                </div>
                                                <div class="wrapQtyBtn">
                                                    <div class="qtyField">

                                                        <span class="label">Qty:</span>

                                                        <input type="text" id="Quantity" name="quantity"
                                                            value="<?php echo ($product_in_cart_data['qty']); ?>"
                                                            class="product-form__input qty" disabled>

                                                    </div>
                                                </div>
                                                <div class="priceRow">
                                                    <div class="product-price">
                                                        <span class="money">Rs.<?php echo ($product['Price']); ?>.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>



                                        <?php

                                    }
                                    ?>


                                </ul>
                                <div class="total">
                                    <div class="total-in">

                                        <?php

                                        $product_cart_rs_new = Database::search("SELECT * FROM `product_has_cart` WHERE `cart_cart_id` = '" . $cart_id['cart_id'] . "'");
                                        $total = 0;
                                        for ($x = 0; $x < $product_cart_rs_rows; $x++) {

                                            $product_in_cart_data_new = $product_cart_rs_new->fetch_assoc();
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $product_in_cart_data_new['Product_P_id'] . "'");
                                            $product = $product_rs->fetch_assoc();

                                            $price = $product['Price'];
                                            $qty = $product_in_cart_data_new['qty'];

                                            $total = $total + ($price * $qty);

                                        }

                                        ?>
                                        <span class="label">Cart Subtotal:</span><span class="product-price"><span
                                                class="money">Rs.<?php echo ($total) ?>.00</span></span>
                                    </div>
                                    <div class="buttonSet text-center">
                                        <a href="cart.php" class="btn btn-secondary btn--small">View Cart</a>
                                        <a href="cartCheckout.php" class="btn btn-secondary btn--small">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!--EndMinicart Popup-->
                        </div>
                        <div class="site-header__search">
                            <button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                        </div>
                    </div>

                    <?php
                }

            }

            ?>



        </div>
    </div>
</div>