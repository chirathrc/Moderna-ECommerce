<?php
session_start();
include ('connection.php');
?>


<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Profile &ndash; Moderna</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="Images\MODERNA1.1.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <link rel="stylesheet" href="assets/css/plugins.css">
  
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

   
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" />

  
    <link href="assets/css/vendor/font-awesome.css" rel="stylesheet">

    <link href="plugins.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body class="page-template belle">
    <div class="pageWrapper">

        <?php

        if (isset($_SESSION['u'])) {

            // $user_data = $_SESSION['u'];
            $user_data = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION['u']['email'] . "'")->fetch_assoc();



            include ("top-header.php");
            include ("header.php");

            ?>

            <br><br><br><br><br>

            <!--Mobile Menu-->
            <?php
            include ("mobile-menu.php");
            ?>
            <!--End Mobile Menu-->

            <div class="page section-header text-center" style="background-color: black;">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white; font-weight: bold">
                            Dashboard</h1>
                    </div>
                </div>
            </div>

            <style>
                body {
                    background-color: #f8f9fa;
                }

                .myaccount-page-wrapper {
                    padding: 30px;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .myaccount-tab-menu {
                    background: #f1f1f1;
                    border-radius: 10px;
                    padding: 15px;
                }

                .myaccount-tab-menu a {
                    color: #333;
                    padding: 10px 20px;
                    margin-bottom: 10px;
                    border-radius: 5px;
                    transition: background 0.3s ease;
                }

                .myaccount-tab-menu a.active,
                .myaccount-tab-menu a:hover {
                    background: #007bff;
                    color: #fff;
                }

                .myaccount-content {
                    padding: 30px;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .single-input-item {
                    margin-bottom: 20px;
                }

                .single-input-item label {
                    display: block;
                    margin-bottom: 8px;
                    font-weight: bold;
                }

                .single-input-item input,
                .single-input-item select {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                }

                .btn-add-to-cart,
                .btn-success {
                    background-color: #007bff;
                    color: #ffffff;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    text-decoration: none;
                    transition: background-color 0.3s ease;
                }

                .btn-add-to-cart:hover,
                .btn-success:hover {
                    background-color: #0056b3;
                }

                .btn-login {
                    margin-top: 20px;
                }

                fieldset {
                    border: 1px solid #ddd;
                    padding: 20px;
                    border-radius: 10px;
                    margin-top: 20px;
                }

                legend {
                    padding: 0 10px;
                    font-weight: bold;
                }
            </style>

            <div id="page-content-wrapper" class="p-9">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 mb-4">
                                        <div class="myaccount-tab-menu nav flex-column nav-pills" role="tablist">
                                            <a href="#dashboad" class="nav-link active" data-toggle="pill">
                                                <i class="fa fa-tachometer-alt mr-2"></i> Dashboard
                                            </a>
                                            <a href="#orders" class="nav-link" data-toggle="pill">
                                                <i class="fa fa-cart-arrow-down mr-2"></i> Orders
                                            </a>
                                            <!-- <a href="#download" class="nav-link" data-toggle="pill">
                                                <i class="fa fa-download mr-2"></i> Download
                                            </a> -->
                                            <a href="#payment-method" class="nav-link" data-toggle="pill">
                                                <i class="fa fa-credit-card mr-2"></i> Payment Method
                                            </a>
                                            <a href="#address" class="nav-link" data-toggle="pill">
                                                <i class="fa fa-map-marker mr-2"></i> Address
                                            </a>
                                            <a href="#account-info" class="nav-link" data-toggle="pill">
                                                <i class="fa fa-user mr-2"></i> Account Details
                                            </a>
                                            <a href="#" class="nav-link" onclick="logOut();">
                                                <i class="fa fa-arrow-circle-down mr-2" ></i> Logout
                                            </a>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 mt-5 mt-lg-0">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Dashboard</h3>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION['u']['email'] . "' ");
                                                    $data = $rs->fetch_assoc();
                                                    ?>
                                                    <div class="welcome">
                                                        <p>Hello,
                                                            <strong><?php echo ($data['F_name'] . " " . $data['L_name']); ?></strong>
                                                        </p>
                                                    </div>
                                                    <p class="mb-0">
                                                        From your account dashboard, you can easily check & view your recent
                                                        orders, manage your shipping and billing addresses, and edit your
                                                        password and account details.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Orders</h3>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Date</th>
                                                                    <th>Expect Deliver Date</th>
                                                                    <th>Status</th>
                                                                    <th>Total(Rs.)</th>
                                                                    <!-- <th>Action</th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php

                                                                $ordersRs = Database::search("SELECT * FROM `orders` 
                                                                INNER JOIN `deliverystatus` ON `orders`.`DeliveryStatus_idDeliveryStatus` = `deliverystatus`.`idDeliveryStatus` 
                                                                WHERE `user_email` = '" . $_SESSION['u']['email'] . "' 
                                                                ORDER BY `dateTime` ASC");

                                                                // echo ($ordersRs->num_rows);

                                                                for ($x = 0; $x < $ordersRs->num_rows; $x++) {
                                                                    $ordersRsData = $ordersRs->fetch_assoc();
                                                                    $deliveryDate = $ordersRsData['calculatedDeliveryDate'];
                                                                    $dateTime = new DateTime($deliveryDate);
                                                                    $datePart = $dateTime->format('Y-m-d');
                                                                    ?>

                                                                <tr>
                                                                    <td><?php echo ($x + 1); ?></td>
                                                                    <td><?php echo ($ordersRsData['dateTime']); ?></td>
                                                                    <td><?php echo ($datePart); ?></td>
                                                                    <td class="<?php if($ordersRsData['DeliveryStatus_idDeliveryStatus'] == 1){
                                                                        ?>
                                                                        text-success
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        text-danger
                                                                        <?php
                                                                    } ?> "><?php echo ($ordersRsData['status']); ?></td>
                                                                    <td><?php echo ($ordersRsData['Total']); ?></td>
                                                                    <!-- <td><a href="cart.html" class="btn-add-to-cart">View</a> -->
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
                                            <!-- Single Tab Content End -->


                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Payment Method</h3>
                                                    <p class="saved-message">You haven't saved your payment method yet.</p>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="address" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Billing Address</h3>
                                                    <?php
                                                    $as_rs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION['u']['email'] . "'");
                                                    if ($as_rs->num_rows != 1) {
                                                        ?>
                                                        <address>
                                                            <p><strong><?php echo ($data['F_name'] . " " . $data['L_name']); ?></strong>
                                                            </p>
                                                            <p>Address Line 01<br>Address Line 02</p>
                                                            <p>Mobile: +94 xxxxxxxx</p>
                                                        </address>
                                                        <?php
                                                    } else {
                                                        $address_data = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION['u']['email'] . "'");
                                                        $add = $address_data->fetch_assoc();
                                                        ?>
                                                        <address>
                                                            <p><strong><?php echo ($data['F_name'] . " " . $data['L_name']); ?></strong>
                                                            </p>
                                                            <p><?php echo ($add['line1']); ?><br><?php echo ($add['line2']); ?>
                                                            </p>
                                                            <?php if (!empty($data["mobile"])) { ?>
                                                                <p>Mobile: <?php echo ($data["mobile"]) ?></p>
                                                            <?php } else { ?>
                                                                <p>Mobile: +94 xxxxxxxx</p>
                                                            <?php } ?>
                                                        </address>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <fieldset>
                                                        <legend>User Details</legend>
                                                        <div class="account-details-form">
                                                            <form action="#">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="first-name" class="required">First
                                                                                Name</label>
                                                                            <input type="text" id="first-name"
                                                                                placeholder="First Name"
                                                                                value="<?php echo ($data['F_name']) ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="last-name" class="required">Last
                                                                                Name</label>
                                                                            <input type="text" id="last-name"
                                                                                placeholder="Last Name"
                                                                                value="<?php echo ($data['L_name']) ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="single-input-item">
                                                                    <label for="display-name" class="required">Display
                                                                        Name</label>
                                                                    <input type="text" id="display-name"
                                                                        placeholder="Display Name"
                                                                        value="<?php echo ($data['F_name'] . " " . $data['L_name']); ?>"
                                                                        disabled />
                                                                </div>
                                                                <div class="single-input-item">
                                                                    <label for="email" class="required">Email
                                                                        Address</label>
                                                                    <input style="font-weight: bold;" type="email"
                                                                        id="email" placeholder="Email Address"
                                                                        value="<?php echo $data['email']; ?>" disabled />
                                                                </div>
                                                                <div class="single-input-item">
                                                                    <label for="mobile" class="required">Mobile
                                                                        (+94)</label>
                                                                    <?php if (empty($data['mobile'])) { ?>
                                                                        <input type="email" id="mobile"
                                                                            placeholder="07 XXXXXXXX" value="" maxlength="10" />
                                                                    <?php } else { ?>
                                                                        <input type="tel" id="mobile" placeholder="07 XXXXXXXX"
                                                                            value="<?php echo ($data["mobile"]) ?>"
                                                                            maxlength="10">
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="single-input -item">
                                                                    <button class="btn-success rounded-4" onclick="Personaldetails();">
                                                                        Update Details
                                                                    </button>
                                                                </div>
                                                    </fieldset>



                                                    <fieldset>
                                                        <legend>Address Details</legend>
                                                        <div class="row">
                                                            <div class="mt-4 col-md-6 col-12">
                                                                <Label for="pro">Province</Label>
                                                                <select id="pro">
                                                                    <option value="0">Select Province</option>
                                                                    <?php
                                                                    $ad = Database::search("SELECT * FROM `address` 
                                                                    INNER JOIN `city` ON `address`.`City_city_id`  = `city`.`city_id` 
                                                                    INNER JOIN `distric` ON `city`.`Distric_Dis_id` = `distric`.`Dis_id`
                                                                    INNER JOIN `province` ON `distric`.`Province_pro_id` = `province`.`pro_id`
                                                                    WHERE `user_email` = '" . $data['email'] . "'");

                                                                    if ($ad->num_rows == 1) {
                                                                        $addressData = $ad->fetch_assoc();
                                                                    }

                                                                    $pr = Database::search("SELECT * FROM `province` ");
                                                                    for ($x = 0; $x < $pr->num_rows; $x++) {
                                                                        $pr_data = $pr->fetch_assoc();
                                                                        ?>

                                                                                <option value="<?php echo ($pr_data['pro_id']) ?>"
                                                                        
                                                                            <?php if ($ad->num_rows == 1 && $pr_data['pro_id'] == $addressData['pro_id']) {
                                                                                ?> 
                                                                                  selected
                                                                                <?php
                                                                            } ?>>

                                                                                    <?php echo ($pr_data['province']) ?>
                                                                                </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="mt-4 col-md-6 col-12">
                                                                <Label for="dis">Distric</Label>
                                                                <select name="" id="dis">
                                                                    <option value="0">Select Distric</option>
                                                                    <?php
                                                                    $pr = Database::search("SELECT * FROM `distric` ");
                                                                    for ($x = 0; $x < $pr->num_rows; $x++) {
                                                                        $pr_data = $pr->fetch_assoc();
                                                                        ?>
                                                                        <option value="<?php echo ($pr_data['Dis_id']) ?>"  <?php 
                                                                        if ($ad->num_rows == 1 && $pr_data['Dis_id'] == $addressData['Dis_id']) {
                                                                                ?> 
                                                                                  selected
                                                                                <?php
                                                                            } ?>>
                                                                            <?php echo ($pr_data['Distric']) ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="mt-4 col-md-6 col-12">
                                                                <Label for="city">City</Label>
                                                                <select name="" id="city">
                                                                    <option value="0">Select City</option>
                                                                    <?php
                                                                    $pr = Database::search("SELECT * FROM `city` ");
                                                                    for ($x = 0; $x < $pr->num_rows; $x++) {
                                                                        $pr_data = $pr->fetch_assoc();
                                                                        ?>
                                                                        <option value="<?php echo ($pr_data['city_id']) ?>"  <?php 
                                                                        if ($ad->num_rows == 1 && $pr_data['city_id'] == $addressData['City_city_id']) {
                                                                                ?> 
                                                                                  selected
                                                                                <?php
                                                                            } ?>>
                                                                            <?php echo ($pr_data['city']) ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="single-input-item">
                                                            
                                                     
                                                            <label for="ad1" class="required">Address Line
                                                                01</label>
                                                                <?php 
                                                        if ($ad->num_rows == 1) {
                                                        ?>
                                                            <input type="Text" id="ad1" value="<?php echo ($addressData['line1']); ?>" />
                                                        <?php
                                                        }else{
                                                            ?>
                                                            <input type="Text" id="ad1" placeholder="Address Line 01" />
                                                            <?php
                                                        } 
                                                        ?>
                                                         
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="ad2" class="required">Address Line
                                                                02</label>
                                                                <?php 
                                                        if ($ad->num_rows == 1) {
                                                        ?>
                                                            <input type="Text" id="ad2" value="<?php echo ($addressData['line2']); ?>" />
                                                        <?php
                                                        }else{
                                                            ?>
                                                             <input type="Text" id="ad2" placeholder="Address Line 02" />
                                                            <?php
                                                        } 
                                                        ?>
                                                                
                                                           
                                                        </div>
                                                        <div class="single-input-item">
                                                            <button class="btn-success rounded-4"
                                                                onclick="details();">Update Details</button>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="single-input-item">
                                                            <label for="current-pwd" class="required">Current
                                                                Password</label>
                                                            <input type="password" id="current-pwd"
                                                                placeholder="Current Password" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New
                                                                        Password</label>
                                                                    <input type="password" id="new-pwd"
                                                                        placeholder="New Password" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm
                                                                        Password</label>
                                                                    <input type="password" id="confirm-pwd"
                                                                        placeholder="Confirm Password" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item">
                                                        <button onclick="updatePassword();" class="btn-login btn-add-to-cart">Update
                                                            Password</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                    </div>
                                </div>
                                <!-- My Account Tab Content End -->
                            </div>
                        </div>
                        <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        </div>

        <?php
        } else {
            ?>
        <script>
            window.location = "index.php";
        </script>

        <?php
        }
        ?>









    <!--Footer-->
    <?php
    include ("footer.php");
    ?>
    <!--End Footer-->


    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->

    <!-- Including Jquery -->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/jquery.cookie.js"></script>
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <!-- Including Javascript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/lazysizes.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="script.js"></script>
    </div>
</body>


</html>