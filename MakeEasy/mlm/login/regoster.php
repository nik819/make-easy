<?php

	include("database.php");
			session_start();
	if(isset($_SESSION['email'])){
	header("Location:home.php?reason=you are alredy logined");
}

	if(isset($_POST["register-submit"])){

		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$pass2 = $_POST['confirmpass'];

		if(empty($name) || empty($username) || empty($email) || empty($pass) || empty($pass2)){
			header("Location:regoster.php?error=All Fields Are Empty");
			exit();
		}
		$conn_e = "SELECT * FROM users WHERE email='".$email."'";
		$rel_e = mysqli_query($conn,$conn_e);
		if(mysqli_num_rows($rel_e) > 0){
			header("Location:regoster.php?error=This Email Is Already Taken");
			exit();
		}
		if($pass != $pass2){
			header("Location:regoster.php?error=Passwords Donot match");
			exit();
		}
		if($pass == $pass2){
			$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

			$sql = "INSERT INTO users(fullname,username,email,pass) VALUES('".$name."','".$username."','".$email."','".$pass_hash."')";
			$row =mysqli_query($conn,$sql);
			if($row){
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				header("Location:home.php?register=successfull");
			}
			else{
				header("Location:regoster.php?error=MY SQL ERROR");
				exit();
			}
		}
	}

?>










<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login system in php</title>
	<link rel="stylesheet" type="text/css" href="css/register.css" />
	<!-- bootstrap csn -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
		<div class="container">
				<div class="row">	

						<div class="col-md-5 offset-md-4">	

								<form action="regoster.php" method="POST">

										<h1 class="text-center text-primary">REGISTER USER</h1>
										<div class="form-group">
											<p class="text-center text-danger">
												<?php
													if(isset($_GET['error'])){
														echo $_GET['error'];
													}



												?>
											</p>
										</div>
										<div class="form-group">
											<label for="name">Full Name</label>
											<input type="text" name="name" class="form-control" placeholder="Enter your name" />
										</div>
										<div class="form-group">
											<label for="username">User Name</label>
											<input type="text" name="username" class="form-control" placeholder="Enter username" />
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" name="email" class="form-control" placeholder="Enter your email" />
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" name="password" class="form-control" placeholder="Enter password" />
										</div>
										<div class="form-group">
											<label for="confirmpass">Confirm Password</label>
											<input type="password" name="confirmpass" class="form-control" placeholder="Confirm password" />
										</div>
										<div class="form-group">	

												<input type="submit" name="register-submit" class="btn btn-block bg-primary" value="Register">

										</div>	
										<div class="form-group text-center">
											<p>Alredy a member ? 
												<a href="login.php">Login Here</a>
											</p>
										</div>

								</form>

						</div>

				</div>		
		</div>
</body>
</html>