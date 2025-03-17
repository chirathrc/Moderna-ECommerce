<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['u'])) {
    echo 'Unauthorized access';
    exit;
}

if (!isset($_POST['pId'])) {
    echo 'Unauthorized access';
    exit;
}


// Retrieve form data
$ProductId = $_POST['pId'];
$name = $_POST['name'];
$price = $_POST['price'];
$discount = $_POST['discount'];

if (empty($discount)) {
    $discount = '0';
}

$qty = $_POST['qty'];
$desc = $_POST['desc'];




if (
    !empty($name) && !empty($price) && !empty($qty) && !empty($desc)
) {



    Database::iud("UPDATE `product` SET `Title` = '" . $name . "', `Price` = '" . $price . "', `Discount` = '" . $discount . "', `Description` = '" . $desc . "', `qty` = '" . $qty . "' WHERE `P_id` = '" . $ProductId . "'");

    echo ("Success");


} else {
    echo "Error: All fields are required.";

}
?>