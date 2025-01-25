<?php
include('php-includes/check-login.php');
require('php-includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MakeEasy - Admin Home</title>
    <link rel="icon" href="img/core-img/favicon1.ico">
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
                        <h1 class="page-header" ><i class="fa fa-dashboard"> Admin Home</i></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-users"></i>&nbsp;&nbsp;Total Members</h4>
                            </div>
                            <a href="total_user.php"><div class="panel-body">
                                <?php
                                        echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM user"));
                                ?>
                           </div></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-thumb-tack"></i>&nbsp;&nbsp;Total Pin Request</h4>
                            </div>
                            <a href="view-pin-request.php"> <div class="panel-body">
                                <?php
                                        echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM pin_request"));
                                ?>
                           </div></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-street-view"></i>&nbsp;&nbsp;Total Members Pin</h4>
                            </div>
                            <a href="total_pin.php"><div class="panel-body">
                               <?php
                                        echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM pin_list"));
                                ?>
                           </div></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total No of Payout</h4>
                            </div>
                            <a href="income-history.php"> <div class="panel-body">
                                <?php
                                        echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM income_received"));
                                ?>
                           </div></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-arrow-down"></i>&nbsp;&nbsp;Member's Downline</h4>
                            </div>
                            <a href="downline.php"> <div class="panel-body">
                                <?php
                                        echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM tree"));
                                ?>
                           </div></a>
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
