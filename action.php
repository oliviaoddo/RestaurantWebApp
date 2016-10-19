#!/usr/local/php5/bin/php-cgi
<!--The above line of code is necessary for your php to run on the campus server-->
<!DOCTYPE HTML>
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Olivia Oddo</title>

<div id="content">

<!--This is where the php code was added using DW in code view. The php doesn't show up after it is processed. Check the instructions document for details about how the code should be typed. Notice I have included it in my content id so it is formatted properly. -->
 <?php 
 	echo 'Thank you for responding, '; 
	echo "<br />";
 	echo $_POST['fname']; 
	echo ' ';
 	echo $_POST['lname']; 
 	echo "<br />";
 	echo $_POST['email'];
 	echo "<br />";
 	echo $_POST['city'] ; 
 	echo ", ";
	echo $_POST['state'];
	echo "<br />";
 ?> 
</div>
</html>
