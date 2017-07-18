<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
$aid=$_GET['title'];
$sql=mysqli_query($db,"select * from give where qes_id=$aid");
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
	$a=$row['ans_id'];
	$sql=mysqli_query($db,"delete from answers where ans_id=$a");

}
$sql=mysqli_query($db,"delete from questions where qes_id=$aid");
$sql=mysqli_query($db,"delete from ask where qes_id=$aid");
$sql=mysqli_query($db,"delete from give where qes_id=$aid");
$sql=mysqli_query($db,"delete from comment where qes_id=$aid");

 header("location: profile.php");

?>