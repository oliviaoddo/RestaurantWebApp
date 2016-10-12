<?php 

// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
// Script Error Reporting
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
include "connect_to_mysql.php";
date_default_timezone_set('UTC');

$calories = 1500;
$sugar = 20;
$protien = 20;
$fat = 15;
$carbs = 50;
$price = 15;

//SET CALORIES//
if(isset($_GET['caloriesUnder500'])){
  $calories = 500;
}
else if(isset($_GET['caloriesUnder800'])){
  $calories = 800;
}
else if(isset($_GET['caloriesUnder1000'])){
  $calories = 1000;
}
else if(isset($_GET['caloriesUnder1500'])){
  $calories = 1500;
}

//SET FAT//
if(isset($_GET['fatUnder5'])){
  $fat = 5;
}
else if(isset($_GET['fatUnder10'])){
  $fat = 10;
}
else if(isset($_GET['fatUnder15'])){
  $fat = 15;
}

//SET PROTIEN//
if(isset($_GET['protienUnder5'])){
  $protien = 5;
}
else if(isset($_GET['protienUnder10'])){
  $protien = 10;
}
else if(isset($_GET['protienUnder15'])){
  $protien = 15;
}
else if(isset($_GET['protienUnder20'])){
  $protien = 20;
}

//SET SUGAR//
if(isset($_GET['sugarUnder5'])){
  $sugar = 5;
}
else if(isset($_GET['sugarUnder10'])){
  $sugar = 10;
}
else if(isset($_GET['sugarUnder15'])){
  $sugar = 15;
}
else if(isset($_GET['sugarUnder20'])){
  $sugar = 20;
}

//SET CARBS//
if(isset($_GET['carbsUnder20'])){
  $carbs = 20;
}
else if(isset($_GET['carbsUnder30'])){
  $carbs = 30;
}
else if(isset($_GET['carbsUnder40'])){
  $$carbs = 40;
}
else if(isset($_GET['carbsUnder50'])){
  $carbs = 50;
}


//SET PRICE//
if(isset($_GET['priceUnder5'])){
  $price = 5;
}
else if(isset($_GET['priceUnder10'])){
  $price = 10;
}
else if(isset($_GET['priceUnder15'])){
  $price = 15;
}

$dynamicList = "";

