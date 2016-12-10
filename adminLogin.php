<?php
  @ob_start();
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
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
      <form id="form1" name="form1" method="post" action="admin_login_script.php">
        <h2>Admin Login</h2>
        <label for = "username">Username</label>
        <input name="username" type="text" id="username">
         
        <label for = "password">Password</label>
        <input name="password" type="password" id="password">
        <p>
          <input type="submit" name="button" id="button"  value="Log In" id="button">
        </p>   
      </form>
    </div>
    <?php include_once("footer.php");?>
</body>
</html>