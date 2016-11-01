<?php 
session_start();
if (isset($_SESSION["manager"])) {
    header("location: indexCustomer.php"); 
    exit();
}
?>
<?php
session_start();
if(isset($_POST["username"]) && isset($_POST["password"])){

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
	//Connect to the MySQL database 
	include "connect_to_mysql.php";
	$sql = mysqli_query($link, "SELECT id FROM admin WHERE username='$manager' AND password = '$password' LIMIT 1"); //query the person 
	//MAKE SURE PERSON EXISTS IN DATABASE
	$existCount = mysqli_num_rows($sql); //count the row nums
	if($existCount == 1){//evaluate the count
		while($row= mysqli_fetch_array($sql)){
			$id=$row["id"];
		}
		$_SESSION["id"] = $id;
		$_SESSION["manager"] = $manager;
		$_SESSION["password"] = $password; 
		header("location: indexadmin.php");
		exit();
	}
	else{ 
		echo 'That information is incorrect, try again <a href="index.php">Click Here</a>';
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Mangia Bene</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <link href="mangiabene.css" rel="stylesheet">
    
  </head>

  <body>
  
 <div>
    <?php include_once("nav.php");?>
</div>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Customer Login</h2>
      <form id="form1" name="form1" method="post" action="admin_login.php">
        User Name:<br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
       <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
       
      </form>
      <p>&nbsp; </p>
    </div>
    <br />
  <br />
  <br />
  </div>
</div>
 <div>
    <?php include_once("footer.php");?>
</div>
</body>
</html>