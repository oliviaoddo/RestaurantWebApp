<?php 
session_start();
if (isset($_SESSION["manager"])) {
    header("location: indexCustomer.php"); 
    exit();
}
?>
<?php
session_start();
if(isset($_POST["username"]) && isset($_POST["password"])){

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
	//Connect to the MySQL database 
	include "connect_to_mysql.php";
	$sql = mysqli_query($link, "SELECT id FROM admin WHERE username='$manager' AND password = '$password' LIMIT 1"); //query the person 
	//MAKE SURE PERSON EXISTS IN DATABASE
	$existCount = mysqli_num_rows($sql); //count the row nums
	if($existCount == 1){//evaluate the count
		while($row= mysqli_fetch_array($sql)){
			$id=$row["id"];
		}
		$_SESSION["id"] = $id;
		$_SESSION["manager"] = $manager;
		$_SESSION["password"] = $password; 
		header("location: indexadmin.php");
		exit();
	}
	else{ 
		echo 'That information is incorrect, try again <a href="index.php">Click Here</a>';
		exit();
	}
}
?>
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

    <title>Mangia Bene</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <link href="mangiabene.css" rel="stylesheet">
    
  </head>

  <body>
  
<header id="logo">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">HOME</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="about.html">ABOUT <span class="sr-only">(current)</span></a></li>
        <li><a href="contact.html">CONTACT</a></li>
        <li><a href="menu.html">MENU</a></li>
        <li><a href="order.php">ORDER ONLINE</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cart.php">CART</a></li>
        <li><a href="admin_login.php">LOG IN</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  
</header>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Customer Login</h2>
      <form id="form1" name="form1" method="post" action="admin_login.php">
        User Name:<br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
       <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
       
      </form>
      <p>&nbsp; </p>
    </div>
    <br />
  <br />
  <br />
  </div>
</div>
<footer class="footer">
        <div id="footer">
        <div class="row">
        
          <section class="col-sm-4">
          <h3>LOCATION</h3>
          <br /> 
          <br />
          <p>Address
          <br />27281 La Paz Road, Suite I
          <br />Laguna Niguel, CA 92677
        </p>
        </section>
      
            <section class="col-sm-4">
            <h3>HOURS</h3>
            </br>
            <br /><p>Sun- Thurs 11:30 am. to 9:30 pm.
            <br />Friday & Sat 11:30 am - 10:30 pm.</p> <br />
            <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="happyhours">Happy Hours</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Happy Hour!</h2>
      </div>
      <div class="modal-body">
        <p>Enjoy happy hour daily at the Mangia Bene Bar!</p>
        <br /><p>11:30 am - 6:30pm</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            
          </section>
          
            <section class="col-sm-4">
          <h3>FOLLOW US</h3>
          <a href="https://www.instagram.com/"><img class="twitter" src="images/instagramgood.png" alt="Twitter" ></a>
          <a href="https://twitter.com/?lang=en"><img class="twitter" src="images/twittergood.png" alt="Twitter" ></a>
          <a href="https://www.facebook.com/MangiaBeneCucinas"><img class="twitter" src="images/facebookgood.png" alt="Twitter" ></a>
          
          </section>
        
        </div>
      </div>
    </footer>
</body>
</html>