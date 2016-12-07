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

var standard = function (time){
	var hour = Math.trunc(time/60);
		if(hour > 12){
			hour = hour - 12;
			var timeOfDay = "PM";
		}
		else if(hour = 12) {
			var timeOfDay = "PM";
		}
		else{
			var timeOfDay = "AM";
		}
		var minutes = time%60;
		//convert to normal time 
		if(minutes == 0){
			var standardTime = hour + ":" + minutes + "0" + timeOfDay;
		}
		else {
			var standardTime = hour + ":" + minutes + timeOfDay;
		}

		return standardTime;
};

var addOptionTag = function(id, time){
	var selectItem = document.getElementById(id);
	var optionItem = document.createElement("option");
	optionItem.text = time;
	selectItem.add(optionItem);
};

var orderTimes = function(option){
	var current = currentTime();
	var closeTime = 1260;
	var openTime = 540;
	if(current > closeTime){
		current = openTime;
	}
	//if delivery selected
	if (option === "delivery"){
		//add 1 hour to time 
		current = current + 60;
		//create option element in delivery select time
		var standardTime = standard(current);
		//create <option> element in delivery <select> time 
		addOptionTag("deliveryTime", standardTime);
		//loop
			while (current < closeTime){
				//add 15 minutes until closing
				current = current + 15;
				//convert to military time
				var standardTime = standard(current);
				//create <option> element in delivery <select> time 
				addOptionTag("deliveryTime", standardTime);
			}
			//remove required from pickup incase user switches back and forth
			//add attribute of delivery time required
			//add required attribute to delivery street, city, state, zip, country 
		document.getElementById('deliveryStreet').required = true;
		document.getElementById('deliveryCity').required = true;
		document.getElementById('deliveryState').required = true;
		document.getElementById('deliveryZip').required = true;
		document.getElementById('deliveryCountry').required = true;
			
		}
	//if pick up selected 
	if (option === "pickup"){
		//add 15 minutes to time 
		current = current + 15;
		//create <option> element in pickup <select> time
		var standardTime = standard(current);
		addOptionTag("pickupTime", standardTime);
		//loop
			while (current < closeTime){
				//add 15 minutes until closing
				current = current + 15;
				//convert to military time
				var standardTime = standard(current);
				//create <option> element in pickup <select> time 
				addOptionTag("pickupTime", standardTime);
			}
		$('#errorDelZip').prev().hide();
		$('#errorDelSta').prev().hide();
		$('#errorDelCoun').prev().hide();
		$('#errorDelCit').prev().hide();
		$('#errorDelSt').prev().hide();
		document.getElementById('deliveryStreet').required = false;
		document.getElementById('deliveryCity').required = false;
		document.getElementById('deliveryState').required = false;
		document.getElementById('deliveryZip').required = false;
		document.getElementById('deliveryCountry').required = false;

		}

};

//hide #set2
$("#set2").hide();
//hide #set3
$("#set3").hide();
//hide #set4
$("#set4").hide();

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

//if #set3 next clicked
//show #set4
$("#nextThree").click(function(){
	$("#set3").hide();
	$("#set4").show();
});

$("#fieldNumber1").click(function(){
	$("#set2").hide();
	$("#set3").hide();
	$("#set4").hide();
	$("#set1").toggle();
});

$("#fieldNumber2").click(function(){
	$("#set1").hide();
	$("#set3").hide();
	$("#set4").hide();
	$("#set2").toggle();
});

$("#fieldNumber3").click(function(){
	$("#set1").hide();
	$("#set2").hide();
	$("#set4").hide();
	$("#set3").toggle();
});

$("#fieldNumber4").click(function(){
	$("#set1").hide();
	$("#set2").hide();
	$("#set3").hide();
	$("#set4").toggle();
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

