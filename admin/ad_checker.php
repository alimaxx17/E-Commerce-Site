<?php
//Mahamed Ali

// if the session value is empty, redirect user to login page
if(empty($_SESSION['logged_in'])){
    header("Location: {$home_url}login.php?action=not_yet_logged_in");
}

// if access level was not 'Admin', redirect user to login page
else if($_SESSION['access_level']!="Admin"){
    header("Location: {$home_url}login.php?action=not_admin");
}

else{

}
?>
