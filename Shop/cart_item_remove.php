<?php
session_start();
include ('connection.php');

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];
    $cr_id = $_GET["cr_id"];

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user['email'] . "'");

    $cart = $cart_rs->fetch_assoc();

    Database::iud("DELETE FROM `product_has_cart` WHERE `crt_id` = '" . $cr_id . "' AND `cart_cart_id` = '" . $cart['cart_id'] . "' ");


    echo ("success");


} else {
    echo ("Unknown Error Occured");
}





?>