<!-- Mahamed Ali -->
<?php

session_start();

// Get the product id
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

// Make quantity just 1
$quantity=$quantity<=0 ? 1 : $quantity;

// Delete products from the array
unset($_SESSION['cart'][$id]);

// Add product with updated quantity
$_SESSION['cart'][$id]=array(
    'quantity'=>$quantity
);

// redirect to product list and tell the user it was added to cart
header('Location: cart.php?action=quantity_updated&id=' . $id);
?>
