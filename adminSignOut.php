<?php
// Start the session
session_start();

// Check if session variable 'u' is set
if (isset($_SESSION['u'])) {
    // If set, destroy the session
    session_destroy();

    // Output success message
    echo "Success";
}
?>