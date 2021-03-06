<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Sign Up</title>
  <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="signUp.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>

   <div>
   <!--Include correct navigation based on who is logged in-->
        <?php 
          if (isset($_SESSION["customer"])) {
            include_once("navCustomer.php");
          }
          else if (isset($_SESSION["manager"])) {
            include_once("navAdmin.php");
          }
          else {
            include_once("nav.php");
          }
        ?>
      </div>
  <!-- form for a user to sign up-->
  <form id="form1" name="form1" action="customer_register.php" method="post">
  <h1>Sign Up</h1>
    <p>
      <label for="fname">First Name:</label>
      <input id="fname" name="fname" pattern = "[A-Za-z]{1,25}" type="text" required>
    </p>

    <p>
      <label for="lname">Last Name:</label>
      <input id="lname" pattern = "[A-Za-z]{1,25}" name="lname" type="text" required>
    </p>
	
 	<p>
       <label for="email">Email:</label>
       <input id="email" name="email" type="text" required>
     </p>
	
	<p>
      <label for="phone">Phone: (xxx-xxx-xxxx)</label>
      <input id="phone" pattern="^\d{3}-\d{3}-\d{4}$" name="phone" type="text" required>
    </p>

    <p>
      <label for="username">Username:</label>
      <input id="username" name="username" type="text" required>
    </p>
    <p>
      <label for="password">Password:</label>
      <input id="password" name="password" type="password">
      <span>Enter a password longer than 8 characters</span>
    </p>
    <p>
      <label for="confirm_password">Confirm Password:</label>
      <input id="confirm_password" name="confirm_password" type="password">
      <span>Please confirm your password</span>
    </p>

    <p>
      <input type="submit" value="Sign Up" id="submit">
    </p>
  </form>
    <div>
        <?php 
          if (isset($_SESSION["manager"])) {
            include_once("footerAdmin.php");
          }
          else {
            include_once("footer.php");
          }
        ?>
      </div>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="signUp.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>