<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" href="css/style.css" text="css/">
	<script type="text/javascript">


	</script>
</head>
<body onload='fnload()'>
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
	<header>
	<div class="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="image/profile.png" class="profile"/>  
		</center>
		<span id="alertAll"></span>
		<form name="frm_emp" class="myform" action="register.php" method="post" action="xx.jsp">
			<label>Username:</label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username"  /><br>
			<span id="nameerror"></span><br>
			<label>Fullname:</label>
			<input name="fullname" type="text" onclick="myfun()" class="inputvalues" placeholder="Type your fullname" /><br>
			<script>
				function myfun() {
					var result=true;
					var i=document.getElementsByTagName("input");
					if(i[0].value.length == 0)
					{
						document.getElementById("nameerror").innerHTML = "Username Not mention";
						result=false;
					}	
				    else if(i[0].value.length <= 3 && i[0].value.length != 0)
				    {
						document.getElementById("nameerror").innerHTML = "Username is too Short.Atleast 4 characters";
						result=false;
				    }
				    else if(i[0].value.length >= 4){
						document.getElementById("nameerror").innerHTML = "";
						result=true;
				    }
				    else
				    {
				    	result=true;
				    }
				}
			</script>
			<span id="fnameerror"></span><br>
			<label>Email:</label>
			<input name="email" type="email" onclick="valFNAME()" class="inputvalues" placeholder="Type your email" /><br>
			<script>
				function valFNAME() {
					var result=true;
					var i=document.getElementsByTagName("input");
					if(i[1].value.length == 0)
					{
						document.getElementById("fnameerror").innerHTML = "Please Enter Full Name";
						result=false;
					}	
				    else if(i[1].value.length <= 3 && i[1].value.length != 0)
				    {
						document.getElementById("fnameerror").innerHTML = "Username is too Short.Atleast 4 characters";
						result=false;
				    }
				    else if(i[1].value.length >= 4)
				    {
						document.getElementById("fnameerror").innerHTML = "";
						result=true;
				    }
				    else
				    {
				    	result=true;
				    }
				}
			</script>
			<span id="emailerror"></span>
			<table>
			<tr>
			<td>Password:</td>
			<td>Confirm Password:</td>
		    </tr>
		    <tr>
			<td><input name="password"  onclick="validEmail()" type="password" class="half" placeholder="Type your password"  /></td>
			<script>
				function validEmail()
				{
					var result=true;
					var i=document.getElementsByTagName("input");
					var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
					if(i[2].value.match(mailformat))
					{
					document.getElementById("emailerror").innerHTML = "";
					return true;
					}
					else
					{
					document.getElementById("emailerror").innerHTML = "You have entered an invalid email address!";
					return false;
					}
				}
			</script>
			<td><input name="cpassword" type="password" class="half" placeholder="Confirm your password"  /></td>
		    </tr>
		    </table>
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
			<td><input name="birth" type="date" onclick="validNO()"  /></td>
			</tr>
			<span id="phoneerror"></span>
			<script>
				function validNO(){
					var i=document.getElementsByTagName("input");
					var phoneno = /^\d{10}$/;
					if(i[6].value.match(phoneno))
					{
						document.getElementById("phoneerror").innerHTML = "";
					}
					else
					{
						document.getElementById("phoneerror").innerHTML = "Enter Valid Number of 10 digits!";
					}
				}
			</script>
			</table><br>
			<label>Gender:</label><br>
        	<input type="radio" class="radiobtns" name="gender" value="male" checked >Male
        	<input type="radio" class="radiobtns" name="gender" value="female" >Female<br>
			<a href="login.php"><input type="button" id="back_btn" value="<<Back to Login"/></a>
			<input name="submit_btn" type="submit" id="signin_btn" value="SignUp" /><br>
		</form>

		<?php

			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button Clicked") </script>';
				$username= $_POST['username'];
				$fullname= $_POST['fullname'];
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
						?>
						<script>
						document.getElementById('alertAll').innerHTML = 'User already exists.. try another username';	
						</script>
					<?php
					}
					else
					{
						$query= "insert into adminreg values(
								'1',
								'$username',
								'$fullname',
								'$email',
								'$password',
								'$branch',
								'$phone',
								'$birth',
								'$gender'
							)";
						$query_run = mysqli_query($con,$query);

						if($query_run)
						{
							?>
						<script>
						document.getElementById('alertAll').innerHTML = 'User Registered Go to log in Page';	
						</script>
					<?php
						}
						else
						{
							?>
						<script>
						document.getElementById('alertAll').innerHTML = 'Error';	
						</script>
					<?php

						}
					}
				}
				else
				{
					
					?>
						<script>
						document.getElementById('alertAll').innerHTML = 'Password and Confirm password does not match!';	
						</script>
					<?php
				}
			}
		?>
	</div>

</body>
</html>

