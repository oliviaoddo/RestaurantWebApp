<?php 
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
//check to see the url variable is set and exists is in the database 
date_default_timezone_set('UTC');
include "connect_to_mysql.php";
if (isset($_GET["id"])){
  $id = preg_replace('#[^0-9]#i', '', $_GET['id']);
  //Use this var to check if this ID exists, if yes then get the product 
  //details, if no then exit this script and give message why
  $sql = mysqli_query($link, "SELECT * FROM products WHERE id ='$id' LIMIT 1");
  $productCount = mysqli_num_rows($sql); // count the output amount
  if ($productCount > 0) {
    //get all the prouduct details 
    while($row = mysqli_fetch_array($sql)){ 
       $product_name = $row["name"];
       $product_name = $row["name"];
       $price = $row["price"];
       $category = $row["category"];
       $description = $row["description"];
       $calories = $row["calories"];
       $fat = $row["fat"];
       $sugar = $row["sugar"];
       $protein = $row["protein"];
       $carbs = $row["carbs"];
       $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
      }
}else {
  echo "That product does not exist";
  exit();
  }
}else {
  echo "Data to render this page is missing";
  exit();
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $product_name; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="product.css" type="text/css" media="screen" />
<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <?php include_once("nav.php");?>
  <div class = "row" id = "productRow">

    <div class = "col-md-6" id = "productImage">
      <a href = "inventory_images/<?php echo $id; ?>.png"><img src="inventory_images/<?php echo $id; ?>.png" width="200" height="100" alt="<?php echo $product_name; ?>"></a>
    </div>

    <div class = "col-md-6">
      <h3><?php echo $product_name; ?></h3>
      <p><?php echo "$".$price; ?><br />
      <br /> 
      <h4>Description:</h4>
      <p><?php echo $description; ?></p>
      <br />
      <h4>Nutritional Facts:</h4>
      <?php echo "Calories- ". $calories; ?>
      <br />
      <?php echo "Fat- ". $fat; ?>
      <br />
      <?php echo "Protein- ". $protein; ?>
      <br />
      <?php echo "Sugar- ". $sugar; ?>
      <br />
      <?php echo "Carbs- ". $carbs; ?>
      <br />
      </p>
      <form id="form1" name="form1" method="post" action="cartnew.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
      </form>
      </div>
    </div>
  </div>
  <?php include_once("footer.php");?>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="lightbox.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>