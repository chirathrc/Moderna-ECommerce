<?php

session_start();
include ("connection.php");

if (!isset($_SESSION["u"])) {

    echo ("unknown Error Occured");
    exit;

}

if (isset($_GET['name'])) {

    if (!empty($_GET['name'])) {

        $name = $_GET['name'];

        $rs = Database::search("SELECT * FROM `category` WHERE `name` = '" . $name . "'")->num_rows;

        if ($rs == '0') {

            Database::iud("INSERT INTO `category`(`name`) VALUES('" . $name . "')");
            echo ("Success");


        } else {

            echo ("This Category Already Exist");
        }

    } else {

        echo ("Enter Valid Data");
    }

}

if (isset($_GET['nameBra'])) {

    if (!empty($_GET['nameBra'])) {


        $name = $_GET['nameBra'];

        $rs = Database::search("SELECT * FROM `brand` WHERE `Brand_Name` = '" . $name . "'")->num_rows;

        if ($rs == '0') {

            Database::iud("INSERT INTO `brand`(`Brand_Name`) VALUES('" . $name . "')");
            echo ("Success");


        } else {

            echo ("This Category Already Exist");
        }

    } else {

        echo ("Enter Valid Data");
    }

}

if (isset($_GET['nameCol'])) {


    if (!empty($_GET['nameCol'])) {

        $name = $_GET['nameCol'];

        $rs = Database::search("SELECT * FROM `colours` WHERE `colour` = '" . $name . "'")->num_rows;

        if ($rs == '0') {

            Database::iud("INSERT INTO `colours`(`colour`) VALUES('" . $name . "')");
            echo ("Success");


        } else {

            echo ("This Category Already Exist");
        }

    } else {

        echo ("Enter Valid Data");
    }


}



if (isset($_GET['namePos'])) {

    if (!empty($_GET['namePos'])) {

        $name = $_GET['namePos'];

        $rs = Database::search("SELECT * FROM `position` WHERE `position` = '" . $name . "'")->num_rows;

        if ($rs == '0') {

            Database::iud("INSERT INTO `position`(`position`) VALUES('" . $name . "')");
            echo ("Success");


        } else {

            echo ("This Category Already Exist");
        }

    } else {

        echo ("Enter Valid Data");
    }


}


?>