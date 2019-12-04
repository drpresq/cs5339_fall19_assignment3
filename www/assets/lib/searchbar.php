<?php //Searchbar.php
      //Displays the searchbar

session_start();

echo <<<_END
    
    <form action="partsIndex.php" method="POST">
    <input type="text" name="search">
    <center><input type="submit" value="Search"></center>
_END;
    echo '<input type="hidden" value="'.$_COOKIE['PHPSESSID'].'">';
echo <<<_END
    </form>
    
</td>
</tr>
<tr>
<td>
_END;

?>