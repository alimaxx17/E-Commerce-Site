<!-- Mahamed Ali -->
<?php

if($num>0){

    echo "<table class='table table-hover table-responsive table-striped'>";

    // table headers
    echo "<tr>";
        echo "<th>Firstname</th>";
        echo "<th>Lastname</th>";
        echo "<th>Email</th>";
        echo "<th>Contact Number</th>";
        echo "<th>Access Level</th>";
    echo "</tr>";

    // loop through the user records
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        // display user details
        echo "<tr>";
            echo "<td>{$firstname}</td>";
            echo "<td>{$lastname}</td>";
            echo "<td>{$email}</td>";
            echo "<td>{$contact_number}</td>";
            echo "<td>{$access_level}</td>";
        echo "</tr>";
        }

    echo "</table>";

    $page_url="users.php?";
    $total_rows = $user->countAll();

    include_once 'ad_paging.php';
}

else{
    echo "<div class='alert alert-danger'>
        <strong>No users found.</strong>
    </div>";
}
?>
