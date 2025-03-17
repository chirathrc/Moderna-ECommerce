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


    <title>BELLE - Process</title>

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
                    <div class="container-fluid" id="detailsSection">

                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Production</h2>
                                </div>
                            </div>
                        </div>


                        <div class="row ">

                            <div class="col-md-6 col-12">

                                <h1 class="text-center">Product Deliver Status</h1>
                                <hr>

                                <div class="input-container">
                                    <label for="deliverId" class="form-label">Serach Deliver Id</label>
                                    <input type="text" class="form-control" id="deliverId" placeholder="Enter Order Id"
                                        required>

                                    <Button class="btn mt-4" id="serachOrderId">Search</Button>
                                </div>


                                <div id="result">

                                    <div class="input-container">
                                        <label for="code" class="form-label">Order ID</label>
                                        <input type="text" class="form-control" required disabled>
                                    </div>

                                    <div class="input-container">
                                        <label for="code" class="form-label">Order Date</label>
                                        <input type="text" class="form-control" placeholder="" required disabled>
                                    </div>

                                    <div class="input-container">
                                        <label for="" class="form-label">Expected Delivery Date</label>
                                        <input type="text" class="form-control" id="" placeholder="" required disabled>
                                    </div>

                                    <div class="input-container">
                                        <label for="code" class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" placeholder="Customer Name" required
                                            disabled>
                                    </div>

                                    <div class="input-container">
                                        <label for="code" class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="customer@gmail.com"
                                            required disabled>
                                    </div>

                                    <div class="input-container">
                                        <label for="brand" class="form-label">Deliveryt Status</label>
                                        <Select class="form-control" disabled>
                                            <?php
                                            $delStatus = Database::search("SELECT * FROM `deliverystatus`");

                                            for ($a = 0; $a < $delStatus->num_rows; $a++) {
                                                $delStatusData = $delStatus->fetch_assoc();

                                                ?>
                                                <option value="<?php echo ($delStatusData['idDeliveryStatus']) ?>">
                                                    <?php echo ($delStatusData['status']) ?>
                                                </option>
                                                <?Php

                                            }
                                            ?>
                                        </Select>
                                    </div>
                                </div>


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

                                <h1 class="text-center ">Product Data Change</h1>
                                <hr>



                                <div class="input-container">
                                    <label for="category" class="form-label">Our Categories Category</label>
                                    <select class="form-control">
                                        <?php
                                        $category = Database::search("SELECT * FROM `category`");

                                        for ($x = 0; $x < $category->num_rows; $x++) {

                                            $categoryData = $category->fetch_assoc();
                                            ?>
                                            <Option value="<?php echo ($categoryData['Cat_id']) ?>">
                                                <?php echo ($categoryData['name']) ?>
                                            </Option>
                                            <?php

                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="input-container">
                                    <label for="brand" class="form-label">Our Brands</label>
                                    <select class="form-control" id="brand">
                                        <?php
                                        $brand = Database::search("SELECT * FROM `brand`");

                                        for ($x = 0; $x < $brand->num_rows; $x++) {

                                            $brandData = $brand->fetch_assoc();
                                            ?>
                                            <Option value="<?php echo ($brandData['B_id']) ?>">
                                                <?php echo ($brandData['Brand_Name']) ?>
                                            </Option>
                                            <?php


                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="input-container">
                                    <label for="size" class="form-label">Clothing Sizes</label>
                                    <select class="form-control" id="size">
                                        <?php
                                        $size = Database::search("SELECT * FROM `size_clothing`");

                                        for ($x = 0; $x < $size->num_rows; $x++) {

                                            $sizeData = $size->fetch_assoc();
                                            ?>
                                            <Option value="<?php echo ($sizeData['size_id']) ?>">
                                                <?php echo ($sizeData['size']) ?>
                                            </Option>
                                            <?php

                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="input-container">
                                    <label for="colour" class="form-label">Our Colours</label>
                                    <select class="form-control" id="colour">
                                        <?php
                                        $colour = Database::search("SELECT * FROM `colours`");

                                        for ($x = 0; $x < $colour->num_rows; $x++) {

                                            $colourData = $colour->fetch_assoc();
                                            ?>
                                            <Option value="<?php echo ($colourData['colour_id']) ?>">
                                                <?php echo ($colourData['colour']) ?>
                                            </Option>
                                            <?php

                                        }
                                        ?>

                                    </select>
                                </div>


                                <hr>

                                <div class="input-container">
                                    <label for="AddCat" class="form-label">Add Category</label>
                                    <input type="text" class="form-control" placeholder="Enter Category" id="AddCat"
                                        required>

                                    <Button class="btn btn-primary mt-4 form-control" id="AddCatBtn">Add</Button>
                                </div>

                                <div class="input-container">
                                    <label for="AddBrand" class="form-label">Add Brand</label>
                                    <input type="text" class="form-control" placeholder="Enter Brand Name" id="AddBrand"
                                        required>

                                    <Button class="btn btn-dark mt-4 form-control" id="AddBrandBtn">Add</Button>
                                </div>

                                <div class="input-container">
                                    <label for="AddColour" class="form-label">Add Colour</label>
                                    <input type="text" class="form-control" placeholder="Enter Colour Name"
                                        id="AddColour" required>

                                    <Button class="btn-secondary mt-4 form-control" id="AddColourBtn">Add</Button>
                                </div>




                            </div>


                        </div>





                    </div>


                    <div class="success-animation d-none" id="successAnime">
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