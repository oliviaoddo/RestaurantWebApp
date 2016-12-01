function updateQuantity(idToUpdate){
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
	//$(document).on('mousedown', '#select'+idToUpdate, function(event){
	//	console.log("yes");
	//}
	$('#select'+idToUpdate).mousedown(function(){
		console.log("hello");
	})
	//console.log($('#select'+idToUpdate));
	//var selectId = $('#select'+cartEntries[idToUpdate].productId);

	//var valueOfQuantity = $('#row'+cartEntries[idToUpdate].productId).find(selectId).find("select option:selected").val;
	//console.log(valueOfQuantity);
	//get the selected id
	//set cartEntries[idToUpate].productQuantity


}