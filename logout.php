<?php
include_once "config/core.php";

session_destroy();

//return to login page
header("Location: {$home_url}login.php");
?>
