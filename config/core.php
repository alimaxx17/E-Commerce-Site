<!-- Mahamed Ali -->
<?php
// report error
error_reporting(E_ALL);

// start session
session_start();

// Main page url
$home_url="http://localhost/Sticker/";

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;
?>
