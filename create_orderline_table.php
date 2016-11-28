<?php 
require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE orderline
  (
      order_id	  int(11)		NOT NULL AUTO_INCREMENT,
      user_id     int(11)      NOT NULL,
      order_date DATE      ,
      prod_id     int(11)      NOT NULL,
      quantity    int(11)      NOT NULL,
      CONSTRAINT pk_orders PRIMARY KEY (order_id),
      CONSTRAINT orderline_order_fk
      FOREIGN KEY (user_id,order_date)
      	REFERENCES orders (user_id,order_date),
      CONSTRAINT orderline_product_fk
      FOREIGN KEY (prod_id)
      	REFERENCES products (id)
  )";

if(mysqli_query($link, $sqlCommand)){
	echo "Your orderline/junction table has been created successfully!";
	} 
else {
	echo "CRITICAL ERROR: admin table has not been created";

}

?>