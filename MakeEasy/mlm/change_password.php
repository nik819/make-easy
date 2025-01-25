<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];

if (!isset($_SESSION["userid"])) {
    ?>
        <script type="text/javascript">
            window.location="change_password.php";
        </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MakeEasy - change password</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-key"></i> Change Password</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
					<div class="col-md-3">
						<form action="" class="pass-content" method="post">
						
							<b>Current Password:</b>
							<input type="password" class="form-control mt-10" name="cpassword" placeholder="Current password">
							<br>
							<b>New Password:</b>
							<input type="password" class="form-control mt-10" name="npassword" placeholder="New password">
							<br>
							<b>Conform Password:</b>
							<input type="password" class="form-control mt-10" name="conpass" placeholder="Conform password">
							<br>
							<input type="submit" name="submit" class="btn-danger" value="Change Password">
						</form>
						  <?php
							if (isset($_POST["submit"])){
							
								$cpass    = $_POST['cpassword'];
								$npass    = $_POST['npassword'];
								$conpass  = $_POST['conpass'];
								$res = mysqli_query($con, "select password from user where email='$_SESSION[userid]'");								
								while($row = mysqli_fetch_array($res)){
                                    $pass   = $row['password'];
								}
								if($cpass != $pass){
									?>
										<div class="alert alert-warning">
											<strong style="color:#333">Invalid!</strong> <span style="color: red;font-weight: bold; ">You entered wrong password</span>
										</div>
									<?php
								}else{
									if($npass == $conpass){
									mysqli_query($con, "update user set password='$npass' where email='$_SESSION[userid]'");
									
									 ?>
										<div class="alert alert-success">
											<strong style="color:#333">Success!</strong> <span style="color: green;font-weight: bold; ">Your password is changed.</span>
										</div>
									<?php
									}else{
									?>
										<div class="alert alert-warning">
											<strong style="color:#333">Not match!</strong> <span style="color: red;font-weight: bold; ">Your password</span>
										</div>
									<?php
									}			
								}								
							}
						?>

					</div>
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
