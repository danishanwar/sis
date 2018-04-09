<?php
	require 'dbconfig/config.php';
?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile Page</title>
		<link rel="stylesheet" href="css/profile.css" type="text/css">
	</head>
	<body>
		<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
		</header>

		<?php
			$usern = $_SESSION['username'];
			$query= "select accepted from userreg WHERE username='$usern'";
			$query_run = mysqli_query($con,$query);
			if(mysqli_fetch_array($query_run)[0]["accepted"]=="0"){
				echo "<marquee attribute_name = 'attribute_value'  attributes>
						<h3 style='color: red;'>
							You have not registered yet. Your details has been sent to the admin for verifcation. Please wait till further updation
						</h3>
					  </marquee>";
			}
			else {
				echo "<marquee attribute_name = 'attribute_value'  attributes>
						<h3 style='color: green;'>
							Welcome to SIS. Last date of registration is coming soon please fill up the form as soon as possible
						</h3>
					  </marquee>";
			}
		?>
			<div class="main-wrapper">
				<center>
					<?php
						if ($_SESSION['username']=='') {
							echo "<h2 style='color: red;'>Session Expired</h2><br><h3>You must log in First to view profile page!!!</h3><br>";
							exit();
						}
					?>
					<h2>Profile Page</h2>

					<h3>Welcome
						<?php echo $_SESSION['username'] ?>
					</h3>
				</center>
				<form class="myform" action="profile.php" method="post">
						<?php
							$usern = $_SESSION['username'];
							$query= "select accepted from userreg WHERE username='$usern'";
							$query_run = mysqli_query($con,$query);
							if(mysqli_fetch_array($query_run)[0]["accepted"]=="0"){
								echo "<h2 style='color: red;'>You are not registered yet</h2><br><h3>Your details has been sent to admin for verification, Please log in after some time</h3><br>";
							}
							else {
								$query= "select * from userreg WHERE username='$usern'";
								$query_run = mysqli_query($con,$query);
								while($row = mysqli_fetch_array($query_run)) {
									 $fullname = $row['fullname'];
									 $email = $row['email'];
									 $rollNum = $row['rollNum'];
									 $birth = $row['birth'];
									 $paddress = $row['paddress'];
									 $clgc = $row['clgc'];
									 $cgc = $row['cgc'];
									 $hobo = $row['hobo'];
									  echo "<h3 style='padding-left:40px;text-align: center;'><strong style='color:rgb(100,200, 120);'>Full Name </strong>: $fullname<h3>
									  		<h3 style='padding-left:40px;text-align: center;'><strong style='color:rgb(100,200, 120);'>Email Id </strong>: $email<h3>
									  		<h3 style='padding-left:40px;text-align: center;'><strong style='color:rgb(100,200, 120);'>Roll No </strong>: $rollNum<h3>
									  		<h3 style='padding-left:40px;text-align: center;'><strong style='color:rgb(100,200, 120);'>Date Of Birth </strong>: $birth<h3>
									  		<h3 style='padding-left:40px;text-align: center;'><strong style='color:rgb(100,200, 120);'>Address </strong>: $paddress<h3>
									  		<h3 style='padding-left:40px;text-align: center;'><strong style='color:rgb(100,200, 120);'>College </strong>: $clgc<h3>
									  		<h3 style='padding-left:40px;text-align: center;'><strong style='color:rgb(100,200, 120);'>CGPA </strong>: $cgc<h3>";

	    						}
	    					echo "<h3 style='padding-left:40px;text-align: center;'><strong style='color:rgb(100,200, 120);'>Hobbies : </strong><h3>";
							$usern = $_SESSION['username'];
							$query= "select hob1 from userreg WHERE username='$usern'";
							$query_run1 = mysqli_query($con,$query);
							if($query_run1 != "") echo " Listening to Music, " ;
							$query= "select hob2 from userreg WHERE username='$usern'";
							$query_run2 = mysqli_query($con,$query);
							if($query_run2 == 1) echo "Watching Movies, " ;
							$query= "select hob3 from userreg WHERE username='$usern'";
							$query_run3 = mysqli_query($con,$query);
							if($query_run3 != "") echo " Reading Books, " ;
							$query= "select hob4 from userreg WHERE username='$usern'";
							$query_run4 = mysqli_query($con,$query);
							if($query_run4 == 1) echo " Playing Sports, ";
							$usern = $_SESSION['username'];
							$query= "select * from userreg WHERE username='$usern'";
							$query_run = mysqli_query($con,$query);
							while($row = mysqli_fetch_array($query_run)) {
								 $hobo = $row['hobo'];
								  echo " $hobo ";
							}
						}
						?>
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