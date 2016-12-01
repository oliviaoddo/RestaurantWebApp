$(document).on('click', '.delete', function(event){
	var table = document.getElementById("cartTable");
	var rowProductId = $('.delete').closest('tr').attr('id');
	rowProductId = rowProductId.replace( /^\D+/g, '');
	//var rowDelete = $('#row'+cartEntries[i].productId).closest('tr').index();
	var rowDelete = $('.delete').closest('tr').index();
	console.log(rowDelete);
	var cartEntries = JSON.parse(localStorage.getItem("allEntries"));
	for(i = 0; i<cartEntries.length; i++){
		if(cartEntries[i].productId == rowProductId){
			cartEntries.splice(i,1); 
			localStorage.allEntries = JSON.stringify(cartEntries);
			//localStorage.removeItem("allEntries[i]");
			table.deleteRow(rowDelete);

		}
	}
})
