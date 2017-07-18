<?php
error_reporting(0);
include'db.php';

    //get matched data from skills table
    $query = mysqli_query($db,"SELECT * FROM tags");
    while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
        echo "<option>",   $row['name'],"</option>";
    }
    
    //return json data
     
	
?>
