function reviewOrder(){
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
	for(i=0; i < cartEntries.length; i++){
		var $li = $("<li></li>").text(cartEntries[i].productName + " X " + cartEntries[i].productQuantity +  " $" + cartEntries[i].productTotal); 
		$("#cartContent").append($li); 
	}

	var subtotal = 0;
	for(i = 0; i < cartEntries.length; i++){
		subtotal = cartEntries[i].productTotal + subtotal;
	}
	document.getElementById('subtotal').append(subtotal);

	var tax = (subtotal * 0.08).toFixed(2);
	console.log(typeof(tax));
	document.getElementById('tax').append(tax);

	$(document).on('click', '#delivery', function(event){
	//if(document.getElementById('delivery').checked){
		$("#orderTotal").empty();
		deliveryFee = 6;
		document.getElementById('deliveryFee').innerHTML = "Delivery Fee: $" + deliveryFee;
		var orderTotal = subtotal + parseFloat(tax) + deliveryFee;
		document.getElementById('orderTotal').innerHTML = "Order Total: $" + orderTotal;
	})

	$(document).on('click', '#pickup', function(event){
	//if(document.getElementById('delivery').checked){
		$("#orderTotal").empty();
		$("#deliveryFee").empty();
		deliveryFee = 0;
		var orderTotal = subtotal + parseFloat(tax);
		document.getElementById('orderTotal').innerHTML = "Order Total: $" + orderTotal;
	})

};
