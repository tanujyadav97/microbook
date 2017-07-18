<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>
Askquestion
</title>
<link rel="icon" href="../images/qa.ico">
<link href="../css2/enterqes3.css" type="text/css" rel="stylesheet"/>
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">


</head>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>


<script src="../javascript/input.js" type="text/javascript"></script> 
        
<script>
$(document).ready(function(){
	$("#tag").chosen();
});
	function showHint(str){
		if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } 
		xmlhttp=new XMLHttpRequest();
		 xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../php/schtag.php?q="+str,true);
  xmlhttp.send();

	}	


</script>
<body id="b">

<?php session_start();
include 'head.php';
?>

<div id="wrapper">


<div class="sgt" id="body">
<div class="inst">
<div class="title">
 <h3>How to ask</h3>
 <lABEL>We prefer questions that can be answered, not just discussed.</label>
<p>
Provide details. Share your research.<br/>

If your question is about this website, ask it on meta instead.</p>
 </div>
 <div class="qes">
 <h3>How to format</h3>
 <ul class="h">
 <li>► for linebreak  &lt;br/ &gt; </li>

<li>► for italic put text between &lt;i &gt; &lt;i/ &gt; or for bold
put text between &lt;b &gt; &lt;b/ &gt;</li>

<li>► indent code by 4 spaces</li>

<li>► backtick escapes `like _so_`</li>

<li>► quote by placing > at start of line</li>

<li> ► to make links <http://foo.com>
[foo](http://foo.com)
&lt;a &gt; href="http://foo.com">foo&lt;/a &gt;</li>
 </ul>
 </div>
 <div class="tag">
 <h3>How to Tag</h3>

<label>A tag is a keyword or label that categorizes your question with other, similar questions.</label>
<ul class="h">
<li>► favor existing popular tags; avoid creating new tags</li>

<li>► use common abbreviations</li>

<li>► don't include synonyms</li>

 <li>► combine multiple words into single-words with dashes</li>

<li>► maximum of 5 tags, 25 chars per tag</li>

<li>► tag characters: [a-z 0-9 + # - .]</li>

<li>► delimit tags by space, semicolon, or comm</li>
 </div>
 </div>
<form method="post" action="../php/benterqes.php">
 <div class="qestionform">
	<div class="form-item ask-title">
		<table class="ask-title-table">
		<tbody>
		<tr>
		<td class="ask-title-cell">
		<label>Title</label>
		</td>
		<td class="ask-title-cell-value">
		<input type="text" name="title" tabindex="100" 
		class="ttl" maxlength="300" 
		placeholder="what's your question?Be specific" style="width:598px; padding:10px 0px 10px 0px; float:right;"/>
		</td>
		</tr>
		</table>
		</tbody>
	</div><br/>
	<div id="post-editor"class="form-item ask-question">
		<div id="wmd-container">
		<textarea class="wmd-input" name="des" cols="92" rows="10" tabindex="101"></textarea>
		</div>
	</div>
	<div class="form-item tags">
		<label>Tags</label>
		

	<select id="tag" multiple="true" name="tagss" style="width:400px;" >
   <div id="txtHint">
   <?php include'../php/schtag.php';?>
  </div>
</select>
	</div>
	<input type="submit"  class="sbt" name="submit" value="Post your question" maxlength="50" >
 </div></form>
 
</div>
<div>
 <?php include'footer.php';?>
 </div>
</div>
</body>