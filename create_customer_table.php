<?php 
require "connect_to_mysql.php";

$sqlCommand = "CREATE TABLE accounts
  (
      account_id     	int(11)      		NOT NULL		AUTO_INCREMENT,
      user_id		int(11)			NOT NULL,
      username		varchar(20)		NOT NULL,
      password		varchar(20)		NOT NULL,
      last_login DATE      			NOT NULL,
      CONSTRAINT pk_account PRIMARY KEY (account_id),
      CONSTRAINT account_user_fk
      	FOREIGN KEY (user_id)
      	REFERENCES users (user_id),
      unique(username)
  )";

if(mysqli_query($link, $sqlCommand)){
	echo "Your customer/account table has been created successfully!";
	} 
else {
	echo "CRITICAL ERROR: admin table has not been created";

}

?>