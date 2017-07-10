<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">

	<div id="main-wrapper">
		<center>
			<?php if(!isset($_SESSION['username']) ||$_SESSION['username'] == false): ?>
				<h1>Login please</h1>
			<?php else : ?>
			<h2>Home Page</h2>
			<h3>Welcome
				<?php echo $_SESSION['username'] ?>
			</h3>
			<img class="avatar" src="imgs/avatar.png">
		</center>

		<form class="myform" action="homepage.php" method="post">
			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>

		</form>
	<?php endif; ?>
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}
		?>
	</div>
</body>
</html>
