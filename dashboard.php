<?php
session_start();
include ("connection.php");

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

   <title>BELLE - Dashboard</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">

   <link rel="icon" href="images/apple-touch-icon-114x114.png" type="image/png" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" href="css1/bootstrap.min.css" />

   <link rel="stylesheet" href="style1.css" />

   <link rel="stylesheet" href="css1/responsive.css" />

   <link rel="stylesheet" href="css1/colors.css" />

   <link rel="stylesheet" href="css1/bootstrap-select.css" />

   <link rel="stylesheet" href="css1/perfect-scrollbar.css" />

   <link rel="stylesheet" href="css1/custom.css" />

</head>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">


         <!-- Sidebar  -->
         <?php
         include ("sideBar.php");
         ?>
         <!-- end sidebar -->

         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <?php
            include ("topBar.php");
            ?>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Dashboard</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row column1">
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-user yellow_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <?php

                                 $userNumber = Database::search("SELECT * FROM `user`")->num_rows;

                                 ?>
                                 <p class="total_no"><?php echo ($userNumber); ?></p>
                                 <p class="head_couter">Welcome</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-line-chart blue1_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <?php

                                 $numProduct = Database::search("SELECT * FROM `product` WHERE `status_id` = '1'")->num_rows;

                                 ?>
                                 <p class="total_no"><?php echo ($numProduct); ?></p>
                                 <p class="head_couter">Products Available</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-cloud-download green_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>

                                 <?php

                                 $currentDate = date('Y-m-d'); // Example format: YYYY-MM-DD
                                 $purchaseHistory = Database::search("SELECT * FROM `orders` WHERE DATE(`dateTime`) = '$currentDate'")->num_rows;

                                 ?>
                                 <p class="total_no"><?php echo ($purchaseHistory); ?></p>
                                 <p class="head_couter">Sells Today</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-gear red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <?php
                                 $purchaseItems = Database::search("SELECT * FROM `orders`")->num_rows;

                                 ?>
                                 <p class="total_no"><?php echo ($purchaseItems); ?></p>
                                 <p class="head_couter">Total Sells</p>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-money green_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>

                                 <?php
                                 $orderPrice = Database::search("SELECT * FROM `orders`");
                                 $total = 0;
                                 for ($y = 0; $y < $orderPrice->num_rows; $y++) {

                                    $Data = $orderPrice->fetch_assoc();
                                    $total = $total + $Data['Total'];
                                 }
                                 ?>
                                 <p class="total_no">Rs. <?php echo ($total); ?></p>
                                 <p class="head_couter">Total Revenue</p>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-usd orange_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>

                                 <?php
                                 $purchaseToday = Database::search("SELECT * FROM `orders` WHERE DATE(`dateTime`) = '$currentDate'");
                                 $totalToday = 0;
                                 for ($y = 0; $y < $purchaseToday->num_rows; $y++) {

                                    $Data = $purchaseToday->fetch_assoc();
                                    $totalToday = $totalToday + $Data['Total'];
                                 }
                                 ?>
                                 <p class="total_no">Rs. <?php echo ($totalToday); ?></p>
                                 <p class="head_couter">Today Revenue</p>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-money purple_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>

                                 <?php
                                 // Get current month and year
                                 $currentMonth = date('m');
                                 $currentYear = date('Y');
                                 $currentMonthName = date('F');

                                 // Construct the SQL query to get total sales for the current month
                                 $monthTotalQuery = Database::search("SELECT SUM(`Total`) AS `totalMonth` FROM `orders` WHERE YEAR(`dateTime`) = '$currentYear' AND MONTH(`dateTime`) = '$currentMonth'");

                                 if ($monthTotalQuery->num_rows > 0) {

                                    $monthTotalQueryData = $monthTotalQuery->fetch_assoc();
                                 }
                                 ?>
                                 <p class="total_no">Rs. <?php echo ($monthTotalQueryData['totalMonth']); ?></p>
                                 <p class="head_couter">Income (<?php echo ($currentMonthName) ?>)</p>
                              </div>
                           </div>
                        </div>

                     </div>


                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-tags blue1_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <?php
                                 // Construct the SQL query to get total sales for the current month
                                 $monthTotalItemsQuery = Database::search("SELECT * FROM `orders` WHERE YEAR(`dateTime`) = '$currentYear' AND MONTH(`dateTime`) = '$currentMonth'")->num_rows;
                                 ?>

                                 <p class="total_no"><?php echo ($monthTotalItemsQuery); ?></p>
                                 <p class="head_couter">Sells(<?php echo ($currentMonthName) ?>)</p>
                              </div>
                           </div>
                        </div>

                     </div>

                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                           Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
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
</body>

</html>