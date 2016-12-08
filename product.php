<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="productTitle"></title>
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" href="productLightbox.css" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="checkoutLightbox.css" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="product.css" type="text/css" media="screen" title="no title" charset="utf-8">
        <script src="https://use.fontawesome.com/501f28931f.js"></script>
    </head>
    <body  onload="product()" >
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
        <div class="row" id="productRow">

            <div class="col-md-4" id="productImage">
              
            </div>

            <div class = "col-md-4">
              <h3 id = "productName"></h3>
              <p id = "productPrice"></p>
              <br /> 
              <h4>Description:</h4>
              <p id = "productDescription"></p>
              <br />
              <select class = "productPageSelect"> 
                <option class = '1' value = '1'>1</option>
                <option class = '2' value = '2'>2</option>
                <option class = '3' value = '3'>3</option>
                <option class = '4' value = '4'>4</option>
                <option class = '5' value = '5'>5</option>
                <option class = '6' value = '6'>6</option>
                <option class = '7' value = '7'>7</option>
                <option class = '8' value = '8'>8</option>
                <option class = '9' value = '9'>9</option>
                <option class = '10' value = '10'>10</option>
                </select>
              <button type = "button" id = "addToCart">Add to Cart</button>
              </div>
              <div class = "col-md-4" id="facts">
                <h4 id= "nutrHeader">Nutritional Facts:</h4>
                <p id = "productCalories">Calories: </p>
                <p id = "productFat">Fat: </p>
                <p id = "productProtein">Protein: </p>
                <p id = "productSugar">Sugar: </p>
                <p id = "productCarbs">Carbs: </p>
                </p>
              </div>
              </div>
        </div>
        <div class = "popUp">
          <h3>Added to cart!</h3>
          <a class = "lightboxButton" href="cart.php"><button type="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button></a><br>
          <a class = "lightboxButton" href="orderOnline.php"><button type="button"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Continue Shopping</button></a>
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
        <script src="lightbox.js" type="text/javascript" charset="utf-8"></script>
        <script src="productPage.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
