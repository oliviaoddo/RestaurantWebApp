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

    <title>Menu</title>

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
	
<a name="dinnerlink"></a>
<h1 id="menutitle">MENU</h1>
<br />
<section class="antipasta">
<a name="applink"></a>
	<h1>PIZZA<h1>
	<br />
	<div class ="row">
		<section class="col-md-6">
		<h3>MUSHROOM PIZZA $10.00</h3>
		<h4>SERVED WITH HOMEMADE TOMATO SAUCE</h4>
		<h3>CHEESE PIZZA $9.00<h3>
		<h4>CALAMARI, SPICY MARNADA KALAMATA OLIVES, BASIL AND GARLIC</h4>
		</section>
		<section class="col-md-6">
		<h3>HAWAIIAN PIZZA  $10.00<h3>
		<h4>Our delicious thin crust with Mozzarella cheese, ham, and pineapple.</h4>
		<h3>PEPPERONI PIZZA $12.00</h3>
		<h4>Our delicious thin crust with Mozzarella cheese, marinara sauce, and Pepperoni.</h4>
		</section>
	</div>
</section>

<hr>

<section class="insalata">
	<h1>SALAD</h1>
	<br />
	<div class ="row">
		<section class="col-md-6">
		<h3>COBB SALAD $13.00</h3>
		<h4>Chopped salad greens, tomato, crisp bacon, boiled, grilled or roasted chicken breast, hard-boiled egg, avocado, chives.</h4>
		<h3>CEASER SALAD $12.00</h3>
		<h4>Romaine lettuce and croutons dressed with parmesan cheese, lemon juice, olive oil.</h4>
		</section>
		<section class="col-md-6">
		<h3>CHIPOTLE CHICKEN SALAD $14.00</h3>
		<h4>need new description</h4>
		<h3>GREEK SALAD $11.00</h3>
		<h4>need new description</h4>
		</section>
	</div>
</section>

<hr>

<section class="panini">
	<h1>SANDWICHES</h1>
	<br />
	<div class ="row">
		<section class="col-md-6">
		<h3>BLT $9.00</h3>
		<h4>Bacon, lettuce, and tomato on a french roll.</h4>
		<h3>STEAK SANDWICH $13.00</h3>
		<h4>Steak, grilled onions, jack cheese, on sour dough.</h4>
		<h3>BREAKFAST SANDWICH $7.00</h3>
		<h4>Egg, cheddar cheese, and ham on a plain bagel.</h4>
		</section>
		<section class="col-md-6">
		<h3>CHICKEN PANINI $10.00</h3>
		<h4>Grilled chicken breast, jack cheese, avocado, and tomatoes on white bread.</h4>
		<h3>TURKEY PANINI $10.00</h3>
		<h4>Turkey breast, jack cheese, mushrooms, pesto on wheat bread.</h4>
		</section>
	</div>
</section>

<hr>

<section class="pasta">
	<h1>PASTA</h1>
	<br />
	<div class ="row">
		<section class="col-md-6">
		<h3>PESTO PASTA $11.00</h3>
		<h4>Penne pasta with parmesan cheese and creamy pesto.</h4>
		<h3>MAC N' CHEESE $9.00</h3>
		<h4>Elbow pasta with creamy cheddar cheese sauce.</h4>
		</section>
		<section class="col-md-6">
		<h3>SPAGHETTI $12.00</h3>
		<h4>Meatballs, mushrooms, onions, marinara sauce, spaghetti noodles</h4>
		<h3>BAKED ZITI $10.00</h3>
		<h4>Need new description</h4>
		</section>
	</div>
</section>

<hr>

<section class="pizza">
	<h1>SOUP</h1>
	<br />
	<div class ="row">
		<section class="col-md-6">
		<h3>FRENCH ONION $5.00</h3>
		<h4>Meat stock and onions, and often served gratinéed with croutons and cheese on top.</h4>
		<h3>VEGETABLE $4.00</h3>
		<h4>need new description</h4>
		</section>
		<section class="col-md-6">
		<h3>TOMATO BASIL $4.00</h3>
		<h4>Creamy tomato, basil puree with a toasted cruton.</h4>
		<h3>CHICKEN NOODLE $5.00</h3>
		<h4>Shredded chicken, carrots, celery, broth.</h4>
		</section>
	</div>
</section>

<br />
    <br />
    <br />
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