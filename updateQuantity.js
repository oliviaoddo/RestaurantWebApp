function updateQuantity(idToUpdate, i){
	$('#select'+idToUpdate).change(function(){
		var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
		var selectedQuantity = $('#select'+idToUpdate).find(":selected").text();
		cartEntries[i].productQuantity = selectedQuantity;
		cartEntries[i].productTotal = parseInt(cartEntries[i].productPrice) * parseInt(selectedQuantity);
		var newTotal = cartEntries[i].productTotal;
		$("#total"+idToUpdate).html(newTotal);
		//var currentCartTotal = $("#subtotal").text().replace( /^\D+/g, '');
		//currentCartTotal = parseInt(currentCartTotal);
		//currentCartTotal = currentCartTotal - parseInt(cartEntries[i].productTotal);
		localStorage.setItem("allEntries", JSON.stringify(cartEntries));
		var cartTotal = 0;
		for(j = 0; j < cartEntries.length; j++){
			cartTotal = parseInt(cartEntries[j].productTotal) + cartTotal;
		}
		$("#subtotal").html("Subtotal: $" + cartTotal + ".00");
		//window.location.reload(); 
	})

}
