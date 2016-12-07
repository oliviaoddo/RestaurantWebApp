<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Sign Up</title>
  <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link href="mangiabene.css" rel="stylesheet">
  <link rel="stylesheet" href="signUp.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>

   <div>
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
      <form id="customerLogin" name="form1" method="post" action="customer_login_script.php">
      <h2>Login</h2>
        <label for = "username">Username</label>
        <input name="username" type="text" id="username">
       
        <label for = "password">Password</label>
        <input name="password" type="password" id="password">
        <a href="customer_signup.php">Don't have an account? Sign up here!</a>
        <p>
          <input type="submit" name="button" value="Log In" id="button">
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
</body>
</html>