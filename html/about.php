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
        <ul id="menu"> <li ><a href="index.php">Home</a></li>
          <li><a href="collegeevents.php">College Events</a></li>
          <li><a href="exams.php">Exams</a></li>
          <li><a href="curriculum.php">Curriculum</a></li>
          <li class="selected"><a href="about.php">About Us</a></li>
        </ul></div>
    </div>
  	 <div class="currimain">
  	 <div class="webhead">
    	 	-: Web Developers :-
    	 </div>
    	 <div class="curriframe">
    	 
         <div class="intro">
         	<div class="photo">
         		<img src="../images/tarzen.jpg" class="photos">
         	</div>
         	<div class="name">
         		JASMIN NASIT
         	</div>
         </div>
         <div class="intro">
             <div class="photo">
         		<img src="../images/jay.jpg" class="photos">
         	</div>
         	<div class="name">
         		JAY DUDHAT
         	</div>
         </div>
         <div class="intro">
         	<div class="photo">
         		<img src="../images/priyansh.jpg" class="photos">
         	</div>
         	<div class="name">
         		PRIYANSH ZALAVADIYA
         	</div>
         </div>
         

    	 </div>
    	 <div class="contact">
    				<div>-:Contact us:-</div>
    					<div>
    						<h3>Email : center4info@gmail.com</h3>
    					</div>    		 			 
         </div>

    </div>
    
    <div id="content_footer"></div>
    <div id="footer">
     
</div>
  </div>
</body></html>
