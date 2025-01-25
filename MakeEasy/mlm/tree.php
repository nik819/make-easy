<?php
	include('php-includes/connect.php');
	include('php-includes/check-login.php');
	$userid = $_SESSION['userid'];
	$search = $userid;
?>
<?php
	function tree_data($userid)
	{
		global $con;
		$data = array();
		$query = mysqli_query($con,"select * from tree where userid='$userid'");
		$result = mysqli_fetch_array($query);
		$data['left'] = $result['left'];
		$data['right'] = $result['right'];
		$data['leftcount'] = $result['leftcount'];
		$data['rightcount'] = $result['rightcount'];
		return $data;
	}
?>
<?php 
	if(isset($_REQUEST['search-id']))
	{
		$search_id = mysqli_real_escape_string($con,$_REQUEST['search-id']);
		if($search_id!="")
		{
			$query_check = mysqli_query($con,"select * from user where email='$search_id'");
			if(mysqli_num_rows($query_check)>0)
			{
				$search = $search_id;
			}
			else
			{
				echo '<script>alert("Data Not Found");window.location.assign("tree.php");</script>';
			}
		}
		else
		{
			
			 echo '<script>alert("Please Enter currect Id");window.location.assign("tree.php");</script>';
		} 
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
	<title>MakeEasy - Downline</title>
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
						<h1 class="page-header"><i class="fa fa-arrow-down fa-fw"></i>Downline</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-2"></div>
					<form method="REQUEST" autocomplete="off">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" name="search-id" class="form-control" required>
							</div>
						</div><!--/col-lg-6-->
						<div class="col-lg-2">
							<div class="form-group">
								<input type="submit" name="search" class=" btn btn-primary" value="Search">				
							</div>
						</div><!--/col-lg-6-->
					</form>
					<div class="col-lg-8">
				</div><!--/.row-->
			<div class="row">
					<div class="col-lg-12">
					<div class="table-responsive">
					<table class="table" align="center" border="0" style="text-align:center">
					<tr height="120">
					<?php
						$data = tree_data($search);
					?>
					<td  style="color: red;">
						<?php echo $data['leftcount'] ?>
					</td>
					<td colspan="2">
						<i class="fa fa-user fa-4x" style="color:#1430B1"></i>
						<p>
							<?php echo $search; ?>
						</p>
					</td>
					<td style="color: red;">
						<?php echo $data['rightcount'] ?>
					</td>
				</tr>
				<tr height="120">
					<?php
						$first_left_user = $data['left'];
						$first_right_user = $data['right'];
					?>
					<?php 
						if($first_left_user!="")
						{
							?>
							<td colspan="2">
								<a href="tree.php?search-id=<?php echo $first_left_user ?>">
								<i class="fa fa-user fa-4x" style="color:#D520BE"></i>
								<p>
									<?php echo $first_left_user ?>
								</p>
								</a>
							</td>
							<?php 
						}
					else
					{
						?>
						<td colspan="2">
							<i class="fa fa-user fa-4x" style="color:#1976D2"></i>
							<p>
								<?php echo $first_left_user ?>
							</p>
						</td>
						<?php
					}
						?>
					<?php 
						if($first_right_user!="")
						{
						?>
							<td colspan="2">
							<a href="tree.php?search-id=<?php echo $first_right_user ?>">
							<i class="fa fa-user fa-4x" style="color:#1976D2"></i>
							<p>
								<?php echo $first_right_user ?>
							</p>
							</a>
							</td>
							<?php 
						}
							else{
							?>
							<td colspan="2">
								<i class="fa fa-user fa-4x" style="color:#1976D2"></i>
								<p>
									<?php echo $first_right_user ?>
								</p>
							</td>
							<?php
						}
					?>
		</tr>
			<tr height="120">
				<?php 
					$data_first_left_user = tree_data($first_left_user);
					$second_left_user = $data_first_left_user['left'];
					$second_right_user = $data_first_left_user['right'];

					$data_first_right_user = tree_data($first_right_user);
					$third_left_user = $data_first_right_user['left'];
					$thidr_right_user = $data_first_right_user['right'];
				?>
				<?php 
					if($second_left_user!="")
					{
				?>
					<td>
						<a href="tree.php?search-id=<?php echo $second_left_user ?>">
							<i class="fa fa-user fa-4x" style="color:#00838F"></i>
							<p>
								<?php echo $second_left_user ?>
							</p>
						</a>
					</td>
					<?php 
					}
					else{
					?>
						<td>
							<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						</td>
					<?php
					}
					?>
					<?php 
						if($second_right_user!=""){
					?>
					<td>
						<a href="tree.php?search-id=<?php echo $second_right_user ?>">
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						<p>
							<?php echo $second_right_user ?></p>
						</a>
					</td>
					<?php 
					}
					else{
					?>
						<td>
							<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						</td>
					<?php
					}
					?>
					<?php 
						if($third_left_user!=""){
					?>
					<td>
						<a href="tree.php?search-id=<?php echo $third_left_user ?>">
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						<p>
							<?php echo $third_left_user ?>
						</p>
						</a>
					</td>
					<?php 
					}
					else{
					?>
					<td>
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
					</td>
					<?php
					}
					?>
					<?php 
						if($thidr_right_user!=""){
					?>
					<td>
						<a href="tree.php?search-id=<?php echo $thidr_right_user ?>">
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						<p>
							<?php echo $thidr_right_user ?></p>
						</a>
					</td>
					<?php 
					}
					else{
					?>
					<td>
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
					</td>
					<?php
					}
					?>
					</tr>
				</table>
			</div>
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