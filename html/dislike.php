<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
session_start();
$user=$_SESSION['login'];
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
$qt=$_GET['title'];

$sql2=mysqli_query($db,"select * from user where username='$user'");
$rw=mysqli_fetch_array($sql2,MYSQLI_ASSOC);
$x=$rw['user_id'];

$sql5=mysqli_query($db,"SELECT * FROM votes WHERE user_id=$x and qes_id=$qt LIMIT 1");
$num_rows = mysqli_num_rows($sql5);
$row=mysqli_fetch_array($sql5,MYSQLI_ASSOC);
$d=$row['dislike'];
if ($num_rows > 0) {
	if($d==0)
	{
		$sql=mysqli_query($db,"update votes set dislike=1 where qes_id='$qt'and user_id=$x");
		

	}
	else{
$sql=mysqli_query($db,"update votes set dislike=0 where qes_id='$qt'and user_id=$x");
	echo "NO";}

}
else {
 $sql2=mysqli_query($db,"insert into votes values('$x','$qt',0,0)");

$sql=mysqli_query($db,"update votes set dislike=1 where qes_id='$qt' and user_id=$x");
echo "yes";
}

header("Location:main.php");
 

?>