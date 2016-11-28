<?php 
require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE orders
  (
      user_id       int(11)      NOT NULL,
      order_date	DATE      NOT NULL,
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