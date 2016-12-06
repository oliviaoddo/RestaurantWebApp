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
        <script src="https://use.fontawesome.com/501f28931f.js"></script>
    </head>
    <body onload = "reviewOrder()">
      <div>
        <?php include_once("nav.php");?>
      </div>
  

      <form action = "" method = "post" id = "form">
        
        <h1>Checkout</h1>
        
        <legend id = "fieldNumber1"><span class = "number">1</span> Customer Information</legend>
        <fieldset id = "set1">
          
            <label id = "errorFName" for="firstName">* First Name:</label>
            <input type="text" id = "firstName" name = "user_firstName" pattern = "[A-Za-z]{1,25}" required>

            <label id = "errorLName" for="lastName">* Last Name:</label>
            <input type="text" id = "lastName" name = "user_lastName" pattern = "[A-Za-z]{1,25}" required>
          
            <label  id = "errorEmail" for = "mail">* Email:</label>
            <input type="email" id="mail" name = "user_email" required>
          
            <label id = "errorPhone" for = "phone">* Phone: (xxx-xxx-xxxx)</label>
            <input type ="tel" id = "phone" name = "user_phone" pattern="^\d{3}-\d{3}-\d{4}$" required>
            <button type = "button" id="nextOne">Next</button>
          
        </fieldset>
        
        <legend id = "fieldNumber2"><span class = "number">2</span> Delivery Options</legend>
        <fieldset id = "set2">
          

          <label for = "instructions">Special Instructions:</label>
          <textarea id = "instructions" name = "delivery_instructions" maxlength="250"></textarea>

          <div class = "deliveryOption">
          <label id="errorRadio" >* Pickup or Delivery?</label><br>
          <input type = "radio" id="pickup" value="pickup" name = "orderOption" required><label for = "pickup" class = "light">Pickup</label>
          <input type = "radio" id="delivery" value="delivery" name = "orderOption"><label for = "delivery" class = "light">Delivery</label><br>
          </div>

          <label for = "pickupTime" class = "pickupTime">Pickup Time:</label>
          <select id = "pickupTime" class = "pickupTime" name = "pickup_time">
            <option value = "pickup">Pickup Time</option>
          </select>

          <label for = "deliveryTime" class = "deliveryTime">Delivery Time:</label>
          <select id = "deliveryTime" class = "deliveryTime" name = "delivery_time">
            <option value = "deliveryTime">Delivery Time</option>
          </select>

          <h3 class = "deliveryAddress">Delivery Address</h3>
          <label id = "errorDelSt" for = "deliveryStreet" class = "deliveryAddress">Street:</label>
          <input type = "text" id = "deliveryStreet" class = "deliveryAddress" name = "delivery_street">

          <label id = "errorDelCit" for = "deliveryCity" class = "deliveryAddress">City:</label>
          <input type = "text" id = "deliveryCity" pattern = "[A-Za-z]{1,25}" name = "delivery_city" class = "deliveryAddress">

          <label id = "errorDelSta" for = "deliveryState" class = "deliveryAddress">State:</label>
          <input type = "text" id = "deliveryState" name = "delivery_state" pattern = "[A-Za-z]{1,12}" class = "deliveryAddress">

          <label id = "errorDelZip" for = "deliveryZip" class = "deliveryAddress">Zip:</label>
          <input type = "text" id = "deliveryZip" pattern = "(\d{5}([\-]\d{4})?)" class = "deliveryAddress" name = "delivery_zip" min="5" max="5">

          <label id = "errorDelCoun" for = "deliveryCountry" class = "deliveryAddress">Country:</label>
          <input type = "text" id = "deliveryCountry" pattern = "[A-Za-z]{1,25}" class = "deliveryAddress" name = "delivery_country">
          <button type = "button" id="nextTwo">Next</button>

        </fieldset>

        <legend id = "fieldNumber3"><span class = "number">3</span> Payment</legend>
        <fieldset id = "set3">

        <label id = "errorCard" for = "cardNumber">* Card Number:</label>
        <input type = "text" id = "cardNumber" pattern = "[0-9]{13,16}" name = "card_number" required>

        <label "expirationError">* Expiration Date:</label><br>
        <select id = "card_month" name = "card_month" required>
            <option value = "month">Month</option>
            <option value = "january">01 January</option>
            <option value = "feburary">02 Feburary</option>
            <option value = "march">03 March</option>
            <option value = "april">04 April</option>
            <option value = "may">05 May</option>
            <option value = "june">06 June</option>
            <option value = "july">07 July</option>
            <option value = "august">08 August</option>
            <option value = "september">09 September</option>
            <option value = "october">10 October</option>
            <option value = "november">11 November</option>
            <option value = "december">12 December</option>
          </select>
        <select id = "card_year" name = "card_year" required>
            <option value = "year">Year</option>
            <option value = "2016">2016</option>
            <option value = "2017">2017</option>
            <option value = "2018">2018</option>
            <option value = "2019">2019</option>
            <option value = "2020">2020</option>
            <option value = "2021">2021</option>
            <option value = "2022">2022</option>
            <option value = "2023">2023</option>
            <option value = "2024">2024</option>
            <option value = "2025">2025</option>
            <option value = "2026">2026</option>
            <option value = "2027">2027</option>
          </select>

        <label id = "errorCode" for = "cardCode">* Security Code:</label>
        <input type = "text" id = "cardCode" pattern = "[0-9]{3}" name = "card_number" required>


        <h3>Billing Address</h3>
          <input type = "checkbox" id="sameAddress">
          <label for = "sameAddress">Same as Delivery Address</label><br>

		<label id = "errorBillFName" for = "billingFName">* First Name:</label>
          <input type = "text" id = "billingFName" pattern = "[A-Za-z]{1,12}" name = "billing_fname" required>

          <label id = "errorBillLName" for = "billingLName">* Last Name:</label>
          <input type = "text" id = "billingLName" pattern = "[A-Za-z]{1,12}" name = "billing_lname" required>

          <label id = "errorBillStreet" for = "billingStreet">* Street:</label>
          <input type = "text" id = "billingStreet" name = "billing_street" required>

          <label id = "errorBillCity" for = "billingCity">* City:</label>
          <input type = "text" id = "billingCity" pattern = "[A-Za-z]{1,12}" name = "billing_city" required>

          <label id = "errorBillState" for = "billingState">* State:</label>
          <input type = "text" id = "billingState" pattern = "[A-Za-z]{1,12}" name = "billing_state" required>

          <label id = "errorBillZip" for = "billingZip">* Zip:</label>
          <input type = "text" id = "billingZip" pattern = "(\d{5}([\-]\d{4})?)" name = "billing_zip" required>

          <label id = "errorBillCountry" for = "billingCountry">* Country:</label>
          <input type = "text" id = "billingCountry" pattern = "[A-Za-z]{1,25}" name = "billing_country" required>

          <button type = "button" id="nextThree">Next</button>
        </fieldset>

        <legend id = "fieldNumber4"><span class = "number">4</span> Review Order</legend>
        <fieldset id = "set4">
        <!-- add the cart content here-->
          <ul id="cartContent">
          </ul>
          <h5 id="subtotal">Subtotal: $</h5>
          <h5 id="tax">Tax: $</h5>
          <h5 = id = "deliveryFee"></h5>
          <h5 id="orderTotal"></h5>
        </fieldset>
        <!-- display the subtotal, tax, delivery fee(if applicable), and grand total-->
        <button type = "submit" onclick = "completeOrder()">Complete Order</button>
        
      </form>

      <div>
        <?php include_once("footer.php");?>
      </div>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="form.js" type="text/javascript" charset="utf-8"></script>
  <script src="reviewOrder.js" type="text/javascript" charset="utf-8"></script>
  <script src="completeOrder.js" type="text/javascript" charset="utf-8"></script>
  <script src="checkoutFormValidation.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
