<!-- Mahamed Ali -->
<?php
// Start session
session_start();

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

// Delete products from the array
unset($_SESSION['cart'][$id]);

// redirect to product list and tell the user it was added to cart
header('Location: cart.php?action=removed&id=' . $id);
header('Location: confirm.php?action=removed&id=' . $id);


?>
