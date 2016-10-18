<?php 

// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
// Script Error Reporting
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$_SESSION['calories'] = "";
$_SESSION['sugar'] = "";
$_SESSION['protien']= "";
$_SESSION['fat'] = "";
$_SESSION['carbs']= "";
$_SESSION['price'] = "";
?>

<?php
include "connect_to_mysql.php";
date_default_timezone_set('UTC');


if (isset($_POST['submit'])) {
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
}

echo $_SESSION['calories'];
echo $_SESSION['sugar'];
echo $_SESSION['protien'];
echo $_SESSION['fat'];
echo $_SESSION['carbs'];
echo $_SESSION['price'];


/*
//SET CALORIES//
if(isset($_POST['caloriesUnder500'])){
  $_SESSION['calories'] = 500;
}

else if(isset($_POST['caloriesUnder800'])){
  $_SESSION['calories'] = 800;
}

else if(isset($_POST['caloriesUnder1000'])){
  $_SESSION['calories'] = 1000;
}
else if(isset($_POST'caloriesUnder1500'])){
  $_SESSION['calories'] = 1500;
}


//SET FAT//
if(isset($_GET['fatUnder5'])){
  $_SESSION['fat'] = 5;
}
else if(isset($_GET['fatUnder10'])){
  $_SESSION['fat'] = 10;
}
else if(isset($_GET['fatUnder15'])){
  $_SESSION['fat'] = 15;
}

//SET PROTIEN//
if(isset($_GET['protienUnder5'])){
  $_SESSION['protien'] = 5;
}
else if(isset($_GET['protienUnder10'])){
  $_SESSION['protien'] = 10;
}
else if(isset($_GET['protienUnder15'])){
  $_SESSION['protien'] = 15;
}
else if(isset($_GET['protienUnder20'])){
  $_SESSION['protien'] = 20;
}

//SET SUGAR//
if(isset($_GET['sugarUnder5'])){
  $_SESSION['sugar'] = 5;
}
else if(isset($_GET['sugarUnder10'])){
  $_SESSION['sugar'] = 10;
}
else if(isset($_GET['sugarUnder15'])){
  $_SESSION['sugar'] = 15;
}
else if(isset($_GET['sugarUnder20'])){
  $_SESSION['sugar'] = 20;
}

//SET CARBS//
if(isset($_GET['carbsUnder20'])){
  $_SESSION['carbs'] = 20;
}
else if(isset($_GET['carbsUnder30'])){
  $_SESSION['carbs'] = 30;
}
else if(isset($_GET['carbsUnder40'])){
  $_SESSION['carbs'] = 40;
}
else if(isset($_GET['carbsUnder50'])){
  $_SESSION['carbs'] = 50;
}


//SET PRICE//
if(isset($_GET['priceUnder5'])){
  $_SESSION['price'] = 5;
}
else if(isset($_GET['priceUnder10'])){
  $_SESSION['price'] = 10;
}
else if(isset($_GET['priceUnder15'])){
  $_SESSION['price'] = 15;
}
*/
$dynamicList = "";

/*$sql = mysqli_query($link, "SELECT * FROM products WHERE calories <= '".$_SESSION['calories'] AND sugar = $_SESSION['sugar'] AND protien = $_SESSION['protien'] AND fat = $_SESSION['fat'] AND carbs = $_SESSION['carbs'] AND price = $_SESSION['price']."' ");*/

$sql = mysqli_query($link, "SELECT * FROM products WHERE calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'"); 


