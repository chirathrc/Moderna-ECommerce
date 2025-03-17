<?php

session_start();
include ('connection.php');

?>


<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop &ndash; Moderna</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="Images\MODERNA1.1.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/plugins.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body class="template-collection belle">
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
        <div id="page-content" style="margin-top: 70px;">
            <!--Collection Banner-->
            <div class="collection-header">
                <div class="collection-hero">
                    <div class="collection-hero__image"><img class="blur-up lazyload" data-src="Images\MODERNA2.1.png"
                            src="Images\MODERNA2.1.png" alt="Women" title="Women" /></div>
                    <div class="collection-hero__title-wrapper">
                        <h1 class="collection-hero__title page-width">Our Marketplace</h1>
                    </div>
                </div>
            </div>
            <!--End Collection Banner-->

            <div class="container">
                <div class="row">
                    <!--Sidebar-->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                        <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i>
                        </div>
                        <div class="sidebar_tags">
                            <!--Categories-->
                            <div class="sidebar_widget categories filter-widget">
                                <div class="widget-title">
                                    <h2>Categories</h2>
                                </div>
                                <div class="widget-content">

                                    <Select id="filterCategory">
                                        <Option value="0">Select Category</Option>

                                        <?php
                                        $categoryRs = Database::search("SELECT * FROM `category`");

                                        for ($x = 0; $x < $categoryRs->num_rows; $x++) {

                                            $categoryRsData = $categoryRs->fetch_assoc();
                                            ?>

                                            <Option value="<?php echo ($categoryRsData['Cat_id']) ?>">
                                                <?php echo ($categoryRsData['name']) ?>
                                            </Option>

                                            <?php

                                        }
                                        ?>
                                    </Select>

                                </div>
                            </div>
                            <!--Categories-->
                            <!--Price Filter-->
                            <div class="sidebar_widget filterBox filter-widget">
                                <div class="widget-title">
                                    <h2>Price (Rs.)</h2>
                                </div>
                                <div class="mt-4">
                                    <div class="price-filter">
                                        <form id="priceFilterForm" class="price-filter">
                                            <div id="slider-range"
                                                class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                    tabindex="0"></span>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                    tabindex="0"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-8">
                                                    <!-- input 1 -->
                                                    <input id="amount-min" type="text" class="form-control" readonly>

                                                    <span>to</span>
                                                    <!-- input 2 -->
                                                    <input id="amount-max" type="text"
                                                        class="form-control  mt-0 mt-md-2" readonly>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <style>
                                    .price-filter {
                                        background: #f9f9f9;
                                        padding: 15px;
                                        border-radius: 8px;
                                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                    }

                                    .price-filter .form-control {
                                        display: inline-block;
                                        width: calc(50% - 10px);
                                        margin-right: 10px;
                                    }

                                    .price-filter .btn {
                                        margin-top: 10px;
                                    }

                                    .ui-slider {
                                        margin-bottom: 20px;
                                    }

                                    @media (max-width: 576px) {
                                        .price-filter .form-control {
                                            width: 100%;
                                            margin-bottom: 10px;
                                        }
                                    }
                                </style>
                            </div>
                            <!--End Price Filter-->
                            <!--Size Swatches-->
                            <div class="sidebar_widget filterBox filter-widget size-swacthes">
                                <div class="widget-title">
                                    <h2>Size</h2>
                                </div>
                                <div class="filter-color swacth-list clearfix">

                                    <?php
                                    $size_rs = Database::search("SELECT * FROM `size_clothing`");


                                    for ($x = 0; $x < $size_rs->num_rows; $x++) {

                                        $size_rs_data = $size_rs->fetch_assoc();
                                        ?>
                                        <span class="swacth-btn " id="<?php echo ($size_rs_data['size_id']); ?>"
                                            onclick="sizePickerFilter(<?php echo ($size_rs_data['size_id']); ?>)">
                                            <?php echo ($size_rs_data['represent_letter']); ?></span>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <!--End Size Swatches-->
                            <!--Color Swatches-->
                            <div class="sidebar_widget filterBox filter-widget">
                                <div class="widget-title">
                                    <h2>Color</h2>
                                </div>
                                <div class="filter-color swacth-list clearfix">

                                    <?php
                                    $color_rs = Database::search("SELECT * FROM `colours`");


                                    for ($x = 0; $x < $color_rs->num_rows; $x++) {

                                        $color_rs_data = $color_rs->fetch_assoc();
                                        ?>

                                        <span class="swacth-btn" id="<?php echo ($color_rs_data['colour_id']); ?>"
                                            onclick="colourPickerFilter(<?php echo ($color_rs_data['colour_id']); ?>);"
                                            style="background-color: <?php echo ($color_rs_data['colour']); ?>;"></span>
                                        <?php
                                    }
                                    ?>


                                    <!--span class="swacth-btn white checked"></span>
                                    <span class="swacth-btn red"></span>
                                    <span class="swacth-btn blue"></span>
                                    <span class="swacth-btn pink"></span>
                                    <span class="swacth-btn gray"></span>
                                    <span class="swacth-btn green"></span>
                                    <span class="swacth-btn orange"></span>
                                    <span class="swacth-btn yellow"></span>
                                    <span class="swacth-btn blueviolet"></span>
                                    <span class="swacth-btn brown"></span>
                                    <span class="swacth-btn darkGoldenRod"></span>
                                    <span class="swacth-btn darkGreen"></span>
                                    <span class="swacth-btn darkRed"></span>
                                    <span class="swacth-btn dimGrey"></span>
                                    <span class="swacth-btn khaki"></span!-->
                                </div>
                            </div>
                            <!--End Color Swatches-->
                            <!--Brand-->
                            <div class="sidebar_widget filterBox filter-widget">
                                <div class="widget-title">
                                    <h2>Brands</h2>
                                </div>

                                <Select id="brandSelection">
                                    <option value="0">Select brand</option>

                                    <?php
                                    $brand_rs = Database::search("SELECT * FROM `brand`");


                                    for ($x = 0; $x < $color_rs->num_rows; $x++) {

                                        $brand_rs_data = $brand_rs->fetch_assoc();
                                        ?>

                                        <option value="<?php echo ($brand_rs_data['B_id']); ?>">
                                            <?php echo ($brand_rs_data['Brand_Name']); ?>
                                        </option>

                                        <?php
                                    }
                                    ?>


                                </Select>


                            </div>

                            <div class="col-12 col-12 text-md-right">
                                <button id="filter" class="btn btn-secondary btn--small form-control">Filter</button>
                            </div>

                        </div>
                    </div>
                    <!--End Sidebar-->
                    <!--Main Content-->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                        <div class="category-description">
                            <h3>Welcome to Moderna Marketplace</h3>
                            <p>Welcome to BELLE, your ultimate destination for all things fashion and beauty. At BELLE,
                                we offer an extensive range of high-quality clothing for every occasion, from casual
                                wear to elegant evening outfits. Our collection includes the latest trends in dresses,
                                tops, pants, and accessories to complete your look.</p>
                            <p>In addition to our stylish apparel, we provide a variety of cosmetics tailored to enhance
                                your natural beauty. Whether you’re looking for a complete wardrobe makeover or just the
                                perfect finishing touch, BELLE has everything you need to look and feel your best.
                                Discover your style with us today!</p>
                        </div>
                        <hr>
                        <div class="productList">
                            <!--Toolbar-->
                            <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product
                                Filters</button>
                            <div class="toolbar">
                                <div class="filters-toolbar-wrapper">
                                    <div class="row">
                                        <div
                                            class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                            <a href="shop-left-sidebar.html" title="Grid View"
                                                class="change-view change-view--active">
                                                <img src="assets/images/grid.jpg" alt="Grid" />
                                            </a>
                                            <a href="shop-listview.html" title="List View" class="change-view">
                                                <img src="assets/images/list.jpg" alt="List" />
                                            </a>
                                        </div>
                                        <div
                                            class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                            <span class="filters-toolbar__product-count">Showing: 22</span>
                                        </div>
                                        <div class="col-4 col-md-4 col-lg-4 text-right">
                                            <div class="filters-toolbar__item">
                                                <label for="SortBy" class="hidden">Sort</label>
                                                <select name="SortBy" id="SortBy" onchange="sortItems();"
                                                    class="filters-toolbar__input filters-toolbar__input--sort">
                                                    <option value="0" selected="selected">Sort</option>
                                                    <option value="1">Alphabetically, A-Z</option>
                                                    <option value="2">Alphabetically, Z-A</option>
                                                    <option value="3">Price, low to high</option>
                                                    <option value="4">Price, high to low</option>
                                                </select>
                                                <input class="collection-header__default-sort" type="hidden"
                                                    value="manual">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--End Toolbar-->
                            <div class="grid-products grid--view-items" id="gridView">
                                <div class="row">

                                    <?php
                                    // Get the current page or set a default
                                    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                                    $perPage = 12; // Number of products per page
                                    
                                    // Calculate the start index of the products for the current page
                                    $start = ($page - 1) * $perPage;

                                    // Fetch the total number of products
                                    $totalProducts = Database::search("SELECT COUNT(*) as total FROM `product` WHERE `status_id` = '1'")->fetch_assoc()['total'];
                                    $totalPages = ceil($totalProducts / $perPage);

                                    // Fetch products for the current page
                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `status_id` = '1' LIMIT $start, $perPage");

                                    for ($x = 0; $x < $product_rs->num_rows; $x++) {
                                        $product_rs_data = $product_rs->fetch_assoc();
                                        $image = Database::search("SELECT * FROM `product_image_main` WHERE `Product_P_id` = '" . $product_rs_data["P_id"] . "'");
                                        $image_file = $image->fetch_assoc();

                                        $image2 = Database::search("SELECT * FROM `product_image2` WHERE `Product_P_id` = '" . $product_rs_data["P_id"] . "'");
                                        $image_file2 = $image2->fetch_assoc();
                                        ?>

                                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a
                                                    href="short-description.php?p_id=<?php echo $product_rs_data['P_id']; ?>">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload" style="height: 380px;"
                                                        data-src="<?php echo ($image_file['images']); ?>"
                                                        src="<?php echo ($image_file['images']); ?>" alt="image"
                                                        title="product" style="height: 340px;">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="<?php echo ($image_file2['image']); ?>"
                                                        src="<?php echo ($image_file2['image']); ?>" alt="image"
                                                        title="product" style="height: 400px;">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular">
                                                        <?php
                                                        if (!empty($product_rs_data['Discount'])) {
                                                            ?>
                                                            <span
                                                                class="lbl on-sale">-<?php echo ($product_rs_data['Discount']); ?>%</span>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <span class="lbl pr-label1">new</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#">
                                                    <a
                                                        href="short-description.php?p_id=<?php echo $product_rs_data['P_id']; ?>">
                                                        <button class="btn btn-addto-cart" type="button">Select
                                                            Options</button>
                                                    </a>
                                                </form>

                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="#"
                                                            title="Add to Wishlist">
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
                                                    <a href="#"><?php echo ($product_rs_data['Title']); ?></a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <?php
                                                    if ($product_rs_data["Discount"] != 0) {
                                                        $discount = $product_rs_data["Discount"];
                                                        $price = $product_rs_data["Price"];
                                                        $pre = ($price / 100) * $discount;
                                                        $pre = $price + intval($pre);
                                                        ?>
                                                        <span class="old-price">Rs.<?php echo ($pre); ?>.00</span>
                                                        <?php
                                                    }
                                                    ?>
                                                    <span
                                                        class="price">Rs.<?php echo ($product_rs_data['Price']); ?>.00</span>
                                                </div>
                                                <!-- End product price -->
                                            </div>
                                            <!-- End product details -->
                                        </div>

                                        <?php
                                    }
                                    ?>

                                    <!-- Pagination -->
                                    <div class="pagination">
                                        <ul>
                                            <?php if ($page > 1): ?>
                                                <li><a href="?page=<?php echo $page - 1; ?>"><i class="fa fa-caret-left"
                                                            aria-hidden="true"></i></a></li>
                                            <?php endif; ?>
                                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                <li class="<?php echo $page == $i ? 'active' : ''; ?>"><a
                                                        href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                            <?php endfor; ?>
                                            <?php if ($page < $totalPages): ?>
                                                <li class="next"><a href="?page=<?php echo $page + 1; ?>"><i
                                                            class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                    <!--End Main Content-->
                                </div>
                            </div>

                        </div>
                        <!--End Body Content-->



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


                </div>
            </div>

            <?php
            include "footer.php";
            ?>

</body>

<!-- belle/shop-grid-3.html   11 Nov 2019 12:39:06 GMT -->

</html>