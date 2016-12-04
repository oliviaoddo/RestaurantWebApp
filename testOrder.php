<?php
	include "connect_to_mysql.php";
	$data = file_get_contents( "php://input" ); //$data is now the string '[1,2,3]';
	$data = json_decode($data);

	$customerInfo = "INSERT INTO orders (user_id, order_date, first_name, last_name, email, phone, instructions, pickupTime, deliveryTime, deliveryStreet, deliveryCity, deliveryState, deliveryZip, deliveryCountry, billingStreet, billingCity, billingState, billingZip, billingCountry, billingFname, billingLname, cardNumber, expirationMonth, expirationYear, cardCode) VALUES ('4', '11-12-16','".$data->info[0]."', '".$data->info[1]."', '".$data->info[2]."', '".$data->info[3]."', '".$data->info[4]."', '".$data->info[5]."', '".$data->info[6]."', '".$data->info[7]."', '".$data->info[8]."', '".$data->info[9]."', '".$data->info[10]."', '".$data->info[11]."', '".$data->info[12]."', '".$data->info[13]."', '".$data->info[14]."', '".$data->info[15]."', '".$data->info[16]."', '".$data->info[17]."', '".$data->info[18]."', '".$data->info[19]."', '".$data->info[20]."', '".$data->info[21]."', '".$data->info[22]."')";

	$orderItems = "INSERT INTO orderline (order_id, user_id, order_date, prod_id, quantity) VALUES ('2', '4', '11-12-16', '".$data->orderItems[0]->productId."', '".$data->orderItems[0]->productQuantity."' )";

	/*$sql = "INSERT INTO orders (user_id, order_date, first_name, last_name, email, phone, instructions, pickupTime, deliveryTime, deliveryStreet, deliveryCity, deliveryState, deliveryZip, deliveryCountry, billingStreet, billingCity, billingState, billingZip, billingCountry, billingFname, billingLname, cardNumber, expirationMonth, expirationYear, cardCode) VALUES ('2', '11-12-16','1', '2', '3', '4', '5', '6', '7', '8', '9',
	 	'10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23')";*/


	if (mysqli_query($link, $customerInfo)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $customerInfo . "<br>" . mysqli_error($link);
	}

	if (mysqli_query($link, $orderItems)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $orderItems . "<br>" . mysqli_error($link);
	}

	mysqli_close($link);

?>