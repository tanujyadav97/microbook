<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
session_start();
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");

$user= $_SESSION['login'];
$ans=$_POST['uqes'];
$aid=$_POST['enter'];
$sql=mysqli_query($db,"update questions set qes='$ans' where qes_id=$aid");
header("location:profile.php");

 ?>
