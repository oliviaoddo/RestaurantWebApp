function viewCart(){
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));

	if(cartEntries == null){
		$("#checkout").hide();
		$("#clearCart").hide();
		$("#cartTable").hide();
		$("#subtotal").hide();
	}

	//get localstorage 
	console.log(cartEntries[0].productQuantity);
	//for(i = 0; i < cartEntries.length; i++){
		var table = document.getElementById("cartTable");

		for(i = 0; i < cartEntries.length; i++){
		    var row = table.insertRow();
		    var cell1 = row.insertCell(0);
		    var cell2 = row.insertCell(1);
		    var cell3 = row.insertCell(2);
		    var cell4 = row.insertCell(3);
		    var cell5 = row.insertCell(4);
		    cell1.innerHTML = cartEntries[i].productName;
		    cell2.innerHTML = cartEntries[i].productDesc;
		    cell3.innerHTML = cartEntries[i].productPrice;
		    cell4.innerHTML = cartEntries[i].productQuantity;
		    cell5.innerHTML = cartEntries[i].productTotal;
	}

	var subtotal = 0;
	for(i = 0; i < cartEntries.length; i++){
		subtotal = cartEntries[i].productTotal + subtotal;
	}

	document.getElementById('subtotal').append(subtotal);

	$("#clearCart").click(function(){
		$("#cartTable").empty();
		localStorage.clear();

		$("#checkout").hide();
		$("#clearCart").hide();

		//show your shopping cart is empty 


	})
};