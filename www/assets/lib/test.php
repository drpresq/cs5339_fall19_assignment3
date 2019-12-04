<?php
require_once 'connect.php';

if ($connection->ping()) {
    echo "Our connection is ok!<br><br>";
  } else {
      echo "Error: ".$conection->error;
  }

$query = "SELECT * FROM tusers WHERE 1";

$result = $connection->query($query);

foreach($result as $row){
    foreach($row as $key => $value){
        echo $key." = ".$value."<br>";
    }
    echo "<br>";
}

$connection->close();

?>

<html>
<body>
<script>

</script>
</body>
</html>