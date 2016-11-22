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
        <?php include_once("nav.php");?>
      </div>

  <form id="form1" name="form1" action="customer_register.php" method="post">
  <h1>Sign Up</h1>
    <p>
      <label for="fname">First Name</label>
      <input id="fname" name="fname" type="text" required>
    </p>

    <p>
      <label for="lname">Last Name</label>
      <input id="lname" name="lname" type="text" required>
    </p>
	
 	<p>
       <label for="email">Enter a desired email </br> ex.'Example@yahoo.com'</label>
       <input id="email" name="email" type="text" required>
     </p>
	
	<p>
      <label for="phone">Enter primary phone number:</label>
      <input id="phone" name="phone" type="text" required>
    </p>

    <p>
      <label for="username">Username</label>
      <input id="username" name="username" type="text" required>
    </p>
    <p>
      <label for="password">Password</label>
      <input id="password" name="password" type="password">
      <span>Enter a password longer than 8 characters</span>
    </p>
    <p>
      <label for="confirm_password">Confirm Password</label>
      <input id="confirm_password" name="confirm_password" type="password">
      <span>Please confirm your password</span>
    </p>

    <p>
      <input type="submit" value="Sign Up" id="submit">
    </p>
  </form>
  <div>
        <?php include_once("footer.php");?>
      </div>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="signUp.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>