<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type = "text/javascript" src="radioButton.js"></script>
    <link rel="icon" href="../../favicon.ico">

    <title>Order Online</title>

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


    <link href="carousel.css" rel="stylesheet">
    <link href="mangiabene.css" rel="stylesheet">
    
  </head>
<body>
<header>
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

<?php
include "connect_to_mysql.php";
date_default_timezone_set('UTC');

if (!isset($_POST['filter'])){ 

    $_SESSION['calories'] = "1500";
    $_SESSION['sugar'] = "20";
    $_SESSION['protien']= "20";
    $_SESSION['fat'] = "15";
    $_SESSION['carbs']= "50";
    $_SESSION['price'] = "15";

  $sqlPizza = mysqli_query($link, "SELECT * FROM products WHERE category = 'Pizza' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'"); 

  $sqlSandwich = mysqli_query($link, "SELECT * FROM products WHERE category = 'Sandwich' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

  $sqlSalad = mysqli_query($link, "SELECT * FROM products WHERE category = 'Salad' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

$sqlSoup = mysqli_query($link, "SELECT * FROM products WHERE category = 'Soup' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");
}

 $sqlPasta = mysqli_query($link, "SELECT * FROM products WHERE category = 'Pasta' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");


if (isset($_POST['filter'])) {
    if(isset($_POST['calories'])) {
      $_SESSION['calories'] = $_POST['calories'];  //  Displaying Selected Value
    }
    if(isset($_POST['sugar']))
    {
      $_SESSION['sugar'] = $_POST['sugar'];   //  Displaying Selected Value
    }
    if(isset($_POST['protien']))
    {
      $_SESSION['protien'] = $_POST['protien'];   //  Displaying Selected Value
    }
    if(isset($_POST['fat']))
    {
      $_SESSION['fat'] = $_POST['fat'];   //  Displaying Selected Value
    }
    if(isset($_POST['carbs']))
    {
      $_SESSION['carbs'] = $_POST['carbs'];   //  Displaying Selected Value
    }
    if(isset($_POST['price']))
    {
      $_SESSION['price'] = $_POST['price'];   //  Displaying Selected Value
    }

    $sqlPizza = mysqli_query($link, "SELECT * FROM products WHERE category = 'Pizza' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

    $sqlSandwich = mysqli_query($link, "SELECT * FROM products WHERE category = 'Sandwich' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

    $sqlSalad = mysqli_query($link, "SELECT * FROM products WHERE category = 'Salad' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

    $sqlSoup = mysqli_query($link, "SELECT * FROM products WHERE category = 'Soup' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

    $sqlPasta = mysqli_query($link, "SELECT * FROM products WHERE category = 'Pasta' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");


}

$pizzaCategory = "";

$productCount = mysqli_num_rows($sqlPizza); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlPizza)){ 
       $id = $row["id"];
       $product_name = $row["name"];
       $price = $row["price"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
       echo "<div class = 'container'><div class = 'row'>";
       $pizzaCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $id . '"><img src="inventory_images/' . $id . '.png" alt="' . $product_name . '" width="200" height="100" border="1" /><br></a>' . $product_name . '<br />
                  $' . $price . '<br />
                  <a href="product.php?id=' . $id . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
} else {
  $pizzaCategory = "<br>We have no menu items that meet your filter request";
}

$sandwichCategory = "";

$productCount = mysqli_num_rows($sqlSandwich); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlSandwich)){ 
       $id = $row["id"];
       $product_name = $row["name"];
       $price = $row["price"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
       echo "<div class = 'container'><div class = 'row'>";
       $sandwichCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $id . '"><img src="inventory_images/' . $id . '.png" alt="' . $product_name . '" width="200" height="100" border="1" /><br></a>' . $product_name . '<br />
                  $' . $price . '<br />
                  <a href="product.php?id=' . $id . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
} else {
  $sandwichCategory = "<br>We have no menu items that meet your filter request";
}

$saladCategory = "";

$productCount = mysqli_num_rows($sqlSalad); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlSalad)){ 
       $id = $row["id"];
       $product_name = $row["name"];
       $price = $row["price"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
       echo "<div class = 'container'><div class = 'row'>";
       $saladCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $id . '"><img src="inventory_images/' . $id . '.png" alt="' . $product_name . '" width="200" height="100" border="1" /><br></a>' . $product_name . '<br />
                  $' . $price . '<br />
                  <a href="product.php?id=' . $id . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
} else {
  $saladCategory = "<br>We have no menu items that meet your filter request";
}

$soupCategory = "";

$productCount = mysqli_num_rows($sqlSoup); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlSoup)){ 
       $id = $row["id"];
       $product_name = $row["name"];
       $price = $row["price"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
       echo "<div class = 'container'><div class = 'row'>";
       $soupCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $id . '"><img src="inventory_images/' . $id . '.png" alt="' . $product_name . '" width="200" height="100" border="1" /><br></a>' . $product_name . '<br />
                  $' . $price . '<br />
                  <a href="product.php?id=' . $id . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
} else {
  $soupCategory = "<br>We have no menu items that meet your filter request";
}

$pastaCategory = "";

$productCount = mysqli_num_rows($sqlPasta); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlPasta)){ 
       $id = $row["id"];
       $product_name = $row["name"];
       $price = $row["price"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
       echo "<div class = 'container'><div class = 'row'>";
       $pastaCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $id . '"><img src="inventory_images/' . $id . '.png" alt="' . $product_name . '" width="200" height="100" border="1" /><br></a>' . $product_name . '<br />
                  $' . $price . '<br />
                  <a href="product.php?id=' . $id . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
} else {
  $pastaCategory = "<br>We have no menu items that meet your filter request";
}



mysqli_close($link);

?>

<div align="center" id="mainWrapper">
  <div id="pageContent">
<h3>Menu</h3>
<!--<div class = "container-fluid">
  <div class = "row">
    <div class="col-md-6">-->
      <form action="" method="post">
        <label class = "filters">Calories
        <div class = "filterType">
        <input type="radio" name="calories" value="500"
          <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '500')) echo ' checked="checked"'?>/>Under 500 Calories<br>
        <input type="radio" name="calories" value="800"
          <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '800')) echo ' checked="checked"'?>/>Under 800 Calories<br>
        <input type="radio" name="calories" value="1000"
            <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '1000')) echo ' checked="checked"'?>/>
          Under 1000 Calories<br>
        <input type="radio" name="calories" value="1500"
            <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '1500')) echo ' checked="checked"'?>/>Under 1500 Calories<br><br>
        <input type = "button" value = "<?php 
            echo "X Under ". $_SESSION['calories'];
            ?>">
          </div>
          </label>
        <label class = "filters">Sugar
        <div class = "filterType">
        <input type="radio" name="sugar" value="5"
            <?php if(!isset($_POST['sugar']) || (isset($_POST['sugar']) && $_POST['sugar'] == '5')) echo ' checked="checked"'?>/>Under 5g of Sugar<br>
        <input type="radio" name="sugar" value="10"
            <?php if(!isset($_POST['sugar']) || (isset($_POST['sugar']) && $_POST['sugar'] == '10')) echo ' checked="checked"'?>/>Under 10g of Sugar<br>
        <input type="radio" name="sugar" value="15"
            <?php if(!isset($_POST['sugar']) || (isset($_POST['sugar']) && $_POST['sugar'] == '15')) echo ' checked="checked"'?>/>Under 15g of Sugar<br>
        <input type="radio" name="sugar" value="20"
            <?php if(!isset($_POST['sugar']) || (isset($_POST['sugar']) && $_POST['sugar'] == '20')) echo ' checked="checked"'?>/>Under 20g of Sugar<br><br>
        <input type = "button" value =  "<?php
              echo "X Under ". $_SESSION['sugar'];
            ?>">
          </div>
          </label>
        <label class = "filters">Protien
        <div class = "filterType">
        <input type="radio" name="protien" value="5"
            <?php if(!isset($_POST['protien']) || (isset($_POST['protien']) && $_POST['protien'] == '5')) echo ' checked="checked"'?>/>Under 5g of Protien<br>
        <input type="radio" name="protien" value="10"
            <?php if(!isset($_POST['protien']) || (isset($_POST['protien']) && $_POST['protien'] == '10')) echo ' checked="checked"'?>/>Under 10g of Protien<br>
        <input type="radio" name="protien" value="15"
            <?php if(!isset($_POST['protien']) || (isset($_POST['protien']) && $_POST['protien'] == '15')) echo ' checked="checked"'?>/>Under 15g of Protien<br>
        <input type="radio" name="protien" value="20"
            <?php if(!isset($_POST['protien']) || (isset($_POST['protien']) && $_POST['protien'] == '20')) echo ' checked="checked"'?>/>Under 20g of Protien<br><br>
        <input type = "button" value ="<?php
              echo "X Under ". $_SESSION['protien'];
            ?>">
        </div>
        </label>
        <label class = "filters">Fat
        <div class = "filterType">
        <input type="radio" name="fat" value="5"
            <?php if(!isset($_POST['fat']) || (isset($_POST['fat']) && $_POST['fat'] == '5')) echo ' checked="checked"'?>/>Under 5g of Fat<br>
        <input type="radio" name="fat" value="10"
            <?php if(!isset($_POST['fat']) || (isset($_POST['fat']) && $_POST['fat'] == '10')) echo ' checked="checked"'?>/>Under 10g of Fat<br>
        <input type="radio" name="fat" value="15"
            <?php if(!isset($_POST['fat']) || (isset($_POST['fat']) && $_POST['fat'] == '15')) echo ' checked="checked"'?>/>Under 15g of Fat<br><br>
            <input type = "button" value = "<?php   
              echo "X Under ". $_SESSION['fat']; 
            ?>">
          </div>
          </label>
        <label class = "filters">Carbs
        <div class = "filterType">
        <input type="radio" name="carbs" value="20"
            <?php if(!isset($_POST['carbs']) || (isset($_POST['carbs']) && $_POST['carbs'] == '20')) echo ' checked="checked"'?>/>Under 20g of Carbs<br>
        <input type="radio" name="carbs" value="30"
            <?php if(!isset($_POST['carbs']) || (isset($_POST['carbs']) && $_POST['carbs'] == '30')) echo ' checked="checked"'?>/>Under 30g of Carbs<br>
        <input type="radio" name="carbs" value="40"
            <?php if(!isset($_POST['carbs']) || (isset($_POST['carbs']) && $_POST['carbs'] == '40')) echo ' checked="checked"'?>/>Under 40g of Carbs<br>
        <input type="radio" name="carbs" value="50"
            <?php if(!isset($_POST['carbs']) || (isset($_POST['carbs']) && $_POST['carbs'] == '50')) echo ' checked="checked"'?>/>Under 50g of Carbs<br><br>
            <input type = "button" value ="<?php
               echo "X Under ". $_SESSION['carbs'];
            ?>">
          </div>
          </label>
          <label class = "filters">Price
          <div class = "filterType">
        <input type="radio" name="price" value="5"
            <?php if(!isset($_POST['price']) || (isset($_POST['price']) && $_POST['price'] == '5')) echo ' checked="checked"'?>/>Under $5<br>
        <input type="radio" name="price" value="10"
            <?php if(!isset($_POST['price']) || (isset($_POST['price']) && $_POST['price'] == '10')) echo ' checked="checked"'?>/>Under $10<br>
        <input type="radio" name="price" value="15"
            <?php if(!isset($_POST['price']) || (isset($_POST['price']) && $_POST['price'] == '15')) echo ' checked="checked"'?>/>Under $15<br><br><br>
        <input type = "button" value =  "<?php
              echo "X Under $". $_SESSION['price'];
            ?>">
          </div>
          </label>
  <input type="submit" name="filter" value="Submit" />
</form>

   <!-- </div>
    <div class="col-md-6">-->

      <?php 
        echo $pizzaCategory;
        echo $sandwichCategory;
        echo $saladCategory;
        echo $soupCategory;
        echo $pastaCategory;
       ?>
   <!-- </div>
</div>-->

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
            <br />Friday & Sat 11:30 am - 10:30 pm.</p>
        
            <br /><!-- Trigger the modal with a button -->
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
    
    
       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>