<?php 
require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE guest
  (
      guest_id      int(11)      NOT NULL	AUTO_INCREMENT,
      user_id     	int(11)      NOT NULL,
      CONSTRAINT pk_orders PRIMARY KEY (guest_id,user_id),
	  CONSTRAINT guest_users_fk
      FOREIGN KEY (user_id)
      	REFERENCES users (user_id)
  )";

if(mysqli_query($link, $sqlCommand)){
	echo "Your guest table has been created successfully!";
	} 
else {
	echo "CRITICAL ERROR: admin table has not been created";

}

?>