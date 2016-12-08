<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link href="carousel.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    
  </head>

	<body>
	
  <div>
    <?php 
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
    <?php 
      if (isset($_SESSION["manager"])) {
        include_once("footerAdmin.php");
      }
      else {
        include_once("footer.php");
      }
    ?>
</div>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
  </body>
</html>