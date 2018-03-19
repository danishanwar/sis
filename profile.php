<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile Page</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
	<body>
		<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="registration.php">User_signin</a></li>
				<li><a href="register.php">Admin_signin</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
		</header>
		
		<div class="main-wrapper">
				<center>
					<h2>Profile Page</h2>
					<h3>Welcome
						<?php echo $_SESSION['username'] ?>
					</h3>					
					<img src="image/profile.png" class="profile"/>
				</center>
				<form class="myform" action="profile.php" method="post">
					
					<input name='logout' type="submit" id="logout_btn" value="Logout"/><br><br>
				</form>

				<?php
					if(isset($_POST['logout']))
					{
						session_destroy();
						header('location:login.php');
					}
				?>
		</div>

	</body>
</html>