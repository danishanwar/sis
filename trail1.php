<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" href="css/style.css" text="css/">
	<script src="myscript1.js"></script>
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
	<header>
	<div class="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="image/profile.png" class="profile"/>  
		</center>
	
		<form name="frm1" class="myform" action="register.php" method="post" onsubmit="return validation()">
			<label>Username:</label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username"  /><br><br>
			<label>Fullname:</label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your fullname"  /><br><br> 
			<label>Email:</label><br>
			<input name="email" type="email" class="inputvalues" placeholder="Type your email" /><br><br>
			<table>
			<tr>
			<td>Password:</td>
			<td>Confirm Password:</td>
		    </tr>
		    <tr>
			<td><input name="password" type="password" class="half" placeholder="Type your password"  /></td>
			<td><input name="cpassword" type="password" class="half" placeholder="Confirm your password"  /></td>
		    </tr>
		    </table>
		    <br>
			<table>
			<tr>
			<td align="center">Branch:</td>
			<td align="center">Phone Number:</td>	
			<td align="center">Date of Birth:</td>
			</tr>
			<tr>
			<td><select class="branch" name="branch"> 
					<option value="IT">IT</option>
					<option value="CSE">CSE</option>
					<option value="ECE">ECE</option>
				</select>
			</td>
			<td><input name="phone" type="number" placeholder="Type your phone.no"  /></td>
			<td><input name="birth" type="number" placeholder="DD/MM/YY"  /></td>
			</tr>
			</table><br>
			<label>Gender:</label><br>
        	<input type="radio" class="radiobtns" name="gender" value="male" checked >Male
        	<input type="radio" class="radiobtns" name="gender" value="female" >Female<br>
			<a href="login.php"><input type="button" id="back_btn" value="<<Back to Login"/></a>
			<input name="submit_btn" type="submit" id="signin_btn" value="SignUp"/><br>
		</form>

		<?php

			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button Clicked") </script>';
				$username= $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				$branch = $_POST['branch'];
				$phone = $_POST['phone'];
				$birth = $_POST['birth'];
				$gender = $_POST['gender'];

				if($password==$cpassword)
				{
					$query= "select * from adminreg WHERE username='$username'";
					$query_run = mysqli_query($con,$query);

					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query= "insert into adminreg values('','$username','$email','$password','$branch','$phone','$birth','$gender')";
						$query_run = mysqli_query($con,$query);

						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to Login page for login") </script>';

						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';

						}
					}
				}
				else
				{
					echo '<script type="text/javascript"> alert("Password and Confirm password does not match!") </script>';
				}
			}
		?>
	</div>

</body>
</html>

