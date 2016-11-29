function product(id){
 	$('.popUp').hide();
 	var url = window.location.href;
 	var idText = "?id=";
 	var strip_text = url.substring(0, url.indexOf(idText) + idText.length);
 	var id = url.substring(strip_text.length, url.length);

 	var xhr = new XMLHttpRequest();
 	xhr.onreadystatechange = function(){
 		if(xhr.readyState === 4 && xhr.status === 200) {
 			var jsonResponse = JSON.parse(xhr.responseText);
 			document.getElementById('productName').innerHTML = jsonResponse.productName;
 			document.getElementById('productPrice').innerHTML = "$" + jsonResponse.productPrice;
 			document.getElementById('productDescription').innerHTML = jsonResponse.productDesc;
 			document.getElementById('productCalories').append(jsonResponse.productCalories);
 			document.getElementById('productFat').append(jsonResponse.productFat);
 			document.getElementById('productSugar').append(jsonResponse.productSugar);
 			document.getElementById('productProtein').append(jsonResponse.productProtein);
 			document.getElementById('productCarbs').append(jsonResponse.productCarbs);
 			document.getElementById('productImage').createElement

 			var ext = ".png"; //File Extension 

			var link = document.createElement('a');
			var elem = document.createElement("img");
			link.setAttribute("href", "inventory_images/" + id + ext);
			elem.setAttribute("src", "inventory_images/" + id + ext);
			elem.setAttribute("alt", jsonResponse.productName);

		    elem.setAttribute("height", "200px");
		    elem.setAttribute("width", "300px");

		    link.appendChild(elem);
		    document.getElementById("productImage").appendChild(link);

		    $('#addToCart').click(function(){
		    	alert("pressed");
		    	//function addProduct(){
		    		//search through cart array, if id not found
					//create new product in the cart 
					//if found 
					//quantity++;
		    		var quantity = 1;
		    		var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
		    		if(cartEntries == null) cartEntries = [];
					/*if(cartEntries != null){
			    		for(i = 0; i<cartEntries.length; i++){
			    			if(cartEntries[i].productId == jsonResponse.productId){
			    				//console.log(cartEntries[i].productId++);
			    				localStorage.setItem("cartEntries[i].productQuantity", JSON.stringify(cartEntries[i].productQuantity++));
			    				var price = parseInt(cartEntries[i].productPrice);
			    				var quantity = cartEntries[i].productQuantity;
			    				var total = price * quantity;
			    				console.log(total);
			    				//console.log(quantity);
			    				localStorage.setItem("cartEntries[i].productTotal", JSON.stringify(total));
			    				console.log(cartEntries);
			    			}
		    			}
		    		}*/
		    		//else{
			    		var cartEntry = {
			    			"productId": jsonResponse.productId,
					        "productName": jsonResponse.productName,  
				    		"productDesc": jsonResponse.productDesc, 
				    		"productPrice": jsonResponse.productPrice, 
				    		"productQuantity": quantity, 
				    		"productTotal": jsonResponse.productPrice * quantity
	    				}
	    				localStorage.setItem("cartEntry", JSON.stringify(cartEntry));
	   					// Save allEntries back to local storage
	    				cartEntries.push(cartEntry);
	    				console.log(cartEntries);
	    				localStorage.setItem("allEntries", JSON.stringify(cartEntries));
	    				console.log(cartEntries);
	    				console.log(cartEntries[0].productName);
    				//}
		    	//}
		    	
		    	/*
		    	cart.push({
		    		"productName": jsonResponse.productName,  
		    		"productDesc": jsonResponse.productDesc, 
		    		"productPrice": jsonResponse.productPrice, 
		    		"productQuantity": quantity, 
		    		"productTotal": jsonResponse.productPrice * 2
		    	});
		    	alert(cart[0].productName);
		    	alert(cart[0].productDesc);
		    	alert(cart[0].productPrice);
		    	alert(cart[0].productQuantity);
		    	alert(cart[0].productTotal);
		    	cart.push({
		    		"productName": jsonResponse.productName,  
		    		"productDesc": jsonResponse.productDesc, 
		    		"productPrice": jsonResponse.productPrice, 
		    		"productQuantity": quantity, 
		    		"productTotal": jsonResponse.productPrice * 2
		    	});
		    	alert(cart[1].productName);
		    	alert(cart[1].productDesc);
		    	alert(cart[1].productPrice);
		    	alert(cart[1].productQuantity);
		    	alert(cart[1].productTotal);
				*/
	
    			//onlick add to cart
    			//pop up
    			//checkout: link to cart 
    			//continue shopping: link to products page

    			var $overlay = $('<div id="overlay"></div>');
				var $popUp = $(".popUp");
				$overlay.append($popUp);
				$("body").append($overlay);
				$overlay.click(function(){
				  //Hide the overlay
				  $overlay.hide();
				})
		    })
		    
			 
		}

 	}
 
 	var queryString = "?id="  + id;
 
 	xhr.open("GET", "productPage.php" + queryString, true);
 	xhr.send();
 };