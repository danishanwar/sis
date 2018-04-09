<?php
	require 'dbconfig/config.php';
?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Profile Page</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
	<body>
		<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<!-- <li><a href="login.php">Login</a></li> -->
				<!-- <li><a href="registration.php">User_signin</a></li>
				<li><a href="register.php">Admin_signin</a></li> -->
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
		</header>
		<?php
			$usern = $_SESSION['username'];
			var_dump($usern);
			if($usern==""){
				header('location:login.php');
			}
		?>
		<div class="main-wrapper">
				<center>
					<h2>Profile Page</h2>
					<h3>Welcome ADMIN(<?php echo $_SESSION['username'] ?>)</h3>
				</center>
				<form class="myform1" action="adminprofile.php" method="post">
						
					
						<?php
						if(isset($_POST) && array_key_exists("Accept",$_POST)){
							$name=$_POST['username'];
							$query="update userreg set accepted=1 WHERE username='$name'";
							$query_run = mysqli_query($con,$query);
						}
						$query= "select username ,fullname ,reg ,branch from userreg where accepted=0";
						$query_run = mysqli_query($con,$query);
						$count = mysqli_num_rows($query_run);
						if($count>0) {
						echo "<h2>Registration Pending Users</h2>";
						echo "<style>table {
										    font-family: arial, sans-serif;
										    border-collapse: collapse;
										    width: 100%;
										}

										td, th {
										    border: 1px solid #dddddd;
										    text-align: left;
										    padding: 8px;
										}

										tr:nth-child(even) {
										    background-color: blue;
										}
										</style>
										<body>
										<table>
										  <tr>
										    <th>username</th>
										    <th>Full Name</th>
										    <th>Branch</th>
										    <th>Registration Number</th>
										    <th>Decision</th>
										  </tr>";
										}
						while($row = mysqli_fetch_array($query_run)) {
							$username = $row['username'];
							$fullname = $row['fullname'];
							$reg = $row['reg'];
							$branch = $row['branch'];
							echo "<tr>
								  	<td>$username</td>
								  	<td>$fullname</td>
								  	<td>$branch</td>
								  	<td>$reg</td>
								  	<td>	
									  	<form action='adminprofile.php' method='POST'>
										<input type='hidden' name='username' value='$username'>
										<input name='Accept' type='submit' class='btn-sm btn-acc' value='Accept'>
										<input name='Reject' type='submit' class='btn-sm btn-rej' value='Reject'>
									    </form>
								    </td>
								  </tr>";
								  			
    					}
    						echo "</table>";
						?>
						<input name='logout' type="submit" id="logout_btn" value="logout"/><br><br>
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