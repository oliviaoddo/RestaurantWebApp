function updateQuantity(idToUpdate, i){
	$('#select'+idToUpdate).change(function(){
		var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
		var selectedQuantity = $('#select'+idToUpdate).find(":selected").text();
		cartEntries[i].productQuantity = selectedQuantity;
		cartEntries[i].productTotal = parseInt(cartEntries[i].productPrice) * parseInt(selectedQuantity);
		localStorage.setItem("allEntries", JSON.stringify(cartEntries));
		window.location.reload(); 
	})

}
