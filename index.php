<?php
	session_start();
	require 'dbconfig/config.php';
?>
<DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>S.I.S</title>
		<link rel="stylesheet" href="css/homestyle.css" text="css/">
	
	</head>
	<body>
	<header>
		<nav>
			<ul>
				<?php
					$usern = $_SESSION['username'];
					if(!$usern){
						echo "<li><a href='index.php'>Home</a></li><li><a href='login.php'>Login</a></li><li><a href='registration.php'>User Sign Up</a></li><li><a href='register.php'>Admin Sign Up</a></li><li><a href='contact.php'>Contact</a></li>";
					}
					else{
						echo "<li><a href='index.php'>Home</a></li><li><a href='profile.php'>$usern</a></li><li><a href='contact.php'>Contact</a></li>";
					}
				?>
			</ul>

		</nav>
	<header>
	</body>
</html>
