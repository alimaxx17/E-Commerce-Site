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

// Prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// for paging
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 6;
$from_record_num = ($records_per_page * $page) - $records_per_page;

$page_title="Product Reviews";

include 'header.php';

$reviews = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$reviews = $_POST["reviews"];
}

$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$quantity=$quantity<=0 ? 1 : $quantity;

// add new item

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}


// Get the product ids

echo "<div class='col-md-4 m-b-20px'>";

        // Product id for javascript access
        echo "<div class='product-id display-none'>{$id}</div>";

        echo "<a href='product.php?id={$id}' class='product-link'>";
            // Select and show first product image
            $product_image->product_id=$id;
            $stmt_product_image=$product_image->readFirst();

            while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='m-b-10px'>";
                    echo "<img src='uploads/images/{$row_product_image['name']}' class='w-100-pct' />";
                echo "</div>";
            }

            // The products name
            echo "<div class='product-name m-b-10px'><h1>{$name}</h1></div>";
echo "</a>";



include 'footer.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>Lab 7</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="libs\css\star.css">
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="reviewform" method="get">
<h3> Rate Product: </h3><div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
	<label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
</div>
<br><br><br>
  Comment: <input type="text" size="50" name="reviews"> <input type="submit" value="Submit Review">
<br><br>
<h2> User Reviews: </h2>
<h2>
<?php
echo $reviews;
echo "<br>";
?>
</h2>
</form>




</body>
</html>
