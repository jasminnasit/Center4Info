<?php
$name="";
$usid="";
$usid=$_COOKIE["user"];
if(!isset($_COOKIE['user'])){
	header("location:login.php");
}
else{
	
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	$db=mysqli_query($data,"SELECT `fname`,`lname` FROM login WHERE `userid`='$usid'");
	$db=mysqli_fetch_assoc($db);
	$fn=$db['fname'];
	$ln=$db['lname'];
	$name=$fn." ".$ln;
}

if(isset($_POST['accept']))
{
	$re=$_REQUEST['rec'];
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	mysqli_query($data,"UPDATE request SET `status`='1' WHERE `receiver`='$usid' AND `sender`='$re'");
	echo "<script type='text/javascript'>alert('Request Accpeted');</script>";
}
if(isset($_POST['send']))
{
	$re=$_REQUEST['rec'];
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	$auto=mysqli_query($data,"SELECT max(`rid`) FROM request");
	$auto=mysqli_fetch_assoc($auto);
	$auto=$auto['max(`rid`)'];
	$auto++;
	mysqli_query($data,"INSERT INTO request VALUES('$auto','$usid','$re','0')");
	echo "<script type='text/javascript'>alert('Request Sent Successfully');</script>";
}
if(isset($_POST['postbutton']))
{
	$pst=$_POST['postupdate'];	
	
	$time=time();
	echo $time;
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	$auto=mysqli_query($data,"SELECT max(`pid`) FROM post");
	$auto=mysqli_fetch_assoc($auto);
	$auto=$auto['max(`pid`)'];
	$auto++;
	mysqli_query($data,"INSERT INTO post VALUES('$auto','$usid','$pst','$time')");
	echo "<script type='text/javascript'>alert('Successfully Posted');</script>";
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
				<div class="pst">

					<form  class="sharebar" method="post" action="index.php"><textarea name="postupdate" cols="60" rows="5" placeholder="Write Something Here" class="writepost"></textarea> 
						<input type="submit" name="postbutton" class="postbtn" value="Post"></form>
						<div class="mainpost">
							<?php
							$id=array();
							$i=0;
							$usid=$_COOKIE["user"];
							$data=mysqli_connect("localhost","root","","Center4Info") or die();
							$db=mysqli_query($data,"SELECT `sender`,`receiver` FROM request WHERE (`sender`='$usid' OR `receiver`='$usid') AND `status`='1'");
							foreach ($db as $var) {
								if($var['sender']==$usid)
								{
									$id[$i]=$var['receiver'];
								}
								else
								{
									$id[$i]=$var['sender'];
								}

								$i++;
							}

							$id[$i]=$usid;
							$m=0;
							for($n=0;$n<=$i;$n++)
							{
								$db=mysqli_query($data,"SELECT `pid` FROM post WHERE `userid`='$id[$n]'");
								foreach ($db as $key) {
									$d[$m]=$key['pid'];

									$m++;
								}
							}
							sort($d);
							for($j=($m-1);$j>=0;$j--)
							{ 
								$db=mysqli_query($data,"SELECT `userid`,`content`,`time` FROM post WHERE `pid`='$d[$j]'");
								$db=mysqli_fetch_assoc($db);
								$userid=$db['userid'];
								$time=$db['time'];
								date_default_timezone_set("Asia/Kolkata");
								$time2=time();
						//echo $time;
						//echo $time2;
								$diff=$time2-$time;
								$df=(int)$diff/3600;
								if($df<1)
								{
									if((int)($diff/60)<2)
									{
										if((int)($diff/60)<1)
										{
											$df="Just Now";
										}
										else{
											$df="1 Minute";
										}
									}
									else
									{
										$df=((int)($diff/60))." Minutes";
									}
								}
								$content=$db['content'];
								echo "<div class=upost>$userid</div>";
								echo "<div class=tpost>$df</div>";
								echo "<pre><div class=cpost>$content</div></pre>";
							}

							?>
						</div>
					</div>

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
