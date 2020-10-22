<?php
// start session
session_start();

// Remove products from cart
//session_destroy();


// Title
$page_title="Congratulations!";

// Include header
include_once 'header.php';

echo "<div class='col-md-12'>";

    // Inform the user order has been placed
    echo "<div class='alert alert-success'>";
        echo "Your order will be deliver soon! Congratulations and Thank you for ordering at <strong>Sticker Tongue!</strong>";
    echo "</div>";

echo "</div>";


// Include footer
include_once 'footer.php';
?>
