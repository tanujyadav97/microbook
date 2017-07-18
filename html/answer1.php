<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>
Microbook
</title>
<link rel="icon" href="../images/qa.ico">
<link href="../css2/mainheader2.css" rel='stylesheet' type='text/css'/ >
<link href="../css2/answer3.css" rel='stylesheet' type='text/css'/ >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="../css2/login7.css" rel='stylesheet' type='text/css'/ >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>



</head>
<body id="b">
<?php session_start();
include 'pop.php'; ?>

<div id="wrapper">

<?php 
 include'head.php';?>


<div id="body">
<?php
include 'db.php';

 if(isset($_GET['title']) && !empty($_GET['title'])){
$title=$_GET['title'];
 $x=$title;
 $_SESSION['qestitle']=$x;}
 else{
	$title=$_SESSION['bad'];
$x=$title;	
 }
	$sql = "SELECT qes,qes_id FROM questions WHERE qes_title='$x'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $qesid=$row['qes_id'];
?>
	<script type="text/javascript">
  $(document).ready(function(){
  $(".trigger").click(function(){
    $(this).next().slideToggle('slow');
});
$(".post").click(function(){
	var cm=$(this).prev().val();
	var a=$(this).val();
	var t="<?php echo $title;?>"
	   $.ajax({
		   type:'POST',
		   url:'../php/comment.php',
		   data: {"title":t,"comment":cm,"ans":a}         ,
success: function(msg){
            alert(msg);
                 }
});
});


});
</script>

  <div id="homebody">
	<div id="homebodyrow">
		<div id="col1">
		<div id="container" >
		<table>
		 <tbody>
			<tr>
				<td>
				<div class="av">
<img src="../images/downvote.png" alt="upvote" /><br/>
<span class="vote">0</span><br/>
<img src="../images/upvote.png" slt="downvote"/>
				</div>
				</td>
				<td>
				<div id="ask" >
				<h2 align="center"><b><?php echo $title;?></b></h2>
				</div>
				<blockquote><?php echo $row['qes'];?></blockquote>
				<div class="td_user"><span style="font-size:11px;">asked:<?php $sql1=mysqli_query($db,"select * from ask where qes_id=$qesid");
				$rowc=mysqli_fetch_array($sql1,MYSQLI_ASSOC);
				$u=$rowc['user_id'];
				echo $rowc['dddda'];
				?>
	<br/>By:<b class="red"><?php $sqlc=mysqli_query($db,"select * from user where user_id=$u");
	$rowc=mysqli_fetch_array($sqlc,MYSQLI_ASSOC);
	echo $rowc['username'];?>
	</b>&nbsp;&nbsp;<br/><img  src="<?php echo $rowc['profilepic'];?>" style="height:50px; width:100px;"/></span>
		<br/></div>
				</td>
				
			</tr>
			
			 </tbody>
 </table>
				
			<?php
	echo '<div class="ces"><div class="cd"><button class="trigger">Comment</button>';
	echo '<form  action="..\php\comment.php" method="POST" class="dialog" style="display: none;"   >
	 <textarea rows="1" cols="55" name="comment" class="comment"></textarea>
	<button type="submit" name="enter" value="' . $row['qes_id']. '">Post comment</button><br/>​ </form>
	</div>
	<div class="ed">
	edit
	</div>
	</div>';
	
	?>
	
			
				

<hr/>
<h2>Answers:</h2>	
<?php
$qesid=$row['qes_id'];
$sql1="SELECT * from give where qes_id='$qesid'";
$recieve1=mysqli_query($db,$sql1);
while($row2=mysqli_fetch_array($recieve1,MYSQLI_ASSOC)){
$ansid=$row2['ans_id'];
$uss=$row2['user_id'];
$sql="SELECT * FROM answers where ans_id='$ansid'";
$recieve=mysqli_query($db,$sql);
while($row3=mysqli_fetch_array($recieve,MYSQLI_ASSOC))
{   $is=$row3['ans'];

   $sql=mysqli_query($db,"SELECT * from user where user_id=$uss");
   $row5=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	?>
	<table>
		<tbody>
	<tr>
		<td>
			<div class="av"><img src="../images/downvote.png" alt="upvote" /><br/>
<span class="vote">0</span><br/>
<img src="../images/upvote.png" alt="downvote"/></div>
		</td>
		<td>
			<div class="td_ans"><blockquote class="ans"><b class="red"><?php echo$is; ?></b></blockquote></div>
		
			<div class="td_tag"><p></p></div>
	
		<div class="td_user"><span style="font-size:11px;">Answered:<?php
	echo $row3['date'];?><br/>By:<b class="red"><?php echo $row5['username'];?></b>&nbsp;&nbsp;<br/><img src="<?php echo $row5['profilepic'];?>" style="height:50px; width:100px;"/></span>
		<br/></div>
	</td>
	</tr>
	</tbody>
</table>
	<?php
	echo '<button class="trigger">Comment</button>';


	echo '<form class="dialog" style="display: none;" id="ad"  >
	 <textarea rows="2" cols="55" name="comment" class="cmt"></textarea>
	<button type="submit" name="enter" class="post" value="' . $is. '">Comment</button><br/>​ </form>';
	 $sql="SELECT comment from comments where ans_id='$ansid'";

	 
$recieve2=mysqli_query($db,$sql);
while($row1=mysqli_fetch_array($recieve2,MYSQLI_ASSOC))
{  $is1=$row1['comment'];
$sql=mysqli_query($db,"select * from comments where comment='$is1'");
$row4=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$u=$row4['user_id'];
$sql=mysqli_query($db,"select * from user where user_id=$u");
$row4=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$u=$row4['username'];
  ?><ul class="as">
		<li >
			<p  id="comment"><?php echo $is1;?>-<b class="name"><?php echo $u;?></b> </P>
		</li>
	</ul>	 
<?php	
}
}

}

?>

</div>
		</div>
		<div id="col2">
		<div id="col21">
		<h1>Your Answer:</h1>
		<?php if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
		echo '<form method="post" action="submitanswer.php">'; 
			 $usernameForenterquestion =  $_SESSION['login']; 
		echo '<textarea name="Answer" cols="40" rows="10"></textarea>
		<input type="submit" value="Submit" name="submit"  id="submit" class="submit" />
		</form>';}
		else{
			echo 'For your answers you have to sign in';
		}?>
		</div>
		<div id="col22">
		<h1>Related Links</h1>
		<ul>
		<li><a href="stackoverflow.com">Stack overflow</a></li>
		<li><a href="">Quora</a></li>
		<li><a href="">Stach Exchange</a></li>
		</ul>
		</div>
	</div>
  </div>
  </div>


</div>
<div class="footer">
<?php include 'footer.php';
?>
</div>
</div>

</body>
</html>