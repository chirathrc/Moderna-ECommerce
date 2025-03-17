<?php
include ('connection.php');

$crt_id = $_POST["crt_id"];
$qty = $_POST["qty"];

$cart_data_rs = Database::search("SELECT * FROM `product_has_cart` WHERE `crt_id` = '" . $crt_id . "'");

if ($cart_data_rs->num_rows == 1) {

    Database::iud("UPDATE `product_has_cart` SET `qty` = '" . $qty . "' WHERE `crt_id` = '" . $crt_id . "'");

    echo("Success");

} else {

    echo ("Unknown Error Occured");
}

?>