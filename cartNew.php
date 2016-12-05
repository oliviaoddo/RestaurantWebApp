<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Online</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link href="mangiabene.css" rel="stylesheet">
        <link href="cart.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/501f28931f.js"></script>
    </head>
    <body onload = "viewCart()">
    	<div>
            <?php include_once("nav.php");?>
         </div>
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
            <button id = "clearCart" type="button">Clear Cart</button>
         </div>
         <h5 id="subtotal">Subtotal: $</h5>
         <a id="checkout" href = "checkout.php"><button type = "button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button></a>
         <div id = "empty">
          <h3 id="cartEmpty">Your Shopping Cart is Empty</h3>
          <a id="goShop" href="filteredProducts.php"><button id = "shopButton" type="button"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Go Shopping</button></a>
        </div>

 		<div>
            <?php include_once("footer.php");?>
        </div>

        <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="lightbox.js" type="text/javascript" charset="utf-8"></script>
        <script src="viewCart.js" type="text/javascript" charset="utf-8"></script>
        <script src="deleteItem.js" type="text/javascript" charset="utf-8"></script>
        <script src="updateQuantity.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
