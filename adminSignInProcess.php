<?php
session_start();
include ('connection.php');

$mail = $_GET['email'];
$password = $_GET['password'];

if (empty($mail)) {

    echo ("Enter Your Email");

} elseif (empty($password)) {

    echo ("Enter You Password");

} else {

    $resultSet = Database::search("SELECT * FROM `admin` WHERE `user_email` = (SELECT `email` FROM `user` WHERE `email` = '" . $mail . "' AND `Password` = '" . $password . "' AND `status_id` = '1')");
    $resultSetData = $resultSet->fetch_assoc();


    if ($resultSet->num_rows == '1') {

        $adminDetails = Database::search("SELECT * FROM `user` WHERE `email` = '" . $mail . "' AND `Password` = '" . $password . "'")->fetch_assoc();


        $_SESSION['u'] = array_merge($resultSetData, $adminDetails);
        echo ("Success");


    } else {

        echo ("Invalid User Details");

    }



}


?>