function deleteItem(rowIndex, rowId){
	//selects the table from cart.php
	var table = document.getElementById("cartTable");
	var rowProductId = rowId;
	var rowDelete = rowIndex;
	//gets the current subtotal and strips the text
	var currentCartTotal = $("#subtotal").text().replace( /^\D+/g, '');
	//converts the remaining text to a number
	currentCartTotal = parseInt(currentCartTotal);
	//get the products in the cart from the local storage
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
	//loop through all of the products in the cart
	for(i = 0; i<cartEntries.length; i++){
		//finds the product that needs to be deleted 
		if(cartEntries[i].productId == rowProductId){
			//subtract that product's total from the previous subtotal 
			currentCartTotal = currentCartTotal - parseInt(cartEntries[i].productTotal);
			//insert new subtotal
			$("#subtotal").html("$" + currentCartTotal + ".00");
			//delete the item from localstorage
			cartEntries.splice(i,1); 
			//update the localstorage
			localStorage.allEntries = JSON.stringify(cartEntries);
			//delete the row in the table
			table.deleteRow(rowDelete);
			//reload the page so row indexes are updated 
			window.location.reload();

		}
	}

}
