<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['u'])) {
    echo 'Unauthorized access';
    exit;
}

// Define upload directory
$uploadDir = 'Shop/Images/';

// Retrieve form data
$name = $_POST['name'];
$code = $_POST['code'];
$category = $_POST['category'];
$brand = $_POST['brand'];
$price = $_POST['price'];

$discount = $_POST['discount'];

if (empty($discount)) {
    $discount = '0';
}

$qty = $_POST['qty'];
$desc = $_POST['desc'];
$size = $_POST["size"];
$colour = $_POST['colour'];

// Array to store uploaded file paths
$uploadedFiles = [];


if (empty($name) || empty($code) || $category == '0' || $brand == '0' || empty($price) || $price <= 0 || $qty <= 0 || empty($qty) || empty($desc) || $colour == '0') {
    echo 'Please fill all required fields with valid values';
    exit;
}


$testUniqCode = Database::search("SELECT * FROM `product` WHERE `uniq_code` = '" . $code . "'");
if ($testUniqCode->num_rows == '1') {
    echo ("Duplicate UniqCode");
    exit;
}




if (isset($_FILES['img1']) && isset($_FILES['img2']) && isset($_FILES['img3'])) {

    if ($category == '1' || $category == '2') {

        if ($size != 0) {

            Database::iud("INSERT INTO `product` (`Title`, `Price`, `Discount`, `Brand_B_id`, `Category_Cat_id`, `Description`, `user_email`, `qty`, `uniq_code`, `Size_Clothing_size_id`, `status_id`) 
            VALUES ('" . $name . "', '" . $price . "', '" . $discount . "', '" . $brand . "', '" . $category . "', '" . $desc . "', '" . $_SESSION['u']['email'] . "', '" . $qty . "', '" . $code . "', '" . $size . "', '1')");

            $id = Database::$connection->insert_id;

            // Loop through expected files (img1, img2, img3)
            foreach (['img1', 'img2', 'img3'] as $imgKey) {
                if (isset($_FILES[$imgKey]) && $_FILES[$imgKey]['error'] === UPLOAD_ERR_OK) {
                    $tempFile = $_FILES[$imgKey]['tmp_name'];
                    $originalFileName = $_FILES[$imgKey]['name'];
                    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                    $fileName = $code . "_" . $imgKey . "." . $fileExtension; // Changed concatenation operator to '.' 

                    // Ensure $uploadDir ends with a trailing slash for correct path concatenation
                    $targetFile = $uploadDir . $fileName;

                    // Move uploaded file to target directory
                    if (move_uploaded_file($tempFile, $targetFile)) {

                        $uploadedFiles[] = "Images/" . $fileName;

                    } else {

                        echo "Error moving uploaded file: $imgKey";

                    }
                } else {
                    echo "Error uploading file: $imgKey";
                }

            }


        } else {
            echo ("Please Select a Size");
        }


        Database::iud("INSERT INTO `product_image_main`(`images`,`Product_P_id`) VALUES('" . $uploadedFiles['0'] . "','" . $id . "')");
        Database::iud("INSERT INTO `product_image2`(`image`,`Product_P_id`) VALUES('" . $uploadedFiles['1'] . "','" . $id . "')");
        Database::iud("INSERT INTO `product_images`(`image`,`Product_P_id`) VALUES('" . $uploadedFiles['2'] . "','" . $id . "')");

        Database::iud("INSERT INTO `product_has_colours`(`Product_P_id`,`colours_colour_id`) VALUES('" . $id . "','" . $colour . "')");

        echo ("Success");



    } else if ($category != '1' && $category != '2') {

        Database::iud("INSERT INTO `product` (`Title`, `Price`, `Discount`, `Brand_B_id`, `Category_Cat_id`, `Description`, `user_email`, `qty`, `uniq_code`, `status_id`) 
            VALUES ('" . $name . "', '" . $price . "', '" . $discount . "', '" . $brand . "', '" . $category . "', '" . $desc . "', '" . $_SESSION['u']['email'] . "', '" . $qty . "', '" . $code . "', '1')");

        $id = Database::$connection->insert_id;



        // Loop through expected files (img1, img2, img3)
        foreach (['img1', 'img2', 'img3'] as $imgKey) {
            if (isset($_FILES[$imgKey]) && $_FILES[$imgKey]['error'] === UPLOAD_ERR_OK) {
                $tempFile = $_FILES[$imgKey]['tmp_name'];
                $originalFileName = $_FILES[$imgKey]['name'];
                $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                $fileName = $code . "_" . $imgKey . "." . $fileExtension; // Changed concatenation operator to '.' 

                // Ensure $uploadDir ends with a trailing slash for correct path concatenation
                $targetFile = $uploadDir . $fileName;

                // Move uploaded file to target directory
                if (move_uploaded_file($tempFile, $targetFile)) {

                    $uploadedFiles[] = "Images/" . $fileName;

                } else {

                    echo "Error moving uploaded file: $imgKey";

                }
            } else {
                echo "Error uploading file: $imgKey";
            }

        }



        Database::iud("INSERT INTO `product_image_main`(`images`,`Product_P_id`) VALUES('" . $uploadedFiles['0'] . "','" . $id . "')");
        Database::iud("INSERT INTO `product_image2`(`image`,`Product_P_id`) VALUES('" . $uploadedFiles['1'] . "','" . $id . "')");
        Database::iud("INSERT INTO `product_images`(`image`,`Product_P_id`) VALUES('" . $uploadedFiles['2'] . "','" . $id . "')");

        echo ("Success");






    }






} else {
    echo ("All Images are Required");
}


?>