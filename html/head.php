<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>
Microbook
</title>
<link rel="icon" href="../images/qa.ico">
<link href="../css2/mainheader2.css" rel='stylesheet' type='text/css'/ >
<link href="../css2/loadmore1.css" rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'/>
</head>


<body>
<div id="header1">
	<section>
		<nav id="headernav">
		<ul id="u"><li><?php 
		
		if(isset($_SESSION['login']) && !empty($_SESSION['login'])) {
                echo '<a href="logout.php">Sign out</a>';
              }
		 else{
			echo '<span>Join us<span>';
		}?>
		</li>
			<li><a><?php 
			 
			 if(isset($_SESSION['login']) && !empty($_SESSION['login'])) {
   echo $_SESSION['login'];
}
else{
echo '<a id="modal_trigger" href="#" >Login</a>
';	
}
			
			?></a>
			       </li>
		</ul >
		</nav>
		<form id="form" action="search.php" method="POST">
             <input type="text" name="search" id="s" placeholder="Search..">
		
        </form>
			 
	</section>
</div>

					<div class="pushmenu-push" id="pm">
						
						<div id="ml"><span style="color:white;">151210037@nitdelhi.ac.in<span></div><hr/>
						<nav class="pushmenu pushmenu-left">
							<ul >
								<li><a href="main.php">Home</a></li>
								
							
								<li><a href="profile.php">Profile</a></li>
								
								<li><a href="">Edit Profile</a></li>
									
								<li><a href="#">rate</a></li>

								<li><a href="">Contact us</a></li>

							</ul>
						</nav>
					</div>
<div id="belowheader">
<section>
	<p id="cl1">
	<?php if(isset($_SESSION['login']) && !empty($_SESSION['login']))
		{
		echo '<a class="push push_left" href="#">menu</a>';	
		}
		else{
		}?>
		
	</p>
	<div class="logo" style="display:inline-block; margin-left:8%;">
	<img src="../images/logo.png" style="width:200px; height:100px; "/>
	</div>
		<div style="float:right; margin-right:5%; verticcal-align:top;" class="listout">
        <ul class="openu">
		<li><a href="#">questions</a></li>
		<li><a href="#">Documentation</a></li>
		<li><a href="tags.php">tags</a></li>
		<li><a href="users.php">users</a></li>
		<?php if(isset($_SESSION['login']) && !empty($_SESSION['login']))
		{
		echo '<li><a href="askquestion.php">ask questions</a></li>';	
		}
		else{
			echo '<li>Sign in to ask questions</li>';
		}?>
		</ul>
		</div>					
</section>
</div></body>
</html>