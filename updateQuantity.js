//when the quantity is changed in the cart
function updateQuantity(idToUpdate, i){
	//execute if the quantity selector box has been changed
	$('#select'+idToUpdate).change(function(){
		//get the product in the cart from local storage
		var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
		//get the newly selected quantity
		var selectedQuantity = $('#select'+idToUpdate).find(":selected").text();
		//update the local storage product to the new quantity
		cartEntries[i].productQuantity = selectedQuantity;
		//update the local storage total for the product
		cartEntries[i].productTotal = parseInt(cartEntries[i].productPrice) * parseInt(selectedQuantity);
		//save the new total in a variable
		var newTotal = cartEntries[i].productTotal;
		//insert the new total in the row
		$("#total"+idToUpdate).html("$" + newTotal);
		//reset the local storage with new changes
		localStorage.setItem("allEntries", JSON.stringify(cartEntries));
		//calculate the new subtotal
		var cartTotal = 0;
		for(j = 0; j < cartEntries.length; j++){
			cartTotal = parseInt(cartEntries[j].productTotal) + cartTotal;
		}
		//insert the new subtotal
		$("#subtotal").html("Subtotal: $" + cartTotal + ".00");
	})

}
