<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" href="cart.css">
        <script src="https://use.fontawesome.com/501f28931f.js"></script>
    </head>
    <body onload = "reviewOrder()">
      <div>
      <!--Include correct navigation based on who is logged in-->
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
      <!--after an order is completed, this box with order confirmation shows up-->
      <div id = "placed">
          <h3 class="cartEmpty">Your Order has Been Placed</h3>
          <h5 id="thanks">Thank you for choosing LOTS of Food. Your delicious food is being prepared and will be ready shortly.</h5>
          <a id = "goShop" href="orderOnline.php"><button id = "shopButton" type="button"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Place Another Order</button></a>
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

  <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>

    </body>
</html>
