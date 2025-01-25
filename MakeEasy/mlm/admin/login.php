<?php
session_start();
require('php-includes/connect.php');
$adminid = mysqli_real_escape_string($con,$_POST['adminid']);
$password = mysqli_real_escape_string($con,$_POST['password']);
//$pass_hash=mysqli_real_escape_string($con,$_POST['password']);
$query = mysqli_query($con,"select * from admin where adminid='$adminid' and password='$password'");
if(empty($adminid) || empty($password))
	{
		echo '<script>alert("Please Enter adminid Or Password");window.location.assign("index.php");</script>';
		exit();
	}
if(mysqli_num_rows($query)>0)
{
	$_SESSION['adminid'] = $adminid;
	$_SESSION['id'] = session_id();
	$_SESSION['login_type'] = "admin";
	
	echo '<script>alert("Admin Login Successfully.");window.location.assign("home.php");</script>';
	
}

else{
	echo '<script>alert("AdminId or password is worng.");window.location.assign("index.php");</script>';
}

?>