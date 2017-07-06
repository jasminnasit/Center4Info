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
?>



<!DOCTYPE HTML>
<html><head><title>black &amp; white</title><meta name="description" content="website description"><meta name="keywords" content="website keywords, website keywords"><meta http-equiv="content-type" content="text/html; charset=windows-1252"><link rel="stylesheet" type="text/css" href="../css/style.css?version=51" title="style"></head><body>
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
        <ul id="menu"><li><a href="index.php">Home</a></li>
          <li class="selected"><a href="collegeevents.php">College Events</a></li>
          <li><a href="exams.php">Exams</a></li>
          <li><a href="curriculum.php">Curriculum</a></li>
          <li><a href="about.php">About Us</a></li>
        </ul></div>
    </div>
    <div class="mainconten">
    	<div class="events">
    	<div class="studentchap">
    		<div class="heading">
    			Student Chapter
    		</div>
    		<div class="scontent">
    			
    		</div>
    	</div>
    	<div class="curricular">
    		<div class="heading">
    			Co-Curricular
    		</div>
    		<div class="ccontent">
    			
    		</div>
    	</div>
    	<div class="election">
    		<div class="heading">
    			Election Info.
    		</div>
    		<div class="econtent">
    		<?php
    		    $data=mysqli_connect("localhost","root","","Center4Info") or die();
    			$db=mysqli_query($data,"SELECT `heading`,`content`,`date`,`day`,`time` FROM events WHERE `ename`='election' ORDER BY `date`,`time`");
    			foreach ($db as $val) {
    				$head=$val['heading'];
    				$cnt=$val['content'];
    				$date=$val['date'];
    				$d=date_create_from_format("Y-m-d",$date);
    				$da=$d->format("d");
    				$mon=$d->format("F");
    				$day=$val['day'];
    				$tym=$val['time'];
    				echo "<div class=rem><div class=ddate>$da</div><div class=rrem><div class=inhead>$head</div><br> $cnt $mon $day $tym</div></div>";

    			}
    		?>
    		</div>
    	</div>
    		
    	</div>
    </div>
   
    <div id="content_footer"></div>
    <div id="footer">
      
</div>
  </div>
</body></html>
