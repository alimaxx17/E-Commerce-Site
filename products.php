<!-- Mahamed Ali -->
<?php
// Start session
session_start();

// Connect to database
include 'config/database.php';

// Include objects
include_once "objects/product.php";
include_once "objects/product_image.php";


// Database connection
$database = new Database();
$db = $database->getConnection();

// Initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);

// Prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// for paging
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 6;
$from_record_num = ($records_per_page * $page) - $records_per_page;


// Title
$page_title="Our Products";

?>

<?php

// header

include 'header.php';




echo "<div class='col-md-12'>";
    if($action=='added'){
        echo "<div class='alert alert-info'>";
            echo "Product was added to your cart!";
        echo "</div>";
    }

    if($action=='exists'){
        echo "<div class='alert alert-info'>";
            echo "Product already exists in your cart!";
        echo "</div>";
    }
echo "</div>";

// Read all products in database
$stmt=$product->read($from_record_num, $records_per_page);

$num = $stmt->rowCount();


if($num>0) {

    $page_url="products.php?";
    $total_rows=$product->count();

    include_once "readproducts.php";
}

// Inform user there zero products in database
else {
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>No products found.</div>";
    echo "</div>";
}

$total_rows=$product->count();

include 'footer.php';
?>
