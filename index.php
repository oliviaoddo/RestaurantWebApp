<?php 
// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
date_default_timezone_set('UTC');
// Run a select query to get my letest 6 items
// Connect to the MySQL database  
include "connect_to_mysql.php"; 
$dynamicList = "";
$sql = mysqli_query($link, "SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Home Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="32%" valign="top"><h3>Column</h3>
      <p>This website is very temporarily being used as an online live showcase area for an E - Commerce tutorial script set Adam is creating which can be seen on his channel here:<br />
        <a href="http://www.youtube.com/flashbuilding" target="_blank">http://www.youtube.com/flashbuilding</a> </p>
      <p>It is not an actual store and it will change directly after the tutorial series. <br />
        <br />
        This tutorial series is for educational purposes only. Use the scripts at your own risk.</p></td>
    <td width="35%" valign="top"><h3>Latest Designer Fashions</h3>
      <p><?php echo $dynamicList; ?><br />
        </p>
      <p><br />
      </p></td>
    <td width="33%" valign="top"><h3>Handy Tips</h3>
      <p>If you operate any store online you should read the documentation provided to you by the online payment gateway you choose for handling the checkout process. You can get much more insight than I can offer on the various details of a gateway, from the gateway providers themselves. They are there to help you with whatever you need since they get a cut of your online business dealings.</p></td>
  </tr>
</table>

  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>