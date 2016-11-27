 <?php 
session_start();
if(!isset($_SESSION["customer"])){
	header("location: customer_login.php");
	exit();
}

//Check if customer SESSION value is in database if user tries to access index in browser bar
$customerID = preg_replace('#[^0-9]#i','',$_SESSION["id"]); //filter everything but numbers and letters
$customer = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["customer"]); //filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["password"]);
//Run mySQL query to be sure that this person is an admin and that their password session var equals the database information 
//Connect to the MySQL database 
include "connect_to_mysql.php";
$sql = mysqli_query($link, "SELECT * FROM accounts"); //query the person 
//MAKE SURE PERSON EXISTS IN DATABASE
$existCount = mysqli_num_rows($sql); //count the row nums 
if($existCount == 0){// evaluate the count 
	echo "Your login session data is not on record in the databse";
	exit();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link href="carousel.css" rel="stylesheet">
    <link href="mangiabene.css" rel="stylesheet">
    
  </head>

	<body>
	
  <div>
    <?php include_once("navCustomer.php");?>
</div>
	

    <!-- Carousel
    ================================================== -->
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="images/slide2.jpg" alt="First slide">

        </div>
        <div class="item">
          <img class="second-slide" src="images/test.jpg" alt="Second slide">
        </div>
        <div class="item">
          <img class="third-slide" src="images/Restaurant.jpg" alt="Third slide">
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    <!-- /.carousel -->
	<div class="menucontainer" id="menulinks">
		<div class="row">
			<section class="col-md-12 col-sm-12 col-lg-4 col-xs-12">
				<a href="lunchmenu.html"><img class="food" src="images/pizza.jpg" alt="Food" ></a>
				<a href="lunchmenu.html"><h3>LUNCH MENU</h3></a>
			</section>
			
			<section class="col-md-12 col-sm-12 col-lg-4 col-xs-12">
				<a href="dinnermenu.html"><img class="food" src="images/pasta.jpg" alt="Food"></a>
				<a href="dinnermenu.html"><h3>DINNER MENU</h3></a>
			</section>
			
			<section class="col-md-12 col-sm-12 col-lg-4 col-xs-12">
				<a href="drinkmenu.html"><img class="food" src="images/drinks.jpg" alt="Food"></a>
				<a href="drinkmenu.html"><h3>DRINK MENU</h3></a>
			</section>
			
		</div>
	</div>
  <div>
    <?php include_once("footer.php");?>
</div>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
  </body>
</html>