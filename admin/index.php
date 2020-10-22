<!-- Mahamed Ali -->
<?php
// configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "ad_checker.php";

$page_title="Admin Main Page";

include 'ad_header.php';

    echo "<div class='col-md-12'>";

        // get parameter values, and to prevent undefined index notice
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        // tell user is already logged in
        if($action=='already_logged_in'){
            echo "<div class='alert alert-info'>";
                echo "<strong>You</strong> are already logged in.";
            echo "</div>";
        }

        else if($action=='logged_in_as_admin'){
            echo "<div class='alert alert-success'>";
                echo "<strong>You</strong> are logged in as admin.";
            echo "</div>";
        }

    echo "</div>";

include_once 'ad_footer.php';
?>
