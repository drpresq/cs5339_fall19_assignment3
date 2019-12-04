<?php 
session_start();
require_once('connect.php');

// Login 
if ($_POST['csrf_token'] === session_id()){

    if (isset($_POST['uname']) && isset($_POST['psw'])){
        
        (isset($_POST['remember']))?($_SESSION['RemeberMe'] = true):($_SESSION['RememberMe'] = false);

        $username = mysqli_real_escape_string($connection, $_POST['uname']);
        $password = $_POST['psw'];
        
        if (!$connection->error) {

            $query = "SELECT * FROM `tusers` WHERE `Username`='$username'";
            $results = $connection->query($query);

            if($results && $results->num_rows > 0){
                $results->fetch_all(MYSQLI_ASSOC);
            
                foreach($results as $row){
                    $hash = $row["UPassword"];
                }

            }else {
                echo $connection->error;
            } 

            if ( password_verify($password, $hash) ) {
                $_SESSION['Authenticated'] = True;
                
                if ($_SESSION['RememberMe']){
                    $_SESSION['SessionExp'] = time() + 604800; //Expire a week from right now
                }
                $_SESSION['SessionExp'] = time() + 3600; //Expire an hour from right now

            }else {
                $_SESSION['ServerMessage'] = "Incorrect Username or Password";
            }
        }
    }else {
        echo $connection->error;
        $_SESSION['ServerMessage'] = "No username or password";
    }
}

$connection->close();
header('location: http://'.$_SERVER['HTTP_HOST'].'/index.php');
?>