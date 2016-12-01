<?php 
session_start();
//log customer out by unsetting "customer" in SESSION based on whether "customer" is set in _SESSION or not
if (isset($_SESSION["customer"])) {
	unset($_SESSION["customer"]);
	header("location: login.php");
}
?>
<?php
session_start();
if(isset($_POST["username"]) && isset($_POST["password"])){

	$customer = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
	//Connect to the MySQL database 
	include "connect_to_mysql.php";
	$sql = mysqli_query($link, "SELECT id FROM customer WHERE username='$customer' AND password='$password' LIMIT 1"); //query the person 
	//MAKE SURE PERSON EXISTS IN DATABASE
	$existCount = mysqli_num_rows($sql); //count the row nums
  echo $existCount;
	if($existCount == 1){//evaluate the count
		while($row= mysqli_fetch_array($sql)){
			$id=$row["id"];
		}
		$_SESSION["id"] = $id;
		$_SESSION["customer"] = $customer; //set sesssion to customer for indexCustomer page valdiation
		$_SESSION["password"] = $password;
		header("location: indexCustomer.php"); //take customer to customer's index, not guest or admin
		exit();
	}
  
	else{ 
		echo 'That information is incorrect, try again <a href="login.php">Click Here</a>';
		exit();
	}
  
}
?>