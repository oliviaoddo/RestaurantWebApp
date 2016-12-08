<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "connect_to_mysql.php";
$userid = "";

if (isset($_SESSION["customer"])) {
		include_once("navCustomer.php");
		$userid = $_SESSION["id"]; /*retrieve user_id from when user logged into account in user_login_script.php*/
		echo 'user is logged in acc, with userid '.$userid.'</br>';
	}
	else if (isset($_SESSION["manager"])) {
		include_once("navAdmin.php");
	}
	else {
		include_once("nav.php");
	}
/*paying customer info*/
$fname = $_POST['user_firstName'];
$lname = $_POST['user_lastName'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
//$date = date("Y-m-d h:i:sa");
$date = date("Y-m-d");

/*CHECKOUT STEP 1*/
/*Perform different SQL statements based on whether user is a logged in account or guest*/
$subclassSQL = "";
$idForOrder = "";
$instruction = $_POST['delivery_instructions'];
$orderType = $_POST['orderOption']; //pickup or delivery
//if condition checks the value of radio button orderOption, retrieves appropiate POST values
$order_time = null;
/*retrieve the user_id of new user using values the PK user_id represents*/
	if (isset($_SESSION["customer"])) {
		echo "customer in sess, userID is: ".$userID."</br>";
		$idForOrder = "SELECT * FROM accounts WHERE user_id = '$userID' LIMIT 1";	
	}
	else { //is guest
		echo "is a guest,creating new user and guest account</br>";
		$userSQL = "INSERT INTO users 
		VALUES('','$fname', '$lname', '$phone','$email')";
		if (mysqli_query($link, $userSQL)) {
			echo "New user created successfully</br>";
		} else {
			echo "Error: " . $userSQL . "</br>" . mysqli_error($link);
		}
		
		$countUserID = "SELECT count(user_id) as userID from users";
		$resultUser = mysqli_query($link, $countUserID);
		if ($resultUser){
			$row = mysqli_fetch_assoc($resultUser);
			$userID = $row["userID"];
			echo 'created guest with userID.'.$userID.'</br>';
		}
		else{
			echo 'creating user acc for guest failed</br>';
		}
		/*sql to create guest using user_id found*/
			$subclassSQL = "INSERT INTO GUEST 
				VALUES('','$userID')";
			if (mysqli_query($link, $subclassSQL)) {
				echo 'found a matching user with user_id: '.$userID.'</br>';
				echo "New guest created successfully</br>";
				$idForOrder = "SELECT * FROM guest WHERE user_id = '$userID' LIMIT 1";
			} else {
				echo "Error: " . $subclassSQL . "</br>" . mysqli_error($link);
			}
	}
/*CHECKOUT STEP 3*/
/* credit card input */
$card_number = $_POST['card_number'];
$card_month = $_POST['card_month'];
$card_year = $_POST['card_year'];
$card_securtiy = $_POST['card_security'];

/*CHECKOUT STEP 4, inserting order/orderline/address(es) into tables*/
$order_num = "";
$resultOrder = mysqli_query($link, $idForOrder);
if(mysqli_num_rows($resultOrder) > 0){
	$row = mysqli_fetch_assoc($resultOrder); // use $row[attribute] to retrieve data for order constructor
	$userID = $row["user_id"];
	echo $userID."</br>";
	$orderSQL = "INSERT INTO orders
		VALUES('','$userID','$date','$instruction','$order_time','$orderType','$card_number',
		'$card_month','$card_year','$card_securtiy')";
		
		
		
	if (mysqli_query($link, $orderSQL)) {
		echo "New order created successfully</br>";
		
		/*
		might recycle this for admin table
		$SQLOrderNum = "SELECT * from orders where user_ID = $userID and order_date = $date";
		$existCount = mysqli_num_rows($mysqli_query($link, $SQLOrderNum)); 
		if (existCount > 0) {
			$row = mysqli_fetch_assoc(mysqli_query($link, $SQLOrderNum));
			$order_num = $row["order_num"];
			echo 'found matching ordernum = '.$order_num.' with userID = '.$userID.' date = '.$date.'</br>';
		} else {
			echo 'failed to find a matching ordernum with userID = '.$userID.' date = '.$date.'</br>';
		}
		*/
		$orderNumSQL = "SELECT count(order_num) as count from orders";
		$result = mysqli_query($link, $orderNumSQL);
		if ($result){
			$row = mysqli_fetch_assoc($result);
			$countOrderNum = $row["count"];
			echo 'counted order_num to be: '.$countOrderNum.'</br>';
		}
		else {
			echo 'you failed</br>';
		}
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
						VALUES('$countOrderNum', '$pid', $quantity)";
					if (mysqli_query($link, $orderlineSQL)) {
						echo "New orderline created successfully</br>";
					} 
					else {
						echo "Error: " . $orderlineSQL . "</br>" . mysqli_error($link);
					}
				}
				$i++;
			}
		}
	} 
	else {
		echo "Error: " . $orderSQL . "</br>" . mysqli_error($link);
	}
}
else {
	 echo "0 results for resultOrder for userID:".$userID.'</br>';
}

/*CHECKOUT STEP 2, place code for insert into address here due to needing order_num 
to be created before inserting into address*/
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
	$delivery_address = "INSERT INTO address VALUES('$countOrderNum','$fname','$lname','$userID','delivery',
	'$deliv_street','$deliv_city','$deliv_state','$deliv_zipcode','$deliv_country')";
	if (mysqli_query($link, $delivery_address)) {
		echo 'new delivery address added for userID: '.$userID.'</br>';
	}else{
		echo 'deliv address failed</br>';
	}
}
/*customer's billing address info*/
$bill_fname = $_POST['billing_fname'];
$bill_lname = $_POST['billing_lname'];
$bill_street = $_POST['billing_street'];
$bill_city = $_POST['billing_city'];
$bill_state = $_POST['billing_state'];
$bill_zip = $_POST['billing_zip'];
$bill_country = $_POST['billing_country'];
$billing_address = "INSERT INTO address VALUES('$countOrderNum','$bill_fname','$bill_lname','$userID','billing',
	'$bill_street','$bill_city','$bill_state','$bill_zip','$bill_country')";
	if (mysqli_query($link, $billing_address)) {
		echo 'new billing address added for userID: '.$userID.'</br>';
	}else{
		echo 'billing address failed</br>';
	}
$resultProduct = mysqli_query($link, "SELECT * FROM products WHERE user_id = '$userID'");
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