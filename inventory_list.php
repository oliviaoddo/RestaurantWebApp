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

<?php 
//Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Delete Item Question to Admin, and Delete Product if they choose
if (isset($_GET['deleteid'])) {
  echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
  exit();
}
if (isset($_GET['yesdelete'])) {
  // remove item from system and delete its picture
  // delete from database
  $id_to_delete = $_GET['yesdelete'];
  $sql = mysqli_query($link, "DELETE FROM products WHERE id='$id_to_delete' LIMIT 1") or die (mysqli_error());
  // unlink the image from server
  // Remove The Pic -------------------------------------------
    $pictodelete = ("../inventory_images/$id_to_delete.jpg");
    if (file_exists($pictodelete)) {
              unlink($pictodelete);
    }
  header("location: inventory_list.php"); 
    exit();
}
?>
<?php
//Parse the form data and add inventory item to the system 
if(isset($_POST['product_name'])){

  $product_name = mysqli_real_escape_string($link, $_POST['product_name']);
  $price = mysqli_real_escape_string($link, $_POST['price']);
  $category = mysqli_real_escape_string($link, $_POST['category']);
  $description = mysqli_real_escape_string($link, $_POST['description']);
  $protein = mysqli_real_escape_string($link, $_POST['protein']);
  $calories = mysqli_real_escape_string($link, $_POST['calories']);
  $carbs = mysqli_real_escape_string($link, $_POST['carbs']);
  $fat = mysqli_real_escape_string($link, $_POST['fat']);
  $sugar = mysqli_real_escape_string($link, $_POST['sugar']);

  //See if that product name is an identical match to another product in the system 
  $sql = mysqli_query($link, "SELECT id FROM products WHERE name = '$product_name' LIMIT 1");
  $productMatch = mysqli_num_rows($sql); //count the output amount
  if($productMatch > 0){
    echo 'Sorry you tried to place a duplicate "Product Name" into the system. <a href = "inventory_list.php">click here</a>';
    exit();
  }
  //Add this product into the database now 
  $sql = mysqli_query($link, "INSERT INTO products (name,price,description,category, protein, calories, carbs, fat, sugar, date_added)
      VALUES('$product_name', '$price', '$description','$category', '$protein', '$calories', '$carbs', '$fat', '$sugar', now())") or die (mysqli_error($link));
    $pid = mysqli_insert_id($link);
    //Place image in the folder 
  $newname = "$pid.jpg";
  move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
  header("location: inventory_list.php");
  exit();
}
?>

<?php
date_default_timezone_set('UTC');
//This block grabs the whole list for viewing 
$product_list = "";
$sql = mysqli_query($link, "SELECT * FROM products ORDER BY date_added DESC");
$productCount = mysqli_num_rows($sql); //count output amount
if($productCount > 0){
  while($row = mysqli_fetch_assoc($sql)){
    $id = $row["id"];
	//$_SESSION["product_ID"] = $id; //giving us 21 for some reason
    $name = $row["name"];
    $date_added = strftime("%b %d %Y", strtotime($row["date_added"]));
    //$product_list .= "$date_added-$id-$name &nbsp; &nbsp; &nbsp;<a href='inventory_edit.php?pid=$id'>edit</a>&bull;<a href='inventory_list.php?deleteid=$id'>delete</a><br>";
	//$product_list .= "$id-$name &nbsp; &nbsp; &nbsp;<a href='inventory_edit.php?pid=$id'>edit</a>&bull;<a href='inventory_list.php?deleteid=$id'>delete</a><br>";
$product_list .= "Product ID: $id - <strong>$name</strong> - <em>Added $date_added</em> &nbsp; &nbsp; &nbsp; <a href='inventory_edit.php?pid=$id'>edit</a> &bull; <a href='inventory_list.php?deleteid=$id'>delete</a><br />";  
  }
}else{
  $product_list = "You have no products listed in your store yet";
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
    <div align="right" style="margin-right:32px;"><a href="inventory_list.php#inventoryForm">+ Add New Inventory Item</a></div>
<div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
      <?php echo $product_list; ?>
    </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Add New Inventory Item Form &darr;
    </h3>
    <form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="product_name" type="text" id="product_name" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          $
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="category" id="category">
          <option value="Clothing">Clothing</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Description</td>
        <td><label>
          <textarea name="description" id="description" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Calories</td>
        <td><label>
          <textarea name="calories" id="calories" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Fat</td>
        <td><label>
          <textarea name="fat" id="fat" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Protein</td>
        <td><label>
          <textarea name="protein" id="protein" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Carbs</td>
        <td><label>
          <textarea name="carbs" id="carbs" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
            <tr>
        <td align="right">Sugar</td>
        <td><label>
          <textarea name="sugar" id="sugar" cols="64" rows="5"></textarea>
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
          <input type="submit" name="button" id="button" value="Add This Item Now" />
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