<?php
session_start();
include ("connection.php");

if (!isset($_SESSION["u"])) {
    die("Unknown Error Occurred.");
}

if (isset($_FILES['image'])) {
    // Set the target directory
    $targetDirectory = "AdminProfileImage/";

    // Get the file extension
    $fileExtension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    // Generate a unique file name
    $newFileName = $_SESSION['u']['email'] . '.' . $fileExtension;

    // Set the target file path
    $targetFile = $targetDirectory . $newFileName;

    $uploadOk = 1;

    // Check if the file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {

        // Check file size (limit to 5MB for example)
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg" && $fileExtension != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error


        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Try to upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

                // echo "The file " . $newFileName . " has been uploaded.";

                Database::iud("UPDATE `user` SET `profileImage` = '" . $targetFile . "' WHERE `email` = '" . $_SESSION['u']['email'] . "'");
                echo ("Success");


            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "No file was uploaded.";
}
?>