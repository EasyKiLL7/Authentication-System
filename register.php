<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#000000">

	<div id="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="images/avatar.png" class="avatar"/>			
		</center>
		<form class="myform" action="register.php"method="post">	
		
			<label><b>Full name:</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Enter your Fullname" required/><br>
			<label><b>Gender: </b></label> 
			<input type="radio" class="radiobtns" name="gender" value="male" checked required> Male
			<input type="radio" class="radiobtns" name="gender" value="female" required> Female<br>
			<label><b>Qualification: </b></label> 
			<select class="qualification" name="qualification">
			  <option value="B.E-IT">B.E-IT</option>
			  <option value="BMS">B.TECH</option>
			  <option value="MBA">MBA</option>
			  <option value="MCA">MCA</option>
			</select><br>
			
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Enter your username" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
							
				$fullname = $_POST['fullname'];
				$gender = $_POST['gender'];
				$qualification = $_POST['qualification'];
				
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
						
								
				if($password==$cpassword)
				{
					$encrypted_password = md5($password);
					
					$query= "select * from userinfotable WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// already a user with the same username
						echo '<script> alert("Username taken, Try another username") </script>';
					}
					
					else
					{
						$query= "insert into userinfotable values('','$username','$fullname','$gender','$qualification','$encrypted_password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script> alert("Successfully Registered, Go to login page & login") </script>';
						}
						else
						{
							echo '<script> alert("Error!") </script>';
						}
					}
					
					
				}
				else{
				echo '<script> alert("Password and confirm password does not match!") </script>';	
				}
								
				
				
			}
		?>
	</div>
</body>
</html>