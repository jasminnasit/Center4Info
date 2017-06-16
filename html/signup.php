<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="mainback">

		<div class="mainblack">

			<div class="row1">
				<div class="col1">
					<img class="logo" src="../images/logo.png">
				</div>

			</div>
			<div class="row2" id="row2">
				<div class="col2" id="col2">
					<div class="row21" >
						Sign Up 		
					</div>
					<div class="row22" >
					  <form name="signupform" action="signup.php" method="get">
					  	<table class="logintab" >
					  	
					  	<tr>
					  		<td>FIRST NAME:</td><td><input type="text" name="fname"></td>
					  	</tr>
					  	<tr>
					  		<td>LAST NAME:</td><td><input type="text" name="lname"></td>
					  	</tr>
					  	<tr>
					  		<td>EMAIL ID:</td><td><input type="text" name="emailid"></td>
					  	</tr>
					  	<tr>
					  		<td>USER ID:</td><td><input type="text" name="userid"></td>
					  	</tr>
					  	<tr>
					  		<td>PASSWORD:</td><td><input type="password" name="psswd"></td>
					  	</tr>
					  	<tr>
					  		<td colspan="2"><input class="logbtn" type="submit" name="signupbtn" value="Sign Up"></td>
					  	</tr>
					  
					  	</table>
					  </form>
					</div>
				</div>
			</div>

		</div>

	</body>
	</html>