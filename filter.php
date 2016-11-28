<?php
	include "connect_to_mysql.php";
	include "product_class.php";

	//get data from query string
	$calories = $_GET['calories'];
	$sugar = $_GET['sugar'];
	$protein = $_GET['protein'];
	$fat = $_GET['fat'];
	$carbs = $_GET['carbs'];
	$price = $_GET['price'];
	$displayAll = $_GET['displayAll'];

	if ($displayAll == true){
		$query = "SELECT * FROM products";
	} else {
		//build query for filters
		$query = "SELECT * FROM products ";
		$query .= "WHERE calories <= '" . $calories . "' ";
		$query .= "AND sugar <= '" . $sugar . "' ";
		$query .= "AND protein <= '" . $protein . "' ";
		$query .= "AND fat <= '" . $fat . "' ";
		$query .= "AND carbs <= '" . $carbs . "' ";
		$query .= "AND price <= '" . $price . "'";
	}	

	$qry_result = mysqli_query($link, $query) or die(mysqli_error());

	$rowCount = mysqli_num_rows($qry_result); // count the output amount

	if ($rowCount > 0) {

		while ($row = $qry_result->fetch_assoc()) {
	       $product = new Product($row["id"],$row["name"],$row["price"]);
	       $display_string .= '<div class="col-md-4">';
	       $display_string .=  '<a href="productNew.php?id=' . $product->getid() . '"><img src="inventory_images/'
	        . $product->getid() . '.png" alt="' . $product->getname() . '" width="200" height="100" border="1" /><br></a>'. $product->getname() . '<br /> $' . $product->getprice() . '<br /> <a href="productNew.php?id=' . $product->getid() . '"><button name = "View Product Details" type = "button" id = "productId" value = '.$product->getid().'></button></a><br /> </div>';
	    }
	   } else {
	    	$display_string = "<h5>We are sorry. None of our products match your search.</h5>";
	   }
	 

	echo $display_string;
?>