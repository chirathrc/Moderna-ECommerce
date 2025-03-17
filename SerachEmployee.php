<?php
session_start();
include "connection.php";

if (isset($_SESSION['u'])) {

    $admin = $_SESSION['u'];
    $seachresult = $_GET['data'];

    $employeeData = Database::search("SELECT * FROM `admin` INNER JOIN `user` ON `admin`.`user_email` = `user`.`email` 
    INNER JOIN `position` ON `admin`.`Position_idPosition` = `position`.`idPosition` 
    INNER JOIN `status` ON `user`.`status_id` = `status`.`id` 
    WHERE `user_email` != '" . $admin['email'] . "' AND `user_email` LIKE '%" . $seachresult . "%'");

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



} else {

    echo ("Unknown Error Occured");

}



?>