<?php
	include('database.php');
	session_start();

	if(isset($_POST['submit-profile'])){
		$file = $_FILES['profile-image'];

		$file_name = $file['name'];
		$file_tmp_name = $file['tmp_name'];
		$file_error = $file['error'];
		$file_type = $file['type'];

		$fileext = explode('.', $file_name);
		$fileextcheck = strtolower(end($fileext));

		$fileextneeded = array('png','jpg','jpeg');

		if(in_array($fileextcheck, $fileextneeded)){
			$destinationfolder = 'uploads/'.$file_name;
			$fileuploaded = move_uploaded_file($file_tmp_name, $destinationfolder);
			if($fileuploaded AND $file_error == '0'){
				$sql = 'UPDATE users SET image="'.$file_name.'" WHERE email="'.$_SESSION['email'].'"';
				$res = mysqli_query($conn,$sql);

				if(mysqli_num_rows($res) > 0){
					header('Location:home.php?reason=file is uploaded successfully');
				}
				else{
					header('Location:home.php?error= something went wrong!!');
					exit();
				}
			}
		}
		else{
			header('Location:home.php?error=invalid file');
		}
	}

?>