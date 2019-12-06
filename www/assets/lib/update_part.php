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
        return $result;
	} catch (\mysqli_sql_exception $ex) {
		throw $ex;
	} catch (Exception $e) {
		throw $e;
	}
}


?>
<div>
	<
</div>
