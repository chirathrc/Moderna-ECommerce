<?php
session_start();
include ("connection.php");

if (!isset($_SESSION["u"])) {

    echo ("unknown Error Occured");
    exit;

}


$orderID = $_POST['OrderId'];
$statusId = $_POST['statusValue'];

if (empty($orderID) || empty($statusId)) {

    echo ("Error Occured");

} else {


    $orderRs = Database::search("SELECT * FROM `orders` WHERE `orderid` = '" . $orderID . "'")->num_rows;

    if ($orderRs == '1') {

        Database::iud("UPDATE `orders` SET `DeliveryStatus_idDeliveryStatus` = '" . $statusId . "' WHERE `orderid` = '" . $orderID . "'");
        echo ("Success");

    } else {
        echo ("Unknown Error Occured Please Try Again");
    }

}

?>