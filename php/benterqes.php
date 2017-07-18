<?php
include 'db.php';
$register=$_POST['submit'];
$questiontitle=$_POST['title'];
$questiondes=$_POST['des'];
$tags=$_POST['tagss'];
session_start();
	if($register==true){
		if($questiontitle==true){
			if($questiondes==true){
				$insert=mysqli_query($db,"INSERT INTO questions values(null,'$questiontitle','$questiondes','$tags',0,0)");
			
  $user= $_SESSION['login'];

  $sql1="SELECT user_id FROM user WHERE username='$user'";
  $result1=mysqli_query($db,$sql1);
  $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
  $sql = "SELECT qes_id FROM questions WHERE qes_title ='$questiontitle' and qes = '$questiondes' ";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $id1= $row1['user_id'];
  $id2=$row['qes_id'];
  $date=date("Y-m-d");

  $insertinask=mysqli_query($db,"INSERT INTO ask values('$id1','$id2','$date')");
 
     mysqli_select_db($db,"webdata") or die("Couldn't find database"); 
                  header ("Location:../html/main.php");
			}
		}
	};
	
?>