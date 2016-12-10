function filterFunction(){
	//create a new http request
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState === 4 && xhr.status === 200) {
			//display the retured products on the onlineOrder page
			var displayProducts = document.getElementById('productsDiv');
			displayProducts.innerHTML = xhr.responseText;
		}
	}

	//set default values 
	var calories = 1500;
	var sugar = 20;
	var protein = 20;
	var fat = 15;
	var carbs = 50; 
	var price = 15;

	//get the class of the filter options
	var caloriesCheck = document.getElementsByClassName('calories');
	var sugarCheck = document.getElementsByClassName('sugar');
	var proteinCheck = document.getElementsByClassName('protein');
	var fatCheck = document.getElementsByClassName('fat');
	var carbsCheck = document.getElementsByClassName('carbs');
	var priceCheck = document.getElementsByClassName('price');

	//class is retured as an array, call getChecked to find which filter option has been checked
	var caloriesIndex = getChecked(caloriesCheck);
	var sugarIndex = getChecked(sugarCheck);
	var proteinIndex = getChecked(proteinCheck);
	var fatIndex = getChecked(fatCheck);
	var carbsIndex = getChecked(carbsCheck);
	var priceIndex = getChecked(priceCheck);

	//get the value of those checked options
	calories = caloriesCheck[caloriesIndex].value;
	sugar = sugarCheck[sugarIndex].value;
	protein = proteinCheck[proteinIndex].value;
	fat = fatCheck[fatIndex].value;
	carbs = carbsCheck[carbsIndex].value;
	price = priceCheck[priceIndex].value;

	//create a query string with the selected options
	var queryString = "?calories="  + calories;
	queryString += "&sugar=" + sugar + "&protein=" + protein + "&fat=" + fat + "&carbs=" + carbs + "&price=" + price;

	//send the query string to the filter.php file
	xhr.open("GET", "filter.php" + queryString, true);
	xhr.send();
};

//if the x button is clicked on the orderline page call with function to clear all of the filters
function displayAllFunction(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState === 4 && xhr.status === 200) {
			var displayProducts = document.getElementById('productsDiv');
			displayProducts.innerHTML = xhr.responseText;
		}
	}

	//create a query string that sets display all to true
	var displayAll = true;
	var queryString = "?displayAll=" + displayAll;
	//send the query string to filter.php file
	xhr.open("GET", "filter.php" + queryString, true);
	xhr.send();
};

//call the display all function when the orderline page is initially loaded
window.onload = displayAllFunction();

//finds the checked element
function getChecked(list) {
	var index = list.length-1;

	for(var i = 0; i < list.length; i++){
		if (list[i].checked) {
			index = i;
		}
    }
    return index;
}

//hide the dropdown filter options
$('.filterCalories').hide();
$('.filterSugar').hide();
$('.filterProtein').hide();
$('.filterFat').hide();
$('.filterCarbs').hide();
$('.filterPrice').hide();

//toggle the filter options when they are clicked

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

