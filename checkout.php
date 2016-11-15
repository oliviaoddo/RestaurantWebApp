<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link href="mangiabene.css" rel="stylesheet">
        <link rel="stylesheet" href="form.css">
        <link rel="stylesheet" href="autocomplete.css">
    </head>
    <body>
      <div>
        <?php include_once("nav.php");?>
      </div>
  

      <form action = "checkout.php" method = "post">
        
        <h1>Checkout</h1>
        
        <legend id = "fieldNumber1"><span class = "number">1</span> Customer Information</legend>
        <fieldset id = "set1">
          
            <label for="firstName">First Name:</label>
            <input type="text" id = "firstName" name = "user_firstName">

            <label for="lastName"> Last Name:</label>
            <input type="text" id = "lastName" name = "user_lastName">
          
            <label for = "mail">Email:</label>
            <input type="email" id="mail" name = "user_email">
          
            <label for = "phone">Phone:</label>
            <input type ="tel" id = "phone" name = "user_phone">
            <button type = "button" id="nextOne">Next</button>
          
        </fieldset>
        
        <legend id = "fieldNumber2"><span class = "number">2</span> Delivery Options</legend>
        <fieldset id = "set2">
          

          <label for = "instructions">Special Instructions:</label>
          <textarea id = "instructions" name = "delivery_instructions"></textarea>

          <div class = "deliveryOption">
          <label>Pickup or Delivery?</label><br>
          <input type = "radio" id="pickup" value="pickup" name = "orderOption"><label for = "pickup" class = "light">Pickup</label>
          <input type = "radio" id="delivery" value="delivery" name = "orderOption"><label for = "delivery" class = "light">Delivery</label><br>
          </div>

          <label for = "pickupTime" class = "pickupTime">Pickup Time:</label>
          <input type = "time" id = "pickupTime" class = "pickupTime" name = "pickup_time">

          <label for = "deliveryTime" class = "deliveryTime">Delivery Time:</label>
          <input type = "time" id = "deliveryTime" class = "deliveryTime" name = "delivery_time">

          <h3 class = "deliveryAddress">Delivery Address</h3>
          <label for = "deliveryStreet" class = "deliveryAddress">Street:</label>
          <input type = "text" id = "deliveryStreet" class = "deliveryAddress" name = "delivery_street">

          <label for = "deliveryCity" class = "deliveryAddress">City:</label>
          <input type = "text" id = "deliveryCity" name = "delivery_city" class = "deliveryAddress">

          <label for = "deliveryState" class = "deliveryAddress">State:</label>
          <input type = "text" id = "deliveryState" name = "delivery_state" class = "deliveryAddress">

          <label for = "deliveryZip" class = "deliveryAddress">Zip:</label>
          <input type = "number" id = "deliveryZip" class = "deliveryAddress" name = "delivery_zip" min="5" max="5">

          <label for = "deliveryCountry" class = "deliveryAddress">Country:</label>
          <input type = "text" id = "deliveryCountry" class = "deliveryAddress" name = "delivery_country">
          <button type = "button" id="nextTwo">Next</button>

        </fieldset>

        <legend id = "fieldNumber3"><span class = "number">3</span> Payment</legend>
        <fieldset id = "set3">

        <label for = "cardNumber">Card Number:</label>
        <input type = "number" id = "cardNumber" name = "card_number" min="16" max="16">

        <label>Expiration Date:</label>
        <input type = "month" id = "cardMonth" name = "card_month">
        <input type = "year" id = "cardYear" name = "card_year">

        <label for = "cardCode">Security Code:</label>
        <input type = "number" id = "cardCode" name = "card_number" min="3" max="3">


        <h3>Billing Address</h3>
          <input type = "checkbox" id="sameAddress">
          <label for = "sameAddress">Same as Delivery Address</label><br>

		<label for = "billingFName">First Name:</label>
          <input type = "text" id = "billingFName" name = "billing_fname">

          <label for = "billingLName">Last Name:</label>
          <input type = "text" id = "billingLName" name = "billing_lname">

          <label for = "billingStreet">Street:</label>
          <input type = "text" id = "billingStreet" name = "billing_street">

          <label for = "billingCity">City:</label>
          <input type = "text" id = "billingCity" name = "billing_city">

          <label for = "billingState">State:</label>
          <input type = "text" id = "billingState" name = "billing_state">

          <label for = "billingZip">Zip:</label>
          <input type = "number" id = "billingZip" name = "billing_zip" min="5" max="5">

          <label for = "billingCountry">Country:</label>
          <input type = "text" id = "billingCountry" name = "billing_country">

        </fieldset>
        
        <button type = "submit">Complete Order</button>
        
      </form>

      <div>
        <?php include_once("footer.php");?>
      </div>

      <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="form.js" type="text/javascript" charset="utf-8"></script>
  <script src="autocomplete.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>