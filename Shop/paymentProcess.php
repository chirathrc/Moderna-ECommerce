<?php
session_start();
include ("connection.php");

// Check if user is logged in
if (!isset($_SESSION['u'])) {
    echo ("Unknown Error Occured");
    exit;
}

// Retrieve POST data sent from client-side (assuming delivery, total, mobile, postal are sent)
$delivery = $_POST['delivery'];
$mobile = $_POST['mobile'];
$postal = $_POST['postal'];

// Generate a random order ID

// Validate presence of required POST data
if (empty($delivery || $total || $mobile || $postal)) {
    echo ("Unknown Error Occured");
    exit;
}

// Allow cross-origin requests (CORS) - adjust as needed
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

// Retrieve user session data
$user = $_SESSION["u"];

// Retrieve user's address from database
$addressResult = Database::search("SELECT * FROM `address` 
                                   INNER JOIN `city` ON `address`.`City_city_id` = `city`.`city_id`
                                   INNER JOIN `distric` ON `city`.`Distric_Dis_id` = `distric`.`Dis_id`  
                                   WHERE `user_email` = '" . $_SESSION['u']['email'] . "'")->fetch_assoc();



$stockList = array();
$qtyList = array();

if (isset($_POST['pId']) && isset($_POST['qty'])) {

    $p_id = $_POST['pId'];
    $qty = $_POST['qty'];

    $stockList[] = $p_id;
    $qtyList[] = $qty;

} else if (isset($_POST['cart'])) {

    $cartIDResult = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user['email'] . "' ")->fetch_assoc();
    $cartItemsResult = Database::search("SELECT * FROM `product_has_cart` WHERE `cart_cart_id` = '" . $cartIDResult['cart_id'] . "'");


    // Loop through cart items to gather product IDs and quantities
    for ($i = 0; $i < $cartItemsResult->num_rows; $i++) {
        $cartItemsData = $cartItemsResult->fetch_assoc();
        $stockList[] = $cartItemsData["Product_P_id"];
        $qtyList[] = $cartItemsData["qty"];
    }

}

// Retrieve items in the user's cart

// Initialize arrays to store product IDs and quantities


// Initialize variables for payment data
$merchantId = "1225753"; // Replace with your sandbox Merchant ID
$merchantSecret = ""; // Replace with your sandbox Merchant Secret
$items = "";
$netTotal = 0;
$currency = "LKR";
$orderId = uniqid(); // Generate a unique order ID

// Loop through cart items to calculate net total and validate stock availability
for ($i = 0; $i < sizeof($stockList); $i++) {
    $productResult = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $stockList[$i] . "'");
    $productData = $productResult->fetch_assoc();
    $stockQty = $productData["qty"];

    if ($stockQty >= $qtyList[$i]) {
        // Stock available, add product to items list and calculate total
        $items .= $productData["Title"];

        if ($i != sizeof($stockList) - 1) {
            $items .= ", ";
        }

        $netTotal += (intval($productData["Price"]) * intval($qtyList[$i]));
    } else {
        // Product has insufficient stock
        echo ("Product has no available stock");
        exit();
    }
}

// Add delivery fee to net total
$netTotal += $delivery;

// Generate hash for payment verification
$hash = strtoupper(md5($merchantId . $orderId . number_format($netTotal, 2, '.', '') . $currency . strtoupper(md5($merchantSecret))));

// Prepare payment data array
$payment = array();
$payment["sandbox"] = true; // Indicate that this is a sandbox transaction
$payment["merchant_id"] = $merchantId;
$payment["first_name"] = $user["F_name"];
$payment["last_name"] = $user["L_name"];
$payment["email"] = $user["email"];
$payment["phone"] = $mobile;
$payment["address"] = $addressResult['line1'] . $addressResult['line2']; // Adjust as per your database structure
$payment["city"] = $addressResult['city']; // Adjust as per your database structure
$payment["country"] = "Sri Lanka"; // Adjust as needed
$payment["order_id"] = $orderId;
$payment["items"] = $items;
$payment["currency"] = $currency;
$payment["amount"] = number_format($netTotal, 2, '.', ''); // Format netTotal to 2 decimal places
$payment["hash"] = $hash;
$payment["return_url"] = "http://yourdomain.com/return"; // Set the actual return URL
$payment["cancel_url"] = "http://yourdomain.com/cancel"; // Set the actual cancel URL
$payment["notify_url"] = "http://yourdomain.com/notify"; // Set the actual notify URL

// Encode payment data as JSON and output
echo json_encode($payment);
?>
