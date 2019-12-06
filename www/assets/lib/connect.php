<?php // connect.php
      // Change the username to your utep name prior to upload
  
	function get_connection(){
	  $realtest = false;
	  
	  if($realtest){
		$hn = 'cssrvlab01.utep.edu';
		$db = 'mysql';
		$un = 'gwwood';
		$pw = '*utep2020!';
	  
		$connection = new mysqli($hn, $un, $pw, null);
		if ($connection->connect_error) die("Fatal Error: ".$connection->connect_error);
	  
		$connection->select_db("gwwood_f19_db");
	  
	  } else {
		$hn = 'localhost';
		$db = 'test';
		$un = 'user';
		$pw = '*utep2020!';

		$connection = new mysqli($hn, $un, $pw, $db);
		if ($connection->connect_error) die("Fatal Error");

		return $connection;
	  }
	}
	
?>
