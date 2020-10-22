<!-- Mahamed Ali -->
<?php
// start session
session_start();

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$quantity=$quantity<=0 ? 1 : $quantity;

// add new item
$cart_item=array(
    'quantity'=>$quantity
);

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

// check if the item is in the array
if(array_key_exists($id, $_SESSION['cart'])){

    header('Location: products.php?action=exists&id=' . $id . '&page=' . $page);
} else {
    $_SESSION['cart'][$id]=$cart_item;

    // redirect to product list
    header('Location: products.php?action=added&page=' . $page);
}
?>
