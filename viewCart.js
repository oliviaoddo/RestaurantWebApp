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
		    var row = table.insertRow(-1);
		    row.id = "row" + cartEntries[i].productId;
		    var cell1 = row.insertCell(0);
		    var cell2 = row.insertCell(1);
		    var cell3 = row.insertCell(2);
		    var cell4 = row.insertCell(3);
		    var cell5 = row.insertCell(4);
		    var cell6 = row.insertCell(5);
		    cell1.innerHTML = "<img height = '50px' width = '100px' src = 'inventory_images/" + cartEntries[i].productId + ".png' alt = '" + cartEntries[i].productName + "' ><br>" + cartEntries[i].productName;
		    cell2.innerHTML = cartEntries[i].productDesc;
		    cell3.innerHTML = cartEntries[i].productPrice;
		    //get the quantity 
		    //var quantity = cartEntries[i].productQuantity;
		    //where quantity == option id
		    //select the id .attr("selected")
		    cell4.innerHTML = "<select id='select" + cartEntries[i].productId +"'> <option class = '1'value = '1'>1</option><option class = '2' value = '2'>2</option><option class = '3' value = '3'>3</option><option class = '4' value = '4'>4</option><option class = '5' value = '5'>5</option><option class = '6' value = '6'>6</option><option class = '7' value = '7'>7</option><option class = '8' value = '8'>8</option><option class = '9' value = '9'>9</option><option class = '10' value = '10'>10</option></select>";//cartEntries[i].productQuantity;
		    //console.log($('#'+quantity));
		   	//var rowNumber = $('#row'+cartEntries[i].productId);
		   	var selectId = $('#select'+cartEntries[i].productId);
		   	rowQuantity = $('.'+cartEntries[i].productQuantity);
		   	//rowQuantity.attr("selected","selected");
		   	console.log($('#row'+cartEntries[i].productId).find(selectId).find(rowQuantity));
		   	$('#row'+cartEntries[i].productId).find(selectId).find(rowQuantity).attr("selected", "selected");
		    //$('#row'+cartEntries[i].productId, '#'+quantity).attr("selected","selected");
		    cell5.innerHTML = cartEntries[i].productTotal;
		    cell6.innerHTML = "<button type='button' class='delete'>X</button>";
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