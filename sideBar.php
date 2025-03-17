<?php

$admin = Database::search("SELECT * FROM `admin` 
INNER JOIN `user` ON `admin`.`user_email` = `user`.`email` 
INNER JOIN `position` ON `admin`.`Position_idPosition` = `position`.`idPosition` 
INNER JOIN `status` ON `user`.`status_id` = `status`.`id` 
WHERE `user_email` = '" . $_SESSION['u']['email'] . "'")->fetch_assoc();

?>


<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="#"><img class="logo_icon img-responsive" src="images/apple-touch-icon-114x114.png"
                        alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img">
                    <?php

                    if (isset($admin['profileImage'])) {
                        ?>
                        <img class="img-responsive" src="<?php echo ($admin['profileImage']); ?>" alt="#" height="80px"
                            width="88px" />
                        <?php

                    } else {
                        ?>
                        <img class="img-responsive" src="userImages\man.png" alt="#" />
                        <?php
                    }

                    ?>


                </div>
                <div class="user_info">
                    <h6> <?php echo ($admin['F_name'] . " " . $admin['L_name']); ?></h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>General</h4>
        <ul class="list-unstyled components">
            <!--li class="active">
                <a href="dashboard.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
            </li!-->


            <li><a href="dashboard.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
            <li><a href="employeeDetails.php"><i class="fa fa-briefcase red_color"></i> <span>Employees</span></a></li>
            <li><a href="productionDetails.php"><i class="fa fa-shopping-bag blue1_color"></i>
                    <span>Production</span></a></li>
            <li><a href="productionManagement.php"><i class="fa fa-table  purple_color2"></i> <span>Product
                        Managment</span></a></li>
            <li><a href="InvoiceAdmin.php"><i class="fa fa-money  purple_color"></i> <span>Invoices/Sells</span></a>
            </li>
            <li><a href="productionProcess.php"><i class="fa fa-database  green_color"></i> <span>Process</span></a>
            </li>

            <?php
            if ($admin['email'] == 'chirathrc2005@gmail.com') {
                ?>

                <li><a href="employeeRegistration.php"><i class="fa fa-user  yellow_color"></i> <span>Employees
                            Registration</span></a></li>
                <?php
            } else {
                ?>
               
                <?php
            }
            ?>
             <li><a href="customer.php"><i class="fa fa-user  purple_color2"></i> <span>Customers</span></a></li >




        </ul>
    </div>
</nav>