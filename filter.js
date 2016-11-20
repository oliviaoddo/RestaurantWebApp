function ajaxFunction(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		console.log(xhr.status);
		if(xhr.readyState === 4 && xhr.status === 200) {
			var displayProducts = document.getElementById('productsDiv');
			displayProducts.innerHTML = xhr.responseText;
			console.log(xhr.responseText);
		}
	}

	var calories = document.getElementsByClassName('calories');
	var sugar = document.getElementsByClassName('sugar');
	var protein = document.getElementsByClassName('protein');
	var fat = document.getElementsByClassName('fat');
	var carbs = document.getElementsByClassName('carbs');
	var price = document.getElementsByClassName('price');

	var caloriesIndex = getChecked(calories);
	var sugarIndex = getChecked(sugar);
	var proteinIndex = getChecked(protein);
	var fatIndex = getChecked(fat);
	var carbsIndex = getChecked(carbs);
	var priceIndex = getChecked(price);

	var queryString = "?calories="  + calories[caloriesIndex].value;
	queryString += "&sugar=" + sugar[sugarIndex].value + "&protein=" + protein[proteinIndex].value + "&fat=" + fat[fatIndex].value + "&carbs=" + carbs[carbsIndex].value + "&price=" + price[priceIndex].value;

	xhr.open("GET", "filter.php" + queryString, true);
	xhr.send();
};

window.onload = ajaxFunction();

function getChecked(list) {
	var index = 0;

	for(var i = 0; i < list.length; i++){
		if (list[i].checked) {
			index = i;
		}
    }

    return index;
}

$('.filterCalories').hide();
$('.filterSugar').hide();
$('.filterProtein').hide();
$('.filterFat').hide();
$('.filterCarbs').hide();
$('.filterPrice').hide();

$('#filterCalories').click(function(){
	$('.filterCalories').toggle(400);
});

$('.filterCalories').click(function(){
	$('.filterCalories').hide("slow");
});

$('#filterSugar').click(function(){
	$('.filterSugar').toggle(400);
});

$('.filterSugar').click(function(){
	$('.filterSugar').hide("slow");
});

$('#filterProtein').click(function(){
	$('.filterProtein').toggle(400);
});

$('.filterProtein').click(function(){
	$('.filterProtein').hide("slow");
});

$('#filterFat').click(function(){
	$('.filterFat').toggle(400);
});

$('.filterFat').click(function(){
	$('.filterFat').hide("slow");
});

$('#filterCarbs').click(function(){
	$('.filterCarbs').toggle(400);
});

$('.filterCarbs').click(function(){
	$('.filterCarbs').hide("slow");
});

$('#filterPrice').click(function(){
	$('.filterPrice').toggle(400);
});

$('.filterPrice').click(function(){
	$('.filterPrice').hide("slow");
});

