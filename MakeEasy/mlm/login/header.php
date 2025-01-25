<?php
include('database.php');
 if(isset($_GET['reason'])){
 	echo "<script>alert('".$_GET['reason']."')</script>";
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>header</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="header.css" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 navbar">
				<a href="home.php">Logo</a>
				<nav>
					WELCOME, <b><?php echo($_SESSION['name']);?></b>
					<?php

					$profileName =  $_SESSION['name'];
					 $words = explode(" ", $profileName);
					 $firstwords = "";

					 foreach ($words as $ws ) {
					 	$firstwords .= $ws[0];
					 }
					 $sql = "SELECT * FROM users WHERE email='".$_SESSION['email']."'";
					 $res = mysqli_query($conn,$sql);

					 if(mysqli_num_rows($res) > 0){
					 	while($row = mysqli_fetch_array($res)){
					 		if($row['image'] == NULL OR $row['image'] == '' OR $row['image'] == ' '){

					 			echo "<a href='?profile=open' class='profiles'>".$firstwords."</a>";
					 		}
					 		else{
					 			echo "<a href='?profile=open' class='profiles'>
					 					<img src='uploads/".$row['image']."' height='40px'/>
					 			</a>";
					 		}
					 	}
					 }
					?>
					<a href="logout.php">Logout</a>
				</nav>
			</div>
		</div>
	</div>
</body>
</html>