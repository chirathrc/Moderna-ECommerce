<?php
session_start();
include ("connection.php");

if (!isset($_SESSION["u"])) {

    echo ("unknown Error Occured");
    exit;

}

$searchId = $_GET['id'];

if (empty($searchId)) {

    echo ("Enter Search Id First");

} else {

    $customerOrderRs = Database::search("SELECT * FROM `orders` WHERE `idOrders` = '" . $searchId . "'");

    if ($customerOrderRs->num_rows == '1') {

        $customerOrderRsData = $customerOrderRs->fetch_assoc();

        // Retrieve the date-time string from the customer order data
        $orderDeliverDate = new DateTime($customerOrderRsData['calculatedDeliveryDate']);

        $orderDeliverDate = $orderDeliverDate->format('Y-m-d');

        $orderData = new DateTime($customerOrderRsData['dateTime']);
        $orderDataNew = $orderData->format('Y-m-d');

        $customerData = Database::search("SELECT * FROM `user` WHERE `email` = '" . $customerOrderRsData["user_email"] . "'")->fetch_assoc();



        ?>

        <div class="input-container">
            <label for="code" class="form-label">Order ID</label>
            <input type="text" class="form-control" value="<?php echo ($searchId) ?>" required disabled>
        </div>


        <div class="input-container">
            <label for="code" class="form-label">Order Date</label>
            <input type="text" class="form-control" id="code" value="<?php echo ($orderDataNew) ?>" required disabled>
        </div>


        <div class="input-container">
            <label for="" class="form-label">Expected Delivery Date</label>
            <input type="text" class="form-control" id="" value="<?php echo ($orderDeliverDate) ?>" required disabled>
        </div>

        <div class="input-container">
            <label for="code" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="code"
                value="<?php echo ($customerData['F_name'] . " " . $customerData['L_name']) ?>" required disabled>
        </div>

        <div class="input-container">
            <label for="code" class="form-label">Email</label>
            <input type="text" class="form-control" id="code" value="<?php echo ($customerData['email']) ?>" required disabled>
        </div>

        <div class="input-container">
            <label for="statusOrder" class="form-label">Deliveryt Status</label>
            <Select class="form-control" id="statusOrder" onchange="changeOrderStatus(<?php echo ($customerOrderRsData['orderid']) ?>);">
                <?php
                $delStatus = Database::search("SELECT * FROM `deliverystatus`");

                for ($a = 0; $a < $delStatus->num_rows; $a++) {
                    $delStatusData = $delStatus->fetch_assoc();

                    ?>
                    <option value="<?php echo ($delStatusData['idDeliveryStatus']) ?>" <?php

                       if ($customerOrderRsData['DeliveryStatus_idDeliveryStatus'] == $delStatusData['idDeliveryStatus']) {
                           ?> selected <?php
                       }

                       ?>>
                        <?php echo ($delStatusData['status']) ?>
                    </option>
                    <?Php

                }
                ?>
            </Select>
        </div>

        <?php



    } else {
        echo ("Invalid Id");
    }

}





?>