<?php
session_start();
include 'connection.php';
include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_FILES["invoice"]["tmp_name"]) && !empty($_POST["orderID"])) {
    $orderID = $_POST["orderID"];
    $orderData = Database::search("SELECT * FROM `orders` WHERE `orderid` = '$orderID'")->fetch_assoc();
    $fee = Database::search("SELECT * FROM `deliveryfee`")->fetch_assoc();

    $tmp_name = $_FILES['invoice']['tmp_name'];
    $filename = $_FILES['invoice']['name'];

    $user = $_SESSION['u'];

    // Read the raw PDF data
    $pdfData = file_get_contents($tmp_name);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abc@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;  // Correct port for STARTTLS

        //Recipients
        $mail->setFrom('abc@gmail.com', 'Invoice Details');
        $mail->addReplyTo('abc@gmail.com', 'Invoice Details');
        $mail->addAddress($user['email']);
        $mail->addStringAttachment($pdfData, $filename);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'BELLE Payment Invoice';

        // Start building HTML email body
        $bodyContent = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Invoice</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; }
                .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f5f5f5; border: 1px solid #ddd; border-radius: 5px; }
                .header { background-color: #007bff; color: #fff; text-align: center; padding: 10px 0; border-radius: 5px 5px 0 0; }
                .content { background-color: #fff; padding: 20px; border-radius: 0 0 5px 5px; }
                .invoice-details { margin-bottom: 20px; }
                .invoice-details h2 { margin: 0; font-size: 1.5rem; }
                .invoice-details p { margin: 5px 0; }
                .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                .invoice-table th, .invoice-table td { border: 1px solid #ddd; padding: 8px; }
                .invoice-table th { background-color: #007bff; color: #fff; text-align: left; }
                .invoice-total { text-align: right; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Invoice</h1>
                </div>
                <div class="content">
                    <div class="invoice-details">
                        <h2>Invoice Details</h2>
                        <p><strong>Invoice No:</strong> ' . $orderData['idOrders'] . '</p>
                        <p><strong>Order ID:</strong> ' . $orderData['orderid'] . '</p>
                        <p><strong>Payment:</strong> Success</p>
                        <p><strong>Estimated Delivery Date:</strong> ' . $orderData['calculatedDeliveryDate'] . '</p>
                    </div>
                    <div class="invoice-items">
                        <h2>Invoice Items</h2>
                        <table class="invoice-table">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>';
        // Add invoice items dynamically
        $orderHasProduct = Database::search("SELECT * FROM `orders_has_product` WHERE `Orders_orderid` = '" . $orderData['orderid'] . "'");
        for ($x = 0; $x < $orderHasProduct->num_rows; $x++) {
            $orderHasProductData = $orderHasProduct->fetch_assoc();
            $productData = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $orderHasProductData['Product_P_id'] . "'")->fetch_assoc();
            $bodyContent .= '
                                <tr>
                                    <td>' . $orderHasProductData['orderQTY'] . '</td>
                                    <td>Product ' . ($x + 1) . '</td>
                                    <td>' . $productData['Title'] . '</td>
                                    <td>' . ($orderHasProductData['orderQTY'] * $productData['Price']) . '</td>
                                </tr>';
        }

        $bodyContent .= '
                            </tbody>
                        </table>
                    </div>
                    <div class="invoice-total">
                        <h2>Total Amount</h2>
                        <table>
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>' . ($orderData['Total'] - $fee["fee"]) . '.00</td>
                            </tr>
                            <tr>
                                <th>Delivery:</th>
                                <td>' . $fee["fee"] . '.00</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>' . $orderData['Total'] . '.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </body>
        </html>';

        $mail->Body = $bodyContent;

        if ($mail->send()) {
            echo "Success";
        } else {
            echo "Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }
} else {
    die("Unknown Error Occurred");
}
?>