/*$sql = mysqli_query($link, "SELECT * FROM products WHERE calories <= '".$_SESSION['calories']."' AND sugar <= '".$_SESSION['sugar']."' AND protien <= '".$_SESSION['protien']."' AND fat <= '". $_SESSION['fat']."' AND carbs <= '".$_SESSION['carbs']."' AND price <= '".$_SESSION['price']."' ");*/
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
<script>
  $(function() {
    $("input[type=\"radio\"]").click(function(){
        [...]
        //localStorage:
        localStorage.setItem("option", value);
    });
    //localStorage:
    var itemValue = localStorage.getItem("option");
    if (itemValue !== null) {
        $("input[value=\""+itemValue+"\"]").click();
    }
});
</script>
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
      <form action="" method="post">
        <h4>Calories</h4>
        <input type="radio" name="calories" value="500"
          <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '500')) echo ' checked="checked"'?>/>Under 500 Calories<br>
        <input type="radio" name="calories" value="800"
          <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '800')) echo ' checked="checked"'?>/>Under 800 Calories<br>
        <input type="radio" name="calories" value="1000"
            <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '1000')) echo ' checked="checked"'?>/>
          Under 1000 Calories<br>
        <input type="radio" name="calories" value="1500"
            <?php if(!isset($_POST['calories']) || (isset($_POST['calories']) && $_POST['calories'] == '1500')) echo ' checked="checked"'?>/>Under 1500 Calories<br>
    <hr>
        <h4>Sugar</h4>
        <input type="radio" name="sugar" value="5"
            <?php if(!isset($_POST['sugar']) || (isset($_POST['sugar']) && $_POST['sugar'] == '5')) echo ' checked="checked"'?>/>Under 5g of Sugar<br>
        <input type="radio" name="sugar" value="10"
            <?php if(!isset($_POST['sugar']) || (isset($_POST['sugar']) && $_POST['sugar'] == '10')) echo ' checked="checked"'?>/>Under 10g of Sugar<br>
        <input type="radio" name="sugar" value="15"
            <?php if(!isset($_POST['sugar']) || (isset($_POST['sugar']) && $_POST['sugar'] == '15')) echo ' checked="checked"'?>/>Under 15g of Sugar<br>
        <input type="radio" name="sugar" value="20"
            <?php if(!isset($_POST['sugar']) || (isset($_POST['sugar']) && $_POST['sugar'] == '20')) echo ' checked="checked"'?>/>Under 20g of Sugar<br>
    <hr>
        <h4>Protien</h4>
        <input type="radio" name="protien" value="5"
            <?php if(!isset($_POST['protien']) || (isset($_POST['protien']) && $_POST['protien'] == '5')) echo ' checked="checked"'?>/>Under 5g of Protien<br>
        <input type="radio" name="protien" value="10"
            <?php if(!isset($_POST['protien']) || (isset($_POST['protien']) && $_POST['protien'] == '10')) echo ' checked="checked"'?>/>Under 10g of Protien<br>
        <input type="radio" name="protien" value="15"
            <?php if(!isset($_POST['protien']) || (isset($_POST['protien']) && $_POST['protien'] == '15')) echo ' checked="checked"'?>/>Under 15g of Protien<br>
        <input type="radio" name="protien" value="20"
            <?php if(!isset($_POST['protien']) || (isset($_POST['protien']) && $_POST['protien'] == '20')) echo ' checked="checked"'?>/>Under 20g of Protien<br>
    <hr>
        <h4>Fat</h4>
        <input type="radio" name="fat" value="5"
            <?php if(!isset($_POST['fat']) || (isset($_POST['fat']) && $_POST['fat'] == '5')) echo ' checked="checked"'?>/>Under 5g of Fat<br>
        <input type="radio" name="fat" value="10"
            <?php if(!isset($_POST['fat']) || (isset($_POST['fat']) && $_POST['fat'] == '10')) echo ' checked="checked"'?>/>Under 10g of Fat<br>
        <input type="radio" name="fat" value="15"
            <?php if(!isset($_POST['fat']) || (isset($_POST['fat']) && $_POST['fat'] == '15')) echo ' checked="checked"'?>/>Under 15g of Fat<br>
    <hr>
        <h4>Carbs</h4>
        <input type="radio" name="carbs" value="20"
            <?php if(!isset($_POST['carbs']) || (isset($_POST['carbs']) && $_POST['carbs'] == '20')) echo ' checked="checked"'?>/>Under 20g of Carbs<br>
        <input type="radio" name="carbs" value="30"
            <?php if(!isset($_POST['carbs']) || (isset($_POST['carbs']) && $_POST['carbs'] == '30')) echo ' checked="checked"'?>/>Under 30g of Carbs<br>
        <input type="radio" name="carbs" value="40"
            <?php if(!isset($_POST['carbs']) || (isset($_POST['carbs']) && $_POST['carbs'] == '40')) echo ' checked="checked"'?>/>Under 40g of Carbs<br>
        <input type="radio" name="carbs" value="50"
            <?php if(!isset($_POST['carbs']) || (isset($_POST['carbs']) && $_POST['carbs'] == '50')) echo ' checked="checked"'?>/>Under 50g of Carbs<br>
    <hr>
        <h4>Price</h4>
        <input type="radio" name="price" value="5"
            <?php if(!isset($_POST['price']) || (isset($_POST['price']) && $_POST['price'] == '5')) echo ' checked="checked"'?>/>Under $5<br>
        <input type="radio" name="price" value="10"
            <?php if(!isset($_POST['price']) || (isset($_POST['price']) && $_POST['price'] == '10')) echo ' checked="checked"'?>/>Under $10<br>
        <input type="radio" name="price" value="15"
            <?php if(!isset($_POST['price']) || (isset($_POST['price']) && $_POST['price'] == '15')) echo ' checked="checked"'?>/>Under $15<br>

  <input type="submit" name="submit" value="Submit" />
</form>

    </div>
    <div class="col-md-6">
      <?php 
        if(isset($_POST['calories'])){
          echo "Under ". $_SESSION['calories'] . " Calories<br>";
        }
      ?>
      <?php
        if(isset($_POST['sugar'])) {
          echo "Under ". $_SESSION['sugar'] . "g of Sugar<br>";
        }
      ?>
      <form action = "product_list.php" method = "post">
         <input type="submit" name = "sugarRemove" value="X">
      </form>
      <?php
        if(isset($_POST['protien'])) {
          echo "Under ". $_SESSION['protien'] . "g of Protien<br>";
        }
      ?>
      <?php
        if(isset($_POST['fat'])) {
          echo "Under ". $_SESSION['fat'] . " g of Fat<br>";
        }
      ?>
      <?php
          if(isset($_POST['carbs'])) {
          echo "Under ". $_SESSION['carbs'] . " g of Carbs<br>";
        }
      ?>
      <?php
          if(isset($_POST['price'])) {
          echo "Under $". $_SESSION['price'];
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
