<?php //Header.php
      //Constructs Standard Page Header  

session_start();


//Render the html header
echo <<< _END
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<table>
    <tr style="text-align:center;">
    <td width=90%>
        <H1> Parts System </H1>
    </td>
    <td width=10% style="text-aligh:right;">
_END;

if ($_SESSION['Authenticated'] === true) {
    echo "<button onclick=\"assets/lib/logout.php\" style=\"width:auto;\">Logout</button>";
}else{
    echo "<button onclick=\"document.getElementById('id01').style.display='block'\" style=\"width:auto;\">Login</button>";
}

echo <<< _END
    <div id="id01" class="modal">
      
      <form class="modal-content animate" action="assets/lib/login.php" method="post">

        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>
    
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
            
          <button type="submit">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>
    
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="reg"><a href="#">Register</a></span>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </form>
    </div>
    
    <script>
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>    
    <td>
    </tr>
</table>
</head>
_END;

?>