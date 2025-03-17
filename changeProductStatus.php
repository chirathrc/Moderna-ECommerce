<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['u'])) {
    echo 'Unauthorized access';
    exit;
}

if (empty($_GET['pId'] || empty($_GET['statusId']))) {
    echo 'Unauthorized access';
    exit;
}

// Retrieve form data
$ProductId = $_GET['pId'];
$statusId = $_GET['statusId'];

if ($statusId == '1') {

    $statusId = "2";

} elseif ($statusId == '2') {

    $statusId = "1";

}

Database::iud("UPDATE `product` SET `status_id` = '".$statusId."' WHERE `P_id` = '" . $ProductId . "'");

echo ("Success");


?>