function product(){

	console.log("function called");
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		console.log(xhr.status);
		if(xhr.readyState === 4 && xhr.status === 200) {
			$.getJSON('productPage.php', function(data){
				console.log("hello");
				console.log(data);
				$.each(data, function(key, val){
					$('ul').append('<li id="' + key + '">' + val.productName+ ' ' + val.last_name + ' ' + 
						val.email + ' ' + val.age + '</li>');
				console.log(val.productName);
				//})
			})

			
			console.log(xhr.responseText);
			var displayProduct = document.getElementById('productRow');
			displayProduct.innerHTML = xhr.responseText;
		})
	}

}

	var id = document.getElementById('productId').value;


	var queryString = "?id="  + id;

	console.log(queryString);

	xhr.open("GET", "productPage.php" + queryString, true);
	xhr.send();

	/*$.ajaxSetup({
		cache: false
	})

	$(document).ready(function(){
		$.ajax({
			url: "productPage.php",
			type: "POST",
			dataType: "json", 
			success: function(data){
				console.log(data);//.innerHTML = data[1];
				document.getElementById("productName").innerHTML = data[1].name;
				document.getElementById("productPrice").innerHTML = data[2].price;
				document.getElementById("productDescription").innerHTML = data[3].description;
				document.getElementById("productCalories").innerHTML = data[5].calories;
				document.getElementById("productFat").innerHTML = data[6].fat;
				document.getElementById("productCarbs").innerHTML = data[7].carbs;
				document.getElementById("productProtein").innerHTML = data[8].protein;
				document.getElementById("productSugar").innerHTML = data[9].sugar;

				
			}
		})
	})*/

};
