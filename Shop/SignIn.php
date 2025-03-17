<?php
session_start();
include ('connection.php');

$mail = $_GET["m"];
$password = $_GET["p"];

if (empty($mail)) {

    echo ("Your E Mail Is Empty");

} elseif (empty($password)) {

    echo ("Your Password Field Is Empty");

} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $mail . "' AND `Password` = '" . $password . "' AND `status_id` = '1' ");

    if ($rs->num_rows == 1) {

        $user_Data = $rs->fetch_assoc();

        if ($user_Data['status_id'] == "1") {

            $_SESSION["u"] = $user_Data;
            echo ("Success");

        } else {
            echo ("You are Not Activate User");
        }

    } else {
        echo ("Invalid Details");
    }


}

?>