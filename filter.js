function filterFunction(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		console.log(xhr.status);
		if(xhr.readyState === 4 && xhr.status === 200) {
			var displayProducts = document.getElementById('productsDiv');
			displayProducts.innerHTML = xhr.responseText;
		}
	}

	var calories = 1500;
	var sugar = 20;
	var protein = 20;
	var fat = 15;
	var carbs = 50; 
	var price = 15;


	var caloriesCheck = document.getElementsByClassName('calories');
	var sugarCheck = document.getElementsByClassName('sugar');
	var proteinCheck = document.getElementsByClassName('protein');
	var fatCheck = document.getElementsByClassName('fat');
	var carbsCheck = document.getElementsByClassName('carbs');
	var priceCheck = document.getElementsByClassName('price');


	var caloriesIndex = getChecked(caloriesCheck);
	var sugarIndex = getChecked(sugarCheck);
	var proteinIndex = getChecked(proteinCheck);
	var fatIndex = getChecked(fatCheck);
	var carbsIndex = getChecked(carbsCheck);
	var priceIndex = getChecked(priceCheck);


	calories = caloriesCheck[caloriesIndex].value;
	sugar = sugarCheck[sugarIndex].value;
	protein = proteinCheck[proteinIndex].value;
	fat = fatCheck[fatIndex].value;
	carbs = carbsCheck[carbsIndex].value;
	price = priceCheck[priceIndex].value;


	var queryString = "?calories="  + calories;
	queryString += "&sugar=" + sugar + "&protein=" + protein + "&fat=" + fat + "&carbs=" + carbs + "&price=" + price;

	console.log(queryString);

	xhr.open("GET", "filter.php" + queryString, true);
	xhr.send();
};

function displayAllFunction(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		console.log(xhr.status);
		if(xhr.readyState === 4 && xhr.status === 200) {
			var displayProducts = document.getElementById('productsDiv');
			displayProducts.innerHTML = xhr.responseText;
		}
	}

	var displayAll = true;
	var queryString = "?displayAll=" + displayAll;

	xhr.open("GET", "filter.php" + queryString, true);
	xhr.send();
};

window.onload = displayAllFunction();

function getChecked(list) {
	var index = list.length-1;

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
	$('.filterCalories').toggle(300);
});

$('.filterCalories').click(function(){
	$('.filterCalories').hide(300);
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

