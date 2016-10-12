<?php 

session_start();
if(!isset($_SESSION["manager"])){
	header("location: admin_login.php");
	exit();
}

//Be sure to check this manager SESSION value is in fact in the database 
$managerID = preg_replace('#[^0-9]#i','',$_SESSION["id"]); //filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["manager"]); //filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["password"]);
//Run mySQL query to be sure that this person is an admin and that their password session var equals the database information 
//Connect to the MySQL database 
include "connect_to_mysql.php";
$sql = mysqli_query($link, "SELECT * FROM admin WHERE username = '$manager' AND password = '$password' LIMIT 1"); //query the person 
//MAKE SURE PERSON EXISTS IN DATABASE
$existCount = mysqli_num_rows($sql); //count the row nums 
if($existCount == 0){// evaluate the count 
	echo "Your login session data is not on record in the databse";
	exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Admin Area</title>
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Hello store manager, what would you like to do today?</h2>
      <p><a href="inventory_list.php">Manage Inventory</a><br />
      <a href="#">Manage Blah Blah </a></p>
    </div>
    <br />
  <br />
  <br />
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>

