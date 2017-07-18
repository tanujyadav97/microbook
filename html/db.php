<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
mysqli_select_db($db,"webdata") or die("Couldn't find database");

?>