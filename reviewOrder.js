function reviewOrder(){
	//get the products in the cart
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
	//create a list item to display in the checkout form
	for(i=0; i < cartEntries.length; i++){
		//get the product name, quantity, and product total
		var $li = $("<li></li>").text(cartEntries[i].productName + " X " + cartEntries[i].productQuantity +  " $" + cartEntries[i].productTotal); 
		//append it to the unordered list
		$("#cartContent").append($li); 
	}
	//get the subtotal
	var subtotal = 0;
	for(i = 0; i < cartEntries.length; i++){
		subtotal = cartEntries[i].productTotal + subtotal;
	}
	//insert the subtotal
	document.getElementById('subtotal').append(subtotal);
	//calculate the tax
	var tax = (subtotal * 0.08).toFixed(2);
	//insert the tax
	document.getElementById('tax').append(tax);

	$(document).on('click', '#delivery', function(event){
	//if(document.getElementById('delivery').checked){
		//set delivery fee to 6, insert it into review order
		//clear the order total
		$("#orderTotal").empty();
		deliveryFee = 6;
		document.getElementById('deliveryFee').innerHTML = "Delivery Fee: $" + deliveryFee;
		var orderTotal = subtotal + parseFloat(tax) + deliveryFee;
		orderTotal.toFixed(2);
		document.getElementById('orderTotal').innerHTML = "Order Total: $" + orderTotal;
	})

	$(document).on('click', '#pickup', function(event){
	//if(document.getElementById('delivery').checked){
	//clear the order total and delivery fee
		$("#orderTotal").empty();
		$("#deliveryFee").empty();
		//insert the ordertotal into review order
		deliveryFee = 0;
		var orderTotal = subtotal + parseFloat(tax);
		orderTotal.toFixed(2);
		document.getElementById('orderTotal').innerHTML = "Order Total: $" + orderTotal;
	})

};
