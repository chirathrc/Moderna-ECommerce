<?php
session_start();
include "connection.php";

if (!isset($_SESSION['u'])) {

    echo ("Unknown Error Occured");
    exit;
}


$currentPW = $_POST['currentPW'];
$newPW = $_POST['newPW'];
$confirmNewPW = $_POST['confirmNewPW'];

if (empty($currentPW)) {

    echo ("You Password is Empty");

} elseif (empty($newPW)) {

    echo ("New Password Field is Empty");

} elseif (empty($confirmNewPW)) {

    echo ("Confirm New Password Field is Empty");

} else {

    $userRS = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION['u']['email'] . "'");

    if ($userRS->num_rows == 1) {

        $userdata = $userRS->fetch_assoc();
        $password = $userdata["Password"];

        if ($currentPW == $password) {

            if ($newPW == $confirmNewPW) {

                if ($newPW == $password) {
                    echo ("You can't use the previous password as the new password.");

                } elseif ($newPW != $password) {


                    Database::iud("UPDATE `user` SET `Password` = '" . $newPW . "' WHERE `email` = '" . $_SESSION['u']['email'] . "' ");
                    echo ("Ok");
                }



            } else {

                echo ("Check Your Confirm Password");
            }

        }else{

            echo ("Enter Valid Password");
        }



    }

}

?>