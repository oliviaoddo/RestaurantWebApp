<?php
/*script that does mysqli of checkout.php info into menu_db's customer/order/orderlines table
1) customer fills info in checkout.php ; insert customer into database, retrieve customer's auto inc ID through sub-query
such as, SELECT id from customers where name is X and phone is X and email is X (whatever attribute PK is identifying)
2) insert into orders table from step 4)review order, info comes from cart.php, insert into orderlines table
this part might require a loop to make sure you get each key->value (prodName or ID -> quantity)
*/
/**
 * These are the database login details
 */  
define("HOST", "127.0.0.1");     // The host you want to connect to.
define("USER", "guest");    // The database username. 
define("PASSWORD", "");    // The database password. 
define("DATABASE", "menu_DB");    // The database name.
date_default_timezone_set('US/Central');
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
//Attempt to connect to database // test if require "connect_to_mysql.php"; will suffice post-project
$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error " . mysqli_error($link));

/*paying customer info*/
$fname = $_POST['user_firstName'];
$lname = $_POST['user_lastName'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$date = date("Y-m-d h:i:sa");

/*CHECKOUT STEP 1*/
/*Perform different SQL statements based on whether user is a logged in account or guest*/
$subclassSQL = "";
$idForOrder = "";
$userID = "";
/*retrieve the user_id of new user using values the PK user_id represents*/
/*SQL seclectUserID does not work when including 'and email = $email and phone = $phone'?*/
$selectUserID = "SELECT user_id FROM USERS 
		WHERE fname ='$fname' and lname = '$lname' LIMIT 1";
		$resultUser = mysqli_query($conn, $selectUserID);
		if ($resultUser){
			$row = mysqli_fetch_assoc($resultUser);
			$userID = $row["user_id"];
		}
		else{
			echo 'cant find exisitng user, must be a guest</br>';
		}
	if (isset($_SESSION["customer"])) {
		echo "customer in sess, userID is: ".$userID."</br>";
		$idForOrder = "SELECT * FROM accounts WHERE user_id = '$userID' LIMIT 1";	
	}
	else { //is guest
		echo "is a guest,creating new user and guest account</br>";
		$userSQL = "INSERT INTO users 
		VALUES('','$fname', '$lname', '$phone','$email')";
		if (mysqli_query($conn, $userSQL)) {
			echo "New user created successfully</br>";
		} else {
			echo "Error: " . $userSQL . "</br>" . mysqli_error($conn);
		}
		$selectUserID = "SELECT user_id FROM USERS 
		WHERE fname ='$fname' and lname = '$lname' LIMIT 1";
		$resultUser = mysqli_query($conn, $selectUserID);
		if ($resultUser){
			echo 'created guest a userID success</br>';
			$row = mysqli_fetch_assoc($resultUser);
			$userID = $row["user_id"];
		}
		else{
			echo 'creating user acc for guest failed</br>';
		}
		/*sql to create guest using user_id found*/
			$subclassSQL = "INSERT INTO GUEST 
				VALUES('','$userID')";
			if (mysqli_query($conn, $subclassSQL)) {
				echo "New guest created successfully";
				$idForOrder = "SELECT * FROM guest WHERE user_id = '$userID' LIMIT 1";
			} else {
				echo "Error: " . $subclassSQL . "</br>" . mysqli_error($conn);
			}
			echo 'found a matching user with user_id: '.$userID.'</br>';
	}

/*CHECKOUT STEP 2*/
$instruction = $_POST['delivery_instructions'];
$orderType = $_POST['orderOption']; //pickup or delivery
//if condition checks the value of radio button orderOption, retrieves appropiate POST values
$order_time = null;
if ($orderType == "pickup"){
	echo 'this is pickup</br>';
	$order_time = $_POST['pickup_time'];
}
/*else deliveryType is delivery, not pickup, assume all delivery address info is filled to retrieve*/
else {
	echo 'this is delivery</br>';
	$order_time = $_POST['delivery_time'];
	$deliv_time = $_POST['delivery_time'];
	$deliv_street = $_POST['delivery_street'];
	$deliv_city = $_POST['delivery_city'];
	$deliv_state = $_POST['delivery_state'];
	$deliv_zipcode = $_POST['delivery_zip'];
	$deliv_country = $_POST['delivery_country'];
	$delivery_address = "INSERT INTO address VALUES('','$fname','$lname','$userID','delivery',
	'$deliv_street','$deliv_city','$deliv_state','$deliv_zipcode','$deliv_country')";
	if (mysqli_query($conn, $delivery_address)) {
		echo 'new delivery address added for userID: '.$userID.'</br>';
	}else{
		echo 'deliv address failed</br>';
	}
}

