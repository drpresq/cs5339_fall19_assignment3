<?php // Register.php
      // Add a new user to the Database
//Session Start
session_start();
// Establish DB Connection
require_once 'connect.php';
require_once 'header.php';

if($_POST['csrf_token'] === session_id()){
    if(isset($_POST['username']) && isset($_POST['password'])){

        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $emailaddress = mysqli_real_escape_string($connection, $_POST['email']);

        $query = "INSERT INTO `tusers`(`Username`, `UPassword`, `EmailAddress`) VALUES ('".$username."','".$password."','".$emailaddress."')"; 
        $result = $connection->query($query);

        if($result && $result->num_rows > 0){
            $result->fetch_all(MYSQLI_ASSOC);
        
            foreach($result as $row){
                echo $row; 
            }

            $connection->close();
            header('location: http://'.$_SERVER['HTTP_HOST'].'/index.php');
        }else {
            echo $connection->error;
        } 

    }
}
?>

<script>
    function validateForm() {
        var uname = document.forms["myForm"]["username"].value;
        var psw = document.forms["myForm"]["password"].value;
        var email = document.forms["myForm"]["email"].value;
        
        // Check if fields blank
        if ((uname == "") || (psw == "") || (email == "")) {
            alert("All fields must be filled out");
            return false;
        }

        // Check if email utep.edu
        if (!(/.*\.utep\.edu$/.test(email))){
            alert("Email must be a utep address");
            return false;
        }

        return true;
    } 
</script>
<form name="myForm" action="register.php" onsubmit="return validateForm()" method="post">
Username: <input type="text" name="username">
Password: <input type="password" name="password">
Email:    <input type="text" name="email">
<input type="hidden" name="csrf_token" value="<?$_COOKIE['PHPSESSID'];?>">
<input type="submit" value="Register">
</form> 

<? require_once 'footer.php'; ?>