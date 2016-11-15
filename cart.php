<?php 
session_start();
//Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "connect_to_mysql.php";
?>
 <div>
    <?php include_once("nav.php");?>
</div>

<?php
if (isset($_POST['pid'])) { // pid = name of add-to-cart button on product.php, this is cart.php screen after they added something
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	header("location: cart.php"); 
    exit();
	//comment
}

?>
<!-- raw HTML code must be place after header location above -->
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
	

<?php
//if user deletes from cart
if(isset($_POST['index_to_remove']) && $_POST['index_to_remove']!=""){
	//Access the array and run code to remove that array index 

	$key_to_remove = $_POST['index_to_remove'];
	echo 'Index -'.$key_to_remove.': Count -';
	if(count($_SESSION["cart_array"]) <= 1){
		unset($_SESSION["cart_array"]);
	}else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
		echo count($_SESSION["cart_array"]);
	}

}

?>
<?php
//user adjusts quantity
if(isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] !="") {
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
	
}
?>

<?php
//If user empties shopping cart 
if(isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
	unset($_SESSION["cart_array"]);
}
?>

<?php
//cart for viewing 

$cartOutput = "";
$cartTotal = "";
if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1){
	$cartOutput = "<h2 align = 'center'>Your Shopping Cart is empty</h2>";
}else{
	$i = 0;
	foreach($_SESSION["cart_array"] as $each_item) {
		$item_id = $each_item['item_id'];
		$sql = mysqli_query($link, "SELECT * FROM products WHERE id ='$item_id' LIMIT 1");
		while ($row = mysqli_fetch_array($sql)){
			$product_name = $row['name'];
			$price = $row['price'];
			$description = $row['description'];
		}
		$priceTotal = $price * $each_item['quantity'];
		$cartTotal = $priceTotal + $cartTotal;

		setlocale(LC_MONETARY, "en_US");
		$priceTotal = sprintf("%01.2f", $priceTotal);
		$priceTotal = sprintf("%01.2f", $priceTotal);
		//Dynamic table row assembly 
		
		$cartOutput .="<tr>";
		$cartOutput .= "<td> 
						<a href =\"product.php?id=$item_id\">$product_name</a> <br />
						<img src=\"inventory_images/$item_id.png\" 
						alt = \"$product_name\" width =\"100\" height=\"75\" border =\"1\"/></td>";
		$cartOutput .= "<td>" . $description . "</td>";
		$cartOutput .= "<td>$" . $price . "</td>";
		$cartOutput .= '<td><form action="cart.php" method="post">
		<input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
		<input name="adjustBtn' . $item_id . '" type="submit" value="change" />
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></td>';
		//$cartOutput .= "<td>" . $each_item['quantity'] . "</td>";
		$cartOutput .= "<td>" . $priceTotal . "</td>";
		$cartOutput .= '<td><form action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
		$cartOutput .="</tr>";
		$i++;

	}
	setlocale(LC_MONETARY, "en_US");
	$cartTotal = sprintf("%01.2f", $cartTotal);
	$cartTotal = sprintf("%01.2f", $cartTotal);
	$cartTotal = "<div style = 'font-size: 18px; margin-top:12px;' align='right'>Cart Total: ".$cartTotal."USD</div>";
}
?>

<div id="pageContent">
    <div style="margin:24px; text-align:left;">
	
    <br />
    <table width="100%" border="1" cellspacing="0" cellpadding="6">
      <tr>
        <td width="18%" bgcolor="#C5DFFA"><strong>Product</strong></td>
        <td width="45%" bgcolor="#C5DFFA"><strong>Product Description</strong></td>
        <td width="10%" bgcolor="#C5DFFA"><strong>Unit Price</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Quantity</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Total</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Remove</strong></td>
      </tr>
<?php echo $cartOutput; ?>
  <!-- <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr> -->
    </table>
       <?php echo $cartTotal; ?>
<br /> <br />
<a href = "cart.php?cmd=emptycart">Click here to empty shopping cart</a>
</div>
<br />
</div>
</div>
 <div>
    <?php include_once("footer.php");?>
</div>

</body>
</html>
