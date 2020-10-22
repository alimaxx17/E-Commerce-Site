<!-- Henrick Chin -->
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
session_start();

// Connect to database
include 'config/database.php';
include_once "checker.php";
include_once 'config/database.php';
include_once 'objects/user.php';
$page_title="Your Profile" ;


include 'header.php';

$bio = "None";
$empty = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$bio = $_POST["bio"];
}

echo "<div class='col-md-8'>";
echo '<a href="history.php" style="font-size: 20px">View Purchase History</a>';
echo"<br>";
echo"<br>";
echo "<h4><b>Firstname: </b>" .$_SESSION['firstname']."</h4>";
echo "<br>";
echo "<h4><b>Lastname: </b>" .$_SESSION['lastname']."</h4>";
echo "<br>";


include 'footer.php';
?>
<?php
echo "<h4><b>Bio: </b>";
echo $bio;
echo "<br>";
?>
<br>
<h4><b>Edit Bio: </b></h4>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <textarea name="bio" rows="5" cols="40"><?php echo $empty;?></textarea>
	  <br><br>
      <input type="submit" name="submit" value="Confirm Edit" />
</form>

</body>
</html>
