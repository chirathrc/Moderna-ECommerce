<div class="mobile-nav-wrapper" role="navigation">
    <div class="closemobileMenu">
        <i class="icon anm anm-times-l pull-right" aria-label="Close Menu"></i> Close Menu
    </div>
    <ul id="MobileNav" class="mobile-nav">
        <li class="lvl1 parent megamenu">
            <a href="index.php">Home <i class="anm anm-plus-l"></i></a>
        </li>
        <li class="lvl1 parent megamenu">
            <a href="grid.php">Shop <i class="anm anm-plus-l"></i></a>
        </li>
        <!-- <li class="lvl1 parent megamenu">
            <a href="about.php">About <i class="anm anm-plus-l"></i></a>
        </li>
        <li class="lvl1 parent megamenu">
            <a href="contact.php">Contact <i class="anm anm-plus-l"></i></a>
        </li> -->
    </ul>
</div>

<style>
    .mobile-nav-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 1000;
        overflow-y: auto;
        display: none;
        /* Initially hidden */
        padding: 20px;
    }

    .mobile-nav-wrapper.active {
        display: block;
        /* Show when active */
    }

    .closemobileMenu {
        font-size: 20px;
        cursor: pointer;
        text-align: right;
        margin-bottom: 20px;
    }

    .mobile-nav {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mobile-nav .lvl1 {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .mobile-nav .lvl1 a {
        text-decoration: none;
        color: #333;
        font-size: 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mobile-nav .sub-menu {
        display: none;
        list-style: none;
        padding-left: 20px;
        margin-top: 10px;
    }

    .mobile-nav .sub-menu li {
        padding: 5px 0;
    }

    .mobile-nav .lvl1.active .sub-menu {
        display: block;
    }
</style>