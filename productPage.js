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

			/*
			console.log(xhr.responseText);
			var displayProduct = document.getElementById('productRow');
			displayProduct.innerHTML = xhr.responseText;*/
		})
	}

}

	var id = document.getElementById('productId').value;


	var queryString = "?id="  + id;

	console.log(queryString);

	xhr.open("GET", "productPage.php" + queryString, true);
	xhr.send();
};