<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
echo '<link href="../css2/loadmore.css" rel="stylesheet">';
//include database configuration file
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");

//count all rows except already displayed
$queryAll = mysqli_query($db,"SELECT COUNT(*) as num_rows FROM questions WHERE qes_id < ".$_POST['id']." ORDER BY qes_id DESC");
$row = mysqli_fetch_assoc($queryAll);
$allRows = $row['num_rows'];

$showLimit = 3;

//get rows query
$query = mysqli_query($db, "SELECT * FROM questions WHERE qes_id <".$_POST['id']." ORDER BY qes_id DESC LIMIT  ".$showLimit);

//number of rows
$rowCount = mysqli_num_rows($query);

if($rowCount > 0){ 
    while($row = mysqli_fetch_assoc($query)){ 
        $tutorial_id = $row["qes_id"];
		$us=$row['qes_title']; ?>
        <div class="list_item"><a href='answer.php?title=<?php echo $us;?>'><h2><?php echo $row["qes_title"]; ?></h2></a>
		<blockquote><p><?php echo $row['qes']?></p></blockquote>
		<div class="d"><a class="l" href='dislike.php?title=<?php echo $tutorial_id;?>'><img name="dislike"src="../images/dislike.png" style="height:35px; width:30px;" ></a>
	<?php $sql=mysqli_query($db,"select sum(dislike) as s from votes where qes_id='$tutorial_id'");
	$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	$w=$row['s'];
	?><b><?php echo $w;?><b></div>
	<div class="l"><a class="l" href='like.php?title=<?php echo $tutorial_id;?>'><img name="like" src="../images/like1.png" style="height:35px; width:30px;" ></a><?php
	$sql=mysqli_query($db,"select sum(likes) as s from votes where qes_id='$tutorial_id'");
	$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	$w=$row['s'];
	?><b><?php echo $w;?><b>
	</div>	

	<p><?php $sql1=mysqli_query($db,"select count(ans_id) as b from give where qes_id=$tutorial_id");
	$row=mysqli_fetch_array($sql1,MYSQLI_ASSOC);
	?><span style="padding-left:68px; font-size:1.2em;">answers:<?php echo $row['b'];?></span><span style="padding-left:68px;">Asked:<?php $sql1=mysqli_query($db,"select dddda from ask where qes_id=$tutorial_id");
	$row=mysqli_fetch_array($sql1,MYSQLI_ASSOC);
	echo $row['dddda'];?></span>
	<hr/>
	</p></div>
<?php } ?>
<?php if($allRows > $showLimit){ ?>
    <div class="show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
        <span id="<?php echo $tutorial_id; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading….</span></span>
    </div>
<?php } ?>  
<?php 
    } 
}
?>