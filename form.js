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
$("#sameAddress").click(function(){
	var firstName = $("#firstName").val();
	$("#billingFName").val(firstName);
	var lastName = $("#lastName").val();
	$("#billingLName").val(lastName);
	var street = $("#deliveryStreet").val();
	$("#billingStreet").val(street);
	var city = $("#deliveryCity").val();
	$("#billingCity").val(city);
	var state = $("#deliveryState").val();
	$("#billingState").val(state);
	var zip = $("#deliveryZip").val();
	$("#billingZip").val(zip);
	var country = $("#deliveryCountry").val();
	$("#billingCountry").val(country);
});
//if same as billing address checked 
	//select #firstName
	//insert into #billingFName
	//select #lastName
	//insert #into billingLName
	//select #deliveryStreet
	//insert into #billingStreet
	//select #deliveryCity
	//insert into #billingCity
	//select #deliveryState
	//insert into #billingState
	//select #deliveryZip
	//insert into #billingZip
	//select #deliveryCountry
	//insert into #billingCountry	
	
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
});
//if #delivery selected 
$("#delivery").click(function(){
	$(".pickupTime").hide();
	//show #delivery
	$(".deliveryTime").show();
	//show #deliveryAddress
	$(".deliveryAddress").show();
});

