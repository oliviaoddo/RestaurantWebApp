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

    <title>Contact</title>

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

<section class= "contactimage"> 
<h1 id="contactheader">CONTACT</h1>
</section>


<div class="container">
<div class="row">
<div class="col-lg-4 col-md-push-1" >
    <address>
    <h3>Location</h3>
    <p class="lead" id="contact"><a href="https://www.google.com/maps/place/Mangia+Bene+Cucina/@33.5667156,-117.7115387,17z/data=!3m1!4b1!4m2!3m1!1s0x80dcef395eccb8c1:0xa2ec9f0e0dfdcc91?hl=en">Mangia Bene<br>
27281 La Paz Road, Suite I<br />

Laguna Niguel, CA 92677</a><br>
      Phone: 949-831-0141<br>
      Fax: 949-831-0147</p>
    </address>
  </div>
  
  
  <div class="col-lg-4 col-md-push-1" id="contact">
  <section>
    <h3>Hours</h3>
    <p class="lead"><p>Sun- Thurs 11:30 am. to 9:30 pm.
    				<br />Friday & Sat 11:30 am - 10:30 pm.</p>
    				<h3>HAPPY HOURS</h3>
    				<p>11:30 am - 6:30pm</p><br>
    </section>
</div>
<div class="col-lg-4 col-md-push-1" >
    <section>
    <h3>Email us!</h3>
    <p class="lead" id="contact"><a href="mailto:info@mangiabenecucina.net?Subject=Hello%20again" target="_top">info@mangiabenecucina.net</a><br>
    <h3>Follow us!</h3>
    			<a href="https://www.instagram.com/"><img class="twitter" src="images/blackinsta.png" alt="Twitter" ></a>
    			<a href="https://twitter.com/?lang=en"><img class="twitter" src="images/twitterblack.png" alt="Twitter" ></a>
    			<a href="https://www.facebook.com/MangiaBeneCucinas"><img class="twitter" src="images/facebookblack.png" alt="Twitter" ></a>
    </section>
  </div>
    <hr class="featurette-divider hidden-lg">
</div>
  <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg" id="button">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
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
</div>

      
       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
