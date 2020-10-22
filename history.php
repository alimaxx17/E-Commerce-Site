<!-- Henrick Chin -->
<?php

session_start();

include 'config/database.php';

include_once "objects/product.php";
include_once "objects/product_image.php";

$page_title="Your Purchase History" ;
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$product_image = new ProductImage($db);

include 'header.php';


echo "<div class='col-md-8'>";



include 'footer.php';

?>
