<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" href="css/style.css" text="css">
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
	<header>
	
	<div class="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="image/profile.png" class="profile">  
		</center>
		<span id="alertAll"></span>
		<form class="myform" action="registration.php" method="post">
			<label>Username:</label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username"  /><br>
			<span id="nameerror"></span><br>
			<label>Fullname:</label><br>
			<input name="fullname" onclick="myfun()" type="text" class="inputvalues" placeholder="Type your fullname" /><br><br>
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
			<label>Email:</label><br>
			<input name="email" type="email" onclick="valFNAME()" class="inputvalues" placeholder="Type your email" /><br><br>
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
			<span id="emailerror"></span><br>
			<table>
			<tr>
			<td>Password:</td>
			<td>Confirm Password:</td>
		    </tr>
		    <tr>
			<td><input name="password" onclick="validEmail()" type="password" class="half" placeholder="Type your password"  /></td>
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
			<td><input name="cpassword" type="password" class="half" placeholder="Confirm your password" /></td>
		    </tr>
		    </table>
		    <!-- <span id="PWDerror"></span> -->
		    <br>
		    <label>Registration Number:</label><br>
			<input name="reg" type="number" class="inputvalues" placeholder="Type your registration.no"  /><br>
			<table>
				<span id="regerror"></span>
			<tr>
			<td align="center">Branch:</td>
			<td align="center">Phone Number:</td>	
			<td align="center">Date of Birth:</td>
			</tr>
			<tr>

			<td><select class="branch" name="branch" onclick="validReg()" >
					<option value="IT">IT</option>
					<option value="CSE">CSE</option>
					<option value="ECE">ECE</option>
				</select>
				<script>
					function validReg() {
					var result=true;
					var i=document.getElementsByTagName("input");
					if(i[5].value.length == 0)
					{
						document.getElementById("regerror").innerHTML = "enter registration number";
						result=false;
					}	
				    else if(i[5].value.length < 8  && i[5].value.length != 0)
				    {
						document.getElementById("regerror").innerHTML = "Registration number should be 8 digit";
						result=false;
				    }
				    else {
				    	document.getElementById("regerror").innerHTML = "";
				    }
				}
				</script>
			</td>
			<td><input name="phone" type="number" placeholder="Type your phone.no"  /></td>
			<td><input name="birth" onclick="validNO()" type="date" /></td>
			</tr>
			
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

			</table>
			<span id="phoneerror"></span><br>
			<label>Roll Number:</label><br>
			<script>
				function valROLL() {
					var result=true;
					var i=document.getElementsByTagName("input");
					var s=document.getElementsByTagName("select");
					var reg = i[5].value.slice(2,4);
					i[8].value = reg + "/" + s[0].value + "/"
				}
			</script>
			<input name="rollNum" type="text" class="inputvalues" placeholder="Type your username" onclick="valROLL()" /><br>
			<br>
			<label>Permanent Address : </label><br>

			<input type="textarea" style="height: 50px; width: 407px;" name="paddress"><br>
			<br>
			<label>Correspondance Address : </label><br>
			<input type="checkbox" name="cadd" value="yes" onclick="updateAdd()" >Same as Permanent Address?<br>
			<input type="textarea" style="height: 50px; width: 408px;" name="caddress"><br>

			<script>
				function updateAdd(){
					var i=document.getElementsByTagName("input");
					if(i[10].checked){
						i[11].value=i[9].value;
					
					}
					else {
						i[11].value="";
					}
				}
			</script>

	        <label>Gender:</label><br>
        	<input type="radio" name="gender" value="male" checked >Male
        	<input type="radio" name="gender" value="female" >Female<br><br>
        	<label>Educational Details:</label><br>
        	<table>
			<tr>
			<td>Std</td>
			<td>Board</td>	
			<td>Institute</td>
			<td>Year</td>
			<td>CGPA</td>
			</tr>
			<tr>
			<td><input name="stda" class="small" type="text" placeholder="10th"/></td>
			<td><input name="boarda" class="big" type="text" placeholder="Type your Board"/></td>	
			<td><input name="clga" class="big" type="text" placeholder="Type your Institute"/></td>
			<!-- <td><input name="yeara" class="small" type="number" placeholder="Year"/></td> -->
			<td><select name="yeara">
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2006">2006</option>
					<option value="2007">2007</option>
					<option value="2008">2008</option>
					<option value="2009">2009</option>
					<option value="2010">2010</option>
					<option value="2011">2011</option>
					<option value="2012">2012</option>
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
				</select>
			</td>
			<td><input name="cga" class="small" type="number" placeholder="Opt"/></td>
			</tr>
			<tr>
			<td><input name="stdb" class="small" type="text" placeholder="12th"/></td>
			<td><input name="boardb" class="big" type="text" placeholder="Type your Board"/></td>	
			<td><input name="clgb" class="big" type="text" placeholder="Type your Institute"/></td>
			<!-- <td><input name="yearb" class="small" type="number" placeholder="Year"/></td> -->
			<td><select name="yearb">
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2006">2006</option>
					<option value="2007">2007</option>
					<option value="2008">2008</option>
					<option value="2009">2009</option>
					<option value="2010">2010</option>
					<option value="2011">2011</option>
					<option value="2012">2012</option>
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
				</select>
			</td>
			<td><input name="cgb" class="small" type="number" placeholder="Opt"/></td>
			</tr>
			<tr>
			<td><input name="stdc" class="small" type="text" placeholder="BTech"/></td>
			<td><input name="boardc" class="big" type="text" placeholder="Type your Board"/></td>	
			<td><input name="clgc" class="big" type="text" placeholder="Type your Institute"/></td>
			<td><select name="yearc">
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2006">2006</option>
					<option value="2007">2007</option>
					<option value="2008">2008</option>
					<option value="2009">2009</option>
					<option value="2010">2010</option>
					<option value="2011">2011</option>
					<option value="2012">2012</option>
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
				</select>
			</td>
			<td><input name="cgc" class="small" type="number" step="0.01" placeholder="CGPA"/></td>
			</tr>
			</table><br>
			<label>Hobbies:</label><br>
			<input type="checkbox" name="hob1" value="yes">Listening to Music<br>
			<input type="checkbox" name="hob2" value="yes">Watching Movies<br>
			<input type="checkbox" name="hob3" value="yes">Reading Books<br>
			<input type="checkbox" name="hob4" value="yes">Playing Sports<br>
			<input type="radio" name="hobo" value="yes" onclick="bringTarea()" >Add Other<br>
			<span id="responce"></span>
			<script>
					var countBox =1;
					var boxName = 0;
					function bringTarea()
					{
					var boxName="textBox"; 
					document.getElementById('responce').innerHTML+='<br/><input type="textarea" style="height:30px; width:407px;" id="textbox" name="textbox" value=""/><br/>';
					}
			</script>
			<a href="login.php"><input type="button" id="back_btn" value="<<Back to Login"/></a>
			<input name="submit_btn" type="submit" id="signin_btn" value="SignUp"/><br>
		</form>

		<?php
			if(isset($_POST['submit_btn']))
			{
				$username= $_POST['username'];
				$fullname= $_POST['fullname'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				$reg = $_POST['reg'];
				$branch = $_POST['branch'];
				$phone = $_POST['phone'];
				$birth = $_POST['birth'];
				$rollNum = $_POST['rollNum'];
				$paddress = $_POST['paddress'];
				$caddress = $_POST['caddress'];
				$gender = $_POST['gender'];
				$stda = $_POST['stda'];
				$boarda = $_POST['boarda'];
				$clga = $_POST['clga'];
				$yeara = $_POST['yeara'];
				$cga = $_POST['cga'];
				$stdb = $_POST['stdb'];
				$boardb = $_POST['boardb'];
				$clgb = $_POST['clgb'];
				$yearb = $_POST['yearb'];
				$cgb = $_POST['cgb'];
				$stdc = $_POST['stdc'];
				$boardc = $_POST['boardc'];
				$clgc = $_POST['clgc'];
				$yearc = $_POST['yearc'];
				$cgc = $_POST['cgc'];
				$hob1 = $_POST['hob1'];
				$hob2 = $_POST['hob2'];
				$hob3 = $_POST['hob3'];
				$hob4 = $_POST['hob4'];
				$hobo = $_POST['textbox'];
				if($password==$cpassword)
				{
					$query= "select * from userreg WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)>0)
					{
					?>
						<script>
						document.getElementById('alertAll').innerHTML = 'User already exists.. try another username';	
						</script>
					<?php
					}
					else
					{
						$query= "insert into userreg values(
								'1',
								'$username',
								'$fullname',
								'$email',
								'$password',
								'$reg',
								'$branch',
								'$phone',
								'$birth',
								'$rollNum',
								'$paddress',
								'caddress',
								'$gender',
								'$stda',
								'$boarda',
								'$clga',
								'$yeara',
								'$cga',
								'$stdb',
								'$boardb',
								'$clgb',
								'$yearb',
								'$cgb',
								'$stdc',
								'$boardc',
								'$clgc',
								'$yearc',
								'$cgc',
								'$hob1',
								'$hob2',
								'$hob3',
								'$hob4',
								'$hobo',
								'0'
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
						echo "<script type='text/javascript'>alert('Error description: ' . mysqli_error($con);)</script>";
						}
					}
				}
				else
				{
					?>
						<script>
						document.getElementById('alertAll').innerHTML = 'Password does not match';	
						</script>
					<?php
				}
			}
		?>
	</div>
</html>

