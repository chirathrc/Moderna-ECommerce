<?php
include "connection.php";

$minAmount = $_POST['minAmmount'];
$maxAmount = $_POST['maxAmount'];
$brandSelection = $_POST['brandSelection'];
$categorySelection = $_POST['categorySelection'];
$filterSize = $_POST['filterSize'];
$filterColor = $_POST['filterColor'];
$sort = $_POST["sort"];

// Pagination logic
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 12; // Number of products per page
$start = ($page - 1) * $perPage;

// Construct the query for fetching products
$query = "SELECT * FROM `product` 
        INNER JOIN `product_has_colours` ON `product_has_colours`.`Product_P_id` = `product`.`P_id`
        WHERE `status_id` = '1' AND `Price` >= $minAmount AND `Price` <= $maxAmount";

if ($brandSelection != 0) {
    $query .= " AND `Brand_B_id` = '$brandSelection'";
}

if ($categorySelection != 0) {
    $query .= " AND `Category_Cat_id` = '$categorySelection'";
}

if ($filterSize != 0) {
    $query .= " AND `Size_Clothing_size_id` = '$filterSize'";
}

if ($filterColor != 0) {
    $query .= " AND `product_has_colours`.`colours_colour_id` = '$filterColor'";
}

if ($sort == 1) {
    $query .= " ORDER BY `Title` ASC";
} else if ($sort == 2) {
    $query .= " ORDER BY `Title` DESC";
} else if ($sort == 3) {
    $query .= " ORDER BY `Price` ASC";
} else if ($sort == 4) {
    $query .= " ORDER BY `Price` DESC";
}

$query .= " LIMIT $start, $perPage";

// Execute the product query
$product_rs = Database::search($query);

// Construct the query for fetching the total number of filtered products
$totalProductsQuery = "SELECT COUNT(*) as total FROM `product` 
        INNER JOIN `product_has_colours` ON `product_has_colours`.`Product_P_id` = `product`.`P_id`
        WHERE `status_id` = '1'  AND `Price` >= $minAmount AND `Price` <= $maxAmount";

if ($brandSelection != 0) {
    $totalProductsQuery .= " AND `Brand_B_id` = '$brandSelection'";
}

if ($categorySelection != 0) {
    $totalProductsQuery .= " AND `Category_Cat_id` = '$categorySelection'";
}

if ($filterSize != 0) {
    $totalProductsQuery .= " AND `Size_Clothing_size_id` = '$filterSize'";
}

if ($filterColor != 0) {
    $totalProductsQuery .= " AND `product_has_colours`.`colours_colour_id` = '$filterColor'";
}

// Execute the total products query
$totalProducts = Database::search($totalProductsQuery)->fetch_assoc()['total'];
$totalPages = ceil($totalProducts / $perPage);

?>

<div class="row">
    <?php
    // Display products
    while ($product_rs_data = $product_rs->fetch_assoc()) {
        $image = Database::search("SELECT * FROM `product_image_main` WHERE `Product_P_id` = '" . $product_rs_data["P_id"] . "'");
        $image_file = $image->fetch_assoc();

        $image2 = Database::search("SELECT * FROM `product_image2` WHERE `Product_P_id` = '" . $product_rs_data["P_id"] . "'");
        $image_file2 = $image2->fetch_assoc();
        ?>

        <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
            <!-- start product image -->
            <div class="product-image">
                <a href="short-description.php?p_id=<?php echo $product_rs_data['P_id']; ?>">
                    <img class="primary blur-up lazyload" style="height: 380px;"
                        data-src="<?php echo ($image_file['images']); ?>" src="<?php echo ($image_file['images']); ?>"
                        alt="image" title="product">
                    <img class="hover blur-up lazyload" data-src="<?php echo ($image_file2['image']); ?>"
                        src="<?php echo ($image_file2['image']); ?>" alt="image" title="product">
                    <div class="product-labels rectangular">
                        <?php if (!empty($product_rs_data['Discount'])) { ?>
                            <span class="lbl on-sale">-<?php echo ($product_rs_data['Discount']); ?>%</span>
                        <?php } else { ?>
                            <span class="lbl pr-label1">new</span>
                        <?php } ?>
                    </div>
                </a>
                <form class="variants add" action="#">
                    <a href="short-description.php?p_id=<?php echo $product_rs_data['P_id']; ?>">
                        <button class="btn btn-addto-cart" type="button">Select Options</button>
                    </a>
                </form>
                <div class="button-set">
                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal"
                        data-target="#content_quickview">
                        <i class="icon anm anm-search-plus-r"></i>
                    </a>
                    <div class="wishlist-btn">
                        <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                            <i class="icon anm anm-heart-l"></i>
                        </a>
                    </div>
                    <div class="compare-btn">
                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                            <i class="icon anm anm-random-r"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="product-details text-center">
                <div class="product-name">
                    <a href="#"><?php echo ($product_rs_data['Title']); ?></a>
                </div>
                <div class="product-price">
                    <?php
                    if ($product_rs_data["Discount"] != 0) {
                        $discount = $product_rs_data["Discount"];
                        $price = $product_rs_data["Price"];
                        $pre = ($price / 100) * $discount;
                        $pre = $price + intval($pre);
                        ?>
                        <span class="old-price">Rs.<?php echo ($pre); ?>.00</span>
                    <?php } ?>
                    <span class="price">Rs.<?php echo ($product_rs_data['Price']); ?>.00</span>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

    <div class="pagination">
        <ul>
            <?php if ($page > 1): ?>
                <li><a href="?page=<?php echo $page - 1; ?>"><i class="fa fa-caret-left" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="<?php echo $page == $i ? 'active' : ''; ?>"><a
                        href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <?php if ($page < $totalPages): ?>
                <li class="next"><a href="?page=<?php echo $page + 1; ?>"><i class="fa fa-caret-right"
                            aria-hidden="true"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>