<?php 

require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE products (
		id int NOT NULL auto_increment, 
		name varchar(255) NOT NULL, 
		price int NOT NULL, 
		description varchar(255) NOT NULL, 
		category varchar(255) NOT NULL, 
		calories int NOT NULL, 
		fat int NOT NULL, 
		carbs int NOT NULL, 
		protein int NOT NULL, 
		sugar int NOT NULL, 
		date_added date NOT NULL,
		PRIMARY KEY(id), 
		UNIQUE KEY name(name)
		)";

if(mysqli_query($link, $sqlCommand)){
	echo "Your products table has been created successfully!";
	} 
else {
	echo "CRITICAL ERROR: products table has not been created";

}

?>
