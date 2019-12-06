<?php // Register.php
      // Add a new user to the Database
//Session Start
session_start();
// Establish DB Connection
require_once 'connect.php';
require_once 'header.php';

function get_part_data($partid) {
	$connection = get_connection();
    if ($connection->connect_error) die("Fatal Error");
	$result = array();
	try {
		$stmt = $connection->prepare("call sp_get_part( ? )");
		$stmt->bind_param("i", $partid);
		$stmt->execute();
		$result_arr = $stmt->get_result();
        while($row = $result_arr->fetch_assoc()) {
			$result[] = $row;
		}
		@mysqli_close($connection);
		return $result;
	} catch (\mysqli_sql_exception $ex) {
		throw $ex;
	} catch (Exception $e) {
		throw $e;
	}
}
/*
Admin 
* 
PartID, PartName, PartNumber, Suppliers, Category, Description01, 
Description02, Description03, Description04, Description05, Description06, 
Price, Estimated Shipping Cost, Associated image filename1, Associated image filename2, 
Associated image filename3, Associated image filename4, Notes, Shipping Weight
 * */

if (!isset($_POST["partid"])) {
	echo "Please provide Part Id";
	return;
}

$partid = (int) (string)filter_input(INPUT_POST, "partid");
$parts = get_part_data($partid);

if ($parts != NULL) {
	echo "<table>";
	echo "<tr><th>Field</th><th>Value</th></tr>";
	echo "<form action='update_part.php' method='post'>";
	foreach ($parts[0] as $field => $value) {
		echo "<tr>";
		echo "<td>$field</td>";
		echo "<td><input type='text' name='$field' value='$value' /></td>";
		echo "</tr>";
	}
	echo "<tr><td>input type='hidden' value='' /></td></tr>";
	echo "<tr><td><input type='submit' value='Update!' /></td></tr>";
	echo "</form>";
	echo "</table>";
} else {
	echo "Error Retrieving Car Parts data.";
}

?>

