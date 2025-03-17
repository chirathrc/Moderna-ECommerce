<?php
session_start();
include ('connection.php'); // Include the file that contains the Database class



if (isset($_SESSION["u"])) {

    $data = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION['u']['email'] . "'");


    $pro = $_POST['pro'];
    $dis = $_POST['dis'];
    $city = $_POST['city'];
    $ad1 = $_POST['ad1'];
    $ad2 = $_POST['ad2'];



    if ($pro == 0) {
        echo ("Select Province");
    } elseif ($dis == 0) {
        echo ("Select District");
    } elseif ($city == 0) {
        echo ("Select City");
    } elseif (empty($ad1)) {
        echo ("Add Address Line 01");
    } elseif (empty($ad2)) {
        echo ("Add Address Line 02");
    } else {

        $address_data = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION['u']['email'] . "'")->num_rows;

        if ($address_data == 1) {

            Database::iud("UPDATE `address` SET `line1` = '" . $ad1 . "', `line2` = '" . $ad2 . "', `City_city_id` = '" . $city . "' WHERE `user_email` = '" . $_SESSION['u']['email'] . "' ");
            echo ("OK");

        } else if ($address_data == 0) {

            Database::iud("INSERT INTO `address`(`line1`,`line2`,`City_city_id`,`user_email`) VALUES('" . $ad1 . "','" . $ad2 . "','" . $city . "','" . $_SESSION['u']['email'] . "')");
            echo ("OK");

        }



    }

} else {
    echo ("Wrong Number Format");
}




?>