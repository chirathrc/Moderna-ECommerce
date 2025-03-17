<?php
session_start();
include "connection.php";

if (!isset($_SESSION["u"])) {
    die("Unknown Error Occurred");
}

if (isset($_GET['search'])) {
    $date = $_GET['search'];

    if (!empty($date)) {
        $dateTime = DateTime::createFromFormat('Y-m-d', $date);

        if ($dateTime) {
            $formattedDate = $dateTime->format('Y-m-d');

            // Assuming Database::search returns a result set (like mysqli_result), not shown here
            $purchaseHistory = Database::search("SELECT * FROM `orders` WHERE DATE(`dateTime`) = '$formattedDate' ORDER BY `dateTime` ASC");


            while ($purchaseHistoryData = $purchaseHistory->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($purchaseHistoryData['dateTime']); ?></td>
                    <td><?php echo htmlspecialchars($purchaseHistoryData['user_email']); ?></td>
                    <td><?php echo htmlspecialchars($purchaseHistoryData['Total']); ?></td>
                    <td>
                        <a href="invoice.php?orderId=<?php echo htmlspecialchars($purchaseHistoryData['orderid']); ?>">View Invoice</a>
                    </td>
                </tr>
                <?php
            }

        } else {
            echo "Invalid date format.";
        }
    } else {
        echo "Date parameter is empty.";
    }
} else {
    echo "Date parameter not provided.";
}
?>