<?php
//create order class taking in cust info (custID,date,paymentType)
//currently dont see a point in making order have OOP, since its not interacting with anything
//and the order sql is created in this page, will implemnet if required
class order { 
	protected $custID; /* protected so only this class and children who extend has access to it*/
	protected $productID;
	protected $orderDate; //payment type
	protected $orderID; /* not going to be part of PK, so we can group/query order table rows by this ID */
	protected function __construct($cID,$pID){
		$this->custID = $cID;
		$this->productID = $pID;
	}
	public function getCID(){
		echo $this->custID;
	} 
	/*test commit*/
}
?>
<?php
/*script that does mysqli of checkout.php info into menu_db's customer/order/orderlines table
1) customer fills info in checkout.php ; insert customer into database, retrieve customer's auto inc ID through sub-query
such as, SELECT id from customers where name is X and phone is X and email is X (whatever attribute PK is identifying)
2) insert into orders table from step 4)review order, info comes from cart.php, insert into orderlines table
this part might require a loop to make sure you get each key->value (prodName or ID -> quantity)
*/
/**
 * These are the database login details
 */  
define("HOST", "127.0.0.1");     // The host you want to connect to.
define("USER", "guest");    // The database username. 
define("PASSWORD", "");    // The database password. 
define("DATABASE", "menu_DB");    // The database name.
date_default_timezone_set('US/Central');
session_start();
if (isset($_SESSION["customer"])) {
		include_once("navCustomer.php");
	}
	else if (isset($_SESSION["manager"])) {
		include_once("navAdmin.php");
	}
	else {
		include_once("nav.php");
	}
//Attempt to connect to database // test if require "connect_to_mysql.php"; will suffice post-project
$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error " . mysqli_error($link));

//1)retrieve info from checkout.php HTML forms
$fname = $_POST['user_firstName'];
$lname = $_POST['user_lastName'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$date = date("y-m-d");



//check if user is either a log-in customer or a guest
$subclassSQL = "";
$idForOrder = "";


	if (isset($_SESSION["customer"])) {
		echo "customer in sess, therefore a row in user/account shares a user_id</br>";
		$idForOrder = "SELECT * FROM accounts WHERE user_id = '$userID' LIMIT 1";	
	}
	else { //is guest
		echo "is a guest,creating new user and guest account</br>";
		$userSQL = "INSERT INTO users 
		VALUES('','$fname', '$lname', '$phone','$email')";
		if (mysqli_query($conn, $userSQL)) {
			echo "New user created successfully</br>";
		} else {
			echo "Error: " . $userSQL . "</br>" . mysqli_error($conn);
		}
		/*retrieve the user_id of new user using values the PK user_id represents*/
		$selectUserID = "SELECT * FROM USERS 
		WHERE fname ='$fname' and lname = '$lname' and phone = '$phone' and email = '$email'
		LIMIT 1";
		$resultUser = mysqli_query($conn, $selectUserID);
		if ($resultUser){
			$row = mysqli_fetch_assoc($resultUser);
			$userID = $row["user_id"];
			/*sql to create guest using user_id found*/
			$subclassSQL = "INSERT INTO GUEST 
				VALUES('','$userID')";
			if (mysqli_query($conn, $subclassSQL)) {
				echo "New guest created successfully";
				$idForOrder = "SELECT * FROM guest WHERE user_id = '$userID' LIMIT 1";
			} else {
				echo "Error: " . $subclassSQL . "</br>" . mysqli_error($conn);
			}
			echo 'found a matching user with user_id: '.$userID.'</br>';
		}
	}


	
	//MAKE SURE PERSON EXISTS IN DATABASE by counting rows
$resultOrder = mysqli_query($conn, $idForOrder);
if(mysqli_num_rows($resultOrder) > 0){
	$row = mysqli_fetch_assoc($resultOrder); // use $row[attribute] to retrieve data for order constructor
	$userID = $row["user_id"];
	echo $userID."</br>";
	$orderSQL = "INSERT INTO orders 
		VALUES('$userID','$date')";
		
		
		
	if (mysqli_query($conn, $orderSQL)) {
		echo "New order created successfully</br>";
	} 
	else {
		echo "Error: " . $orderSQL . "</br>" . mysqli_error($conn);
	}
	
	//check content of cart to produce Product ID for orderline rows
	foreach ($_SESSION["cart_array"] as $single_row){
		$i = 0; //used as an index for each key=>value pair in a row, we have 2 (1 for product id, 1 for quantity)
		$pid = "";
		$quantity = "";
		foreach ($single_row as $key => $value){
			if ($i == 0){
				$pid = $value;
			}
			if ($i == 1){
				$quantity = $value;
				//do orderline insert before loop to next row!, ensured pid was already assigned before quantity
				$orderlineSQL = "INSERT INTO orderline 
					VALUES('','$userID','$date', '$pid', $quantity)";
				if (mysqli_query($conn, $orderlineSQL)) {
					echo "New orderline created successfully</br>";
				} 
				else {
					echo "Error: " . $orderlineSQL . "</br>" . mysqli_error($conn);
				}
			}
			$i++;
		}
	}

}
else {
	 echo "0 results for resultOrder for userID:".$userID.'</br>';
}


$resultProduct = mysqli_query($conn, "SELECT * FROM products WHERE user_id = '$userID'");
if(mysqli_num_rows($resultOrder) > 0){

}
else {
	 echo "0 results for resultOrderline";
}
//footer if conditions
if (isset($_SESSION["manager"])) {
		include_once("footerAdmin.php");
	}
	else {
		include_once("footer.php");
	}
?>