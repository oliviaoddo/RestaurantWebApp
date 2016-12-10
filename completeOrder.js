//function called when checkout form is submitted
function completeOrder(){
	//get the customer input from the form and store it in vaiables
	var firstName = document.getElementById('firstName').value;
	var lastName = document.getElementById('lastName').value;
	var email = document.getElementById('mail').value;
	var phone = document.getElementById('phone').value;
	var instructions = document.getElementById('instructions').value;

	//if pickup seleted
	if(document.getElementById("pickup").checked == true){
		//get the selected pickup time from the form
		var pickupTime = document.getElementById('pickupTime').value;
		//set delivery options to null
		var deliveryTime = null;
		var deliveryStreet = null;
		var deliveryCity = null;
		var deliveryState = null;
		var deliveryZip = null;
		var deliveryCountry = null;
		//set the type
		var type = "pickup";
	}

	//if delivery selected 
	if(document.getElementById("delivery").checked == true) {
		//get the delivery options from the form and store them in variables
		var deliveryTime = document.getElementById('deliveryTime').value;
		var deliveryStreet = document.getElementById('deliveryStreet').value;
		var deliveryCity = document.getElementById('deliveryCity').value;
		var deliveryState = document.getElementById('deliveryState').value;
		var deliveryZip = document.getElementById('deliveryZip').value;
		var deliveryCountry = document.getElementById('deliveryCountry').value;
		var pickupTime = null;
		var type = "delivery";
	}
	
	//if same as delivery checked 
	if(document.getElementById("sameAddress").checked == true){
		//set billing address variables to delivery address values
		var billingStreet = deliveryStreet;
		var billingCity = deliveryCity;
		var billingState = deliveryState;
		var billingZip = deliveryZip;
		var billingCountry = deliveryCountry;
		var billingFname = firstName;
		var billingLname = lastName;
	} else{
		//if not checked get the biling information from the form and store in variables
		var billingStreet = document.getElementById('billingStreet').value;
		var billingCity = document.getElementById('billingCity').value;
		var billingState = document.getElementById('billingState').value;
		var billingZip = document.getElementById('billingZip').value;
		var billingCountry = document.getElementById('billingCountry').value;
		var billingFname = document.getElementById('billingFName').value;
		var billingLname = document.getElementById('billingLName').value;
	}

	//get the payment information in the form and store in variables
	var cardNumber = document.getElementById('cardNumber').value;
	var expirationMonth = document.getElementById('card_month').value;
	var expirationYear = document.getElementById('card_year').value;
	var cardCode = document.getElementById('cardCode').value;

	//get the local storage aka the items in the cart
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));

	//put all of the form information into an array
	var orderInfo = [
			firstName, 
			lastName, 
			email, 
			phone, 
			instructions,
			pickupTime, 
			deliveryTime,
			deliveryStreet, 
			deliveryCity, 
			deliveryState, 
			deliveryZip, 
			deliveryCountry,
			billingStreet, 
			billingCity, 
			billingState,
			billingZip, 
			billingCountry, 
			billingFname, 
			billingLname, 
			cardNumber, 
			expirationMonth, 
			expirationYear, 
			cardCode,
			type
		];


	
	//create an object with the cart items and orderInfo array
	var order = {
		'info': orderInfo, 
		'orderItems': cartEntries
	};
	
	//clear the cart so it is empty after the order is placed
	localStorage.clear();
	//create a new http request
    xhr = new XMLHttpRequest;
  	//send the order object to order.php in JSON format
	xhr.open( "POST", "order.php" );
	xhr.setRequestHeader( "Content-Type", "application/json" );
	xhr.send(JSON.stringify(order));

}