$sql = mysqli_query($link, "SELECT * FROM products WHERE calories <= '$calories' AND sugar <= '$sugar' AND protien <= '$protien' AND fat <= '$fat' AND carbs <= '$carbs' AND price <= '$price' ");
$productCount = mysqli_num_rows($sql); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sql)){ 
       $id = $row["id"];
       $product_name = $row["name"];
       $price = $row["price"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
       $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.png" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
  $dynamicList = "<br>We have no menu items that meet your filter request";
}

//UNSET//

if (isset($_POST['sugarRemove'])){
  unset($sugar);
}

mysqli_close($link);


?>


<?php
/* 
date_default_timezone_set('UTC');
// Run a select query to get my letest 6 items
// Connect to the MySQL database  
include "connect_to_mysql.php"; 
$dynamicList = "";
/*
//----------Calories-----------//
if(isset($_GET['caloriesnav'])){
  if(isset($GET['caloriesUnder500'])){
    $calories = 500;
  }
  else if(isset($_GET['caloriesUnder800'])){
    $calories = 800;
  }
  else if(isset($_GET['caloriesUnder1000'])){
      $calories = 1000;
    }
  else if(isset($_GET['caloriesUnder15000'])){
      $calories = 1500;
    }
$sqlCalories = mysqli_query($link, "SELECT * FROM products WHERE calories < '$calories");
$productCount = mysqli_num_rows($sqlCalories); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($sqlCalories)){ 
       $id = $row["id"];
       $product_name = $row["name"];
       $price = $row["price"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
       $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.png" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
  $dynamicList = "We don't have that product";
}
echo $calories;

}
*/
/*
$sql = mysqli_query($link, "SELECT * FROM products ORDER BY category DESC");
$productCount = mysqli_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysqli_fetch_array($sql)){ 
       $id = $row["id"];
			 $product_name = $row["name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.png" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysqli_close($link);
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products Page</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  
<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Price <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li>
          <form action="post">
          <input type="checkbox" name="priceUnder5" value="priceUnder5">Under $5</form></li>
          <li>
          <form action="post">
          <input type="checkbox" name="priceUnder10" value="priceUnder10">Under $10</form></li>
          <li>
          <form action="post">
          <input type="checkbox" name="priceUnder15" value="priceUnder15">Under $15</form></li>
        </ul>
      </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><form action="post">
          <input type="checkbox" name="caloriesvav" value="caloriesnav">Calories <span class="caret"></span></a>
       <ul class="dropdown-menu">
           <li>
          <form action="post">
          <input type="checkbox" name="caloriesUnder1500" value="caloriesUnder1500">Under 1,500</form></li>
          <li>
          <form action="post">
          <input type="checkbox" name="caloriesUnder1000" value="caloriesUnder1000">Under 1,000</form></li>
           <li>
          <form action="post">
          <input type="checkbox" name="caloriesUnder800" value="caloriesUnder800">Under 800</form></li>
           <li>
          <form action="post">
          <input type="checkbox" name="caloriesUnder500" value="caloriesUnder500">Under 500</form></li>
        </ul>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Protien <span class="caret"></span></a>
       <ul class="dropdown-menu">
           <li>
          <form action="post">
          <input type="checkbox" name="protienUnder5" value="protienUnder5">Under 5g</form></li>
          <li>
          <form action="post">
          <input type="checkbox" name="protienUnder10" value="protienUnder10">Under 10g</form>
          </li>
          <li>
          <form action="post">
          <input type="checkbox" name="protienUnder15" value="protienUnder15">Under 15g</form>
          </li>
          <li>
          <form action="post">
          <input type="checkbox" name="protienUnder20" value="protienUnder20">Under 20g</form>
          </li>
        </ul>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Fat <span class="caret"></span></a>
       <ul class="dropdown-menu">
          <li>
          <form action="post">
          <input type="checkbox" name="fatUnder5" value="fatUnder5">Under 5g</form></li>
            <li>
          <form action="post">
          <input type="checkbox" name="fatUnder10" value="fatUnder10">Under 10g</form></li>
            <li>
          <form action="post">
          <input type="checkbox" name="fatUnder15" value="fatUnder15">Under 15g</form></li>
        </ul>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Carbs <span class="caret"></span></a>
       <ul class="dropdown-menu">
            <li>
          <form action="post">
          <input type="checkbox" name="carbsUnder20" value="carbsUnder20">Under 20g</form></li>
          <li>
          <form action="post">
          <input type="checkbox" name="carbsUnder30" value="carbsUnder30">Under 30g</form></li>
          <li>
          <form action="post">
          <input type="checkbox" name="carbsUnder40" value="carbsUnder40">Under 40g</form></li>  
          <li>
          <form action="post">
          <input type="checkbox" name="carbsUnder50" value="carbsUnder50">Under 50g</form></li>
        </ul>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sugar <span class="caret"></span></a>
       <ul class="dropdown-menu">
          <li>
          <form action="post">
          <input type="checkbox" name="sugarUnder5" value="sugarUnder5">Under 5g</form></li>
         <li>
          <form action="post">
          <input type="checkbox" name="sugarUnder10" value="sugarUnder10">Under 10g</form></li>
           <li>
          <form action="post">
          <input type="checkbox" name="sugarUnder15" value="sugarUnder15">Under 15g</form></li>
          <li>
          <form action="post">
          <input type="checkbox" name="sugarUnder20" value="sugarUnder20">Under 20g</form></li>
        </ul>
    </ul>
  </div>
</nav> -->
<h3>Menu</h3>
<div class = "container-fluid">
  <div class = "row">
    <div class="col-md-6">
      <form action="product_list.php" method="get">
        <h4>Calories</h4>
        <input type="checkbox" name="caloriesUnder500" value="caloriesUnder500">Under 500 Calories<br>
        <input type="checkbox" name="caloriesUnder800" value="caloriesUnder800">Under 800 Calories<br>
        <input type="checkbox" name="caloriesUnder1000" value="caloriesUnder1000">Under 1000 Calories<br>
        <input type="checkbox" name="caloriesUnder1500" value="caloriesUnder1500">Under 1500 Calories<br>
    <hr>
        <h4>Sugar</h4>
        <input type="checkbox" name="sugarUnder5" value="sugarUnder5">Under 5g of Sugar<br>
        <input type="checkbox" name="sugarUnder10" value="sugarUnder10">Under 10g of Sugar<br>
        <input type="checkbox" name="sugarUnder15" value="sugarUnder15">Under 15g of Sugar<br>
        <input type="checkbox" name="sugarUnder20" value="sugarUnder20">Under 20g of Sugar<br>
    <hr>
        <h4>Protien</h4>
        <input type="checkbox" name="protienUnder5" value="protienUnder5">Under 5g of Protien<br>
        <input type="checkbox" name="protienUnder10" value="protienUnder10">Under 10g of Protien<br>
        <input type="checkbox" name="protienUnder15" value="protienUnder15">Under 15g of Protien<br>
        <input type="checkbox" name="protienUnder20" value="protienUnder20">Under 20g of Protien<br>
    <hr>
        <h4>Fat</h4>
        <input type="checkbox" name="fatUnder5" value="fatUnder5">Under 5g of Fat<br>
        <input type="checkbox" name="fatUnder10" value="fatUnder10">Under 10g of Fat<br>
        <input type="checkbox" name="fatUnder15" value="fatUnder15">Under 15g of Fat<br>
    <hr>
        <h4>Carbs</h4>
        <input type="checkbox" name="carbsUnder20" value="carbsUnder20">Under 20g of Carbs<br>
        <input type="checkbox" name="carbsUnder30" value="carbsUnder30">Under 30g of Carbs<br>
        <input type="checkbox" name="carbsUnder40" value="carbsUnder40">Under 40g of Carbs<br>
        <input type="checkbox" name="carbsUnder50" value="carbsUnder50">Under 50g of Carbs<br>
    <hr>
        <h4>Price</h4>
        <input type="checkbox" name="priceUnder5" value="priceUnder5">Under $5<br>
        <input type="checkbox" name="priceUnder10" value="priceUnder10">Under $10<br>
        <input type="checkbox" name="priceUnder15" value="priceUnder15">Under $15<br>

  <input type="submit" value="Submit">
</form>

    </div>
    <div class="col-md-6">
      <?php 
        if (isset ($calories)) {
          echo "Under ". $calories . " Calories<br>";
        }
      ?>
      <?php
        if (isset ($sugar)) {
          echo "Under ". $sugar . "g of Sugar<br>";
        }
      ?>
      <form action = "product_list.php" method = "post">
         <input type="submit" name = "sugarRemove" value="X">
      </form>
      <?php
        if (isset ($protien)) {
          echo "Under ". $protien . "g of Protien<br>";
        }
      ?>
      <?php
        if (isset ($fat)) {
          echo "Under ". $fat . " g of Fat<br>";
        }
      ?>
      <?php
          if (isset ($carbs)) {
          echo "Under ". $carbs . " g of Carbs<br>";
        }
      ?>
      <?php
          if (isset ($price)) {
          echo "Under $". $price;
        }
        echo $dynamicList;
       ?>
    </div>
</div>
</div>


<div>
 <?php include_once("template_footer.php");?>
</div>
</body>
</html>
