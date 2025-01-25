<?php 
	 //session_start();
	$db = mysqli_connect('localhost', 'root', '', 'makeeasy');

	// initialize variables
	$name = "";
	$email = "";
	$password = "";
	$mobile = "";
	$address = "";
	$account = "";
	$userid="";
	$id = 0;
	$update = false;
	$cancle = false;

	
	if (isset($_REQUEST['save'])) {
		
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$mobile = $_REQUEST['mobile'];
		$address = $_REQUEST['address'];
		$account = $_REQUEST['account'];

		mysqli_query($db, "INSERT INTO user (name, email, password,mobile,address,account) VALUES ('$name', '$email', '$password','$mobile','$address','$account')"); 
		echo "<script>alert('Data Saved.');window.location.assign('total_user.php')</script>";
	}
	


	if (isset($_REQUEST['update'])) {
		$id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$mobile = $_REQUEST['mobile'];
		$address = $_REQUEST['address'];
		$account = $_REQUEST['account'];
		
		mysqli_query($db, "UPDATE user SET name='$name', email='$email', password='$password',mobile='$mobile',address='$address',account='$account' WHERE id=$id");
		echo "<script>alert('Data Update.');window.location.assign('total_user.php');</script>";
	}else if(isset($_REQUEST['cancle'])){
		header('location: total_user.php');
	}
	

if (isset($_REQUEST['del'])) {
	$id = $_REQUEST['del'];

	mysqli_query($db, "DELETE FROM user WHERE id=$id");
	mysqli_query($db, "DELETE FROM tree WHERE id=$id");
	mysqli_query($db, "DELETE FROM income WHERE id=$id");
	
	echo "<script>alert('Data Deleted.');window.location.assign('total_user.php')</script>";
}


if (isset($_REQUEST['send'])) {
	    
	 $id = $_REQUEST['send'];
    $update = true;
    $cancle=true;
    $record = mysqli_query($db, "SELECT * FROM user WHERE id=$id");
   
				if (count($record) == 1 )
				 {
      				$n = mysqli_fetch_array($record);
       				$name = $n['name'];
					$email = $n['email'];
					if(email_check($email))
					{
							mysqli_query($db, "INSERT INTO tree (name, userid) VALUES ('$name', '$email')"); 
							mysqli_query($db, "INSERT INTO income (userid) VALUES ('$email')"); 
							echo "<script>alert('Data Saved In Table.');window.location.assign('downline.php')</script>";
					}
				else
                {   //check email
                    echo "<script>alert('This userid is already availble');window.location.assign('total_user.php');</script>";    
				}

			

			}
    
	
}



	$results = mysqli_query($db, "SELECT * FROM user");

	

?>
<?php
	 function email_check($email)
	 {
		global $db;
		$query=mysqli_query($db,"SELECT name,userid FROM tree WHERE userid='$email'");
		if(mysqli_num_rows($query)>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	 }
	
?>