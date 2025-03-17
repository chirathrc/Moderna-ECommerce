<!--Search Form Drawer-->
<div class="search">
    <div class="search__form">
        <form class="search-bar__form" action="#">
            <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
            <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..."
                aria-label="Search" autocomplete="off">
        </form>
        <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
    </div>
</div>
<!--End Search Form Drawer-->
<!--Top Header-->
<div class="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                <div class="currency-picker">
                    <span class="selected-currency">LKR</span>

                </div>
                <div class="language-dropdown">
                    <span class="language-dd">English</span>

                </div>
                <p class="phone-no"><i class="anm anm-phone-s"></i>
                    +94 713828744
                </p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                <div class="text-center">
                    <p class="top-header_middle-text">Our Shipping Cover All Sri Lanka</p>
                </div>
            </div>
            <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                <ul class="customer-links list-inline">

                    <?php


                    if (!isset($_SESSION['u'])) {
                        ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Create Account</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <?php

                    } else {
                        $data = $_SESSION["u"];
                        ?>

                        <li class="lvl1 parent megamenu">
                            <span>Hi </span><a href="profile.php"
                                class="text-white"><?= $data['F_name'] . " " . $data['L_name'] ?></a>
                        </li>


                        <?php
                    }
                    ?>


                    <li><a href="wishlist.php">Wishlist</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Top Header-->