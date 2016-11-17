<?php 
$pageTitle = 'User Register';
date_default_timezone_set('UTC');
// note: since customer and admin table have AUTO_INCREMENT for their ID values, don't need to fill out parameter when inserting query
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
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$date = date("y-m-d");
<<<<<<< HEAD
 
=======
>>>>>>> 828384af0b5242b6f4fcce6eed1d4ac8ea227466
$sql = "INSERT INTO Customer 
		VALUES('','$fname', '$lname', '$username', '$password', '$email', '$phone','$date')";
//change this code once user revised with OOP, will just need to store $customer obj into session instead of these 3 param
/* 
$_SESSION["custId"] = $custID;
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
*/
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
//Closes connection to database
//$conn->close();
?>
<!-- code doesnt force validation on information text boxes to be filled, enforce rule later -->
<a href="login.php">You've successfully registered! Go back and login here.</a> 