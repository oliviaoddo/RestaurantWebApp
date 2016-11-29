function viewCart(){
	console.log("hello");
	//get localstorage 
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
	console.log(cartEntries);
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
};