 <?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
include "connect_to_mysql.php";
include "product_class.php";
date_default_timezone_set('UTC');

//if filter DNE in POST array, create filter variables in POST with max values, then call query to display (max values = all items)
if (!isset($_POST['filter'])){ 

    $_SESSION['calories'] = "1500";
    $_SESSION['sugar'] = "20";
    $_SESSION['protein']= "20";
    $_SESSION['fat'] = "15";
    $_SESSION['carbs']= "50";
    $_SESSION['price'] = "15";

  $sqlPizza = mysqli_query($link, "SELECT * FROM products WHERE category = 'Pizza' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'"); 

  $sqlSandwich = mysqli_query($link, "SELECT * FROM products WHERE category = 'Sandwich' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

  $sqlSalad = mysqli_query($link, "SELECT * FROM products WHERE category = 'Salad' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

$sqlSoup = mysqli_query($link, "SELECT * FROM products WHERE category = 'Soup' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

 $sqlPasta = mysqli_query($link, "SELECT * FROM products WHERE category = 'Pasta' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

 	$sqlAll = mysqli_query($link, "SELECT * FROM products WHERE calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");
	$sqlAll = mysqli_query($link, "SELECT * FROM products WHERE calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

 }
//if filter exist in POST array[100%], therefore a customer has selected filter, change filter variables in POST then display new query
if (isset($_POST['filter'])) {
    if(isset($_POST['calories'])) {
      $_SESSION['calories'] = $_POST['calories'];  
    }
    if(isset($_POST['sugar']))
    {
      $_SESSION['sugar'] = $_POST['sugar'];   
    }
    if(isset($_POST['protein']))
    {
      $_SESSION['protein'] = $_POST['protein'];   
    }
    if(isset($_POST['fat']))
    {
      $_SESSION['fat'] = $_POST['fat'];  
    }
    if(isset($_POST['carbs']))
    {
      $_SESSION['carbs'] = $_POST['carbs'];   
    }
    if(isset($_POST['price']))
    {
      $_SESSION['price'] = $_POST['price'];  
    }

    $sqlPizza = mysqli_query($link, "SELECT * FROM products WHERE category = 'Pizza' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

    $sqlSandwich = mysqli_query($link, "SELECT * FROM products WHERE category = 'Sandwich' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

    $sqlSalad = mysqli_query($link, "SELECT * FROM products WHERE category = 'Salad' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

    $sqlSoup = mysqli_query($link, "SELECT * FROM products WHERE category = 'Soup' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

    $sqlPasta = mysqli_query($link, "SELECT * FROM products WHERE category = 'Pasta' AND calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");
	
	$sqlAll = mysqli_query($link, "SELECT * FROM products WHERE calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protein <= '{$_SESSION["protein"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'");

}

$pizzaCategory = "";

$productCount = mysqli_num_rows($sqlPizza); // count the output amount of filtered pizzas in pizza's query 
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlPizza)){ //while loop that creates a new pizza for each row of query
       /* replaced by $product below
	   $id = $row["id"];
       $product_name = $row["name"]; 
       $price = $row["price"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
	   */ 
	   $product = new Product($row["id"],$row["name"],$row["price"],strftime("%b %d, %Y", strtotime($row["date_added"])));
       echo "<div class = 'container'><div class = 'row'>"; //echo HTML that creates food icons under filter
       $pizzaCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $product->getid() . '"><img src="inventory_images/' . $product->getid() . '.png" alt="' . $product->getname() . '" width="200" height="100" border="1" /><br></a>' . $product->getname() . '<br />
                  $' . $product->getprice() . '<br />
                  <a href="product.php?id=' . $product->getid() . '">View Product Details</a><br />
        </div>'; // ?
      echo "</div></div>"; //echo html to close div tags
    }
}

$sandwichCategory = "";

$productCount = mysqli_num_rows($sqlSandwich); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlSandwich)){ 
       $product = new Product($row["id"],$row["name"],$row["price"],strftime("%b %d, %Y", strtotime($row["date_added"])));
       echo "<div class = 'container'><div class = 'row'>";
       $sandwichCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $product->getid() . '"><img src="inventory_images/' . $product->getid() . '.png" alt="' . $product->getname() . '" width="200" height="100" border="1" /><br></a>' . $product->getname() . '<br />
                  $' . $product->getprice() . '<br />
                  <a href="product.php?id=' . $product->getid() . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
} 

$saladCategory = "";

$productCount = mysqli_num_rows($sqlSalad); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlSalad)){ 
       $product = new Product($row["id"],$row["name"],$row["price"],strftime("%b %d, %Y", strtotime($row["date_added"])));
       echo "<div class = 'container'><div class = 'row'>";
       $saladCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $product->getid() . '"><img src="inventory_images/' . $product->getid() . '.png" alt="' . $product->getname() . '" width="200" height="100" border="1" /><br></a>' . $product->getname() . '<br />
                  $' . $product->getprice() . '<br />
                  <a href="product.php?id=' . $product->getid() . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
} 

$soupCategory = "";

$productCount = mysqli_num_rows($sqlSoup); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlSoup)){ 
       $product = new Product($row["id"],$row["name"],$row["price"],strftime("%b %d, %Y", strtotime($row["date_added"])));
       echo "<div class = 'container'><div class = 'row'>";
       $soupCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $product->getid() . '"><img src="inventory_images/' . $product->getid() . '.png" alt="' . $product->getname() . '" width="200" height="100" border="1" /><br></a>' . $product->getname() . '<br />
                  $' . $product->getprice() . '<br />
                  <a href="product.php?id=' . $product->getid() . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
} 

