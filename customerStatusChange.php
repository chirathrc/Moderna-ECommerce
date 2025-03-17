<?php

session_start();
include ("connection.php");

if (!isset($_SESSION["u"])) {

    echo ("unknown Error Occured");
    exit;

}


$email = $_GET["email"];

if (empty($email)) {

    echo ("Unknown Error Occured");

} else {

    $emailRs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");

    if ($emailRs->num_rows == '1') {

        $emailRsData = $emailRs->fetch_assoc();

        if ($emailRsData['status_id'] == '1') {

            Database::iud("UPDATE `user` SET `status_id` = '2' WHERE `email` = '" . $emailRsData['email'] . "'");
            echo ("Success");

        } elseif ($emailRsData['status_id'] == '2') {

            Database::iud("UPDATE `user` SET `status_id` = '1' WHERE `email` = '" . $emailRsData['email'] . "'");
            echo ("Success");

        } elseif ($emailRsData['status_id'] == '3') {

            Database::iud("UPDATE `user` SET `status_id` = '1' WHERE `email` = '" . $emailRsData['email'] . "'");
            echo ("Success");
        }



    } else {

        echo ("Something Went Wrong");
    }
}