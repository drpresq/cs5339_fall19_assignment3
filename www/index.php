<?php
// Establish DB Connection
require_once 'assets/lib/header.php';
require_once 'assets/lib/searchbar.php';

//Functions

function executeQuery($query){
    require_once 'assets/lib/connect.php';
    if ($_SESSION['Admin']){
        searchAdmin($query);
    }
    elseif ($_SESSION['Authenticated']){
        searchAuth($query);
    }
    else{
        searchGuest($query);
    }
}

function searchGuest($query){
    
    $result = $connection->query($query);

    if($result && $result->num_rows > 0){
        $result->fetch_all(MYSQLI_ASSOC);
    
        foreach($result as $row){
            echo $row; 
        }

    }else {
        echo "No Results Found.";
    }
}

foreach($_SESSION as $key => $value){
    echo $key." = ".$value."<br>";
}

require_once 'assets/lib/footer.php'; 
?>