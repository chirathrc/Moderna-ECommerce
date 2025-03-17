<?php

session_start();
include ('connection.php');

if (isset($_SESSION['u'])) {

    if (isset($_GET["wish_id"])) {

        $wish_id = $_GET["wish_id"];
        $user = $_SESSION['u']['email'];

        Database::iud("DELETE FROM `wishlist` WHERE `wish_id` = '" . $wish_id . "' AND `user_email` = '" . $user . "' ");

        echo ("Success");


    } else {

        echo ("Unknown Error Occured");


    }



} else {

    echo ("Unknown Error Occured");


}

?>