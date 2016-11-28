function product(id){
 	
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

		     elem.setAttribute("height", "100px");
		     elem.setAttribute("height", "200px");

		     link.appendChild(elem);
		     document.getElementById("productImage").appendChild(link);
			  
			}
 
 	}
 
 	var queryString = "?id="  + id;
 
 	xhr.open("GET", "productPage.php" + queryString, true);
 	xhr.send();
 };