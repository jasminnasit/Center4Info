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
<html><head><title>black &amp; white</title><meta name="description" content="website description"><meta name="keywords" content="website keywords, website keywords"><meta http-equiv="content-type" content="text/html; charset=windows-1252"><link rel="stylesheet" type="text/css" href="../css/style.css" title="style"></head><body>
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
        <ul id="menu"><!-- put class="selected" in the li tag for the selected page - to highlight which page you're on --><li ><a href="index.php">Home</a></li>
          <li><a href="collegeevents.php">College Events</a></li>
          <li class="selected"><a href="exams.php">Exams</a></li>
          <li><a href="curriculum.php">Curriculum</a></li>
          <li><a href="about.php">About Us</a></li>
        </ul></div>
    </div>
  
    <div id="content_footer"></div>
    <div id="footer">
      
  </div>
</body></html>