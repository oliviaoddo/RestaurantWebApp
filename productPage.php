<?php
include "connect_to_mysql.php";
include "product_class.php";

//$id = $_GET['id'];
$id = 1;

$query = "SELECT * FROM products WHERE id = ";
$query .= $id;

$qry_result = mysqli_query($link, $query) or die(mysqli_error());

$productCount = mysqli_num_rows($qry_result); // count the output amount

if ($productCount > 0) {
    //get all the prouduct details 
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

	$productArray = array(
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