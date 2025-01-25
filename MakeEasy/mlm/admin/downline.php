<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
include('downline_server.php');
$adminid = $_SESSION['adminid'];
  if (isset($_REQUEST['edit'])) {
    $id = $_REQUEST['edit'];
    $update = true;
    $cancle=true;


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

    <title>MakeEasy-Member's Downline</title>
    <link rel="icon" href="img/core-img/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="style1.css">
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

        
	    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-arrow-down"></i> Member's Downline</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                        	<table class="table table-bordered table-striped">
                            <?php $results = mysqli_query($db, "SELECT * FROM tree"); ?>
                        
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>userid</th>
                                    <th>Left Member</th>
                                    <th>Right Member</th>
                                    <th>Leftcount</th>
                                    <th>Rightcount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                          
                           
	                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['userid']; ?></td>
                                <td><?php echo $row['left']; 
                                    if($row['left']==NULL)
                                    {
                                        echo 'NULL';
                                    }
                                ?></td>
                                <td><?php echo $row['right'];
                                 if($row['right']==NULL)
                                 {
                                     echo 'NULL';
                                 } ?></td>
                                <td><?php echo $row['leftcount']; ?></td>
                                <td><?php echo $row['rightcount']; ?></td>
                                <td>
                                    <a href="downline_server.php?del=<?php echo $row['id']; ?>" class="del_btn fa fa-trash"> Delete</a>
                                </td>
                            </tr>
	                        <?php } ?>
                            </table>
                          
                        </div>
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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