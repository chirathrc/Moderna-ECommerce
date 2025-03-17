<?php
session_start();
include ("connection.php");

if (!isset($_SESSION["u"])) {

    echo ("Unknow error Occured");
    exit;

}

$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$mobile = $_POST["mobile"];

if (empty($fName)) {

    echo ("Enter your First Name");

} elseif (empty($lName)) {

    echo ("Enter your Last Name");

} elseif (empty($mobile)) {

    echo ("Enter your Mobile Number");


} else {

    Database::iud("UPDATE `user` SET `F_name` = '" . $fName . "', `L_name` = '" . $lName . "' ,`mobile` = '" . $mobile . "' WHERE `email` = '".$_SESSION['u']['email']."'");
    echo ("Success");

}




?>