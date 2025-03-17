<?php
session_start();
include "connection.php";

if (!isset($_SESSION["u"])) {
    die("Unknown Error Occurred");
}


$email = $_GET['email'];

if (empty($email)) {

    echo ("Enter Email First");

} else {

    $user_From_EmailRS = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");

    if ($user_From_EmailRS->num_rows == '1') {

        $user_From_EmailRS_Data = $user_From_EmailRS->fetch_assoc();
        $admin_From_EmailRs = Database::search("SELECT * FROM `admin` WHERE `user_email` = '" . $user_From_EmailRS_Data['email'] . "'");

        if ($admin_From_EmailRs->num_rows == '1') {

            ?>
            <div class="input-container">
                <Label class="text-danger">Already Registered Employee</Label>
            </div>
            <?php

        }
        ?>


        <div class="input-container">
            <label for="adminAddName" class="form-label">User Name</label>
            <input type="text" class="form-control" id="adminAddName"
                value="<?php echo ($user_From_EmailRS_Data['F_name'] . " " . $user_From_EmailRS_Data['L_name']) ?>" required
                disabled>
        </div>

        <div class="input-container">
            <label for="adminAddEmail" class="form-label">Email</label>
            <input type="text" class="form-control" id="adminAddEmail" value="<?php echo ($user_From_EmailRS_Data['email']); ?>"
                required disabled>
        </div>

        <?php if ($admin_From_EmailRs->num_rows == '1') {

            $adminData = $admin_From_EmailRs->fetch_assoc();
            ?>

            <div class="input-container">
                <label for="posAdmin" class="form-label">Select Postion</label>
                <select class="form-control" id="posAdmin">
                    <option value="0">Select Postion</option>
                    <?php
                    $positionRs = Database::search("SELECT * FROM `position`");


                    for ($x = 0; $x < $positionRs->num_rows; $x++) {

                        $positionRsData = $positionRs->fetch_assoc();
                        ?>

                        <Option value="<?php echo ($positionRsData['idPosition']) ?>" <?php

                           if ($positionRsData['idPosition'] == $adminData['Position_idPosition']) {
                               ?> selected <?php
                           }
                           ?>>
                            <?php echo ($positionRsData['position']) ?>
                        </Option>
                        <?php


                    }
                    ?>

                </select>
            </div>


            <div class="input-container">
                <label for="adminStatus" class="form-label">Select Status</label>
                <select class="form-control" id="adminStatus">
                    <option value="0">Select Status</option>
                    <?php
                    $admin_Status = Database::search("SELECT * FROM `status`");


                    for ($x = 0; $x < $admin_Status->num_rows; $x++) {

                        $admin_StatusData = $admin_Status->fetch_assoc();
                        ?>
                        <Option value="<?php echo ($admin_StatusData['id']) ?>" <?php

                           if ($user_From_EmailRS_Data['status_id'] == $admin_StatusData['id']) {
                               ?> selected <?php
                           }
                           ?>>
                            <?php echo ($admin_StatusData['status']) ?>
                        </Option>
                        <?php


                    }
                    ?>

                </select>
            </div>

            <?php
        } else {
            ?>

            <div class="input-container">
                <label for="posAdmin" class="form-label">Select Postion</label>
                <select class="form-control" id="posAdmin">
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
                <select class="form-control" id="adminStatus">
                    <option value="0">Select Status</option>
                    <?php
                    $admin_Status = Database::search("SELECT * FROM `status`");


                    for ($x = 0; $x < $admin_Status->num_rows; $x++) {

                        $admin_StatusData = $admin_Status->fetch_assoc();
                        ?>
                        <Option value="<?php echo ($admin_StatusData['id']) ?>" <?php

                           if ($user_From_EmailRS_Data['status_id'] == $admin_StatusData['id']) {
                               ?> selected <?php
                           }
                           ?>>
                            <?php echo ($admin_StatusData['status']) ?>
                        </Option>
                        <?php


                    }
                    ?>

                </select>
            </div>
            <?php
        }
        ?>




        <?php

    } else {

        echo ("Invalid Email");
    }

}

?>