<?php
 include "connect_to_mysql.php";
 include "product_class.php";
 
 //get the id that was sent by the ajax request
 $id = $_GET['id'];
 
 //query the database
 $query = "SELECT * FROM products WHERE id = ";
 $query .= $id;
 
 $qry_result = mysqli_query($link, $query) or die(mysqli_error());
 
 $productCount = mysqli_num_rows($qry_result); // count the output amount
 
 if ($productCount > 0) {
     //get all the prouduct details from the query result
     while($row = $qry_result->fetch_assoc()){
 		$product_name = $row["name"];
 		$price = $row["price"];
 		$category = $row["category"];
 		$description = $row["description"];
 		$calories = $row["calories"];
		$fat = $row["fat"];
 		$sugar = $row["sugar"];
 		$protein = $row["protein"];
 		$carbs = $row["carbs"];
     }
 }
 
 	mysqli_close($link);
 	//create an array with the information and send it back to productPage.js in JSON format
 	$productArray = array(
 		'productId' => $id,
 		'productName' => $product_name, 
 		'productPrice' => $price, 
 		'productCategory' => $category, 
 		'productDesc' => $description, 
 		'productCalories' => $calories, 
 		'productFat' => $fat, 
 		'productSugar' => $sugar, 
 		'productProtein' => $protein, 
 		'productCarbs' => $carbs
 		);

 	echo json_encode($productArray);
 
 ?> 