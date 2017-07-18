<?php
 $hostname="mysql.hostinger.in";
$mysqlusername="u327167397_app";
$mysqlpassword="mohit!";
$databasename = "u327167397_app";
 $err="";
   session_start();
  $db = mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename);
  $name=$_POST['name'];
  $des=$_POST['des'];
  $sql=mysqli_query($db,"insert into Data values('$name','$des')");
?>