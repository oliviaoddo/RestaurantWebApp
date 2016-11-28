<?php 
require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE users
  (
      user_id     int(11)      NOT NULL		AUTO_INCREMENT,
      fname		varchar(20)		NOT NULL,
      lname		varchar(20)		NOT NULL,
      phone		varchar(20)		NOT NULL,
      email		varchar(20)		NOT NULL,
      CONSTRAINT pk_user PRIMARY KEY (user_id)
  )";

if(mysqli_query($link, $sqlCommand)){
	echo "Your users table has been created successfully!";
	} 
else {
	echo "CRITICAL ERROR: admin table has not been created";

}

?>