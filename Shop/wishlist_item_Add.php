<?php

session_start();
include ('connection.php');

if (isset($_SESSION['u'])) {

    if (isset($_GET["wish_add_id"])) {

        $wish_id = $_GET["wish_add_id"];
        $user = $_SESSION['u']['email'];

        $rs = Database::search("SELECT * FROM `wishlist` WHERE `Product_P_id` = '" . $wish_id . "' AND `user_email` = '" . $user . "'");

        if ($rs->num_rows > 0) {

            $wishlist_ID = $rs->fetch_assoc();

            Database::iud("DELETE FROM `wishlist` WHERE `wish_id` = '" . $wishlist_ID["wish_id"] . "' AND `user_email` = '" . $user . "' ");

            echo ("Success");

        } else {

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $data = $d->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `wishlist`(`datetime`,`user_email`,`Product_P_id`) VALUES('" . $data . "','" . $user . "', '" . $wish_id . "')");

            echo ("Success");

        }




    } else {

        echo ("Unknown Error Occured");


    }



} else {

    echo ("Unknown Error Occured");


}



?>