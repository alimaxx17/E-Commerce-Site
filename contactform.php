<!-- Harvir Singh -->
<?php
// start session
session_start();

// connect to database
include 'config/database.php';

// include objects
include_once "objects/product.php";
include_once "objects/product_image.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);

// set page title
$page_title="";

// include page header html
include 'header.php';
?>




<?php
/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file. */
require 'C:\xampp1\composer\vendor\autoload.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $password='PHPProject2020'; //This is John Doe’s email account password
    $useremail=$_POST['mail']; //will take the email address of the user from the form


/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

/* Open the try/catch block. */
try {
   /* Set the mail sender. */
   $mail->setFrom('stickertongue@gmail.com', 'Owners of Sticker Tongue');

   /* Add the name of sender*/
   $mail->Name = $_POST['name'];

   /* Add a recipient. */
   $mail->addAddress($useremail);

   /* Set the subject. */
   $mail->Subject = $_POST['subject'];

   /* Set the mail message body. */
   $mail->Body = $_POST['message'];

/* SMTP parameters. */

   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();

   /* SMTP server address. */
   $mail->Host = 'smtp.gmail.com';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;

   /* Set the encryption system. */
   $mail->SMTPSecure = 'tls';

   /* SMTP authentication username. */
   $mail->Username = 'stickertongue@gmail.com';

   /* SMTP authentication password. */
   $mail->Password = $password;

   /* Set the SMTP port. */
   $mail->Port = 587;


   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container2 {
  border-radius: 5px;
  background-color: white;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column2 {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column2, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<div class="container2">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row">
    <div class="column2">
      <img src="uploads/images/sticker.png" style="width:100%">
    </div>
    <div class="column2">
    <form class="contact-form" action="contactform.php" method="post">
    <input type="text" name="name" placeholder="Full name"><br><br>
    <input type="text" name="mail" placeholder="Your e-mail"><br><br>
    <input type="text" name="subject" placeholder="Subject"><br><br>
        <select id="country" name="country">
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
          <option value="australia">Australia</option>

        </select>
        <label for="message">Body</label>
        <textarea id="message" name="message" placeholder="Write something.." style="height:170px"></textarea>
        <button type="submit" name="submit">Send Mail</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
<?php
include 'footer.php';

?>
