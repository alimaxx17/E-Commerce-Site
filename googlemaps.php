<!-- Henrick Chin -->
<?php

// Start session
session_start();

// Connect to database
include 'config/database.php';

// Include objects
include "objects/product.php";
include "objects/product_image.php";

// Database connection
$database = new Database();
$db = $database->getConnection();

// Initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);

$page_title="Locate Us !";

include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="libs\css\googlemaps.css">
</head>
<body>

<h4 align="center"> We are located at Humber College North Residence! </h4>


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2883.1158452165696!2d-79.60895908499117!3d43.728920255549845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b3a5391c12321%3A0x747f0c3b5cdecaa0!2sHumber%20College!5e0!3m2!1sen!2sca!4v1575991761496!5m2!1sen!2sca" style="width:100%;height:500px;" allowfullscreen=""></iframe>






</body>
</html>




<?php
include 'footer.php';

?>
