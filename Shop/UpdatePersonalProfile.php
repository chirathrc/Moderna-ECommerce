<?php
session_start();
include ('connection.php'); // Include the file that contains the Database class



if (isset($_SESSION["u"])) {

    $data = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION['u']['email'] . "'");

    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $mobile = $_POST['mobile'];

    if (empty($fn)) {
        echo ("Your First Name Is Empty");
    } else if (empty($ln)) {
        echo ("Your Last Name Is Empty");
    } else if (empty($mobile)) {
        echo ("Add Your Mobile Number");

    } else if (!preg_match('/^0\d{9}$/', $mobile)) {
        echo ("Invalid Mobile Number");

    } else {

        Database::iud("UPDATE `user` SET `mobile` = '" . $mobile . "', `F_name` = '" . $fn . "' , `L_name` = '" . $ln . "' WHERE `email` = '" . $_SESSION['u']['email'] . "'");
        echo ("OK");
    }

} else {
    echo ("Unknown Error Occurred");
}


?>