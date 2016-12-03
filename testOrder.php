<?php
	include "connect_to_mysql.php";
	$data = file_get_contents( "php://input" ); //$data is now the string '[1,2,3]';
	$data = json_decode($data);

	$sql = "INSERT INTO orders (user_id, order_date, first_name, last_name, email, phone, instructions, pickupTime, deliveryTime, deliveryStreet, deliveryCity, deliveryState, deliveryZip, deliveryCountry, billingStreet, billingCity, billingState, billingZip, billingCountry, billingFname, billingLname, cardNumber, expirationMonth, expirationYear, cardCode) VALUES ('2', '11-12-16','".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."', '".$data[4]."', '".$data[5]."', '".$data[5]."', '".$data[6]."', '".$data[7]."', '".$data[8]."', '".$data[9]."', '".$data[10]."', '".$data[11]."', '".$data[12]."', '".$data[13]."', '".$data[14]."', '".$data[15]."', '".$data[16]."', '".$data[17]."', '".$data[18]."', '".$data[19]."', '".$data[20]."', '".$data[21]."')";

	/*$sql = "INSERT INTO orders (user_id, order_date, first_name, last_name, email, phone, instructions, pickupTime, deliveryTime, deliveryStreet, deliveryCity, deliveryState, deliveryZip, deliveryCountry, billingStreet, billingCity, billingState, billingZip, billingCountry, billingFname, billingLname, cardNumber, expirationMonth, expirationYear, cardCode) VALUES ('2', '11-12-16','1', '2', '3', '4', '5', '6', '7', '8', '9',
	 	'10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23')";*/


	if (mysqli_query($link, $sql)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($link);
	}

	mysqli_close($link);

?>