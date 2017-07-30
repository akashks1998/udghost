<?php
session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
		<div id="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img id="uploadPreview" src="imgs/avatar.png" class="avatar"/><br>
		</center>
		<form class="myform" action="register.php"method="post" >
			<label><b>Full Name</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			<label><b>Full College Name</b></label><br>
			<input name="college" type="text" class="inputvalues" placeholder="Type your Full College Name" required/><br>
			<label><b>State</b></label><br>
			<input name="state" type="text" class="inputvalues" placeholder="Type your state" required/><br>
			<label><b>Email</b></label><br>
			<input name="email" type="text" class="inputvalues" placeholder="Type your email address" required/><br>
			<label><b>Mobile number</b></label><br>
			<input name="mobile" type="text" class="inputvalues" placeholder="Type your mobile number" required/><br>
			<label><b>Username</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Password</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			<label><b>Confirm Password</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
		</form>
		<?php
			if(isset($_POST['submit_btn'])){
				$fullname =$_POST['fullname'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				$college=$_POST['college'];
				$state=$_POST['state'];
				$email=$_POST['email'];
				$mobile=(int)$_POST['mobile'];
				if($password==$cpassword){
					$query= "select * from fileuploadtable WHERE username='$username'";
					$query_run = mysql_query($query,$con);
					if(mysql_num_rows($query_run)>0){
						// there is already a user with the same username
						echo "User already exists.. try another username";
					}
					else{
						if($key==(int)$_POST['key']){
							$query= "insert into fileuploadtable values('$username','$password','$fullname','$email','$state','$college','$mobile','')";
							$query_run = mysql_query($query,$con);
							if($query_run){
								$_SESSION['username']= $username;
								header('location:homepage.php');
							}
							else{
								echo "Error";

							}
						}
					}
				}
				else{
					echo '<script type="text/javascript"> alert("Password and confirm password does not match!")</script>';
				}
			}
		?>
	</div>
</body>
</html>
