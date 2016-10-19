<?php 

// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
// Script Error Reporting
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$_SESSION['calories'] = "1500";
$_SESSION['sugar'] = "20";
$_SESSION['protien']= "20";
$_SESSION['fat'] = "15";
$_SESSION['carbs']= "50";
$_SESSION['price'] = "15";
?>

<?php
include "connect_to_mysql.php";
date_default_timezone_set('UTC');

if (!isset($_POST['submit'])){ 
  $sql = mysqli_query($link, "SELECT * FROM products WHERE calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'"); 
}


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

    $sql = mysqli_query($link, "SELECT * FROM products WHERE calories <= '{$_SESSION["calories"]}' AND sugar <= '{$_SESSION["sugar"]}' AND protien <= '{$_SESSION["protien"]}' AND fat <= '{$_SESSION["fat"]}' AND carbs <= '{$_SESSION["carbs"]}' AND price <= '{$_SESSION["price"]}'"); 
}

$dynamicList = "";

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

mysqli_close($link);

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
