<?php // Logout.php
      // Wipes out the user's session
    session_start();
    
    $_SESSION['Authenticated'] = false;
    $_SESSION['SessionExp'] = time() - 1; //Set Expiration for 1 second ago

    header('location: http://'.$_SERVER['HTTP_HOST'].'/index.php')

?>