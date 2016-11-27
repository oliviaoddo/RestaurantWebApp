<?php 
$pageTitle = 'User Register';
date_default_timezone_set('US/Central');
// note: since customer and admin table have AUTO_INCREMENT for their ID values, leave parameter blank '' when inserting query
/**
 * These are the database login details
 */  
define("HOST", "127.0.0.1");     // The host you want to connect to.
define("USER", "guest");    // The database username. 
define("PASSWORD", "");    // The database password. 
define("DATABASE", "menu_DB");    // The database name.


//Attempt to connect to database // test if require "connect_to_mysql.php"; will suffice post-project
$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error " . mysqli_error($link));
//Check connection incase it failed
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else {
	echo "success connect to database<br/>";
}



// Check user input for any NULL values: FirstName,LastName,Phone,Address, City, State, Zipcode
//Check1. FirstName, test insertion with pre-defined other values
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date = date("y-m-d");
/* this keeps showing up for some reason
<<<<<<< HEAD
 
=======
>>>>>>> 828384af0b5242b6f4fcce6eed1d4ac8ea227466
*/
$sqlUser = "INSERT INTO USERS 
		VALUES('','$fname', '$lname', '$email', '$phone')";
//change this code once user revised with OOP, will just need to store $customer obj into session instead of these 3 param
/* 
$_SESSION["custId"] = $custID;
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
*/
if (mysqli_query($conn, $sqlUser)) {
    echo "New user created successfully"."</br>";
} else {
    echo "Error: " . $sqlUser . "<br>" . mysqli_error($conn);
}
$selectUserID = "SELECT user_id,fname,lname,phone, email FROM USERS 
	WHERE fname ='$fname' and lname = '$lname' 
	";
$result = mysqli_query($conn, $selectUserID); 
$row = mysqli_fetch_assoc($result);
$userID = $row["user_id"];

if(mysqli_num_rows($result) > 0){
	echo "Found the userID".$userID."</br>";
	$sqlAccount = "INSERT INTO ACCOUNTS 
		VALUES('','$userID','$username','$password','$date')";
	if (mysqli_query($conn, $sqlAccount)) {
		echo "New account created successfully";
	} else {
		echo "Error: " . $sqlAccount . "<br>" . mysqli_error($conn);
	}
}
else {
	echo "0 results"."</br>";
}

//Closes connection to database
$conn->close();
?>
<div>
    <?php 
	session_start();
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
<!-- code doesnt force validation on information text boxes to be filled, enforce rule later -->
<a href="login.php">You've successfully registered! Go back and login here.</a> 
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