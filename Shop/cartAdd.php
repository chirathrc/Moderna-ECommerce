<?php
session_start();
include ('connection.php');

if (isset($_SESSION["u"])) {

    $user = $_SESSION['u'];

    if (!empty($_POST['P_id'])) {

        if ($_POST['cl_id'] != 0) {



            $qty = $_POST['qty'];
            $P_id = $_POST['P_id'];
            $product_rs = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $P_id . "'");
            $product_data = $product_rs->fetch_assoc();

            if ($product_data['qty'] >= $qty) {


                $cl_id = $_POST['cl_id'];

                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user['email'] . "'");
                $cart_id = $cart_rs->fetch_assoc();

                $chech_cart = Database::search("SELECT * FROM `product_has_cart` 
                    WHERE `cart_cart_id` = '" . $cart_id['cart_id'] . "' AND `Product_P_id` ='" . $P_id . "' AND `colours_colour_id` = '" . $cl_id . "' ");

                if ($chech_cart->num_rows == 0) {

                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $data = $d->format("Y-m-d H:i:s");

                    Database::iud("INSERT INTO `product_has_cart`(`Product_P_id`,`cart_cart_id`,`DateTime`,`qty`,`colours_colour_id`)
                     VALUES('" . $P_id . "','" . $cart_id['cart_id'] . "','" . $data . "','" . $qty . "', '" . $cl_id . "')");
                    echo ("Sucess");

                } else {
                    echo ("Product Already Added");
                }



            } else {
                echo ("Product Is Unvailable Right Now");
            }








        } else {
            echo ("Please Select Colour");
        }



    } else {
        echo ("Unknown Error Occured");
    }



} else {

    echo ("Sign In");
}


?>