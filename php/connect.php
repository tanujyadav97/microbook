<?php
include 'db.php';
$name=$_POST['name'];

$username=$_POST['username'];
$email=$_POST['email'];
$hash = md5( rand(0,1000) ); 
$password=rand(1000,5000);
$register=$_POST['register'];
	

echo $name.$username.$email.$hash." ".$password ;
       
		 
				
				
				
mysqli_query($db,"INSERT INTO user (name,username,password,email,hash) VALUES(
'". mysqli_escape_string($db,$name) ."', 
'". mysqli_escape_string($db,$username) ."', 
'". mysqli_escape_string($db,md5($password)) ."', 
'". mysqli_escape_string($db,$email) ."', 
'". mysqli_escape_string($db,$hash) ."') ") or die(mysql_error());
								
	$to      = $email; // Send email to our user
$subject = 'Microbook Verification'; // Give the email a subject 
$message = 'Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
------------------------
 
Please click this link to activate your account:
http://hackt_swg.netai.net/project2/html/veryfy.php?email='.$email.'&hash='.$hash.'
 '; // Our message above including the link// Our message above including the link
                     
$headers = 'From:its_legion@hackt_swg.netai.net' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email		



?>