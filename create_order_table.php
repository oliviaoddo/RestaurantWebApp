<?php 
require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE orders
  (
      user_id       int(11)      NOT NULL,
      order_date	DATE      NOT NULL,
      first_name varchar(255) NOT NULL, 
      last_name varchar(255) NOT NULL, 
      email varchar(255) NOT NULL, 
      phone varchar(255) NOT NULL, 
      instructions varchar(255), 
      pickupTime varchar(255), 
      deliveryTime varchar(255), 
      deliveryStreet varchar(255), 
      deliveryCity varchar(255), 
      deliveryState varchar(255), 
      deliveryZip varchar(255), 
      deliveryCountry varchar(255),
      billingStreet varchar(255) NOT NULL, 
      billingCity varchar(255) NOT NULL, 
      billingState varchar(255) NOT NULL,
      billingZip varchar(255) NOT NULL,
      billingCountry varchar(255) NOT NULL, 
      billingFname varchar(255) NOT NULL, 
      billingLname varchar(255) NOT NULL, 
      cardNumber varchar(255) NOT NULL, 
      expirationMonth varchar(255) NOT NULL, 
      expirationYear varchar(255) NOT NULL, 
      cardCode varchar(255) NOT NULL,

      CONSTRAINT pk_orders PRIMARY KEY (user_id, order_date),
      CONSTRAINT order_user_fk
      	FOREIGN KEY (user_id)
      	REFERENCES users (user_id)
  )";

if(mysqli_query($link, $sqlCommand)){
	echo "Your orders/transaction table has been created successfully!";
	} 
else {
	echo "CRITICAL ERROR: admin table has not been created";

}

?>