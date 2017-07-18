
<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>
Microbook
</title>
<link rel="icon" href="../images/qa.ico">
<link href="../css2/mainquestionbody.css" rel='stylesheet' type='text/css'/ >
<link href="../css2/loadmore1.css" rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'/>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>            
<body id="b">

<?php session_start();
include 'pop.php'; ?>

<div id="wrapper">

<?php 
 include'head.php';
 $e = 3;
echo "with array " . print_r($e)."";?>

<div id="body">
<div id="questionbody">
<h1>Top Questions:</h1>
<div class="tutorial_list">
<?php

$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
$sql="SELECT *FROM questions  ORDER BY qes_id DESC LIMIT 8";
mysqli_select_db($db,"webdata") or die ("path gayi");
$recieve=mysqli_query($db,$sql);
$count = mysqli_num_rows($recieve);

while($row=mysqli_fetch_array($recieve,MYSQLI_ASSOC))
{   $is=$row['qes_title'];

$tutorial_id=$row['qes_id'];
?>
	<div class="list_item"> 
	<div class="btn_vts_ans_view">
	<div class="s vts"><?php
					$sql=mysqli_query($db,"select sum(likes) as s from votes where qes_id='$tutorial_id'");
					$row1=mysqli_fetch_array($sql,MYSQLI_ASSOC);?><span style="font-size:.9em; margin:20px;"><?php
					$w=$row1['s'];
					 echo $w;?></span><br/><p class="sp">votes</p></div>
	<div class="s ans"><?php $sql1=mysqli_query($db,"select count(ans_id) as b from give where qes_id=$tutorial_id");
			$row1=mysqli_fetch_array($sql1,MYSQLI_ASSOC);?><span style="font-size:.9em; margin:20px;">
				<?php echo $row1['b'];?></span><br/><p class="sp">answers</p></div>
	<div class="s vws"><span style="font-size:.9em; margin:20px;">0</span><p class="sp">views</p></div>
   </div>
   <div class="qt_q">
		<a href='answer1.php?title=<?php echo $is;?>'><h4 class="qestitle"><?php echo $is ?></h4></a>	
			<p class="qs"><?php echo $row['qes']?></p>
				
					
	</div>
	<div class="t_n">
		
			<span style="padding-left:68px;">Asked:<?php $sql1=mysqli_query($db,"select dddda from ask where qes_id=$tutorial_id");
				$row=mysqli_fetch_array($sql1,MYSQLI_ASSOC);
				echo $row['dddda'];?>
			</span>
	</div>	

	</div>

	
<?php }
?>


</div>
<div class="show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
        <span id="<?php echo $tutorial_id; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading....</span></span>
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