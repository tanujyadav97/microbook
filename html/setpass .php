<?php
include 'db.php';
session_start();
	
   $x=$_POST['password'];

    $pas = mysqli_escape_string($db,md5($x)); 
   echo $pas;
	$email=$_SESSION['mail'];
        $hash=$_SESSION['hash'];
		mysqli_query($db,"UPDATE user SET password='$pas' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
		mysqli_query($db,"UPDATE user SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    
?>