<?php 
require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE numbers
  (
      admin_id     	int(11)      		NOT NULL		AUTO_INCREMENT,
      user_id		int(11)			NOT NULL,
      username		varchar(20)		NOT NULL,
      password		varchar(20)		NOT NULL,
      last_login DATE      			NOT NULL,
      CONSTRAINT pk_admin PRIMARY KEY (admin_id),
      CONSTRAINT admin_user_fk
      	FOREIGN KEY (user_id)
      	REFERENCES users (user_id),
      unique(username)
  )";

if(mysql_query($sqlCommand)){
	echo "Your admin table has been created successfully!";
	} 
else {
	echo "CRITICAL ERROR: admin table has not been created";

}

?>