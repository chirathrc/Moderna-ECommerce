<?php

// $admin = $_SESSION["u"];
$admin = Database::search("SELECT * FROM `admin` 
INNER JOIN `user` ON `admin`.`user_email` = `user`.`email` 
INNER JOIN `position` ON `admin`.`Position_idPosition` = `position`.`idPosition` 
INNER JOIN `status` ON `user`.`status_id` = `status`.`id` 
WHERE `user_email` = '" . $_SESSION['u']['email'] . "'")->fetch_assoc();

?>



<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(47, 65, 80);">
        <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
            <div class="logo_section">
                <a href="#"><img class="img-responsive" src="images/logo.svg" alt="#" /></a>
            </div>
            <div class="right_topbar">
                <div class="icon_info">
                    <ul>
                        <!-- <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                        <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li> -->
                    </ul>
                    <ul class="user_profile_dd">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown">


                                <?php

                                if (isset($admin['profileImage'])) {
                                    ?>
                                    <img class="img-responsive rounded-circle" src="<?php echo ($admin['profileImage']); ?>"
                                        alt="#" />
                                    <?php

                                } else {
                                    ?>
                                    <img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg"
                                        alt="#" />
                                    <?php
                                }

                                ?>

                                <!-- <img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg"
                                    alt="#" /> -->

                                <span class="name_user">
                                    <?php echo ($admin['F_name'] . " " . $admin['L_name']); ?>
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="profile.php">My Profile</a>
                                <!-- <a class="dropdown-item" href="settings.html">Settings</a>
                                <a class="dropdown-item" href="help.html">Help</a> -->
                                <a class="dropdown-item" onclick="logOut()"><span>Log Out</span> <i
                                        class="fa fa-sign-out"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<script src="script.js"></script>