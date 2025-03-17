<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_POST["payment"])) {

    $payment = json_decode($_POST["payment"], true);


    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H-i-s");

    $date->modify('+5 days');
    $Deliverydate = $date->format("Y-m-d H-i-s");

    Database::iud("INSERT INTO `orders` (`idOrders`,`dateTime`,`Total`,`user_email`,`calculatedDeliveryDate`,`invoice`,`DeliveryStatus_idDeliveryStatus`) 
    VALUES ('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $user["email"] . "','" . $Deliverydate . "','added','2')");

    $orderHistoryId = Database::$connection->insert_id;

    if (isset($payment['p_id']) && isset($payment['qty'])) {


        Database::iud("INSERT INTO `orders_has_product` (`Orders_orderid`, `Product_P_id`, `orderQTY`) 
        VALUES ('" . $orderHistoryId . "','" . $payment['p_id'] . "','" . $payment["qty"] . "')");

        // Fetch the product details
        $rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $payment["p_id"] . "'");
        $d = $rs->fetch_assoc();

        // Calculate new quantity
        $newQty = $d["qty"] - $payment["qty"];

        // Update the product quantity
        Database::iud("UPDATE `product` SET `qty` = '" . $newQty . "' WHERE `P_id` = '" . $payment["p_id"] . "'");

        // Output success message

        $order = array();
        $order["resp"] = "Success";
        $order["order_id"] = $orderHistoryId;

        echo json_encode($order);


    } else {

        $cartIDResult = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user['email'] . "' ")->fetch_assoc();
        $cartItemsResult = Database::search("SELECT * FROM `product_has_cart` WHERE `cart_cart_id` = '" . $cartIDResult['cart_id'] . "'");

        for ($x = 0; $x < $cartItemsResult->num_rows; $x++) {

            $cartIDResultData = $cartItemsResult->fetch_assoc();

            Database::iud("INSERT INTO `orders_has_product` (`Orders_orderid`, `Product_P_id`, `orderQTY`) 
        VALUES ('" . $orderHistoryId . "','" . $cartIDResultData['Product_P_id'] . "','" . $cartIDResultData["qty"] . "')");

            $rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $cartIDResultData['Product_P_id'] . "'");
            $d = $rs->fetch_assoc();


            $newQty = $d["qty"] - $cartIDResultData["qty"];
            Database::iud("UPDATE `product` SET `qty` = '" . $newQty . "' WHERE `P_id` = '" . $cartIDResultData['Product_P_id'] . "'");

            Database::iud("DELETE FROM `product_has_cart` WHERE `crt_id` = '" . $cartIDResultData['crt_id'] . "'");

        }

        // echo ("Success");

        $order = array();
        $order["resp"] = "Success";
        $order["order_id"] = $orderHistoryId;

        echo json_encode($order);

    }


}
