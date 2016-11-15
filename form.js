//pickup/delivery time 
var currentTime = function(){
	//get the current time 
	var d = new Date();
	var h = d.getHours();
	var m = d.getMinutes();
	//round to the nearest quarter hour 
	var quarterHours = Math.round(m/15);
	if (quarterHours == 4){
		h = h + 1;
	}
	var rounded = (quarterHours*15)%60;
	m = rounded;
	//convert to minutes 
	h = h * 60;
	var currentTime = h + m;
	return currentTime;
};

var orderTimes = function(option){
	var current = currentTime();
	var closeTime = 1260;
	//if delivery selected
	if (option === "delivery"){
		//add 1 hour to time 
		current = current + 60;
		//create option element in delivery select time
		var selectItem = document.getElementById("deliveryTime");
		var optionItem = document.createElement("option");
		optionItem.text = current;
		selectItem.add(optionItem);
		//loop
			while (current < closeTime){
				//add 15 minutes until closing
				current = current + 15;
				//convert to military time
				var hour = Math.trunc(current/60);
					if(hour > 12){
						hour = hour - 12;
						var timeOfDay = "PM";
					}
					else{
						var timeOfDay = "AM";
					}
				var minutes = current%60;
				//convert to normal time 
				var standardTime = hour + ":" + minutes + timeOfDay;
				//create <option> element in delivery <select> time 
				selectItem = document.getElementById("deliveryTime");
				optionItem = document.createElement("option");
				optionItem.text = standardTime;
				selectItem.add(optionItem);
			}
		}
	//if pick up selected 
	if (option === "pickup"){
		//add 15 minutes to time 
		current = current + 15;
		//create <option> element in pickup <select> time
		var selectItem = document.getElementById("pickupTime");
		var optionItem = document.createElement("option");
		optionItem.text = current;
		selectItem.add(optionItem);
		//loop
			while (current < closeTime){
				//add 15 minutes until closing
				current = current + 15;
				//convert to military time
				var hour = Math.trunc(current/60);
					if(hour > 12){
						hour = hour - 12;
						var timeOfDay = "PM";
					}
					else{
						var timeOfDay = "AM";
					}
				var minutes = current%60;
				//convert to normal time 
				var standardTime = hour + ":" + minutes + timeOfDay;
				//create <option> element in pickup <select> time 
				selectItem = document.getElementById("pickupTime");
				optionItem = document.createElement("option");
				optionItem.text = standardTime;
				selectItem.add(optionItem);
			}

		}
	
};

//hide #set2
$("#set2").hide();
//hide #set3
$("#set3").hide();

//if #set1 next clicked
//show #set2
$("#nextOne").click(function(){
	$("#set1").hide();
	$("#set2").show();
});
//if #set2 next clicked
//show #set3
$("#nextTwo").click(function(){
	$("#set2").hide();
	$("#set3").show();
});

$("#fieldNumber1").click(function(){
	$("#set2").hide();
	$("#set3").hide();
	$("#set1").toggle();
});

$("#fieldNumber2").click(function(){
	$("#set1").hide();
	$("#set3").hide();
	$("#set2").toggle();
});

$("#fieldNumber3").click(function(){
	$("#set1").hide();
	$("#set2").hide();
	$("#set3").toggle();
});

//auto fill billing address
//create checkbox if delivery clicked
//if same as billing address checked 
$("#sameAddress").click(function(){
	//select #firstName
	var firstName = $("#firstName").val();
	//insert into #billingFName
	$("#billingFName").val(firstName);
	//select #lastName
	var lastName = $("#lastName").val();
	//insert #into billingLName
	$("#billingLName").val(lastName);
	//select #deliveryStreet
	var street = $("#deliveryStreet").val();
	//insert into #billingStreet
	$("#billingStreet").val(street);
	//select #deliveryCity
	var city = $("#deliveryCity").val();
	//insert into #billingCity
	$("#billingCity").val(city);
	//select #deliveryState
	var state = $("#deliveryState").val();
	//insert into #billingState
	$("#billingState").val(state);
	//select #deliveryZip
	var zip = $("#deliveryZip").val();
	//insert into #billingZip
	$("#billingZip").val(zip);
	//select #deliveryCountry
	var country = $("#deliveryCountry").val();
	//insert into #billingCountry
	$("#billingCountry").val(country);
});
	
//hide #pickupTime
$(".pickupTime").hide();
//hide #deliveryTime
$(".deliveryTime").hide();
//hide #deliveryAddress
$(".deliveryAddress").hide();
//if #pickup selected 
$("#pickup").click(function(){
	$(".deliveryTime").hide();
	$(".deliveryAddress").hide();
	//show #pickup
	$(".pickupTime").show();
	orderTimes("pickup");
});
//if #delivery selected 
$("#delivery").click(function(){
	$(".pickupTime").hide();
	//show #delivery
	$(".deliveryTime").show();
	//show #deliveryAddress
	$(".deliveryAddress").show();
	orderTimes("delivery");
});

