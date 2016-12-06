<?php
	include "connect_to_mysql.php";
	include "product_class.php";

	//get the selected filters from the user, sent in the filter.js ajax request using get
	$calories = $_GET['calories'];
	$sugar = $_GET['sugar'];
	$protein = $_GET['protein'];
	$fat = $_GET['fat'];
	$carbs = $_GET['carbs'];
	$price = $_GET['price'];
	$displayAll = $_GET['displayAll'];

	//creates query to display all of the products
	if ($displayAll == true){
		$query = "SELECT * FROM products";
	} else {
		//build query for filters with selected options sent in query string
		$query = "SELECT * FROM products ";
		$query .= "WHERE calories <= '" . $calories . "' ";
		$query .= "AND sugar <= '" . $sugar . "' ";
		$query .= "AND protein <= '" . $protein . "' ";
		$query .= "AND fat <= '" . $fat . "' ";
		$query .= "AND carbs <= '" . $carbs . "' ";
		$query .= "AND price <= '" . $price . "'";
	}	

	//queries the database
	$qry_result = mysqli_query($link, $query) or die(mysqli_error());

	//counts the number of results
	$rowCount = mysqli_num_rows($qry_result); // count the output amount
	//if there were results
	if ($rowCount > 0) {
		//builds the reponse text with products that matched the filters 
		while ($row = $qry_result->fetch_assoc()) {
	       $product = new Product($row["id"],$row["name"],$row["price"]);
	       $display_string .= '<div class="col-md-4">';
	       $display_string .=  '<a href="productNew.php?id=' . $product->getid() . '"><img src="inventory_images/'
	        . $product->getid() . '.png" alt="' . $product->getname() . '" width="200" height="100" border="1" /><br></a>'. $product->getname() . '<br /> $' . $product->getprice() . '<br /> <a class = "viewProduct" href="productNew.php?id=' . $product->getid() . '"><button name = "View Product Details" type = "button" id = "productId" value = '.$product->getid().'>View Product</button></a><br /> </div>';
	    }
	   } else {//if there were no results with their filter selections
	    	$display_string = "<h5>We are sorry. None of our products match your search.</h5>";
	   }
	 
	//response text for the filter.js ajax request 
	echo $display_string;
?>