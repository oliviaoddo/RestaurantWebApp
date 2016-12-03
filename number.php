<?php 
require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE numbers
  (
      user_id		int(11)			NOT NULL
  )";

if(mysqli_query($link, $sqlCommand)){
	echo "Your customer/account table has been created successfully!";
	} 
else {
	echo "CRITICAL ERROR: admin table has not been created";

}

?>