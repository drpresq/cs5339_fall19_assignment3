<?php
// Establish DB Connection
require_once 'assets/lib/header.php';
require_once 'assets/lib/searchbar.php';


/**
 * Ernesto's implementation
 * 
 * */

// Session implementation
if (isset($_POST["search"])) {
	if (!isset($_POST["session_id"])) {
		$result = search("", "guest");
	} 
	$id = filter_input(INPUT_POST, "session_id");
	if ($id != session_id()){
		$result = search("", "guest");
	} else{
		$search_input = (string)filter_input(INPUT_POST, "search");
		if (isset($_SESSION["user_type"])) {
			$user_type = $_SESSION["user_type"];
			if ($user_type == "user"){
				$result = search($search_input, "user");
			} else if ($user_type == "admin") {
				$result = search($search_input, "admin");
			} else {
				$result = search($search_input, "guest");
			}	
		} else {
			$result = search($search_input, "guest");
		}
	}
} else {
	$result = search("", "guest");
}

/*

Guest
PartName, PartNumber, Suppliers, Category, Description01 

User
PartName, PartNumber, Suppliers, Category, Description01, Price

Admin 
* 
PartID, PartName, PartNumber, Suppliers, Category, Description01, 
Description02, Description03, Description04, Description05, Description06, 
Price, Estimated Shipping Cost, Associated image filename1, Associated image filename2, 
Associated image filename3, Associated image filename4, Notes, Shipping Weight
 * */

function search($keyword, $user_type){
	$host = 'localhost';
    $db = 'test';
    $usr = 'user';
    $pw = '*utep2020!';

    $connection = new mysqli($host, $usr, $pw, $db);
    if ($connection->connect_error) die("Fatal Error");
	
	$result = null;
	$columns = "PartName, PartNumber, Suppliers, Category, Description01"; 
	if ($user_type == "user") {
		$columns = "PPartName, PartNumber, Suppliers, Category, Description01, Price";
	} else if ($user_type == "admin") {
		$columns = "*";
	}
	try {
		$stmt = $connection->prepare("select $columns from carparts where PartName like ? ");
		$stmt->bind_param("s", $keyword);
		$stmt->execute();
		$stmt->bind_result($cnt);
		while($stmt->fetch()) {
			$result = $cnt;
		}
		@mysqli_close($connection);
		return $result;
	} catch (\mysqli_sql_exception $ex) {
		throw $ex;
	} catch (Exception $e) {
		throw $e;
	}
}

function print_table ($query_result, $user_type) {
	if ($query_result == NULL || count($query_result) < 1 ) {
		echo "<p>Sorry, no results found!</p>";
		return;
	} 
	echo "<table>";
	if ($user_type == "user") {
		echo "<tr><th>PartName</th><th>PartNumber</th><th>Suppliers</th>"
			."<th>Category</th><th>Description</th></tr>";
		foreach ($query_result as $row) {
			echo "<tr>";
			foreach ($row as $column_data) {
				echo "<td>$column_data</td>";
			}
			echo "</tr>";
		}
	} else if ($user_type == "admin") {
		echo "<tr><th>PartName</th><th>PartNumber</th><th>Suppliers</th>"
			."<th>Category</th><th>Description</th><th>Price</th></tr>";
		foreach ($query_result as $row) {
			echo "<tr>";
			foreach ($row as $column_data) {
				echo "<td>$column_data</td>";
			}
			echo "</tr>";
		}
	} else {
		echo "<tr><th>PartID</th><th>PartName</th><th>PartNumber</th><th>Suppliers</th>"
			."<th>Category</th><th>Description01</th><th>Description02</th><th>Description03</th>"
			."<th>Description04</th><th>Description05</th><th>Description06</th><th>Price</th>"
			."<th>Estimated Shipping Cost</th><th>Associated image filename1</th><th>Associated image filename2</th>" 
			."<th>Associated image filename3</th><th>Associated image filename4</th><th>Notes</th>"
			."<th>Shipping Weight</th></tr>";
		foreach ($query_result as $row) {
			echo "<tr>";
			foreach ($row as $column_data) {
				echo "<td>$column_data</td>";
			}
			echo "</tr>";
		}
	}
	echo "</table>";
}

foreach($_SESSION as $key => $value){
    echo $key." = ".$value."<br>";
}

require_once 'assets/lib/footer.php'; 
?>
