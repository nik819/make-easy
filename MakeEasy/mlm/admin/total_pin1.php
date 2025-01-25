<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
include('total_pin_server.php');
 $adminid = $_SESSION['adminid'];
 if (isset($_REQUEST['edit'])) {
    $id = $_REQUEST['edit'];
    $update = true;
    $cancle=true;
    $record = mysqli_query($db, "SELECT * FROM pin_list WHERE id=$id");

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
       
        $status = $n['status'];
       
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

    <title>MakeEasy-Update Pin Status</title>
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
                        <h1 class="page-header"><i class="fa fa-street-view"></i> Total Pin</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                       
                        <form  method="REQUEST" action="total_pin_server.php" >
                             
                                <h5 align="center"><b>Update  Status Detail</b></h5>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                <div>
                                    <label>Status</label>&nbsp;
                                    <!-- <input type="text" name="status" value="" require> -->
                                    <select class="btn-primary dropdown-toggle" name="status" value="<?php echo $status;?>">
                                        <option>Open</option>
                                        <option>Close</option>
                                    </select>
                                  
                                </div>
                               
                                <div class="input-group">

                                    <?php if ($update == true || $cancle==true): ?>
                                        <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>&nbsp;
                                        <button class="btn" type="submit" name="cancle" style="background:#9b1e1e8f;" >cancle</button>
                                    <?php else: ?>
                                        <button class="btn" type="submit" name="save" >Save</button>&nbsp;
                                        <button class="btn" type="submit" name="cancle" style="background: #9b1e1e8f;">Cancle</button>
                                    <?php endif ?>
                                </div>
                                </form>
                       
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
