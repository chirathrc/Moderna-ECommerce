<?php
include ('connection.php');

if (isset($_COOKIE["email"]) && isset($_GET["otp"])) {
    $email = $_COOKIE["email"];
    $otp = $_GET["otp"];

    //echo $email . " " . $otp;

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' ");

    if ($rs->num_rows == 1) {

        $user_Data = $rs->fetch_assoc();

        if ($user_Data['verification'] == $otp) {

            Database::iud("UPDATE `user` SET `status_id` = '1' WHERE `email` = '" . $email . "'");
            setcookie("email", "", -1);

            Database::iud("INSERT INTO `cart`(user_email) VALUES('" . $email . "')");

            echo ("Success");

        } else {
            echo ("Invalid OTP");
        }

    } else {

    }



} else {

    echo "Invalid User";

}
?>