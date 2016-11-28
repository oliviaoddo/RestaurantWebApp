<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Online</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link href="mangiabene.css" rel="stylesheet">
    </head>
    <body  onload="product()" >
        <div>
            <?php include_once("nav.php");?>
         </div>
        <div class = "row" id = "productRow">

            <div class = "col-md-6" id = "productImage">
              
            </div>

            <div class = "col-md-6">
              <h3 id = "productName"></h3>
              <p id = "productPrice"></p><br />
              <br /> 
              <h4>Description:</h4>
              <p id = "productDescription"></p>
              <br />
              <h4>Nutritional Facts:</h4>
              <p id = "productCalories">Calories: </p>
              <br />
              <p id = "productFat">Fat: </p>
              <br />
              <p id = "productProtein">Protein: </p>
              <br />
              <p id = "productSugar">Sugar: </p>
              <br />
              <p id = "productCarbs">Carbs: </p>
              <br />
              </p>
              <form id="form1" name="form1" method="post" action="cart.php">
                <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
                <input type="submit" name="button" id="button" onclick = "checkoutCart.js" value="Add to Shopping Cart" />
              </form>
              </div>
        </div>

        <div>
            <?php include_once("footer.php");?>
         </div>

        <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="productPage.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
