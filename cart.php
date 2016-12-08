<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link href="style.css" rel="stylesheet">
        <link href="cart.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/501f28931f.js"></script>
    </head>
    <!--calls the viewCart() function when the page is loaded so the cart can be displayed-->
    <body onload = "viewCart()">
        <!--includes navigation-->
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
         <!--creates the cart table and adds headings-->
         <h3 id="cartHeading">Cart</h3>
         <div>
			<table id="cartTable">
			  <tr>
			    <th>Product</th>
			    <th>Description</th> 
			    <th>Unit Price</th>
			    <th>Quantity</th>
			    <th>Total</th>
                <th>Remove</th>
			  </tr>
			</table>
            <!--empty cart button-->
            <button id = "clearCart" type="button">Clear Cart</button>
         </div>
         <!--subtotal and checkout button-->
         <h5 id="subtotal">Subtotal: $</h5>
         <a id="checkout" href = "checkout.php"><button type = "button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button></a>
         <!--your cart is empty box displayed when the cart is empty-->
         <div id = "empty">
          <h3 id="cartEmpty">Your Shopping Cart is Empty</h3>
          <a id="goShop" href="orderOnline.php"><button id = "shopButton" type="button"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Go Shopping</button></a>
        </div>
        <!--includes footer-->
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
        <script src="lightbox.js" type="text/javascript" charset="utf-8"></script>
        <script src="viewCart.js" type="text/javascript" charset="utf-8"></script>
        <script src="deleteItem.js" type="text/javascript" charset="utf-8"></script>
        <script src="updateQuantity.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
