function product(id){
	//hide the pop up when the page is loaded
 	$('.popUp').hide();
 	//gets the url that called the product function 
 	var url = window.location.href;
 	//strips the url to get the product id that is at the end of the url
 	var idText = "?id=";
 	var strip_text = url.substring(0, url.indexOf(idText) + idText.length);
 	var id = url.substring(strip_text.length, url.length);
 	//creates a new http request
 	var xhr = new XMLHttpRequest();
 	xhr.onreadystatechange = function(){
 		if(xhr.readyState === 4 && xhr.status === 200) {
 			//inserts the response text into the product.php page
 			var jsonResponse = JSON.parse(xhr.responseText);
 			document.getElementById('productName').innerHTML = jsonResponse.productName;
 			document.getElementById('productPrice').innerHTML = "$" + jsonResponse.productPrice;
 			document.getElementById('productDescription').innerHTML = jsonResponse.productDesc;
 			document.getElementById('productCalories').append(jsonResponse.productCalories);
 			document.getElementById('productFat').append(jsonResponse.productFat);
 			document.getElementById('productSugar').append(jsonResponse.productSugar);
 			document.getElementById('productProtein').append(jsonResponse.productProtein);
 			document.getElementById('productCarbs').append(jsonResponse.productCarbs);
 			document.getElementById('productImage').createElement;
 			//inserts the image into the product.php page
 			var ext = ".png"; //File Extension 
 			//creates a link and image element
			var link = document.createElement('a');
			var elem = document.createElement("img");
			//adds the link to the image path
			link.setAttribute("href", "inventory_images/" + id + ext);
			elem.setAttribute("src", "inventory_images/" + id + ext);
			elem.setAttribute("alt", jsonResponse.productName);

		    elem.setAttribute("height", "200px");
		    elem.setAttribute("width", "300px");

		    link.appendChild(elem);
		    document.getElementById("productImage").appendChild(link);

		    //when add to cart is clicked on a product page
		    $('#addToCart').click(function(){
		    		var found = false;
		    		//get the quantity that was selected in the dropdown 
		    		var selectedQuantity = $('.productPageSelect').find(":selected").text();
		    		var selectedQuantity = parseInt(selectedQuantity);
		    		//get the products from the cart
		    		var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
		    		//if there is nothing in the then cart create a cart array
		    		if(cartEntries == null) cartEntries = [];
		   			//loop through the cart to see if the current product already exists in the cart
		    		for(i = 0; i<cartEntries.length; i++){
		    			if(cartEntries[i].productId == jsonResponse.productId){
		    			//if it is found, update the quantity
		    				if(parseInt(cartEntries[i].productQuantity) + selectedQuantity > 10){
		    					cartEntries[i].productQuantity = 10;
		    				}
		    				else{
		    					cartEntries[i].productQuantity = parseInt(cartEntries[i].productQuantity) + selectedQuantity;
		    				}
		    				//add the updated quantity to the local storage
		    				cartEntries[i].productTotal = cartEntries[i].productQuantity * cartEntries[i].productPrice;
		    				found = true;
		    				break;
		    			}
		    		}
		    		localStorage.setItem("allEntries", JSON.stringify(cartEntries));
		    		//create new product in the cart if the product did not exist in the cart
		    		if(found == false){
			    		var cartEntry = {
			    			"productId": jsonResponse.productId,
					        "productName": jsonResponse.productName,  
				    		"productDesc": jsonResponse.productDesc, 
				    		"productPrice": jsonResponse.productPrice, 
				    		"productQuantity": selectedQuantity, 
				    		"productTotal": jsonResponse.productPrice * selectedQuantity
	    				}
	    				localStorage.setItem("cartEntry", JSON.stringify(cartEntry));
	    				cartEntries.push(cartEntry);
	    				localStorage.setItem("allEntries", JSON.stringify(cartEntries));
    				}
    		
    			//create the pop up that is displayed after add to cart is clicked
    			var $overlay = $('<div id="overlay"></div>'); 
				var $popUp = $("div.popUp");
				console.log($popUp);
				$overlay.append($popUp);
				$("body").append($overlay);
				$overlay.show();
				$('.popUp').show();
				$overlay.click(function(){
				  //Hide the overlay
				  $overlay.hide();
				})
		    })
		    
			 
		}

 	}
 	//send the id to productPage.php to get the information about that product from the database
 	var queryString = "?id="  + id;
 
 	xhr.open("GET", "productPage.php" + queryString, true);
 	xhr.send();
 };