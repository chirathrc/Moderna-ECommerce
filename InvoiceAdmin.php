<?php
session_start();
include "connection.php";

if (!isset($_SESSION["u"])) {

    ?>
    <script>
        window.location = 'login.php';
    </script>
    <?php

} else {

    $admin = $_SESSION["u"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
     
    <title>BELLE - Payment History</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <link rel="icon" href="images/apple-touch-icon-114x114.png" type="image/png" />
    

    <link rel="stylesheet" href="css1/bootstrap.min.css" />
 

    <link rel="stylesheet" href="style1.css" />
 
    <link rel="stylesheet" href="css1/responsive.css" />
 
    <link rel="stylesheet" href="css1/colors.css" />
 
    <link rel="stylesheet" href="css1/bootstrap-select.css" />
 
    <link rel="stylesheet" href="css1/perfect-scrollbar.css" />
 
    <link rel="stylesheet" href="css1/custom.css" />
 
    <link rel="stylesheet" href="js/semantic.min.css" />
    
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">


            <!-- Sidebar  -->
            <?php
            include "sideBar.php";
            ?>
            <!-- end sidebar -->

            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <?php
                include "topBar.php";
                ?>
                <!-- end topbar -->

                <div class="midde_cont">
                    <div class="container-fluid">

                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Sells Management</h2>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-12">



                                <div class="row mb-5 ">
                                    <form class="form-inline  ">
                                        <input class="form-control mr-sm-4" type="date" placeholder="Search"
                                            aria-label="Search" id="orderDate">
                                        <button class="btn my-2 my-sm-0" id="searchOrderButton">
                                            <i class="fa fa-search text-dark"></i>
                                        </button>

                                    </form>
                                </div>

                                <div class="row">
                                    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5 mt-3">
                                        <div class="price_table_head blue1_bg">
                                            <h2>Total Income</h2>
                                        </div>
                                        <div class="cont_table_price_blog">

                                            <?php
                                            $orderPrice = Database::search("SELECT * FROM `orders`");
                                            $total = 0;
                                            for ($y = 0; $y < $orderPrice->num_rows; $y++) {

                                                $Data = $orderPrice->fetch_assoc();
                                                $total = $total + $Data['Total'];
                                            }

                                            ?>
                                            <p class="blue1_color">Rs.
                                                <span class="price_no"><?php echo ($total); ?></span>

                                            </p>
                                        </div>
                                    </div>

                                    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5 mt-3">
                                        <div class="price_table_head yellow_bg">
                                            <h2>Last Transaction</h2>
                                        </div>
                                        <div class="cont_table_price_blog">

                                            <?php
                                            $LastOrder = Database::search("SELECT * FROM `orders` ORDER BY `orderid` DESC LIMIT 1")->fetch_assoc();

                                            ?>
                                            <p class="yellow_color">Rs.
                                                <span class="price_no"><?php echo ($LastOrder['Total']); ?></span>

                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="row d-flex justify-content-center">

                                    <div class="col-md-12">
                                        <div class="white_shd full margin_bottom_30">
                                            <div class="full graph_head">
                                                <div class="heading1 margin_0">
                                                    <h2>Invoices</h2>
                                                </div>
                                            </div>

                                            <div class="table_section padding_infor_info">
                                                <div class="table-responsive-sm">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>DateTime</th>
                                                                <th>Email</th>
                                                                <th>Price <span class="text-danger">(Rs.)</span></th>
                                                                <th>Invoice</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tBody">
                                                            <?php

                                                            $purchaseHistory = Database::search("SELECT * FROM `orders` ORDER BY `dateTime` ASC");

                                                            for ($x = 0; $x < $purchaseHistory->num_rows; $x++) {

                                                                $purchaseHistoryData = $purchaseHistory->fetch_assoc();
                                                                ?>

                                                                <tr>
                                                                    <td><?php echo ($purchaseHistoryData['dateTime']); ?>
                                                                    </td>
                                                                    <td><?php echo ($purchaseHistoryData['user_email']); ?>
                                                                    </td>
                                                                    <td><?php echo ($purchaseHistoryData['Total']); ?></td>
                                                                    <td>
                                                                        <a
                                                                            href="invoice.php?orderId=<?php echo $purchaseHistoryData['orderid']; ?>">View
                                                                            Invoice
                                                                        </a>
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

                                <style>
                                    .input-container {
                                        max-width: 400px;
                                        /* Adjust the max width as needed */
                                        margin: 20px auto;
                                        /* Center the container */
                                    }
                                </style>




                            </div>







                        </div>

                    </div>
                </div>

                <!-- jQuery -->
                <script src="js/jquery.min.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <!-- wow animation -->
                <script src="js/animate.js"></script>
                <!-- select country -->
                <script src="js/bootstrap-select.js"></script>
                <!-- owl carousel -->
                <script src="js/owl.carousel.js"></script>
                <!-- chart js -->
                <script src="js/Chart.min.js"></script>
                <script src="js/Chart.bundle.min.js"></script>
                <script src="js/utils.js"></script>
                <script src="js/analyser.js"></script>
                <!-- nice scrollbar -->
                <script src="js/perfect-scrollbar.min.js"></script>
                <script>
                    var ps = new PerfectScrollbar('#sidebar');
                </script>
                <!-- custom js -->
                <script src="js/chart_custom_style1.js"></script>
                <script src="js/custom.js"></script>
                <script src="script.js"></script>
</body>

</html>