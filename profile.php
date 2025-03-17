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

   // $admin = $_SESSION["u"];

   $admin = Database::search("SELECT * FROM `admin` INNER JOIN `user` ON `admin`.`user_email` = `user`.`email` INNER JOIN `position` ON `admin`.`Position_idPosition` = `position`.`idPosition` INNER JOIN `status` ON `user`.`status_id` = `status`.`id` WHERE `user_email` = '" . $_SESSION['u']['email'] . "'")->fetch_assoc();

   $posotion = Database::search("SELECT * FROM `position` WHERE `idPosition` = '" . $admin['Position_idPosition'] . "'")->fetch_assoc();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">

   <title>BELLE - My Profile</title>
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

   <link rel="stylesheet" href="js/semantic.min.css" />

</head>

<body class="inner_page profile_page">
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
                           <h2>Profile</h2>
                        </div>
                     </div>
                  </div>
                  <!-- row -->
                  <div class="row column1">
                     <div class="col-md-2"></div>
                     <div class="col-md-8">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>User profile</h2>
                              </div>
                           </div>
                           <div class="full price_table padding_infor_info">
                              <div class="row">
                                 <!-- user profile section -->
                                 <!-- profile image -->
                                 <div class="col-lg-12">
                                    <div class="full dis_flex center_text mb-5">
                                       <div class="profile_img">

                                          <?php

                                          if (isset($admin['profileImage'])) {
                                             ?>
                                             <img id="profileImage" width="180" height="180" class="rounded-circle"
                                                src="<?php echo ($admin['profileImage']); ?>" alt="Profile Image">
                                             <?php

                                          } else {
                                             ?>
                                             <img id="profileImage" width="180" height="180" class="rounded-circle"
                                                src="userImages\man.png" alt="Profile Image">
                                             <?php
                                          }

                                          ?>


                                          <div class="col-12">

                                             <button class="form-control btn btn-dark mt-3"
                                                onclick="chooseFile()">Choose File</button>

                                             <!-- Hidden input element to handle file selection -->
                                             <input type="file" id="fileInput" style="display:none;"
                                                onchange="handleFile(this.files)">


                                             <button class="form-control btn btn-dark mt-3"
                                                onclick="AdminProfileImage()">Update</button>


                                          </div>

                                       </div>


                                       <div class="profile_contant">
                                          <div class="contact_inner">
                                             <h3> <?php echo ($admin['F_name'] . " " . $admin['L_name']); ?></h3>
                                             <p><strong>Position: </strong><?php echo ($posotion['position']); ?></p>
                                             <ul class="list-unstyled">
                                                <li><i class="fa fa-envelope-o"></i> : <?php echo ($admin['email']); ?>
                                                </li>
                                                <li><i class="fa fa-phone"></i> : 987 654 3210</li>
                                             </ul>
                                          </div>

                                       </div>
                                    </div>
                                    <!-- profile contant section -->
                                    <div class="full inner_elements margin_top_30">
                                       <div class="tab_style2">
                                          <div class="tabbar">
                                             <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-home-tab"
                                                      data-toggle="tab" href="#recent_activity" role="tab"
                                                      aria-selected="true">Personal Details</a>
                                                   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                      href="#project_worked" role="tab" aria-selected="false">Projects
                                                      Worked on</a>
                                                   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                                      href="#profile_section" role="tab"
                                                      aria-selected="false">Profile</a>
                                                </div>
                                             </nav>


                                             <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="recent_activity"
                                                   role="tabpanel" aria-labelledby="nav-home-tab">
                                                   <div class="msg_list_main">

                                                      <?php

                                                      $user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION['u']['email'] . "'")->fetch_assoc();

                                                      $admin = Database::search("SELECT * FROM `admin`
                                                      INNER JOIN `position` ON  `admin`.`Position_idPosition`=`position`.`idPosition`
                                                       WHERE `user_email` = '" . $user['email'] . "'")->fetch_assoc();
                                                      ?>

                                                      <div class="row mt-3 ">
                                                         <div class="col-6">
                                                            <Label for="First_name" class="text-dark">First Name</Label>
                                                            <input type="text" value="<?php echo ($user['F_name']); ?>"
                                                               class="form-control" id="First_name">
                                                         </div>

                                                         <div class="col-6">
                                                            <Label for="LastName" class="text-dark">Last Name</Label>
                                                            <input type="text" value="<?php echo ($user['L_name']); ?>"
                                                               class="form-control" id="LastName">
                                                         </div>
                                                      </div>

                                                      <div class="row mt-3">
                                                         <div class="col-6">
                                                            <Label for="Email" class="text-dark">Email</Label>
                                                            <input type="text" value="<?php echo ($user['email']); ?>"
                                                               class="form-control" id="Email" disabled>
                                                         </div>

                                                         <div class="col-6">
                                                            <Label for="Position" class="text-dark">Position</Label>
                                                            <input type="text"
                                                               value="<?php echo ($admin['position']); ?>"
                                                               class="form-control" id="Position" disabled>
                                                         </div>

                                                      </div>

                                                      <div class="row mt-3">
                                                         <div class="col-6">
                                                            <Label for="Mobile" class="text-dark">Mobile</Label>
                                                            <input type="text" value="<?php echo ($user['mobile']); ?>"
                                                               class="form-control" id="Mobile">
                                                         </div>

                                                      </div>

                                                      <div class="col-12 mt-5">
                                                         <Button class="form-control btn btn-success"
                                                            id="updateAdminDetails">Update</Button>
                                                      </div>




                                                   </div>
                                                </div>
                                                <div class="tab-pane fade" id="project_worked" role="tabpanel"
                                                   aria-labelledby="nav-profile-tab">
                                                   <p>
                                                   </p>
                                                </div>
                                                <div class="tab-pane fade" id="profile_section" role="tabpanel"
                                                   aria-labelledby="nav-contact-tab">
                                                   <p>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end user profile section -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2"></div>
                     </div>
                     <!-- end row -->
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
   <script src="js/custom.js"></script>
   <!-- calendar file css -->
   <script src="js/semantic.min.js"></script>
   <script src="script.js"></script>
</body>

</html>