<!-- Mahamed Ali -->
<?php

include_once 'config/core.php';

// database and object files
include_once 'config/database.php';
include_once 'objects/product.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// search term
$search_term=isset($_GET['s']) ? $_GET['s'] : '';

$page_title = "You searched for \"{$search_term}\"";
include_once "header.php";

// query products
$stmt = $product->search($search_term, $from_record_num, $records_per_page);

$page_url="search.php?s={$search_term}&";

// count total rows
$total_rows=$product->count($search_term);

include_once "template.php";

include_once "footer.php";
?>
