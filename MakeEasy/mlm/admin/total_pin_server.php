<?php 
	 //session_start();
	$db = mysqli_connect('localhost', 'root', '', 'makeeasy');

	// initialize variables
	$userid = "";
	$pin = "";
	$status = "";
	$id = 0;
	$update = false;
	$cancle = false;

	



	if (isset($_REQUEST['update'])) {
		$id = $_REQUEST['id'];
		// $userid = $_REQUEST['userid'];
		// $pin = $_REQUEST['pin'];
		$status = $_REQUEST['status'];
		

		mysqli_query($db, "UPDATE pin_list SET  status='$status' WHERE id=$id");
		echo "<script>alert('Data Update.');window.location.assign('total_pin.php')</script>";
	}else if(isset($_REQUEST['cancle'])){
		header('location: total_pin.php');
	}
	

if (isset($_REQUEST['del'])) {
	$id = $_REQUEST['del'];
	mysqli_query($db, "DELETE FROM pin_list WHERE id=$id");
	echo "<script>alert('Data Deleted.');window.location.assign('total_pin.php')</script>";
}


	$results = mysqli_query($db, "SELECT * FROM pin_list");


?>