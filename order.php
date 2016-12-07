<?php
include "connect_to_mysql.php";
/*get JSON object from checkout form*/
$data = file_get_contents( "php://input" ); //$data is now the string '[1,2,3]';
$data = json_decode($data);

date_default_timezone_set('US/Central');

if (isset($_SESSION["customer"])) {
		include_once("navCustomer.php");
	}
	else if (isset($_SESSION["manager"])) {
		include_once("navAdmin.php");
	}
	else {
		include_once("nav.php");
	}

/*paying customer info*/

$fname = $data->info[0];
$lname = $data->info[1];
$phone = $data->info[2];
$email = $data->info[3];
//$date = date("Y-m-d h:i:sa");
$date = date("Y-m-d");

/*CHECKOUT STEP 1*/
/*Perform different SQL statements based on whether user is a logged in account or guest*/
$subclassSQL = "";
$idForOrder = "";
$userID = "";
/*retrieve the user_id of new user using values the PK user_id represents*/
/*SQL seclectUserID does not work when including 'and email = $email and phone = $phone'?*/
$selectUserID = "SELECT user_id FROM USERS 
		WHERE fname ='$fname' and lname = '$lname' LIMIT 1";
		$resultUser = mysqli_query($link, $selectUserID);
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
		VALUES(default,'$fname', '$lname', '$phone','$email')";
		if (mysqli_query($link, $userSQL)) {
			echo "New user created successfully</br>";
		} else {
			echo "Error: " . $userSQL . "</br>" . mysqli_error($link);
		}
		$selectUserID = "SELECT user_id FROM USERS 
		WHERE fname ='$fname' and lname = '$lname' LIMIT 1";
		$resultUser = mysqli_query($link, $selectUserID);
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
				VALUES(default,'$userID')";
			if (mysqli_query($link, $subclassSQL)) {
				echo "New guest created successfully";
				$idForOrder = "SELECT * FROM guest WHERE user_id = '$userID' LIMIT 1";
			} else {
				echo "Error: " . $subclassSQL . "</br>" . mysqli_error($link);
			}
			echo 'found a matching user with user_id: '.$userID.'</br>';
	}

/*CHECKOUT STEP 2*/
$instruction = $data->info[4];
$orderType = $data->info[23]; //pickup or delivery
//if condition checks the value of radio button orderOption, retrieves appropiate POST values
$order_time = null;
if ($orderType == "pickup"){
	echo 'this is pickup</br>';
	$order_time = $data->info[5];
}
/*else deliveryType is delivery, not pickup, assume all delivery address info is filled to retrieve*/
else {
	echo 'this is delivery</br>';
	$order_time = $data->info[6];
	$deliv_time = $data->info[6];
	$deliv_street = $data->info[7];
	$deliv_city = $data->info[8];
	$deliv_state = $data->info[9];
	$deliv_zipcode = $data->info[10];
	$deliv_country = $data->info[11];
	$delivery_address = "INSERT INTO address VALUES(default,'$fname','$lname','$userID','delivery',
	'$deliv_street','$deliv_city','$deliv_state','$deliv_zipcode','$deliv_country')";
	if (mysqli_query($link, $delivery_address)) {
		echo 'new delivery address added for userID: '.$userID.'</br>';
	}else{
		echo 'deliv address failed</br>';
	}
}

/*CHECKOUT STEP 3*/
/* credit card input */
$card_number = $data->info[19];
$card_month = $data->info[20];
$card_year = $data->info[21];
$card_securtiy = $data->info[22];
/*billing customer info*/
$bill_fname = $data->info[17];
$bill_lname = $data->info[18];
$bill_street = $data->info[12];
$bill_city = $data->info[13];
$bill_state = $data->info[14];
$bill_zip = $data->info[15];
$bill_country = $data->info[16];
$billing_address = "INSERT INTO address VALUES(default,'$bill_fname','$bill_lname','$userID','billing',
	'$bill_street','$bill_city','$bill_state','$bill_zip','$bill_country')";
	if (mysqli_query($link, $billing_address)) {
		echo 'new billing address added for userID: '.$userID.'</br>';
	}else{
		echo 'billing address failed</br>';
	}
/*CHECKOUT STEP 4, inserting order/orderline/address(es) into tables*/
$resultOrder = mysqli_query($link, $idForOrder);
if(mysqli_num_rows($resultOrder) > 0){
	$row = mysqli_fetch_assoc($resultOrder); // use $row[attribute] to retrieve data for order constructor
	$userID = $row["user_id"];
	echo $userID."</br>";
	$orderSQL = "INSERT INTO orders
		VALUES(default,'$userID','$date','$instruction','$order_time','$orderType','$card_number',
		'$card_month','$card_year','$card_securtiy')";

	if (mysqli_query($link, $orderSQL)) {
		echo "New order created successfully</br>";
		$order_num = "";
		$orderNumSQL = "SELECT count(order_num) as count from orders";
		$result = mysqli_query($link, $orderNumSQL);
		if ($result){
			$row = mysqli_fetch_assoc($result);
			$countOrderNum = $row["count"];
			echo 'counted order_num to be: '.$countOrderNum;
		}
		else {
			echo 'you failed</br>';
		}
		//check content of cart to produce Product ID for orderline rows only if order was created successfully
		for($i=0; $i < count($data->orderItems); $i++){

			$orderlineSQL = "INSERT INTO orderline VALUES('$countOrderNum', '".$data->orderItems[$i]->productId."', '".$data->orderItems[$i]->productQuantity."')"; 
			if (mysqli_query($link, $orderlineSQL)) {
					echo "New orderline created successfully</br>";
			} 
			else {
				echo "Error: " . $orderlineSQL . "</br>" . mysqli_error($link);
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