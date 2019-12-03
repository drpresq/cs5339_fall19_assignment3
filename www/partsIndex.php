<?php
//Session Start
session_start();
// Establish DB Connection
require_once 'assets/lib/connect.php';
require_once 'assets/lib/header.php';
$connection = new mysqli($db, $un, $pw, null);
if ($connection->connect_error) die("Fatal Error");
?>
<body style="text-align:center;">

<H1> Body </H1>

</body>
</html>