/*CHECKOUT STEP 3*/
/* credit card input */
$card_number = $_POST['card_number'];
$card_month = $_POST['card_month'];
$card_year = $_POST['card_year'];
$card_securtiy = $_POST['card_security'];
/*billing customer info*/
$bill_fname = $_POST['billing_fname'];
$bill_lname = $_POST['billing_lname'];
$bill_street = $_POST['billing_street'];
$bill_city = $_POST['billing_city'];
$bill_state = $_POST['billing_state'];
$bill_zip = $_POST['billing_zip'];
$bill_country = $_POST['billing_country'];
$billing_address = "INSERT INTO address VALUES('','$bill_fname','$bill_lname','$userID','billing',
	'$bill_street','$bill_city','$bill_state','$bill_zip','$bill_country')";
	if (mysqli_query($conn, $billing_address)) {
		echo 'new billing address added for userID: '.$userID.'</br>';
	}else{
		echo 'billing address failed</br>';
	}
/*CHECKOUT STEP 4, inserting order/orderline/address(es) into tables*/
$resultOrder = mysqli_query($conn, $idForOrder);
if(mysqli_num_rows($resultOrder) > 0){
	$row = mysqli_fetch_assoc($resultOrder); // use $row[attribute] to retrieve data for order constructor
	$userID = $row["user_id"];
	echo $userID."</br>";
	$orderSQL = "INSERT INTO orders 
		VALUES('$userID','$date','$instruction','$order_time','$orderType','$card_number',
		'$card_month','$card_year','$card_securtiy')";
		
		
		
	if (mysqli_query($conn, $orderSQL)) {
		echo "New order created successfully</br>";
		//check content of cart to produce Product ID for orderline rows only if order was created successfully
		foreach ($_SESSION["cart_array"] as $single_row){
			$i = 0; //used as an index for each key=>value pair in a row, we have 2 (1 for product id, 1 for quantity)
			$pid = "";
			$quantity = "";
			foreach ($single_row as $key => $value){
				if ($i == 0){
					$pid = $value;
				}
				if ($i == 1){
					$quantity = $value;
					//do orderline insert before loop to next row!, ensured pid was already assigned before quantity
					$orderlineSQL = "INSERT INTO orderline 
						VALUES('','$userID','$date', '$pid', $quantity)";
					if (mysqli_query($conn, $orderlineSQL)) {
						echo "New orderline created successfully</br>";
					} 
					else {
						echo "Error: " . $orderlineSQL . "</br>" . mysqli_error($conn);
					}
				}
				$i++;
			}
		}
	} 
	else {
		echo "Error: " . $orderSQL . "</br>" . mysqli_error($conn);
	}
	
	

}
else {
	 echo "0 results for resultOrder for userID:".$userID.'</br>';
}


$resultProduct = mysqli_query($conn, "SELECT * FROM products WHERE user_id = '$userID'");
if(mysqli_num_rows($resultOrder) > 0){

}
else {
	 echo "0 results for resultOrderline";
}
//footer if conditions
if (isset($_SESSION["manager"])) {
		include_once("footerAdmin.php");
	}
	else {
		include_once("footer.php");
	}
?>