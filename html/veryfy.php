 
<html >
<head>
</head>
<link rel="icon" href="../images/qa.ico">
<body>
    <!-- start header div --> 
    <div id="header">
    </div>
    <!-- end header div -->   
     
    <!-- start wrap div -->   
    <div id="wrap">
        <!-- start PHP code -->
        <?php
         include 'db.php';
 $x= $_GET['email'];
		 $y= $_GET['hash'];
		 echo $x.$y;
		 if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
     session_start();
    $email = mysqli_escape_string($db,$_GET['email']); // Set email variable
    $hash = mysqli_escape_string($db,$_GET['hash']); // Set hash variable
                 
    $search = mysqli_query($db,"SELECT email, hash, active FROM user WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
    $match  = mysqli_num_rows($search);
                 
    if($match > 0){
		
    $_SESSION['mail']=$email;
    $_SESSION['hash']=$hash;
        // We have a match, activate the account
		include 'aftermail.php';

        }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}


        ?>
        <!-- stop PHP Code -->
 
         
    </div>
    <!-- end wrap div --> 
</body>
</html>