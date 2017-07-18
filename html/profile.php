<!Doctype HTML>
<html>
	<head>
		<title>Profile</title>
		<link rel="icon" href="../images/qa.ico">
		<meta charset="utf-8" >
		<link rel="stylesheet" type="text/css" href="../css2/prof.css" >
		<link rel="stylesheet" type="text/css" href="../css2/mainheader1.css" >
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $(".trigger").click(function(){
    $(this).next().slideToggle('slow');
});
});
</script>
	</head>
	
	<body>
	
		<?php include'head.php';?>
		<?php session_start();
		$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
mysqli_select_db($db,"webdata") or die ("path gayi");
			 $myusername=  $_SESSION['login'];
			        $sql="SELECT * FROM user WHERE username='$myusername'";
					$result=mysqli_query($db,$sql);
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					$id=$row['user_id'];
					$pic=$row['profilepic'];
					?>
	<div id="table">
		<div id="row">
			<div id="info" >
				<div id="proinfo" >
				
				<img style="height:480px; width:460px;" src="<?php echo $pic;?>"/>
				</div>
			
			<table id="detail">
				<tr class="det">
				<td id="desc">Name :</td>
					<td  > <?php echo $row['fname']." ".$row['lname']?></td>
				</tr>
				<tr class="det">
				<td id="desc">Username :</td>
					<td  ><?php echo $row['username']?></td>
				</tr>
				<tr class="det">
				<td id="desc">Email-id :</td>
					<td  ><?php echo $row['email']?></td>
				</tr>
				<form action="upload.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" name="submit">
				</form>
			</table>
			
		</div>
		<div id="qa">
			<div id="q">
			<h2>Question:</h2>
			<div class="dq"> 
				<ul class="dev">
			    <?php 
			
				$sql="SELECT q.qes,q.qes_title,q.qes_id from questions q inner join ask a on q.qes_id=a.qes_id where a.user_id=$id";
				$result1=mysqli_query($db,$sql);
					
					while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
					{
						$qess=$row1['qes_title'];
						$qt=$row1['qes'];
						$qi=$row1['qes_id'];
						?>
						<li><h3 class="qst"><?php echo $row1['qes_title'];?> </h3>
						    <p class="qttl"> <?php echo $qt;?></p></h4><a  class="delete" href='deleteqes.php?title=<?php echo $qi ?>'>delete</a>
		<?php echo '<button class="trigger">update</button>';?>
<?php
	echo '<form  action="updateqes.php" method="POST" class="dialog" style="display: none;"   >
	 <textarea rows="7" cols="25" name="uqes" ></textarea>
	<button type="submit" name="enter" value="' . $row1['qes_id']. '">Edit</button><br/>​ </form>';
	

	?></li>
						
					<?php } ?>
				
				</ul>
			</div>
			</div>
			<div id="a">
			<h2>Answer:</h2>
			<div class="da"> 
				<ul class="dev">
			    <?php 
				
				$sql="SELECT * from answers a inner join give g on a.ans_id=g.ans_id where g.user_id=$id";
				$result1=mysqli_query($db,$sql);
					
					while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
					{
						$anss=$row1['ans'];
						$aid=$row1['ans_id'];
						$qid=$row1['qes_id'];
						$sql2="select qes from questions where qes_id='$qid'";
						$result2=mysqli_query($db,$sql2);
						$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
						$qsa=$row2['qes'];
						?> 
							

		<li><h4 class="qst"><?php echo $row1['ans'];?> </h4><a  class="delete" href='deleteans.php?title=<?php echo $aid ?>'>delete</a>
		<?php echo '<button class="trigger">update</button>';?>
		<?php
			echo '<form  action="updateans.php" method="POST" class="dialog" style="display: none;"   >
			<textarea rows="7" cols="25" name="uans" ></textarea>
			<button type="submit" name="enter" value="' . $row1['ans_id']. '">Edit</button><br/>​ </form>';
	?>
 <p class="qqq"> question:<?php echo $qsa;?></p><hr/></li>
						
					<?php } ?>
				
				</ul>
			</div>
			</div>
		</div>
		</div>
	</div>
	</body>

</html>