<!-- Mahamed Ali -->
<?php
// core configuration
include_once "../config/core.php";

include_once "ad_checker.php";

// include classes
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// page title
$page_title = "Users";

include_once "ad_header.php";

echo "<div class='col-md-12'>";

    // read all users from the database
    $stmt = $user->readAll($from_record_num, $records_per_page);

    $num = $stmt->rowCount();

    $page_url="users.php?";

    include_once "users_template.php";

echo "</div>";

include_once "ad_footer.php";
?>
