<?php
session_start();
include "connection.php";

if (!isset($_SESSION["u"])) {

    ?>
    <script>
        window.location = 'login.php';

    </script>
    <?php

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
 
    <title>BELLE - Employee Registration </title>
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
                    <div class="container-fluid " id="detailsSection2">

                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Employee Registration</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="detailsSerachProduction">

                            <div class="col-md-6 col-12">

                                <h1 class="text-center">Search From Email</h1>
                                <hr>


                                <div class="row mb-5 input-container">
                                    <form class="form-inline  ">
                                        <input class="form-control mr-sm-4" type="search" placeholder="Search"
                                            aria-label="Search" id="userForAdmin_email">
                                        <button class="btn my-2 my-sm-0" id="userForAdminSearchBUTTON">
                                            <i class="fa fa-search text-dark"></i>
                                        </button>

                                    </form>
                                </div>

                                <div id="beforeAddAdmin_Check">

                                    <div class="input-container">
                                        <label for="adminAddName" class="form-label">User Name</label>
                                        <input type="text" class="form-control" id="adminAddName"
                                            placeholder="User Name" required disabled>
                                    </div>

                                    <div class="input-container">
                                        <label for="adminAddEmail" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="adminAddEmail"
                                            placeholder="User Email" required disabled>
                                    </div>


                                    <div class="input-container">
                                        <label for="posAdmin" class="form-label">Select Postion</label>
                                        <select class="form-control" id="posAdmin" disabled>
                                            <option value="0">Select Postion</option>
                                            <?php
                                            $positionRs = Database::search("SELECT * FROM `position`");

                                            for ($x = 0; $x < $positionRs->num_rows; $x++) {

                                                $positionRsData = $positionRs->fetch_assoc();
                                                ?>

                                                <Option value="<?php echo ($positionRsData['idPosition']) ?>">
                                                    <?php echo ($positionRsData['position']) ?>
                                                </Option>
                                                <?php


                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="input-container">
                                        <label for="adminStatus" class="form-label">Select Status</label>
                                        <select class="form-control" id="adminStatus" disabled>
                                            <option value="0">Select Status</option>
                                            <?php
                                            $admin_Status = Database::search("SELECT * FROM `status`");


                                            for ($x = 0; $x < $admin_Status->num_rows; $x++) {

                                                $admin_StatusData = $admin_Status->fetch_assoc();
                                                ?>
                                                <Option value="<?php echo ($admin_StatusData['id']) ?>">
                                                    <?php echo ($admin_StatusData['status']) ?>
                                                </Option>
                                                <?php


                                            }
                                            ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <button class="form-control btn btn-success" id="updatAddEmpDataeAdminDetails">Add
                                        Employee</button>
                                </div>




                                <!-- 
                                <div class="input-container">
                                    <label for="exampleInput" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInput"
                                        placeholder="Enter product Name" required>
                                </div>


                                <div class="input-container">
                                    <label for="exampleInput" class="form-label">Product Code (<span
                                            class="text-danger">Active</span>)</label>
                                    <input type="text" class="form-control" id="exampleInput" placeholder="#dR423"
                                        required disabled>
                                </div>

                                <div class="input-container">
                                    <label for="category" class="form-label">Product Category</label>
                                    <input type="text" class="form-control" id="category" placeholder="Product Category"
                                        required disabled>
                                </div>

                                <div class="input-container">
                                    <label for="category" class="form-label">Product Brand</label>
                                    <input type="text" class="form-control" id="category" placeholder="Product Brand"
                                        required disabled>
                                </div>


                                <div class="input-container">
                                    <label for="exampleInput" class="form-label">Price(Rs.)</label>
                                    <input type="text" class="form-control" id="exampleInput" placeholder="Enter Price">
                                </div>

                                <div class="input-container">
                                    <label for="category" class="form-label">Product Colour</label>
                                    <input type="text" class="form-control" id="category" placeholder="Product Colour"
                                        required disabled>
                                </div> -->




                                <style>
                                    .input-container {
                                        max-width: 400px;
                                        /* Adjust the max width as needed */
                                        margin: 20px auto;
                                        /* Center the container */
                                    }

                                    .image-upload-container {
                                        position: relative;
                                        width: 100px;
                                        height: 100px;
                                        margin: 10px;
                                    }

                                    .image-upload-container img {
                                        width: 100%;
                                        height: 100%;
                                        object-fit: cover;
                                        cursor: pointer;
                                    }

                                    .image-upload-container input[type="file"] {
                                        display: none;
                                    }

                                    .image-upload-label {
                                        display: inline-block;
                                        width: 100%;
                                        height: 100%;
                                        cursor: pointer;
                                    }
                                </style>




                            </div>

                            <div class="col-md-6 col-12 ">

                                <div class="input-container">
                                    <label for="AddBrand" class="form-label">Add Position</label>
                                    <input type="text" class="form-control" placeholder="Enter Position"
                                        id="AddPosition" required>

                                    <Button class="btn btn-dark mt-4 form-control" id="AddPositionBtn">Add</Button>
                                </div>



                            </div>


                        </div>






                    </div>



                    <div class="success-animation d-none" id="successAnime2">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                    </div>

                    <style>
                        .success-animation {
                            margin: 150px auto;
                        }

                        .checkmark {
                            width: 100px;
                            height: 100px;
                            border-radius: 50%;
                            display: block;
                            stroke-width: 2;
                            stroke: #4bb71b;
                            stroke-miterlimit: 10;
                            box-shadow: inset 0px 0px 0px #4bb71b;
                            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
                            position: relative;
                            top: 5px;
                            right: 5px;
                            margin: 0 auto;
                        }

                        .checkmark__circle {
                            stroke-dasharray: 166;
                            stroke-dashoffset: 166;
                            stroke-width: 2;
                            stroke-miterlimit: 10;
                            stroke: #4bb71b;
                            fill: #fff;
                            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;

                        }

                        .checkmark__check {
                            transform-origin: 50% 50%;
                            stroke-dasharray: 48;
                            stroke-dashoffset: 48;
                            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
                        }

                        @keyframes stroke {
                            100% {
                                stroke-dashoffset: 0;
                            }
                        }

                        @keyframes scale {

                            0%,
                            100% {
                                transform: none;
                            }

                            50% {
                                transform: scale3d(1.1, 1.1, 1);
                            }
                        }

                        @keyframes fill {
                            100% {
                                box-shadow: inset 0px 0px 0px 30px #4bb71b;
                            }
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