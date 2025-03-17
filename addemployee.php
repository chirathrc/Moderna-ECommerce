<?php


session_start();
include "connection.php";

if (!isset($_SESSION["u"])) {
    die("Unknown Error Occurred");
}

$mail = $_POST['Email'];
$positionId = $_POST['position'];
$status = $_POST['status'];

if (empty($mail) || $positionId == '0' || $status == '0') {

    echo ("All Details are Required.");

} else {

    $user_From_EmailRS = Database::search("SELECT * FROM `user` WHERE `email` = '" . $mail . "'");

    if ($user_From_EmailRS->num_rows == '1') {

        $user_From_EmailRS_Data = $user_From_EmailRS->fetch_assoc();
        $admin_From_EmailRs = Database::search("SELECT * FROM `admin` WHERE `user_email` = '" . $user_From_EmailRS_Data['email'] . "'");

        if ($admin_From_EmailRs->num_rows == '1') {

            Database::iud("UPDATE `admin` SET `Position_idPosition` = '" . $positionId . "' WHERE `user_email` = '" . $user_From_EmailRS_Data['email'] . "'");
            Database::iud("UPDATE `user` SET `status_id` = '" . $status . "' WHERE `email` = '" . $user_From_EmailRS_Data['email'] . "'");
            echo ("Success");


        } else {

            Database::iud("INSERT INTO `admin`(`user_email`,`Position_idPosition`) VALUES('" . $user_From_EmailRS_Data['email'] . "', '" . $positionId . "')");
            Database::iud("UPDATE `user` SET `status_id` = '" . $status . "' WHERE `email` = '" . $user_From_EmailRS_Data['email'] . "'");
            echo ("Success");


        }


    } else {

        echo ("Error Occured");
    }

}

?>