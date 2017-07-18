<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
$aid=$_GET['title'];
$sql=mysqli_query($db,"delete from answers where ans_id=$aid");
$sql=mysqli_query($db,"delete from give where ans_id=$aid");
$sql=mysqli_query($db,"delete from comment where ans_id=$aid");

 header("location: profile.php");

?>