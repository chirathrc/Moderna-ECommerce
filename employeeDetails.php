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

    <title>BELLE - Employee Details</title>
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
                                    <h2>Our Employees</h2>
                                </div>
                            </div>
                        </div>



                        <div class="d-flex justify-content-center row mb-5">
                            <form class="form-inline col-12">
                                <input class="form-control mr-sm-4" type="search" placeholder="Search"
                                    aria-label="Search" id="empName">
                                <button class="btn my-2 my-sm-0 " id="searchBUTTON">
                                    <i class="fa fa-search text-dark"></i>
                                </button>

                            </form>
                        </div>

                        <!-- row -->

                        <div id="allEmployees" class="row column1">


                            <?php

                            $employeeData = Database::search("SELECT * FROM `admin` INNER JOIN `user` ON `admin`.`user_email` = `user`.`email` INNER JOIN `position` ON `admin`.`Position_idPosition` = `position`.`idPosition` INNER JOIN `status` ON `user`.`status_id` = `status`.`id` WHERE `user_email` != '" . $admin['email'] . "'");

                            for ($x = 0; $x < $employeeData->num_rows; $x++) {

                                $employeeDataDetails = $employeeData->fetch_assoc();

                                ?>

                                <div class="col-md-6 col-lg-4">
                                    <div class="full white_shd margin_bottom_30" style="height: 230px;">
                                        <!--mode data send!-->
                                        <div class="info_people" data-toggle="modal" data-target="#exampleModalCenter"
                                            data-name="<?php echo ($employeeDataDetails['F_name'] . " " . $employeeDataDetails['L_name']) ?>"
                                            data-position="<?php echo ($employeeDataDetails['position']); ?>"
                                            data-status="<?php echo ($employeeDataDetails['status']); ?>"
                                            data-date="<?php echo ($employeeDataDetails['joined_date']); ?>"
                                            data-email="<?php echo ($employeeDataDetails['email']); ?>">

                                            <div class="p_info_img">
                                                <?php

                                                if (empty($admin['profileImage'])) {
                                                    ?>
                                                    <img src="<?php echo ($employeeDataDetails['profileImage']); ?>" alt="#" />
                                                    <?php

                                                } else {
                                                    ?>
                                                    <img src="userImages\man.png" alt="#" />

                                                    <?php
                                                }

                                                ?>



                                            </div>
                                            <div class="user_info_cont">
                                                <h4><?php echo ($employeeDataDetails['F_name'] . " " . $employeeDataDetails['L_name']) ?>
                                                </h4>
                                                <p><?php echo ($employeeDataDetails['email']); ?></p>
                                                <p class="p_status"><?php echo ($employeeDataDetails['position']); ?></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <?php

                            }

                            ?>

                        </div>

                    </div>

                </div>



                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Single Employee Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="font-size: large;">

                                <div class="m-1">
                                    <Label>Full Name :</Label>
                                    <Label id="modalName" class="text-dark fw-bolder">Chirath Rothila </Label>
                                </div>

                                <div class="m-1" style="display: none;">
                                    <Label>Full Name :</Label>
                                    <Label id="modalEmail" class="text-dark fw-bolder"></Label>
                                </div>

                                <div class="m-1">
                                    <Label>Position :</Label>
                                    <Label id="modalPosition" class="text-dark fw-bolder">Chirath Rothila </Label>
                                </div>

                                <div class="m-1">
                                    <Label>Activation Status :</Label>
                                    <Label id="modalStatus" class="text-success fw-bolder">Activate</Label>
                                </div>

                                <div class="m-1">
                                    <Label>Employement date :</Label>
                                    <Label id="modalDate" class="text-success fw-bolder">Activate</Label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="moreDetails();"
                                    class="moreEmployeeDetails btn btn-primary">More Details</button>
                            </div>
                        </div>
                    </div>
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