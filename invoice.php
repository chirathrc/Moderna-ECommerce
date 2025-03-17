<?php
session_start();
include ('connection.php');

if (!isset($_SESSION['u'])) {

    ?>
    <script>
        window.location = "login.php";
    </script>
    <?php
}

$orderID = $_GET["orderId"];
// echo ($orderID);
$orderData = Database::search("SELECT * FROM `orders` WHERE `orderid` = '" . $orderID . "'")->fetch_assoc();

$user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $orderData['user_email'] . "'")->fetch_assoc();

$userAddress = Database::search("SELECT * FROM `address` 
INNER JOIN `city` ON `address`.`City_city_id` = `city`.`city_id`
INNER JOIN `distric` ON `city`.`Distric_Dis_id` = `distric`.`Dis_id`  
WHERE `user_email` = '" . $orderData['user_email'] . "'")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <title>Invoice</title>
    <link rel="icon" href="images/apple-touch-icon-114x114.png" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css1/bootstrap.min.css" />
    <link rel="stylesheet" href="invoice.css" />
    <link rel="stylesheet" href="css1/responsive.css" />
    <link rel="stylesheet" href="css1/colors.css" />
    <link rel="stylesheet" href="css1/bootstrap-select.css" />
    <link rel="stylesheet" href="css1/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css1/custom.css" />
    <link rel="stylesheet" href="js/semantic.min.css" />
    <link rel="stylesheet" href="css1/jquery.fancybox.css" />
</head>

<body class="inner_page invoice_page">
    <div class="full_container">
        <div class="inner_container">
            <div id="content">
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <div class="row">
                                        <div class="col-md-10 col-12 ">
                                            <h2>Invoice <small>(<?php echo ($orderData['idOrders']) ?>)</small></h2>
                                        </div>
                                        <div class="col-md-1 col-12 mt-md-0 mt-1">
                                            <a href="InvoiceAdmin.php">
                                                <Button class=" form-control btn btn-dark" id="download">Back
                                                </Button>
                                            </a>

                                        </div>
                                        <div class="col-md-1 col-12 mt-md-0 mt-1">
                                            <Button class="btn btn-dark form-control"
                                                onclick="generatePDF(<?php echo ($orderID) ?>);" id="download">
                                                Print
                                            </Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="invoicePDF">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white_shd full margin_bottom_30">
                                        <div class="full graph_head">
                                            <div class="heading1 margin_0">
                                                <h2><i class="fa fa-file-text-o"></i> Invoice</h2>
                                            </div>
                                        </div>
                                        <div class="full">
                                            <div class="invoice_inner">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div
                                                            class="full invoice_blog padding_infor_info padding-bottom_0">
                                                            <?php
                                                            $companyDetails = Database::search("SELECT * FROM `companydetails`")->fetch_assoc();
                                                            ?>
                                                            <h4>From</h4>
                                                            <p><strong>BELLE Online Shopping Center</strong><br>
                                                                <?php echo ($companyDetails["AddressNO"]) ?> ,<br>
                                                                <?php echo ($companyDetails["address"]) ?>.<br>
                                                                <strong>Phone : </strong><a
                                                                    href="tel:<?php echo ($companyDetails["mobile"]) ?>"><?php echo ($companyDetails["mobile"]) ?></a><br>
                                                                <strong>Email : </strong><a
                                                                    href="mailto:<?php echo ($companyDetails["Email"]) ?>"><?php echo ($companyDetails["Email"]) ?></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div
                                                            class="full invoice_blog padding_infor_info padding-bottom_0">
                                                            <h4>To</h4>
                                                            <p><strong><?php echo ($user["F_name"] . " " . $user["L_name"]) ?></strong><br>
                                                                <?php echo ($userAddress["line1"]) ?> ,<br>
                                                                <?php echo ($userAddress["line2"]) ?><br>
                                                                <strong>Phone : </strong><a
                                                                    href="tel:<?php echo ($user["mobile"]) ?>"><?php echo ($user["mobile"]) ?></a><br>
                                                                <strong>Email : </strong><a
                                                                    href="mailto:<?php echo ($user["email"]) ?>"><?php echo ($user["email"]) ?></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div
                                                            class="full invoice_blog padding_infor_info padding-bottom_0">
                                                            <h4>Invoice No - #<?php echo ($orderData['idOrders']) ?>
                                                            </h4>
                                                            <p><strong>Order ID :
                                                                </strong><?php echo ($orderData['orderid']) ?><br>
                                                                <strong>Payment : </strong>Success<br>
                                                                <strong>Estimate Delivery Date :
                                                                </strong><?php echo ($orderData['calculatedDeliveryDate']) ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="full padding_infor_info">
                                            <div class="table_row">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Qty</th>
                                                                <th>Product</th>
                                                                <th>Serial #</th>
                                                                <th>Description</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $orderHasProduct = Database::search("SELECT * FROM `orders_has_product` WHERE `Orders_orderid` = '" . $orderData['orderid'] . "' ");
                                                            for ($x = 0; $x < $orderHasProduct->num_rows; $x++) {
                                                                $orderHasProductData = $orderHasProduct->fetch_assoc();
                                                                $productData = Database::search("SELECT * FROM `product` WHERE `P_id` = '" . $orderHasProductData['Product_P_id'] . "'")->fetch_assoc();
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo ($orderHasProductData['orderQTY']); ?>
                                                                    </td>
                                                                    <td>Product <?php echo ($x + 1); ?></td>
                                                                    <td>#<?php echo ($productData['uniq_code']); ?></td>
                                                                    <td><?php echo ($productData['Title']); ?></td>
                                                                    <td><?php echo ($orderHasProductData['orderQTY'] * $productData['Price']); ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="full white_shd card">
                                        <div class="full graph_head">
                                            <div class="heading1 margin_0">
                                                <h2>Payment Methods</h2>
                                            </div>
                                        </div>
                                        <div class="full padding_infor_info">
                                            <ul class="payment_option">
                                                <li><img src="images/layout_img/visa.png" alt="#" /></li>
                                                <li><img src="images/layout_img/mastercard.png" alt="#" /></li>
                                                <li><img src="images/layout_img/american-express.png" alt="#" /></li>
                                                <li><img src="images/layout_img/paypal.png" alt="#" /></li>
                                            </ul>
                                            <p class="note_cont">If you use this site regularly and would like to help
                                                keep the site on the Internet.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="full white_shd card">
                                        <div class="full graph_head">
                                            <div class="heading1 margin_0">
                                                <h2>Total Amount</h2>
                                            </div>
                                        </div>
                                        <div class="full padding_infor_info">
                                            <div class="price_table">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <?php
                                                            $fee = Database::search("SELECT * FROM `deliveryfee`")->fetch_assoc();
                                                            ?>
                                                            <tr>
                                                                <th style="width:50%">Subtotal:</th>
                                                                <td><?php echo ($orderData['Total'] - $fee["fee"]) ?>.00
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width:50%">Delivery:</th>
                                                                <td><?php echo ($fee["fee"]) ?>.00</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width:50%">Total:</th>
                                                                <td><?php echo ($orderData['Total']) ?>.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="footer">
                                <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Include jsPDF and html2canvas from a CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <!-- Other scripts -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/analyser.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/semantic.min.js"></script>
    <script>
        async function generatePDF(id) {
            const { jsPDF } = window.jspdf;

            try {
                // Capture HTML content as an image using html2canvas
                const canvas = await html2canvas(document.getElementById('invoicePDF'), {
                    willReadFrequently: true  // Optimize for multiple read operations
                });

                // Create jsPDF instance with landscape orientation
                const pdf = new jsPDF({
                    orientation: 'landscape',
                    unit: 'px',  // Units in pixels
                    format: [canvas.width, canvas.height]  // Set PDF dimensions to match the captured canvas
                });

                // Convert canvas to image data URL
                const imgData = canvas.toDataURL('image/png');

                // Add the image to the PDF
                pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);

                // Save the PDF locally and wait for it to complete
                await new Promise((resolve) => {
                    pdf.save('invoice.pdf', { returnPromise: true }).then(resolve);
                });

                console.log('PDF generated and downloaded successfully.');

                // Convert the PDF to a Blob
                const pdfBlob = pdf.output('blob');



                // Create a FormData object to send the PDF via AJAX
                const formData = new FormData();
                formData.append('invoice', pdfBlob, 'invoice.pdf');
                formData.append('orderID', id);



                // Send PDF data to PHP using AJAX
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {

                        if (xhr.responseText == "Success") {

                            window.location = "index.php";

                        } else {

                            alert(xhr.responseText);

                        }



                    }
                };

                xhr.open('POST', 'send_pdf_email.php', true);
                xhr.send(formData);
            } catch (error) {
                console.error('Error generating PDF:', error);
            }
        }

    </script>

</body>

</html>