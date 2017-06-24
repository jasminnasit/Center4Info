<?php
$name="";
$usid="";
if(!isset($_COOKIE['user'])){
	header("location:login.php");
}
else{
	$usid=$_COOKIE["user"];
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	$db=mysqli_query($data,"SELECT `fname`,`lname` FROM login WHERE `userid`='$usid'");
	$db=mysqli_fetch_assoc($db);
	$fn=$db['fname'];
	$ln=$db['lname'];
	$name=$fn." ".$ln;
}

?>




<!DOCTYPE HTML>
<html><head><title>black &amp; white</title><meta name="description" content="website description"><meta name="keywords" content="website keywords, website keywords"><meta http-equiv="content-type" content="text/html; charset=windows-1252"><link rel="stylesheet" type="text/css" href="../css/style.css?version=1" title="style"></head><body>
<div id="main">
	<div id="header">
		<div id="logo">
			<div class="black">
				<img class="clogo" src="../images/logo.png">
				<div class="loginname">
					<?php echo $name; ?><br>
					<?php echo $usid; ?>
				</div>
			</div>
		</div>
		<div id="menubar">
			<ul id="menu"><!-- put class="selected" in the li tag for the selected page - to highlight which page you're on --><li class="selected"><a href="index.php">Home</a></li>
				<li><a href="collegeevents.php">College Events</a></li>
				<li><a href="exams.php">Exams</a></li>
				<li><a href="curriculum.php">Curriculum</a></li>
				<li><a href="about.php">About Us</a></li>
			</ul></div>
		</div>
		<div class="maincontent">
			<div class="lbar">

			</div>
			<div class="rbar">
				<div class="searchbar">
					<input type="searchengine" name="sengine" placeholder="Search..." id="sbar" onkeyup="search(this.value)">
					<button id="sbtn">Search</button>
					<div id="dropdown">
						
					</div>
				</div>
			</div>

		</div>
		<div id="content_footer"></div>
		<div id="footer">

		</div>
	</div>
</body></html>

<script type="text/javascript">
	function search(val1)
	{if(val1==""){
		document.getElementById("dropdown").innerHTML="";
		return;
	}
	else{

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			
			if (this.readyState == 4 && this.status == 200) {
				
				document.getElementById("dropdown").innerHTML = this.responseText;	
			}
		};

		xhttp.open("GET", "searchid.php?id="+val1, true);
		xhttp.send();
	}
}

</script>
