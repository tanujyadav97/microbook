<html>
<head>
<title>
tags
</title>
<link rel="icon" href="../images/qa.ico">
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'/>

<link href="../css2/mainquestionbody.css" rel="stylesheet"/>

<link href="../css2/tags1.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


</head>
<body id="b">
<?php 
session_start();
include 'pop.php'; ?>
<div id="wrapper">

<?php include 'head.php';?>
<div id="body">
<h1>Tags</h1><p> popular name new
A tag is a keyword or label that categorizes your question with other, similar questions. Using the right tags makes it easier for others to find and answer your question.</p>

<div id="questionbody">
<?php include'db.php';
$sql=mysqli_query($db,"select * from tags");
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{   
	?> 
	<div class="tg"><?php echo $row['name'];?><br/></div>
	<?php
}	?>
</div>
</div>
</div>
<div class="footer">
<?php include 'footer.php'?>
</div>
</body>
</html>