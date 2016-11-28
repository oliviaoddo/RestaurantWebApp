<?php 
session_start();
if(!isset($_SESSION["manager"])){
	header("location: admin_login.php");
	exit();
}

//Be sure to check this manager SESSION value is in fact in the database 
$manager = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["manager"]); //filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["password"]);
//Run mySQL query to be sure that this person is an admin and that their password session var equals the database information 
//Connect to the MySQL database 
include "connect_to_mysql.php";
$sql = mysqli_query($link, "SELECT * FROM admins WHERE username='$manager' AND password = '$password' LIMIT 1"); //query the person 
//MAKE SURE PERSON EXISTS IN DATABASE
$existCount = mysqli_num_rows($sql); //count the row nums 
if($existCount == 0){// evaluate the count 
	echo "Your login session data is not on record in the databse";
	exit();

}

?>

<?php //Script Error Reporting

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
//Parse the form data and add inventory item to the system 
if(isset($_POST['product_name'])){

  //$pid = mysqli_real_escape_string($link, $_POST['thisID']);
  $pid = $_SESSION["product_ID"];
  $product_name = mysqli_real_escape_string($link, $_POST['product_name']);
  $price = mysqli_real_escape_string($link, $_POST['price']);
  $category = mysqli_real_escape_string($link, $_POST['category']);
  $calories = mysqli_real_escape_string($link, $_POST['calories']);
  $description = mysqli_real_escape_string($link, $_POST['description']);
  $protein = mysqli_real_escape_string($link, $_POST['protein']);
  $calories = mysqli_real_escape_string($link, $_POST['calories']);
  $carbs = mysqli_real_escape_string($link, $_POST['carbs']);
  $fat = mysqli_real_escape_string($link, $_POST['fat']);
  $sugar = mysqli_real_escape_string($link, $_POST['sugar']);
  echo $pid.'</br>';
  
  //See if that product name is an identical match to another product in the system 
  //$updateSql =  "UPDATE products SET name = '$product_name', price = '$price', description = '$description', category = '$category', protien = '$protien', calories = '$calories', carbs = '$carbs', fat = '$fat', sugar = '$sugar' WHERE id = '$pid'";
  $updateSql = "UPDATE products SET name = '$product_name' WHERE id = '$pid'";
  if (mysqli_query($link,$updateSql)){
	  echo 'sql worked</br>';
  }
  else {
	  echo 'didnt work</br>';
  }
  echo $product_name.$pid;
  //$sql = mysqli_query($link, "UPDATE products SET name = '$product_name', price = '$price',  category = '$category' WHERE id = '$pid'");
  if ($_FILES['fileField']['tmp_name'] != "") {
      // Place image in the folder 
      $newname = "$pid.jpg";
      move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
  }
  header("location: inventory_list.php"); 
    exit();
	
}

?>
<?php
date_default_timezone_set('UTC');
//Gather this product's full information for inserting automatically into the edit form below 
if(isset($_SESSION["product_ID"])){
  $targetID = $_SESSION["product_ID"];
  echo $targetID;
  $sql = mysqli_query($link, "SELECT * FROM products WHERE id = '$targetID' LIMIT 1");
  $productCount = mysqli_num_rows($sql); //count output amount
	if($productCount > 0){
		while($row = mysqli_fetch_array($sql)){
			$pid = $row["id"];
			$product_name = $row["name"];
			$price = $row["price"];
			$category = $row["category"];
			$description = $row["description"];
			$calories = $row["calories"];
			$fat = $row["fat"];
			$sugar = $row["sugar"];
			$protein = $row["protein"];
			$carbs = $row["carbs"];
			$date_added = strftime("%b %d %Y", strtotime($row["date_added"]));
			//$product_list .= "$date_added-$pid-$product_name &nbsp; &nbsp; &nbsp;<a href='inventory_edit.php?pid=$pid'>edit</a>&bull;<a href='#'>delete</a><br>";
		}
	}else{
		echo "Does not exist";
		//exit();
	}

}
else {
	echo 'not set get PID</br>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory List</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php 
  if (isset($_SESSION["customer"])) {
		include_once("navCustomer.php");
	}
	else if (isset($_SESSION["manager"])) {
		include_once("navAdmin.php");
	}
	else {
		include_once("nav.php");
	}
	?>
  <div id="pageContent"><br />
    <div align = "right" style = "margin-right:32px;"><a href = "inventory_list.php#inventoryForm">+ Add New Inventory Item</a></div>
    <div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
       <?php 
        //echo $product_list;
        ?>
    </div>
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>Edit Inventory Item Form</h3>
     <form action="inventory_edit.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="product_name" type="text" id="product_name" size="64" value="<?php echo $product_name; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          $
          <input name="price" type="text" id="price" size="12" value="<?php echo $price; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="category" id="category">
          <option value="Entree">Entree</option>
		  <option value="Appetizer">Appetizer</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td align="right">Calories</td>
        <td><label>
          <textarea name="calories" id="calories" cols="64" rows="5" ><?php echo $calories; ?></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Fat</td>
        <td><label>
          <textarea name="fat" id="fat" cols="64" rows="5" ><?php echo $fat; ?></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Protien</td>
        <td><label>
          <textarea name="protein" id="protein" cols="64" rows="5" ><?php echo $protein; ?></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Carbs</td>
        <td><label>
          <textarea name="carbs" id="carbs" cols="64" rows="5" ><?php echo $carbs; ?></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Sugar</td>
        <td><label>
          <textarea name="sugar" id="sugar" cols="64" rows="5"> <?php echo $sugar; ?></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Details</td>
        <td><label>
          <textarea name="description" id="description" cols="64" rows="5" ><?php echo $description; ?></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="file" name="fileField" id="fileField" />
        </label></td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
          <input type="submit" name="button" id="button" value="Make Changes" />
        </label></td>
      </tr>
    </table>
    </form>
    <br />
  <br />
  </div>
  <?php 
  if (isset($_SESSION["manager"])) {
		include_once("footerAdmin.php");
	}
	else {
		include_once("footer.php");
	}
  ?>
</div>
</body>
</html>

