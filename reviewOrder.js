function reviewOrder(){
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
	for(i=0; i < cartEntries.length; i++){
		var $li = $("<li></li>").text(cartEntries[i].productName + " X " + cartEntries[i].productQuantity +  " $" + cartEntries[i].productTotal); 
		$("#cartContent").append($li); 
	}
};
