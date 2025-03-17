<?php

include 'connection.php';
include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST["mail"];
$FN = $_POST["FN"];
$LN = $_POST["LN"];
$p1 = $_POST["p1"];
$p2 = $_POST["p2"];

if (empty($FN)) {
    echo "Invalid First Name";
} elseif (strlen($FN) > 50) {
    echo "First name is too long, please enter a valid first name.";
} elseif (empty($LN)) {
    echo "Invalid Last Name";
} elseif (strlen($LN) > 50) {
    echo "Last Name is too long, please enter a valid last name.";
} elseif (empty($email)) {
    echo "Please enter your email address";
} elseif (strlen($email) > 100) {
    echo "The email address must be less than 100 characters.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address";
} elseif (strlen($p1) < 6 || strlen($p1) > 20) {
    echo "Password must be between 6 and 20 characters";
} elseif (!preg_match('/[A-Za-z]/', $p1) || !preg_match('/\d/', $p1)) {
    echo "Password must contain both letters and numbers.";
} elseif ($p1 != $p2) {
    echo "Passwords do not match";
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo "This email has been registered. Please login instead.";
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $data = $d->format("Y-m-d H:i:s");


        function generateNumericCode($length = 6)
        {
            $characters = '0123456789';
            $code = '';

            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $code;
        }

        $verificationCode = generateNumericCode();

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chirathrc@gmail.com';
        $mail->Password = 'qzqt mdqf niql ektn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('chirathrc@gmail.com', 'Email Verification');
        $mail->addReplyTo('chirathrc@gmail.com', 'Email Verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'BELLE Online Store Email Verification Code';
        $bodyContent = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Email Verification - BELLE WORLDWIDE EXPRESS SHIPPING</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 20px;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #fff;
                    padding: 40px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    color: #007bff;
                    margin-top: 0;
                }
                p {
                    color: #444;
                    margin-bottom: 20px;
                }
                .verification-code {
                    font-size: 24px;
                    margin-top: 20px;
                    padding: 10px;
                    background-color: #f9f9f9;
                    border-radius: 6px;
                }
                .btn {
                    display: inline-block;
                    padding: 10px 20px;
                    text-decoration: none;
                    color: #fff;
                    background-color: #007bff;
                    border-radius: 4px;
                }
                .btn:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Welcome to BELLE Online Store!</h1>
                <p>Dear ' . $FN . ' ' . $LN . ',</p>
                <p>Thank you for signing up. To verify your email, please use the following verification code:</p>
                <div class="verification-code">
                    Your Verification Code: <strong>' . $verificationCode . '</strong>
                </div>
                <p>If you didn\'t request this verification, you can ignore this message.</p>
                <p>For any assistance, feel free to contact our support team.</p>
                <a href="#" class="btn">Visit E Shop</a>
            </div>
        </body>
        </html>';

        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo "Verification Code Sending Failed";
        } else {

            Database::iud("INSERT INTO `user`(`email`,`F_name`,`L_name`,`Password`,`joined_date`,`status_id`,`userType_id`) 
             VALUES('" . $email . "','" . $FN . "','" . $LN . "','" . $p1 . "','" . $data . "','3','1')");

            Database::iud("UPDATE `user` SET `verification` = '" . $verificationCode . "' WHERE `email` = '" . $email . "'");

            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
            echo "Success";
        }
    }
}
?>