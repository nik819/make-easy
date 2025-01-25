<?php 
	 //session_start();
	$db = mysqli_connect('localhost', 'root', '', 'makeeasy');

	// initialize variables
	$name = "";
	$userid = "";
	$id = 0;
	$update = false;
	$cancle = false;

	


if (isset($_REQUEST['del'])) {
	$id = $_REQUEST['del'];
	mysqli_query($db, "DELETE FROM tree WHERE id=$id");
	echo "<script>alert('Data Deleted .');window.location.assign('downline.php')</script>";
}


	$results = mysqli_query($db, "SELECT * FROM user");


?>