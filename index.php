<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Authentication System</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#000000">

	
	<div id="main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src="images/avatar.png" class="avatar"/>
		</center>
	
		<form class="myform" action="index.php" method="post">
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Enter your username" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Enter your password" required/><br>
			<input name="login" type="submit" id="login_btn" value="Login"/><br>
			<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
		</form>
		<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$encrypted_password = md5($password);
			
			$query="select * from userinfotable WHERE username='$username' AND password='$encrypted_password'";
						
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				// valid
				$_SESSION['username']= $username;
				header('location:homepage.php');
			}
			else
			{
				// invalid
				echo '<script> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>
		
	</div>
</body>
</html>