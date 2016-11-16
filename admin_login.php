<?php 
session_start();
//log admin out by unsetting "customer" in SESSION based on whether "customer" is set in _SESSION or not
if (isset($_SESSION["manager"])) {
	unset($_SESSION["manager"]);
	header("location: adminLogin.php");
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
		echo 'That information is incorrect, try again <a href="adminLogin.php">Click Here</a>';
		exit();
	}
}
?>