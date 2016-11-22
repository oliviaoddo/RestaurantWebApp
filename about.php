<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
 
    <title>About</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link href="carousel.css" rel="stylesheet">
    <link href="mangiabene.css" rel="stylesheet">
    
  </head>
<body>
	<div>
    <?php 
	session_start();
	if (isset($_SESSION["customer"])) {
		include_once("navCustomer.php");
	}
	else if (isset($_SESSION["manager"])) {
		include_once("navAdmin.php");
	}
	else {
		include_once("nav.php");
	}
	?>
	</div>
	
<section class= "aboutimage"> 
</section>

 
<div class="container">
<section class ="col-sm-12 col-lg-12 col-md-12 col-xs-12" id= "abouttext"> 
	<h1>About</h1>
	<p>Located in beautiful Laguna Niguel, CA, Mangia Bene Cucina has been an Orange County landmark since 1991. 
	Our mission is to provide our guests with the best and most memorable dining experience. From our upbeat and vibrant staff, 
	to our original and delicious Italian dishes.</p>
	<p>We have a passion for Italian cuisine and with over 21 years of restaurant experience, we are sure to provide you with 
	what we like to call, The Fresh Italian Food Experience.</p>
	<p>From serving you daily for lunch and dinner to catering your parties and special events, we welcome your family to our family 
	restaurant.</p>
	<br />
</section>
	
	
</div>
	<div>
    <?php 
	if (isset($_SESSION["manager"])) {
		include_once("footerAdmin.php");
	}
	else {
		include_once("footer.php");
	}
	?>
	</div>
</div>

       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>