$pastaCategory = "";

$productCount = mysqli_num_rows($sqlPasta); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlPasta)){ 
       $product = new Product($row["id"],$row["name"],$row["price"],strftime("%b %d, %Y", strtotime($row["date_added"])));
       echo "<div class = 'container'><div class = 'row'>";
       $pastaCategory .= '
          <div class="col-md-4"> 
             <a href="product.php?id=' . $product->getid() . '"><img src="inventory_images/' . $product->getid() . '.png" alt="' . $product->getname() . '" width="200" height="100" border="1" /><br></a>' . $product->getname() . '<br />
                  $' . $product->getprice() . '<br />
                  <a href="product.php?id=' . $product->getid() . '">View Product Details</a><br />
        </div>';
      echo "</div></div>";
    }
}
$emptyMessage = "";
$productCount = mysqli_num_rows($sqlAll); // count the output amount
if ($productCount == 0){
			$emptyMessage = "<br>We have no menu items that meet your filter request";
		}

mysqli_close($link); // required when using mysqli_query instead of mysql_query

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


    <title>Order Online</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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


<div align="center" id="mainWrapper">
  <div id="pageContent">
<h3>Menu</h3>
<!--<div class = "container-fluid">
  <div class = "row">
    <div class="col-md-6">-->
<!-- radio buttons for filter table 
if [filter] DNE or exist with value of [pre-set], then the echo sets radio button attribute check="checked", logic = button always gonna be checked
with a pre-set value
-->

      <form action="" method="post">
        <label class = "filters">Calories
        <div class = "filterType">
        <input type="radio" name="calories" value="500" checked="checked"
          <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '500')) echo ' checked="checked"'?>/>Under 500 Calories<br>
        <input type="radio" name="calories" value="800"
          <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '800')) echo ' checked="checked"'?>/>Under 800 Calories<br>
        <input type="radio" name="calories" value="1000"
            <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '1000')) echo ' checked="checked"'?>/>
          Under 1000 Calories<br>
        <input type="radio" name="calories" value="1500"
            <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '1500')) echo ' checked="checked"'?>/>Under 1500 Calories<br><br>
        <input type = "button" 
		value = "<?php echo "X Under ". $_SESSION['calories'];?>">
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
        <input type = "button" 
		value =  "<?php echo "X Under ". $_SESSION['sugar'];?>">
          </div>
          </label>
        <label class = "filters">protein
        <div class = "filterType">
        <input type="radio" name="protein" value="5"
            <?php if(!isset($_POST['protein']) || (isset($_POST['protein']) && $_POST['protein'] == '5')) echo ' checked="checked"'?>/>Under 5g of protein<br>
        <input type="radio" name="protein" value="10"
            <?php if(!isset($_POST['protein']) || (isset($_POST['protein']) && $_POST['protein'] == '10')) echo ' checked="checked"'?>/>Under 10g of protein<br>
        <input type="radio" name="protein" value="15"
            <?php if(!isset($_POST['protein']) || (isset($_POST['protein']) && $_POST['protein'] == '15')) echo ' checked="checked"'?>/>Under 15g of protein<br>
        <input type="radio" name="protein" value="20"
            <?php if(!isset($_POST['protein']) || (isset($_POST['protein']) && $_POST['protein'] == '20')) echo ' checked="checked"'?>/>Under 20g of protein<br><br>
        <input type = "button" 
		value ="<?php echo "X Under ". $_SESSION['protein'];?>">
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
            <input type = "button" 
			value = "<?php echo "X Under ". $_SESSION['fat'];?>">
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
            <input type = "button" value ="<?php echo "X Under ". $_SESSION['carbs'];?>">
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
        <input type = "button" 
		value =  "<?php echo "X Under $". $_SESSION['price'];?>">
          </div>
          </label>
  <input type="submit" name="filter" value="Submit" />
</form>

   <!-- </div>
    <div class="col-md-6">-->
<div class = "container"> 
<!-- displays the products of query, emptyMessage displays when productCount == 0 -->
      <?php 
        echo $pizzaCategory;
        echo $sandwichCategory;
        echo $saladCategory;
        echo $soupCategory;
        echo $pastaCategory;
		echo $emptyMessage;
       ?>
</div>
   <!-- </div>
</div>-->
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