function viewCart(){
	//gets the items in the cart from the localstorage
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
	//if the cart is empty hide everything and show the "your cart is empty box"
	if(cartEntries == null || cartEntries.length == 0){
		$("#checkout").hide();
		$("#clearCart").hide();
		$("#cartTable").hide();
		$("#subtotal").hide();
		$("#empty").show();
		$("#cartHeading").hide();
	}

	//selects the table element from the cart.php file
	var table = document.getElementById("cartTable");

	//displays each product in rows in the cart table
	for(i = 0; i < cartEntries.length; i++){
		//creates a row in the bottom of the table
	    var row = table.insertRow(-1);
	    //sets the id attribute of the newly created row to row plus the product id
	    row.id = "row" + cartEntries[i].productId;
	    //creates 6 cells in the newly created row
	    var cell1 = row.insertCell(0);
	    var cell2 = row.insertCell(1);
	    var cell3 = row.insertCell(2);
	    var cell4 = row.insertCell(3);
	    var cell5 = row.insertCell(4);
	    var cell6 = row.insertCell(5);

	    //sets the id attribute for the total so the total can be updated from another javascript file
	    cell5.id = "total" + cartEntries[i].productId;
	    //inserts the product picture in the first cell
	    cell1.innerHTML = "<img height = '50px' width = '100px' src = 'inventory_images/" + cartEntries[i].productId + ".png' alt = '" + cartEntries[i].productName + "' ><br>" + cartEntries[i].productName;
	    //inserts the product description
	    cell2.innerHTML = cartEntries[i].productDesc;
	    //inserts the product price
	    cell3.innerHTML = "$" + cartEntries[i].productPrice;
	    //inserts the quantity selector box and which calls update quantity when clicked 
	    cell4.innerHTML = "<select id='select" + cartEntries[i].productId + "' onclick = 'updateQuantity(" + cartEntries[i].productId +"," + i +")'> <option class = '1' value = '1'>1</option><option class = '2' value = '2'>2</option><option class = '3' value = '3'>3</option><option class = '4' value = '4'>4</option><option class = '5' value = '5'>5</option><option class = '6' value = '6'>6</option><option class = '7' value = '7'>7</option><option class = '8' value = '8'>8</option><option class = '9' value = '9'>9</option><option class = '10' value = '10'>10</option></select>";
	   	//gets the current quantity and selects that option in the quantity selector box
	   	var selectId = $('#select'+cartEntries[i].productId);
	   	rowQuantity = $('.'+cartEntries[i].productQuantity);
	   	$('#row'+cartEntries[i].productId).find(selectId).find(rowQuantity).attr("selected", "selected");
	   	//inserts the product total
	    cell5.innerHTML = "$" + cartEntries[i].productTotal;
	    //inserts a remove button which calls deleteItem() when clicked
	    cell6.innerHTML = "<button class = 'item' type='button' onclick = 'deleteItem(" + row.rowIndex +"," + cartEntries[i].productId +")' class='delete'><i class='fa fa-trash' aria-hidden='true'></i></button>";
	    //hide the "your cart is empty" because there are products in the cart
		$("#empty").hide();
	}

	//calculates the subtotal
	var subtotal = 0;
	for(i = 0; i < cartEntries.length; i++){
		subtotal = cartEntries[i].productTotal + subtotal;
	}
	//inserts the subtotal
	document.getElementById('subtotal').append(subtotal + ".00");

	//hides everything and shows "your cart is empty" if clear cart button is pressed 
	$("#clearCart").click(function(){
		$("#cartTable").empty();
		$("#subtotal").hide();
		$("#cartHeading").hide();
		localStorage.clear();
		$("#empty").show();
		$("#checkout").hide();
		$("#clearCart").hide();


	})


};