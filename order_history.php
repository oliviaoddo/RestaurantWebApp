 <?php 
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
?>
<?php

include "connect_to_mysql.php";
//$date = date("Y-m-d h:i:sa");
$date = date('Y-m-d');
if (isset($_POST['history_span'])){
	$history = $_POST['history_span'];
	if ($history == "today"){
		echo 'today?</br>';
	} else if ($history == "week"){
		$date = date('Y-m-d', strtotime('-7 days'));
		echo 'week?</br>';
	} else if ($history == "month"){
		$date = date('Y-m-d', strtotime('-30 days'));
		echo 'month?</br>';
	} else {
		$date = date('Y-m-d', strtotime('-365 days'));
		echo 'year?</br>';
	}
}
		echo '<form action = "order_history.php" method = "post"><table border = "5">
		<tr><td align="center" colspan="4">Viewing orders from:
		<select id = "history_span" name = "history_span">
            <option value = "today">Today</option>
            <option value = "week">Past week</option>
            <option value = "month">Past month</option>
            <option value = "year">Past year</option>
          </select>
		  <button type = "submit" id="searchDate">Search</button></td></tr>
		<tr>
			<td>OrderNumber</td>
			<td>Customer Name</td>
			<td>Customer Phone</td>
			<td>Customer Email</td>
		</tr>';
		$sqlHistory = "SELECT * from ORDERS";
		$resultHist = mysqli_query($link, $sqlHistory);
		while($row=mysqli_fetch_assoc($resultHist)){
		echo 
		'<tr>
		<td>'.$row["user_id"].'</td>
		<td>'.$row["order_date"].'</td>
		<td>'.$row["instruction"].'</td>
		<td>'.$row["order_type"].'</td>
		</tr>';
		}
		echo '</table>
		</form>';
?>
	
	

        
<?php 
	if (isset($_SESSION["manager"])) {
		include_once("footerAdmin.php");
	}
	else {
		include_once("footer.php");
	}
?>