<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="myscript2.js"></script>
	</head>
	<body>
		<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="registration.php">User Sign Up</a></li>
				<li><a href="register.php">Admin Sign Up</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
		</header>
		<?php
			$usern = $_SESSION['username'];
			if($usern!=""){
				header('location:profile.php');
			}
		?>
		
		<div class="main-wrapper">
				<center>
					<h2>Login Form</h2>
					<img src="image/profile.png" class="profile"/>
				</center>
			<span id="alertAll"></span>
				<form class="myform" action="login.php" method="post" onsubmit="return validation()">
					<label>Username:</label><br>
					<input name="username" type="text" class="inputvalues" placeholder="Type your username" required /><br><br>
					<label>Password:</label><br>
					<input name="password" type="password" class="inputvalues" placeholder="Type your password" required /><br><br>
					<input name="Ulogin" type="submit" id="login_btn" value="User_Login"/></a>
					<input name="Alogin" type="submit" id="login_btn" value="Admin_Login"/></a><br><br>
					<a href="registration.php"><input type="button" id="signin_btn" value="User_SignIn"/></a>
					<a href="register.php"><input type="button" id="signin_btn" value="Admin_SignIn"/></a><br><br>
				</form>
				<?php
				if(isset($_POST['Ulogin']))
				{
					$username=$_POST['username'];
					$password = $_POST['password'];

					$query= "select * from userreg WHERE username='$username' AND password='$password'";

					$query_run = mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						//valid
						$_SESSION['username']= $username;
						header('location:profile.php');
					}
					else
					{
						?>
						<script>
						document.getElementById('alertAll').innerHTML = 'You have entered invalid details! Please log in again with valid details';
						</script>
					<?php
						

					}
				}
				if(isset($_POST['Alogin']))
				{
					$username= $_POST['username'];
					$password = $_POST['password'];

					$query= "select * from adminreg WHERE username='$username' AND password='$password'";

					$query_run = mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						//valid
						$_SESSION['username']= $username;
						header('location:adminprofile.php');
					}
					else
					{
					?>
						<script>
						document.getElementById('alertAll').innerHTML = 'You have entered invalid details!<br>Please log in again with valid details';	
						</script>
					<?php

					}
				}

				?>
		</div>

	</body>
</html>