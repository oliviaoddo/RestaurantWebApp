<?php
	//connect to the database
	$db_host = '127.0.0.1';
	$db_username = 'guest';
	$db_pass = '';
	$db_name = 'menu_DB';

	$link = mysqli_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
	mysqli_select_db ($link, "$db_name") or die ("no databse");

?>