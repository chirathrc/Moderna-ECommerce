<?php
session_start();

if (!isset($_SESSION['u'])) {
    echo ("No user In session");
    exit;
}

if (isset($_SESSION['data'])) {

    unset($_SESSION['data']);
}

$qty = $_POST['qty'];
$pid = $_POST['P_id'];

if (empty($qty || $pid)) {
    echo ("Unknown Error Occured");
    exit;
}

// Call the static method 'a' of class A
A::a($pid, $qty);

class A
{
    public static function a($id, $qty)
    {
        // Create an associative array (object) to store values
        $data = [
            'product_id' => $id,
            'quantity' => $qty
        ];

        // Store the data object in the session
        $_SESSION['data'] = $data;
        echo ("Success");
    }
}

// instance Calling
// $A = new A();
// $A->a();

// Access the stored data from session if needed
// if (isset($_SESSION['data'])) {
//     $storedData = $_SESSION['data'];
//     echo "Product ID: " . $storedData['product_id'] . ", Quantity: " . $storedData['quantity'];
// }


?>